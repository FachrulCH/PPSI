<?php
require_once '_include/db_function.php';
require_once '_include/trip.php';
require_once '_include/chat.php';
require_once '_include/template.php';
require_once '_include/user.php';
require_once '_include/Exp.php';

$do = $_GET['do'];

// =========================================================================== //
if ($do == 'tanya'){
    ///***** Validasi capcay****///
    $captcha    = $_POST['capcay'];
    $response   = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeO_QUTAAAAAHV1shZF4h2BnhS7QdrrzRDI5YaJ&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);

    if ($response['success'] == false) {
       $pesan   = "User anda tidak lolos captcha";
       $status  = false;
       $hasil   = NULL;
    } else {
        // user valid
    
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
    }    
        $result = array('status' => $status, 'pesan' => $pesan, 'data' => $hasil);
        
        echo json_encode($result);
        
// =========================================================================== //	
}
elseif ($do == 'chatpm'){
    $captcha   = $_POST['t_capcay'];
    $t_judul    = $_POST['t_judul'];
    $t_pm_pesan = $_POST['t_pm_pesan'];
    $chat_for_id = (int) dekripsi($_POST['u']);
    $chat_sender = @$_SESSION['user_id'];
    
    ///***** Validasi capcay****///
    $response   = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeO_QUTAAAAAHV1shZF4h2BnhS7QdrrzRDI5YaJ&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);

    if ($response['success'] == false) {
       $pesan   = "User anda tidak lolos captcha";
       $status  = 3; //reset captcha
       $hasil   = NULL;
    } else {
        // user valid
        $result = Chat_save_pm($chat_for_id, $chat_sender, $t_pm_pesan, $t_judul);
        if ($result){$status = 1;}
        $pesan	= "Pertanyaanmu berhasil di kirimkan";
    }
        $hasil 	= array('status' => $status, 'pesan' => $pesan);
	echo json_encode($hasil);
// =========================================================================== //
}
elseif ($do == 'ijingabung'){
	$status = true;
	$pesan	= "Permintaan gabung berhasil. Tunggu approval penyelenggara trip ya";
	$hasil 	= array('status' => $status, 'pesan' => $pesan);
	echo json_encode($hasil);
        
// =========================================================================== //
}
elseif ($do == 'trip_save') {
        $id     = @$_SESSION['user_id'];
	$judul  = $_POST['t_judul'];
        $tujuan = $_POST['formatted_address'];
        $tujuan_prov = $_POST['administrative_area_level_1'];
        $tujuan_kota = $_POST['administrative_area_level_2'];
        $lokasi = isset($_POST['location'])? explode(',', $_POST['location']): NULL;
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
        $hasil = array('status' => true, 'pesan' => "berhasil masuk ", 'data' => $simpan);
	echo json_encode($hasil);

// =========================================================================== //
}
elseif($do == 'kategori'){
    $id = $_POST['id'];
    $detailKategori = Tmplt_get_kategori2($id);
    $hasil = array('status' => true, 'pesan' => null, 'data' => $detailKategori);
    echo json_encode($hasil);  // data detail kategori

// =========================================================================== //
}
elseif($do == 'cekusername'){
    //***** Pengecekan apakah username yg akan daftar sudah ada apa belum *****//
    // fungsi ada pada include/user.php

    $status = User_tersedia($_POST['usernames']);
    if ($status == TRUE){
        echo 'true'; // masih tersedia
    }else{
        echo 'false'; // udah ada yg punya
    }

// =========================================================================== //    
}
elseif($do == 'cekemail'){
    //***** Pengecekan apakah username yg akan daftar sudah ada apa belum *****//
    // fungsi ada pada include/user.php

    $status = User_email_tersedia($_POST['usernames']);
    if ($status == TRUE){
        echo 'true'; // masih tersedia
    }else{
        echo 'false'; // udah ada yg punya
    }

// =========================================================================== //    
}
elseif($do == 'newmember'){
    //***** inisialisasi nilai *****//
    $status = false;
    $pesan  = 'pesan kosong';
    $hasil  = 'hasil kosong';
    
    ///***** Validasi capcay****///
    $captcha    = isset($_POST['g-recaptcha-response'])? $_POST['g-recaptcha-response'] : null;
    $response   = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeO_QUTAAAAAHV1shZF4h2BnhS7QdrrzRDI5YaJ&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);

    if ($response['success'] == false) {
       $pesan   = "User kamu tidak lolos captcha, tolong di ceklis lagi :) ";
       $status  = false;
       $hasil   = NULL;
    } else {
        //***** user tervalidasi capcay
        $namaLengkap    = $_POST['t_nama_lengkap'];
        $username       = $_POST['t_username'];
        $email          = $_POST['t_email'];
        $pwd            = md5(trim($_POST['t_katasandi']));
        
        //***** sekali aja validasi, karena nilai udah di filter di awal dengan jquery
        if(isset($namaLengkap) && isset($username) && isset($email) && isset($pwd)){
            //***** proses penyimpanan data user baru => include/user.php
            $status = User_new($namaLengkap,$username,$email,$pwd);
                if ($status == TRUE){
                    $pesan   = "Selamat bergabung ".$username." !, mohon login dahulu ya";
                }else{
                    $pesan   = "terjadi kesalahan dalam proses pembuatan user kamu";
                }
        }else{
            $pesan   = "Input kurang lengkap";
        }
    }
    
        $result = array('status' => $status, 'pesan' => $pesan, 'data' => $hasil);
        echo json_encode($result);

