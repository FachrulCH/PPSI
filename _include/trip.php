<?php
// cek kalo belum ada akses ke database, include file database
if(@$statuskoneksi != 'connected'){
	require_once 'db_function.php';
}

function trip_save($trip_user_id, $trip_judul, $trip_tujuan,$trip_tuj_provinsi,$trip_tuj_kota, $trip_tujuan_geolat, $trip_tujuan_geolng, 
					$trip_kategori, $trip_quota, $trip_date1, $trip_date2, $trip_info, $trip_transport, $trip_meeting_point)
{

	// Pembersihan variabel input sebelum masuk database
	$trip_user_id       = sanitize($trip_user_id);
	$trip_judul         = sanitize($trip_judul);
	$trip_tujuan        = sanitize($trip_tujuan);
        //$trip_tujuan_lengkap = sanitize($trip_tujuan_lengkap);
        $trip_tuj_provinsi  = sanitize($trip_tuj_provinsi);
        $trip_tuj_kota      = sanitize($trip_tuj_kota);
	$trip_tujuan_geolat = sanitize($trip_tujuan_geolat);
	$trip_tujuan_geolng = sanitize($trip_tujuan_geolng); 
	$trip_kategori      = sanitize($trip_kategori);
	$trip_quota         = sanitize($trip_quota);
	$trip_date1         = sanitize($trip_date1);
	$trip_date2         = sanitize($trip_date2);
	$trip_info          = sanitize($trip_info);
	$trip_transport     = sanitize($trip_transport);
	$trip_meeting_point = sanitize($trip_meeting_point);
	$trip_id            = $_SESSION['trip_id']; 			// Ambil ID trip nya dari session
	
        // turn off auto-commit
        global $db;
        mysqli_autocommit($db, FALSE);
	
        $hasil = 2;
        // insert data trip
	$sql = "INSERT INTO tb_trip 
                    (trip_id, trip_user_id, 
                    trip_judul, trip_tujuan, 
                    trip_tujuan_provinsi, trip_tujuan_kota, 
                    trip_tujuan_geolat, trip_tujuan_geolng, 
                    trip_kategori, trip_quota, 
                    trip_date1, trip_date2, 
                    trip_info, trip_transport, 
                    trip_meeting_point) 
		VALUES 	
                    ('{$trip_id}', '{$trip_user_id}',
                    '{$trip_judul}', '{$trip_tujuan}',
                    '{$trip_tuj_provinsi}','{$trip_tuj_kota}', 
                    '{$trip_tujuan_geolat}', '{$trip_tujuan_geolng}', 
                    '{$trip_kategori}', '{$trip_quota}', 
                    '{$trip_date1}', '{$trip_date2}', 
                    '{$trip_info}', '{$trip_transport}', 
                    '{$trip_meeting_point}');";
	$saveSql = good_query($sql);
	
        if ($saveSql !== TRUE) {
            mysqli_rollback($db);  // if error, roll back transaction
            $hasil = $hasil-1;
        }
	// insert ke trip member, user pembuat dengan status HOST
	$sqlM = "INSERT INTO tb_trip_member (member_trip_id, member_user_id, member_status) VALUES ('{$trip_id}', '{$trip_user_id}', 'A')";
	$sqlMdo = good_query($sqlM);
        
        if ($sqlMdo !== TRUE) {
            mysqli_rollback($db);  // if error, roll back transaction
            $hasil = $hasil-1;
        }
        
        // assuming no errors, commit transaction
        mysqli_commit($db);
        
        return $hasil;
}

function trip_get_by_id($trip_id){
	// escape html and real escape
	$trip_id = (int) amankan($trip_id);
	
	$sql = "SELECT * 
                FROM tb_trip 
		WHERE trip_id = '{$trip_id}' LIMIT 1";
	$data = good_query_assoc($sql);
	return $data;
}

function Trip_cek_status_user($id){
	$id = (int) $id;
	$sql = "SELECT B.member_status
			FROM tb_trip A, tb_trip_member B
			WHERE A.trip_id = B.member_trip_id  AND B.member_user_id = '{$id}' limit 1";
	$sqlStatus = good_query_assoc($sql);
	if ($sqlStatus){
		return $sqlStatus['member_status'];
	}else {
		return 'Z';
	}
	return $sqlStatus;
}

function Trip_count_member_joined($trip_id){
	$trip_id = (int) $trip_id;
	$sql = "SELECT count(1) as jumlah
			FROM tb_trip_member A
			WHERE A.member_trip_id = '{$trip_id}'
			and A.member_status = 'C'";
	$sqlCount = good_query_assoc($sql);
	return $sqlCount['jumlah'];
}

function Trip_kategori_view($id){
	$json = get_db_param('status_trip');
	return $json->status_trip[$id]->name;	
}

function Trip_get_tanya($trip_id){
	// Fungsi untuk mengambil semua pertanyaan dari suatu trip
	$trip_id = (int) $trip_id;
	
	$sql = "SELECT A.chat_sender, B.user_name, A.chat_mesej, A.chat_date, B.user_foto
			FROM tb_chat A, tb_user B
			WHERE A.chat_sender = B.user_id AND A.chat_type = 2 and A.chat_deleted = 0 AND A.chat_trip_id ='{$trip_id}'
			ORDER BY A.chat_date DESC
			LIMIT 0,10"; // 10 item pertanyaan
	
	$sqlSelect = good_query($sql);
	//return $sqlSelect;
        return mysqli_fetch_all($sqlSelect,MYSQLI_ASSOC);
}
function Trip_member_join($trip_id){
	$trip_id = (int) $trip_id;
	$sql = "SELECT A.member_user_id, B.user_name, B.user_foto
  		FROM tb_trip_member A, tb_user B
 		WHERE A.member_user_id = B.user_id
       		AND A.member_status IN ('A', 'C')
       		AND A.member_trip_id = '{$trip_id}' ;";
	$sqlSelect = good_query($sql);
        //return $sqlSelect;
        
        // Fetch all
        return mysqli_fetch_all($sqlSelect,MYSQLI_ASSOC);
        //$sqlSelect = mysqli_fetch_assoc($sqlSelect);
	
}

function Trip_load_new()
{
    
}

?>