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

function Trip_simpan($t_judul, $t_isi, 
                    $asal, $asal_lat, 
                    $asal_lng, $t_tujuan, 
                    $tujuan_lat, $tujuan_lng, 
                    $t_tgl1, $t_tgl2, 
                    $s_jenis, $kategori2, 
                    $s_komen, $s_join, 
                    $tgl,$trip_id,
                    $user_id){
    // variabel yg dikirimkan udah di sanitize di lemparannya dari ajax.php/rencanabaru
    // turn off auto-commit
    global $db;
    mysqli_autocommit($db, FALSE);
    
    //Dokumentasi MySQL => REPLACE works exactly like INSERT, except that if an old row in the table has the same value as a new row for a PRIMARY KEY or a UNIQUE index, the old row is deleted before the new row is inserted.
    $sql = "REPLACE INTO tb_trip (trip_id, trip_user_id, trip_judul, trip_tujuan, trip_tujuan_geolat, trip_tujuan_geolng, trip_asal, trip_asal_lat, trip_asal_lng, trip_jenis, trip_kategori, trip_date1, trip_date2, trip_detail, trip_flag_comm, trip_flag_join, trip_created_date) "
            . "VALUES ('{$trip_id}', '{$user_id}', '{$t_judul}', '{$t_tujuan}', '{$tujuan_lat}', '{$tujuan_lng}', '{$asal}', '{$asal_lat}', '{$asal_lng}', '{$s_jenis}', '{$kategori2}', '{$t_tgl1}', '{$t_tgl2}', '{$t_isi}', '{$s_komen}', '{$s_join}', '{$tgl}')";
    
    $simpan_trip = good_query($sql);
    $simpan_host = Trip_add_user($trip_id, $user_id, 'A'); // insert ke trip member, user pembuat dengan status HOST
    
    if ($simpan_trip !== TRUE OR $simpan_host !== TRUE) {
        mysqli_rollback($db);  // if error, roll back transaction
        $hasil = FALSE;
    } else {
        // assuming no errors, commit transaction
        mysqli_commit($db);
        $hasil = TRUE;
    }
    return $hasil;
}

function Trip_add_user($trip_id,$user_id,$status = 'B'){
    // insert ke trip member, 
    // A: host | B: ijin join | C: udah join |  D: cancel | E: kabur
    $sqlM   = "REPLACE INTO tb_trip_member (member_trip_id, member_user_id, member_status) VALUES ('{$trip_id}', '{$user_id}', '{$status}')";
    return good_query($sqlM);
}

function Trip_get_by_id($trip_id){
	// escape html and real escape
	$trip_id = (int) amankan($trip_id);
	
//	$sql = "SELECT a.*, (select u.user_username from tb_user u where u.user_id = a.trip_user_id) as username
//                FROM tb_trip a 
//		WHERE trip_id = '{$trip_id}' LIMIT 1";
        $sql = "SELECT a.*, u.user_username AS username, IFNULL(u.user_foto,'userpic.gif') AS user_foto
                FROM tb_trip a
                INNER JOIN tb_user u ON a.trip_user_id = u.user_id
                WHERE trip_id = '{$trip_id}'
                LIMIT 1";
                
	$data = good_query_assoc($sql);
	return $data;
}

