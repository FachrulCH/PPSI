<?php
require_once '_include/db_function.php';
require_once '_include/chat.php';

$do = $_GET['do'];

if ($do == 'tanya'){
	
	$chat_trip_id 	= $_POST['i'];
	$chat_mesej 	= $_POST['pertanyaan'];
	$chat_sender	= $_SESSION['user_id'];
	
	// validasi dlu
	if (!isset($chat_trip_id)){
		$pesan = "Kendala dalam membaca trip ini";
		$status = false;
	}elseif (!isset($chat_mesej)){
		$pesan = "Kendala dalam pesan yg dikirim";
		$status = false;
	}elseif (!isset($chat_sender)){
		$pesan = "Anda tidak diizinkan posting";
		$status = false;
	}else{
		$insertTanya = Chat_save_tanya($chat_trip_id, $chat_sender, $chat_mesej);
		if ($insertTanya == true){
			$status = true;
			$pesan  = "Pertanyaan anda berhasil diposting";
		}
	}
	
	
	$hasil = array('status' => $status, 'pesan' => $pesan);
	echo json_encode($hasil);
} 
?>