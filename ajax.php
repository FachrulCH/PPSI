<?php
require_once '_include/db_function.php';
require_once '_include/trip.php';
require_once '_include/chat.php';
require_once '_include/template.php';

$do = $_GET['do'];

if ($do == 'tanya'){
	$status 	= false; 				// inisiasi value default
        $hasil          = "";
	$pesan		= "Error mengambil informasi dari database";	// inisiasi value default
	$user_id	= (int) dekripsi($_POST['id']);
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
		$pesan = "Kamu tidak bisa memposting pertanyaan ";
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
            $hasil = Tmplt_comment_trip2($chat_trip_id);
	}else{
		//$hasil = array('status' => $status, 'pesan' => $pesan);
		//echo json_encode($hasil);
		//echo "<br/>".$pesan;
            $hasil = "error terjadi";
	}
        
        $result = array('status' => $status, 'pesan' => $pesan, 'data' => $hasil);
        
        echo json_encode($result);
	
}elseif ($do == 'ijingabung'){
	$status = true;
	$pesan	= "Permintaan gabung berhasil. Tunggu approval penyelenggara trip ya";
	$hasil 	= array('status' => $status, 'pesan' => $pesan);
	echo json_encode($hasil);
}elseif ($do == 'trip_save') {
        $id     = @$_SESSION['user_id'];
	$judul  = $_POST['t_judul'];
        $tujuan = $_POST['formatted_address'];
        $tujuan_prov = $_POST['administrative_area_level_1'];
        $tujuan_kota = $_POST['administrative_area_level_2'];
        $lokasi = explode(',', $_POST['location']);
        $kategori = $_POST['s_status_trip'];
        $quota  = $_POST['t_quota'];
        $tgl1   = $_POST['t_tgl1'];
        $tgl2   = $_POST['t_tgl2'];
        $trans  = $_POST['t_trans'];
        $meeting = $_POST['t_meeting'];
        $rencana = $_POST['t_rencana'];
        // proses simpan data ada di dalam prosedur trip_save dari trip.php
        $simpan =  trip_save($id, 
                $judul, 
                $tujuan,
                $tujuan_prov,
                $tujuan_kota, 
                $lokasi[0], $lokasi[1], 
                $kategori, 
                $quota, 
                $tgl1, $tgl2, 
                $rencana, 
                $trans, 
                $meeting);
        if ($simpan == 2){
            $pesan = "Rencana perjalananmu berhasil tersimpan";
        }else{
            $pesan = "gagal coy tersimpan";
        }
        $hasil = array('status' => true, 'pesan' => "berhasil masuk ".$simpan, 'data' => $simpan);
	echo json_encode($hasil);
	
}else{
    echo 'ada kesalahan';
}
?>