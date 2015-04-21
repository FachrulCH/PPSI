<?php
// cek kalo belum ada akses ke database, include file database
if(@$statuskoneksi != 'connected'){
	require_once 'db_function.php';
}

function User_get_by_id($id){
	$sql = "SELECT * FROM  tb_user WHERE user_id = '{$id}' LIMIT 1";
	$sqlDo = good_query_assoc($sql);
}

?>