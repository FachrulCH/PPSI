<?php
// cek kalo belum ada akses ke database, include file database
if(@$statuskoneksi != 'connected'){
	require_once 'db_function.php';
}

function User_get_by_id($id){
	$sql = "SELECT * FROM  tb_user WHERE user_id = '{$id}' LIMIT 1";
	$sqlDo = good_query_assoc($sql);
}

function User_new($namaLengkap,$username,$email,$pwd){
    $namaLengkap    = sanitize($namaLengkap);
    $username       = sanitize($username);
    $email          = sanitize($email);
    $pwd            = sanitize($pwd);
    $ip             = get_user_ip();

    $sql = "INSERT INTO tb_user (user_name, user_username, user_email, user_password, user_ip)
            VALUES ('{$namaLengkap}', '{$username}', '{$email}', '{$pwd}','{$ip}');";
            
     $sqlINSERT = good_query($sql); //return nya true|false
     return $sqlINSERT;
}

function User_tersedia($username){
    $username   = sanitize($username);
    $sql        = "SELECT count(1) as hitung FROM tb_user WHERE user_username = '{$username}'";
    $sqlSelect  = good_query_assoc($sql);
    if ($sqlSelect['hitung'] == 0){
        //echo 'tersedia';
        return true;
    }else{
        //echo 'udah ada coy';
        return false;
    }
}

function User_loginbyusername($username, $password){
    return 2;
}
function User_loginbyemail($username, $password){
    return 2;
}
?>