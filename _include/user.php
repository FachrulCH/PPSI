<?php
// cek kalo belum ada akses ke database, include file database
if(@$statuskoneksi != 'connected'){
	require_once 'db_function.php';
}

function User_get_by_id($id)
{
	$sql = "SELECT * FROM  tb_user WHERE user_id = '{$id}' LIMIT 1";
	$sqlDo = good_query_assoc($sql);
        return $sqlDo;
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

function User_update($t_bio, $t_nama_lengkap, $t_email, $s_jk, $t_ttl, $t_exp, $t_sosmed, $t_lokasi, $t_lokasi_lat, $t_lokasi_lng) 
{
    $t_bio          = sanitize($t_bio);
    $t_nama_lengkap = sanitize($t_nama_lengkap);
    $t_email        = sanitize($t_email);
    $s_jk           = sanitize($s_jk);
    $t_ttl          = sanitize($t_ttl);
    $t_exp          = sanitize($t_exp);
    $t_sosmed       = sanitize($t_sosmed);
    $t_lokasi       = sanitize($t_lokasi);
    $t_lokasi_lat   = sanitize($t_lokasi_lat);
    $t_lokasi_lng   = sanitize($t_lokasi_lng);
    $id             = (int) $_SESSION['user_id'];//isset($_SESSION['user_id'])? $_SESSION['user_id'] :null;
    
    $sql = "UPDATE tb_user SET user_name = '{$t_nama_lengkap}', user_email = '{$t_email}', user_bio = '{$t_bio}', user_gender = '{$s_jk}', user_ttl = '{$t_ttl}', user_exp = '{$t_exp}', user_sosmed = '{$t_sosmed}', user_lokasi = '{$t_lokasi}', user_geolat = '{$t_lokasi_lat}', user_geolng= '{$t_lokasi_lng}' WHERE user_id = '{$id}'";
    return good_update($sql);
    //return $sql; buat debug
}

function User_member_trip($user_id)
{
    /*
     * Mengecek apakah user ini mengikuti suatu trip aktif
     */
    $sql = "select a.trip_id, a.trip_judul from tb_trip a, tb_trip_member b
            where a.trip_id = b.member_trip_id
            and a.trip_date1 >= CURRENT_DATE
            and b.member_status in ('A','C')";
    return good_query_allrow($sql);
}

function User_get_profil_by_name($username) 
{
    $username = strtolower(sanitize($username));
    $sql = "select A.*,
        (select count(1) from tb_pengalaman B where B.pengalaman_user_id = A.user_id) as user_pengalaman, 
        (select count(1) from tb_trip_member C where C.member_status in ('A','C') and C.member_user_id = A.user_id) as user_perjalanan 
        from tb_user A where LOWER(A.user_username) = '{$username}'; ";
    return good_query_assoc($sql);
}
?>