<?php
// cek kalo belum ada akses ke database, include file database
if(@$statuskoneksi != 'connected'){
	require_once 'db_function.php';
}

function User_get_by_id($id)
{
	$sql = "SELECT * FROM  tb_user WHERE user_id = '{$id}' LIMIT 1";
	$sqlDo = good_query_assoc($sql);
}

function User_new($namaLengkap,$username,$email,$pwd)
                {
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

function User_tersedia($username)
{
    $username   = strtolower(sanitize($username));  // bershihkan dan bikin jadi lowercase
    $sql        = "SELECT count(1) as hitung FROM tb_user WHERE LOWER(user_username) = '{$username}'";
    $sqlSelect  = good_query_assoc($sql);
    if ($sqlSelect['hitung'] == 0){
        //echo 'tersedia';
        return true;
    }else{
        //echo 'udah ada coy';
        return false;
    }
}

function User_email_tersedia($email)
{
    $email      = strtolower(sanitize($email));  // bershihkan dan bikin jadi lowercase
    $sql        = "SELECT count(1) as hitung FROM tb_user WHERE LOWER(user_email) = '{$email}'";
    $sqlSelect  = good_query_assoc($sql);
    if ($sqlSelect['hitung'] == 0){
        //echo 'tersedia';
        return true;
    }else{
        //echo 'udah ada coy';
        return false;
    }
}


function User_loginbyusername($username, $password)
{
    $username   = strtolower(sanitize($username));  // bershihkan dan bikin jadi lowercase
    $password   = sanitize($password);              // bersihkan
    
    $sql        = "SELECT count(1) as hitung, user_id FROM tb_user WHERE LOWER(user_username) = '{$username}' and user_password = '{$password}' ";
    $sqlSelect  = good_query_assoc($sql);
    if ($sqlSelect['hitung'] == 0){
        //*** User gagal login;
        // lalu cek, nama yg diinput emang udah ada usernya apa belum
        // balikan 0 kalo ternyata not found
        $cek = User_tersedia($username);
        
            if ($cek === true){
                // kalo ternyata username kosong
                return 2; // username tidak ditemukan
            }
            else{
                // username ada, tapi ga bisa login? salah password berarti
                return 0;
            }
            
    }else{
        //*** kalo user ada dan password cocok
        // generate session user
        $_SESSION['user_id'] = $sqlSelect['user_id'];
        return 1; // sukses login
    }
    

}

function User_loginbyemail($email, $password)
{
    $email = strtolower(sanitize($email));  // bershihkan dan bikin jadi lowercase
    $password = sanitize($password);              // bersihkan

    $sql = "SELECT count(1) as hitung, user_id FROM tb_user WHERE LOWER(user_email) = '{$email}' AND user_password = '{$password}' ";
    $sqlSelect = good_query_assoc($sql);
    if ($sqlSelect['hitung'] == 0) {
        //*** User gagal login;
        // lalu cek, nama yg diinput emang udah ada usernya apa belum
        // balikan 0 kalo ternyata not found
        $cek = User_email_tersedia($email);

        if ($cek === true) {
            // kalo ternyata email gada di database
            return 2; // email tidak ditemukan
        } else {
            // email ada, tapi ga bisa login? salah password berarti
            return 0;
        }
    } else {
        //*** kalo user ada dan password cocok
        // generate session
        $_SESSION['user_id'] = $sqlSelect['user_id'];
        return 1; // sukses login
    }
}

function User_get_profil($user_id) 
{
    $user_id = (int) sanitize($user_id);
    $sql = "SELECT * FROM tb_user WHERE user_id = {$user_id}";
    return good_query_assoc($sql);
}
?>