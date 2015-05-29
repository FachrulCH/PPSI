<?php
// cek kalo belum ada akses ke database, include file database
if(@$statuskoneksi != 'connected'){
	require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'db_function.php';
}

function trip_save($trip_user_id, $trip_judul, $trip_tujuan,$trip_tuj_provinsi,$trip_tuj_kota, $trip_tujuan_geolat, $trip_tujuan_geolng, 
					$trip_kategori, $trip_quota, $trip_date1, $trip_date2, $trip_info, $trip_transport, $trip_meeting_point)
{
//
//	// Pembersihan variabel input sebelum masuk database
//	$trip_user_id       = sanitize($trip_user_id);
//	$trip_judul         = sanitize($trip_judul);
//	$trip_tujuan        = sanitize($trip_tujuan);
//        //$trip_tujuan_lengkap = sanitize($trip_tujuan_lengkap);
//        $trip_tuj_provinsi  = sanitize($trip_tuj_provinsi);
//        $trip_tuj_kota      = sanitize($trip_tuj_kota);
//	$trip_tujuan_geolat = sanitize($trip_tujuan_geolat);
//	$trip_tujuan_geolng = sanitize($trip_tujuan_geolng); 
//	$trip_kategori      = sanitize($trip_kategori);
//	$trip_quota         = sanitize($trip_quota);
//	$trip_date1         = sanitize($trip_date1);
//	$trip_date2         = sanitize($trip_date2);
//	$trip_info          = sanitize($trip_info);
//	$trip_transport     = sanitize($trip_transport);
//	$trip_meeting_point = sanitize($trip_meeting_point);
//	$trip_id            = $_SESSION['trip_id']; 			// Ambil ID trip nya dari session
//	
//        // turn off auto-commit
//        global $db;
//        mysqli_autocommit($db, FALSE);
//	
//        $hasil = 2;
//        // insert data trip
//	$sql = "INSERT INTO tb_trip 
//                    (trip_id, trip_user_id, 
//                    trip_judul, trip_tujuan, 
//                    trip_tujuan_provinsi, trip_tujuan_kota, 
//                    trip_tujuan_geolat, trip_tujuan_geolng, 
//                    trip_kategori, trip_quota, 
//                    trip_date1, trip_date2, 
//                    trip_info, trip_transport, 
//                    trip_meeting_point) 
//		VALUES 	
//                    ('{$trip_id}', '{$trip_user_id}',
//                    '{$trip_judul}', '{$trip_tujuan}',
//                    '{$trip_tuj_provinsi}','{$trip_tuj_kota}', 
//                    '{$trip_tujuan_geolat}', '{$trip_tujuan_geolng}', 
//                    '{$trip_kategori}', '{$trip_quota}', 
//                    '{$trip_date1}', '{$trip_date2}', 
//                    '{$trip_info}', '{$trip_transport}', 
//                    '{$trip_meeting_point}');";
//	$saveSql = good_query($sql);
//	
//        if ($saveSql !== TRUE) {
//            mysqli_rollback($db);  // if error, roll back transaction
//            $hasil = $hasil-1;
//        }
//	// insert ke trip member, user pembuat dengan status HOST
//	$sqlM = "INSERT INTO tb_trip_member (member_trip_id, member_user_id, member_status) VALUES ('{$trip_id}', '{$trip_user_id}', 'A')";
//	$sqlMdo = good_query($sqlM);
//        
//        if ($sqlMdo !== TRUE) {
//            mysqli_rollback($db);  // if error, roll back transaction
//            $hasil = $hasil-1;
//        }
//        
//        // assuming no errors, commit transaction
//        mysqli_commit($db);
//        
//        return $hasil;
}