// =========================================================================== //        
}
elseif($do == 'login'){
    //*** inisiasi nilai
    $status = false;
    $pesan  = "gagal login";
    $hasil  = null;//$_POST;
    $username = $_POST['t_username'];
    $password = md5(trim($_POST['t_password']));
    
    if (strpos($username,'@') == true) {
        //*** cek login dengan imel ***//
        $status = User_loginbyemail($username, $password);
            if ($status == 1){
                $pesan = 'Login email berhasil';
            }elseif($status == 2){
                $pesan = 'Email tidak ditemukan';
            }else{
                $pesan = 'Password salah';
            }

    }else{
        //*** cek login dengan username ***//
        $status = User_loginbyusername($username, $password);
            if ($status == 1){
                $pesan = 'Login username berhasil';
            }elseif($status == 2){
                $pesan = 'Username tidak ditemukan';
            }else{
                $pesan = 'Password salah';
            }

    }
    $result = array('status' => $status, 'pesan' => $pesan, 'data' => strtolower($username));
    echo json_encode($result);

// =========================================================================== //    
}
elseif($do == 'updatemember'){
    //*** inisiasi nilai
    $status = false;
    $pesan  = "";
    $hasil  = $_POST;
    $lokasi = isset($_POST['location'])? explode(',', $_POST['location']): NULL;
    $hasil  = User_update($_POST['t_bio'], $_POST['t_nama_lengkap'], 
                            $_POST['t_email'], $_POST['s_jk'], 
                            $_POST['t_ttl'], $_POST['t_exp'], 
                            $_POST['t_sosmed'], $_POST['t_lokasi'], @$lokasi[0], @$lokasi[1]);
    
    if ($hasil == 1){
        //$status = TRUE;
        $pesan = "Tidak ada data yg terupdate";
    }elseif ($hasil == 2) {
        $status = 1;
        $pesan = "Datamu berhasil terupdate";
    }else{
        $status = 3;
        $pesan = "Kesalahan dalam mengupdate data";
    }
    
    
    $result = array('status' => $status, 'pesan' => $pesan, 'data' => $_POST);
    echo json_encode($result);

// =========================================================================== // 
}
elseif($do == 'pengalamanbaru'){
    //*** inisiasi nilai
    $status = FALSE;
    $pesan  = "";
    ///***** Validasi capcay****///
    $captcha    = isset($_POST['g-recaptcha-response'])? $_POST['g-recaptcha-response'] : null;
    $response   = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeO_QUTAAAAAHV1shZF4h2BnhS7QdrrzRDI5YaJ&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);

    if ($response['success'] == false) {
       $pesan   = "User kamu tidak lolos captcha, tolong di ceklis lagi :) ";
       $status  = false;
       $hasil   = NULL;
    } else {
        //***** user tervalidasi capcay
        $tgl = isset($_POST['t_waktu']) ? $_POST['t_waktu'] : date("Y-m-d");
        $lokasi = isset($_POST['location'])? explode(',', $_POST['location']): null;
        $hasil = Exp_save(@$_POST['t_judul'], clean_text(@$_POST['t_isi']), @$_POST['formatted_address'], @$lokasi[0], @$lokasi[1], $tgl, @$_POST['kategori2'], @$_POST['s_komen'],@$_POST['budgetAmt'],@$_POST['budgetFor']);
        
        if ($hasil == TRUE){
            $status = TRUE;
            $pesan = "Pengalamanmu berhasil di simpan";
        }else{
            $status = FALSE;
            $pesan = "Gagal tersimpan";
        }
    }
    
    $result = array('status' => $status, 'pesan' => $pesan, 'data' => "OK");
    echo json_encode($result);
}
elseif($do == 'pengalamanedit'){
    //*** inisiasi nilai
    $status = FALSE;
    $pesan  = "";
    ///***** Validasi capcay****///
    $captcha    = isset($_POST['g-recaptcha-response'])? $_POST['g-recaptcha-response'] : null;
    $response   = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeO_QUTAAAAAHV1shZF4h2BnhS7QdrrzRDI5YaJ&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);

    if ($response['success'] == false) {
       $pesan   = "User kamu tidak lolos captcha, tolong di ceklis lagi :) ";
       $status  = false;
       $hasil   = NULL;
    } else {
        //***** user tervalidasi capcay
        $lokasi = isset($_POST['location'])? explode(',', $_POST['location']): " , ";
        if($_POST['kategori2'] != 'Pilih kategori'){ 
            $kategori = $_POST['kategori2'];
        }else{ 
            $kategori = $_SESSION['edit_pengalaman_kategori'] ;
        } //==> kalo kategori ga diganti pake kategori awal, diambil dari session
        
        $hasil = Exp_edit(@$_POST['t_judul'], clean_text(@$_POST['t_isi']), @$_POST['formatted_address'], @$lokasi[0], @$lokasi[1], @$_POST['t_waktu'], $kategori, @$_POST['s_komen']);
        
        if ($hasil == TRUE){
            $status = TRUE;
            $pesan = "Pengalamanmu berhasil di update";
        }else{
            $status = FALSE;
            $pesan = "Gagal tersimpan";
        }
    }
    
    $result = array('status' => $status, 'pesan' => $pesan, 'data' => $_POST);
    echo json_encode($result);
}
elseif($do == 'pengalamanhapus'){
    //*** inisiasi nilai
    $status = FALSE;
    $pesan  = "";
    $hasil = Exp_delete($_SESSION['edit_pengalaman_id']);
    //$hasil = true;
    if ($hasil == TRUE){
            $status = TRUE;
            $pesan = "Pengalamanmu berhasil di hapus";
        }else{
            $status = FALSE;
            $pesan = "Gagal menghapus";
        }
    $result = array('status' => $status, 'pesan' => $pesan, 'data' => $_POST);
    echo json_encode($result);
}
elseif($do == 'rencanabaru'){
    //*** inisiasi nilai
    $status = FALSE;
    $pesan  = "";
    ///***** Validasi capcay****///
    $captcha    = isset($_POST['g-recaptcha-response'])? $_POST['g-recaptcha-response'] : null;
    $response   = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeO_QUTAAAAAHV1shZF4h2BnhS7QdrrzRDI5YaJ&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);

    if ($response['success'] == false) {
       $pesan   = "User kamu tidak lolos captcha, tolong di ceklis lagi :) ";
       $status  = 3;
       $hasil   = NULL;
    } else {
        //***** user tervalidasi capcay
        $tgl    = date("Y-m-d H:i:s");
        $lokasi_asal    = isset($_POST['asal_lokasi'])? explode(',', $_POST['asal_lokasi']): array(0,0);
        $lokasi_tujuan  = isset($_POST['location'])? explode(',', $_POST['location']): array(0,0);
        $trip_id = @$_SESSION['exp_id'];
        $user_id = @$_SESSION['user_id'];
        $hasil   = Trip_simpan(sanitize($_POST['t_judul']), clean_text($_POST['t_isi']), 
                                sanitize($_POST['t_asal']), sanitize($lokasi_asal[0]), 
                                sanitize($lokasi_asal[1]),  sanitize($_POST['t_tujuan']), 
                                sanitize($lokasi_tujuan[0]),sanitize($lokasi_tujuan[1]), 
                                sanitize($_POST['t_tgl1']), sanitize($_POST['t_tgl2']), 
                                sanitize($_POST['s_jenis']),sanitize($_POST['kategori2']), 
                                sanitize($_POST['s_komen']),sanitize($_POST['s_join']),
                                $tgl, $trip_id, $user_id);
        
        if ($hasil == TRUE){
            $status = TRUE;
            $pesan = "Perjalananmu berhasil di simpan";
        }else{
            $status = FALSE;
            $pesan = "Gagal tersimpan, kesalahan teknis saat menyimpan rencana kamu";
        }
    }
    
    $result = array('status' => $status, 'pesan' => $pesan, 'data' => "OK");
    echo json_encode($result);
}
elseif($do == 'usersekitar'){
    //*** inisiasi nilai
    $status = TRUE;
    $lat    = sanitize($_POST['lat']);
    $lng    = sanitize($_POST['lng']);
    $pesan  = NULL;
    //$hasil = @$_POST;
    $hasil  = User_sekitar($lat, $lng);
    $result = array('status' => $status, 'pesan' => $pesan, 'data' => $hasil);
    echo json_encode($result);
}
else{
    echo 'ada kesalahan';
}
?>