<?php
// cek kalo belum ada akses ke database, include file database
if(@$statuskoneksi != 'connected'){
	require_once 'db_function.php';
}

function trip_save($trip_user_id, $trip_judul, $trip_tujuan, $trip_tujuan_geolat, $trip_tujuan_geolng, 
					$trip_kategori, $trip_quota, $trip_date1, $trip_date2, $trip_info, $trip_transport, $trip_meeting_point){
	// Ambil ID trip nya nih
	$trip_id = $_SESSION['trip_id'];
	// insert data trip
	$sql = "INSERT INTO tb_trip (trip_id, trip_user_id, trip_judul, trip_tujuan, trip_tujuan_geolat, trip_tujuan_geolng, trip_kategori, trip_quota, trip_date1, trip_date2, trip_info, trip_transport, trip_meeting_point) 
			VALUES 	('{$trip_id}', '{$trip_user_id}', '{$trip_judul}', '{$trip_tujuan}', '{$trip_tujuan_geolat}', '{$trip_tujuan_geolng}', '{$trip_kategori}', '{$trip_quota}', '{$trip_date1}', '{$trip_date2}', '{$trip_info}', '{$trip_transport}', '{$trip_meeting_point}');";
	$saveSql = good_query($sql);
	
	// insert ke trip member, user pembuat dengan status HOST
	$sqlM = "INSERT INTO tb_trip_member (member_trip_id, member_user_id, member_status) VALUES ('{$trip_id}', '{$trip_user_id}', 'A')";
	$sqlMdo = good_query($sqlM);
	
	if($saveSql && $hasil){
		$hasil = true;
	}else{
		$hasil = false;
	}
	
	if ($hasil == true){
		$pesan = "Trip kamu berhasil di buat";
	}else{
		$pesan = "Ada kesalahan teknis saat membuat trip kamu :( ";
	}
	// Pesan untuk hasil proses simpan data dikirim dalam bentuk json
	$json = json_encode(array('pesan' => $pesan));
	return $json;
}

function trip_get_by_id($trip_id){
	// escape html and real escape
	$trip_id = amankan($trip_id);
	
	$sql = "SELECT * 
			FROM tb_trip 
			WHERE trip_id = '{$trip_id}' LIMIT 1";
	$data = good_query_assoc($sql);
	return $data;
}

function Trip_cek_status_user($id){
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

/*function Trip_button_user($id){
	$user_status = Trip_cek_status_user($id);
	
	if ($user_status == 'A'){
		// Klo user nya adalah host
		echo '<a href="#" class="ui-btn ui-icon-comment ui-btn-icon-right">Pertanyaan</a>
			<a href="#" class="ui-btn ui-icon-user ui-btn-icon-right">Diskusi</a>
			<a href="#" class="ui-btn ui-icon-gear ui-btn-icon-right">Manage member</a>';
	}elseif ($user_status == 'B'){
		// Status B => Ijin join
		echo '<a href="#" class="ui-btn ui-icon-comment ui-btn-icon-right">Tanya</a>
			<a href="#" class="ui-btn ui-icon-plus ui-btn-icon-right">Ijin Gabung</a>';
	}elseif ($user_status == 'C'){
		// Status user C => udah join
		echo '<a href="#" class="ui-btn ui-icon-comment ui-btn-icon-right">Pertanyaan</a>
			<a href="#" class="ui-btn ui-icon-user ui-btn-icon-right">Diskusi</a>
			<a href="#" class="ui-btn ui-icon-minus ui-btn-icon-right">Batal Gabung</a>';
	}else{
		// Selain semuanya, alias member umum
		echo '<a href="#" class="ui-btn ui-icon-comment ui-btn-icon-right">Tanya</a>
			<a href="#" class="ui-btn ui-icon-plus ui-btn-icon-right">Ijin Gabung</a>';
	}
		
}*/

function Trip_count_member_joined($trip_id){
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
	$trip_id = (int) $trip_id;
	
	$sql = "SELECT B.user_name, A.chat_mesej, A.chat_date, B.user_foto
			FROM tb_chat A, tb_user B
			WHERE A.chat_sender = B.user_id AND A.chat_type = 2 and A.chat_deleted = 0 AND A.chat_trip_id ='{$trip_id}'
			ORDER BY A.chat_date DESC
			LIMIT 0,5";
	
	$sqlSelect = good_query($sql);
	return $sqlSelect;
}
?>