function Trip_new($t_judul, $t_isi, 
                    $asal, $asal_lat, 
                    $asal_lng, $t_tujuan, 
                    $tujuan_lat, $tujuan_lng, 
                    $t_tgl1, $t_tgl2, 
                    $s_jenis, $kategori2, 
                    $s_komen, $s_join, 
                    $tgl){
    $trip_id = @$_SESSION['exp_id'];
    $user_id = @$_SESSION['user_id'];
    $sql = "Insert into tb_trip (a.trip_id, a.trip_user_id, a.trip_judul, a.trip_tujuan, a.trip_tujuan_geolat, a.trip_tujuan_geolng, a.trip_asal, a.trip_asal_lat, a.trip_asal_lng, a.trip_jenis, a.trip_kategori, a.trip_date1, a.trip_date2, a.trip_detail, a.trip_flag_comm, a.trip_flag_join, a.trip_created_date) "
            . "         Values ($trip_id, $user_id, $t_judul, $tujuan_lat, $tujuan_lng, $asal, $asal_lat, $asal_lng, $s_jenis, $kategori2
                    $asal, $asal_
                    $asal_lng, $t_tujuan, 
                    $tujuan_lat, $tujuan_lng, 
                    $t_tgl1, $t_tgl2, 
                    $s_jenis, $kategori2, 
                    $s_komen, $s_join, 
                    $tgl)";
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
//	$json = get_db_param('status_trip');
//	return $json->status_trip[$id]->name;	
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
        //return mysqli_fetch_all($sqlSelect,MYSQLI_ASSOC);
        return good_query($sql);
}
function Trip_member_join($trip_id){
	$trip_id = (int) $trip_id;
	$sql = "SELECT A.member_user_id, B.user_name, B.user_foto
  		FROM tb_trip_member A, tb_user B
 		WHERE A.member_user_id = B.user_id
       		AND A.member_status IN ('A', 'C')
       		AND A.member_trip_id = '{$trip_id}' ;";
	$sqlSelect = good_query($sql);
        return $sqlSelect;
        
        // Fetch all
        //return mysqli_fetch_all($sqlSelect,MYSQLI_ASSOC);
        //$sqlSelect = mysqli_fetch_assoc($sqlSelect);
	
}

function Trip_total()
{
    $sql = "select count(1) as jum from v_trip_list;";
    $sqlSelect = good_query_assoc($sql);
    return $sqlSelect['jum'];
}

function Tripnya ($sql)
{
    $result = good_query($sql);
    while ($row = mysqli_fetch_assoc($result)){
        $tujuan = "-";
        if (!empty($row['trip_tujuan'])) {
            // di ambil 2 lokasi terdepan
            $tujuan = implode(",", array_slice(explode(",", $row['trip_tujuan']), 0, 1));
        }
        
       if (trim($row['trip_date1']) == '0000-00-00'){
           $trip_date = "<i>Perjalanan impian</i>";
           $konjungsi = " ingin";
       }else{
           $trip_date = "Waktu: ".tanggalan($row['trip_date1']) ." s/d ". tanggalan($row['trip_date2']);
           $konjungsi = " berencana";
       }
       
       if (!empty($row['trip_gambar'])) {
            $foto = $row['trip_gambar'];
        } else {
            $foto = "default.gif";
        }
        
        $label = "<b>". $row['user_username'] ."</b>". $konjungsi ." ke ". $tujuan;
                
        $arr[] = array("trip_id"                => $row['trip_id'], 
                        "trip_judul"            => $row['trip_judul'],
                        "label"                 => $row['user_username'],
                        "trip_created_date"     => $row['trip_created_date'],
                        "chat"                  => @$row['chat'],
                        "trip_gambar"           => $foto,
                        "trip_date"             => $trip_date,
                        "label"                 => $label
                        );
    }
    return $arr;
}

function Trip_load_new($page, $batas)
{
    $posisi = (int) $batas * ( (int) $page-1);   // menentukan offset mulai liat data
    // mengambil data new trip dari view
    $sql = "select * 
            from v_trip_list 
            limit {$posisi}, {$batas}" ;
    //return good_query_all($sql);
    //return good_query($sql);
    return Tripnya($sql);
}

function Trip_load_hot($page, $batas)
{
    $posisi = (int) $batas * ( (int) $page-1);    // menentukan offset mulai liat data
    // mengambil data HOT trip dari view
    $sql = "select a.*, (select count(1) from tb_chat b where b.chat_trip_id = a.trip_id) as chat 
            from v_trip_list a 
            where a.trip_created_date between date_sub(now(),INTERVAL 11 WEEK) and now() 
            order by chat desc limit {$posisi}, {$batas};";
    //return good_query_all($sql);
    //return good_query($sql);
    return Tripnya($sql);
}

function Trip_list($trip_list) {
    if (empty($trip_list)) {
        echo 'Data Trip tidak ditemukan';
    } else {
        foreach ($trip_list as $t) {
            echo '<li>
                    <a href="' . URLSITUS . 'trip/lihat/' . make_seo_name($t['trip_judul']) . '/' . $t['trip_id'] . '/" data-ajax="false">
                        <img src="' . URLSITUS . '_gambar/galeri/thumb2/' . $t['trip_gambar'] . '" class="ui-li-thumb">
                        <p class="normalin"><b>' . $t['trip_judul'] .'</b></p>
                        <p class="hrfKecilBgt">' . @$t['label'] . '</p>
                        <p class="hrfKecilBgt normalin">' . $t['trip_date'] . '</p>
                    </a>
                 </li>';
        }
    }
}

?>