function Trip_cek_status_user($id, $trip_id){
	$id = (int) $id;
	$sql = "SELECT B.member_status
                FROM tb_trip A, tb_trip_member B
                WHERE A.trip_id = B.member_trip_id  
                AND A.trip_id = '{$trip_id}'
                AND B.member_user_id = '{$id}' limit 1";
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

function Trip_get_tanya($trip_id){
	// Fungsi untuk mengambil semua pertanyaan dari suatu trip
	$trip_id = (int) $trip_id;
	
	$sql = "SELECT A.chat_id, A.chat_sender, B.user_name, A.chat_mesej, A.chat_date, B.user_foto
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
    $arr = array();
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
                
        
        // untuk pencarian memerlukan keterangan jarak, jadi di tambahin array baru
        if (!empty(@$row['distance'])){
            $arr[] = array("trip_id"            => $row['trip_id'], 
                        "trip_judul"            => $row['trip_judul'],
                        "href"                  => URLSITUS . 'trip/lihat/' . make_seo_name($row['trip_judul']) . '/' . $row['trip_id'] .'/',
                        "label"                 => $row['user_username'],
                        "trip_created_date"     => $row['trip_created_date'],
                        "chat"                  => @$row['chat'],
                        "trip_gambar"           => $foto,
                        "trip_date"             => $trip_date,
                        "label"                 => $label,
                        "distance"              => $row['distance']
                        );
        }else{
            $arr[] = array("trip_id"            => $row['trip_id'], 
                        "trip_judul"            => $row['trip_judul'],
                        "label"                 => $row['user_username'],
                        "trip_created_date"     => $row['trip_created_date'],
                        "chat"                  => @$row['chat'],
                        "trip_gambar"           => $foto,
                        "trip_date"             => $trip_date,
                        "label"                 => $label
                        );
        }
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

function Trip_load_hot()
{
    //$posisi = (int) $batas * ( (int) $page-1);    // menentukan offset mulai liat data
    // mengambil data HOT trip dari view
//    $sql = "select a.*, (select count(1) from tb_chat b where b.chat_trip_id = a.trip_id) as chat 
//            from v_trip_list a 
//            where a.trip_created_date between date_sub(now(),INTERVAL 4 WEEK) and now() 
//            order by chat desc limit {$posisi}, {$batas};";
//         
    //**** Perbaikan algoritma hot trip dengan persentase
$sql ="select ( ((a.trip_stats)*0.3) + ((select count(1) from tb_chat b where b.chat_trip_id = a.trip_id)*0.7) ) as point, 
        a.*
        from v_trip_list a 
        where a.trip_created_date between date_sub(now(),INTERVAL 4 WEEK) and now()
        and (a.trip_date2 > now() OR a.trip_date2 = '0000-00-00')
        order by point desc limit 0, 10";            
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

function Trip_viewed($trip_id)
{
    $trip_id = (int) $trip_id;
    $sql = "UPDATE tb_trip SET trip_stats = trip_stats+1
            WHERE trip_id = '{$trip_id}'";
    good_query($sql);
}

function Trip_galeri($trip_id)
{
    $sql = "select g.galeri_trip_id,g.galeri_foto_id,g.galeri_foto_url,g.galeri_foto_judul,g.galeri_date from tb_galeri g where g.galeri_trip_id = '{$trip_id}' ";
    return good_query_allrow($sql);
}

function Trip_save_member($trip_id, $user_id, $status)
{
    $sql = "replace into tb_trip_member(member_trip_id, member_user_id, member_status) values ('{$trip_id}','{$user_id}','{$status}');";
    return good_query($sql);
}

function Trip_delete_member($trip_id, $user_id)
{
    $sql = "DELETE tb_trip_member WHERE member_trip_id = '{$trip_id}' AND member_user_id = '{$user_id}'";
    return good_query($sql);
}

function Trip_cari_default($lat, $lng) 
{
    $jarak = 10; //(KM)
    
    // Kalo ga dapet 
    // jarak di FLOOR ke bawah
    $sql = "SELECT FLOOR((6371 * ACOS(COS(RADIANS(". $lat .")) * COS(RADIANS(t.trip_tujuan_geolat)) * COS(RADIANS(t.trip_tujuan_geolng) - RADIANS(". $lng .")) + SIN(RADIANS(". $lat .")) * SIN(RADIANS(t.trip_tujuan_geolat))))) AS distance,
            t.trip_id, t.trip_judul, t.trip_date1, t.trip_date2, t.trip_gambar, t.user_username, t.trip_tujuan,t.trip_created_date
            FROM v_trip_list t
            HAVING distance < ".$jarak."
            ORDER BY distance ASC;";
    //return good_query_allrow($sql);
    return Tripnya($sql);
}
function Trip_cari_detail($lat, $lng, $s_kategori, $t_dari, $t_sampai, $l_impian) 
{
    $jarak = 10; //(KM)
    
    $conditions = '';
    $tglan = '';
    $tglanImpian = '';
    if ($s_kategori != '1'){
        $conditions = " AND v.parent_id = '". $s_kategori ."'";
    }
    if (!empty($t_dari)){
        $tglan .= " AND trip_date1 >= '". $t_dari ."'";
    }
    if (!empty($t_sampai)){
        $tglan .= " AND trip_date2 <= '". $t_sampai ."'";
    }
    if ($l_impian == 'on'){
        $tglanImpian .= " OR trip_date1 = '0000-00-00'";
    }else{
        $tglanImpian .= " AND trip_date1 != '0000-00-00'";
    }
    $conditions = $conditions ." AND (1=1 ". $tglan . $tglanImpian .")";
    // Kalo ga dapet 
    // jarak di FLOOR ke bawah
    $sql = "SELECT FLOOR((6371 * ACOS(COS(RADIANS(". $lat .")) * COS(RADIANS(t.trip_tujuan_geolat)) * COS(RADIANS(t.trip_tujuan_geolng) - RADIANS(". $lng .")) + SIN(RADIANS(". $lat .")) * SIN(RADIANS(t.trip_tujuan_geolat))))) AS distance,
            t.*
            FROM v_trip_list t, v_param_parent v
            WHERE 1=1 
            AND trip_kategori = v.param_id
            ".$conditions."
            HAVING distance < ".$jarak."
            ORDER BY distance ASC;";
    //return good_query_allrow($sql);
    return Tripnya($sql);
    //return $sql;
}

function Trip_count()
{
    $sql = "select count(1) as jumlah from tb_trip";
    return good_query_assoc($sql);
}
?>