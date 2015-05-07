<?php
// cek kalo belum ada akses ke database, include file database
if(@$statuskoneksi != 'connected'){
	require_once 'db_function.php';
}

function Exp_save($t_judul, $t_isi, $location, $lat, $lot, $t_waktu, $kategori, $komen){
    $exp_id     = sanitize($_SESSION['exp_id']);
    $user_id    = sanitize($_SESSION['user_id']);
    $t_judul    = sanitize($t_judul);
    $location   = sanitize($location);
    $lat        = sanitize($lat);
    $lot        = sanitize($lot);
    $date       = sanitize($t_waktu);
    $kategori   = sanitize($kategori);
    $t_isi      = $t_isi;
    
    $sql = "INSERT INTO tb_pengalaman(pengalaman_id, pengalaman_user_id, pengalaman_judul, "
            . "                         pengalaman_isi, pengalaman_lokasi, pengalaman_lat, "
            . "                         pengalaman_lot, pengalaman_date, pengalaman_kategori, "
            . "                         pengalaman_flag_komen)"
            . "VALUES               ('{$exp_id}','{$user_id}','{$t_judul}','{$t_isi}','{$location}','{$lat}','{$lot}','{$date}','{$kategori}','{$komen}');";
    $sqlInsert = good_query($sql);
    
    if ($sqlInsert == TRUE){    
        return true;
    }else{
        return FALSE;
    }
}