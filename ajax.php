<?php
require_once '_include/db_function.php';
require_once '_include/trip.php';
require_once '_include/chat.php';
require_once '_include/template.php';

$do = $_GET['do'];

if ($do == 'tanya'){
	$status 		= false; 				// inisiasi value default
	$pesan			= "Error mengambil informasi dari database";	// inisiasi value default
	$user_id		= $_POST['id'];
	$chat_trip_id 	= $_POST['i'];
	$chat_mesej 	= $_POST['pertanyaan'];
	$chat_sender	= @$_SESSION['user_id'];
	
	// validasi dlu
	if (!isset($chat_trip_id)){
		$pesan = "Kendala dalam membaca trip ini";
		$status = false;
	}elseif (!isset($chat_mesej)){
		$pesan = "Kendala dalam pesan yg dikirim";
		$status = false;
	}elseif ($chat_sender == ''){
		$pesan = "Kamu harus login dulu";
		$status = false;
	}elseif ($user_id != $chat_sender){
		$pesan = "Kamu tidak bisa memposting pertanyaan";
	}else{
		// return True kalo berhasil di save
		$insertTanya = Chat_save_tanya($chat_trip_id, $chat_sender, $chat_mesej);
		
		if ($insertTanya == true){
			$status = true;
			$pesan  = "Pertanyaan anda berhasil diposting";
		}
	}
	
	
	//$hasil = array('status' => $status, 'pesan' => $pesan);
	//echo json_encode($hasil);
	
	//diganti kembalian berupa file tanya yg udah di reload pake data baru
	if ($status == true){
		Tmplt_comment_trip1($chat_trip_id);
	}else{
		//$hasil = array('status' => $status, 'pesan' => $pesan);
		//echo json_encode($hasil);
		echo "<br/>".$pesan;
	}
	
}elseif ($do == 'ijingabung'){
	$status = true;
	$pesan	= "Permintaan gabung berhasil. Tunggu approval penyelenggara trip ya";
	$hasil 	= array('status' => $status, 'pesan' => $pesan);
	echo json_encode($hasil);
} 
?>