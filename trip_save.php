<?php
include_once '_include/db_function.php';
include_once '_include/trip.php';

$judul 	= amankan ( $_POST ['t_judul'] );
$tujuan = amankan ( $_POST ['formatted_address'] );
$lokasi = amankan ( $_POST ['location'] );
$lokasi = explode(',', $lokasi);
$kota 	= amankan ( $_POST ['administrative_area_level_2'] );
$alamat = amankan ( $_POST ['formatted_address'] );
$kategori = amankan ( $_POST ['s_status_trip'] );
$quota 	= amankan ( $_POST ['t_quota'] );
$tgl1 	= amankan ( $_POST ['t_tgl1'] );
$tgl2 	= amankan ( $_POST ['t_tgl2'] );
$trans 	= amankan ( $_POST ['t_trans'] );
$meeting = amankan ( $_POST ['t_meeting'] );

// proses simpan data ada di dalam prosedur trip_save dari trip.php
$simpan =  trip_save('1', $judul, $tujuan, $lokasi[0], $lokasi[1], $kategori, $quota, $tgl1, $tgl2, 'deskripsinya', $trans, $meeting);

print_r($simpan);
?>