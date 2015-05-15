<?php
// cek kalo belum ada akses ke database, include file database
if(@$statuskoneksi != 'connected'){
	require_once 'db_function.php';
}

function Exp_save($t_judul, $t_isi, $location, $lat, $lot, $t_waktu, $kategori, $komen, $budgetAmt, $budgetFor){
    $exp_id     = sanitize($_SESSION['exp_id']);
    $user_id    = sanitize($_SESSION['user_id']);
    $t_judul    = sanitize($t_judul);
    $location   = sanitize($location);
    $lat        = sanitize($lat);
    $lot        = sanitize($lot);
    $date       = sanitize($t_waktu);
    $kategori   = sanitize($kategori);
    $t_isi      = $t_isi;
    $budget     = null;
    
    if (count($budgetAmt) > 0){
        $budgetAmt  = sanitize($budgetAmt);
        $budgetFor  = sanitize($budgetFor);
        // kalo ada data budget, lakukan penyimpanan
        $budget = json_encode(array_combine($budgetFor, $budgetAmt));
    }
    
    $sql = "INSERT INTO tb_pengalaman(pengalaman_id, pengalaman_user_id, pengalaman_judul, "
            . "                         pengalaman_isi, pengalaman_lokasi, pengalaman_lat, "
            . "                         pengalaman_lot, pengalaman_date, pengalaman_kategori, "
            . "                         pengalaman_flag_komen, pengalaman_budget)"
            . "VALUES               ('{$exp_id}','{$user_id}','{$t_judul}','{$t_isi}','{$location}','{$lat}','{$lot}','{$date}','{$kategori}','{$komen}','{$budget}');";
    $sqlInsert = good_query($sql);
    
    if ($sqlInsert == TRUE){    
        return TRUE;
    }else{
        return FALSE;
        
    }
}

function Exp_list_new($page, $batas)
{
    $posisi = (int) $batas * ( (int) $page-1);   // menentukan offset mulai liat data
    // mengambil data new trip dari view
    $sql = "SELECT *
            FROM v_exp_list
            ORDER BY pengalaman_created DESC
            limit {$posisi}, {$batas}" ;
    //return good_query_all($sql);
    return good_query($sql);
}

function Exp_list_hot($page = 1, $batas = 5)
{
    $posisi = (int) $batas * ( (int) $page-1);   // menentukan offset mulai liat data
    // mengambil data trip dari view
    // yg paling banyak di lihat dan lebih baru
    // batasnya ditentukan hanya 5 teratas
    $sql = "SELECT *
            FROM v_exp_list a
            WHERE a.pengalaman_created BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()
            ORDER BY pengalaman_stats DESC, pengalaman_created DESC
            limit {$posisi}, {$batas}" ;
    //return good_query_all($sql);
    return good_query_allrow($sql);
}

function Exp_get_by_id($exp_id){
	// escape html and real escape
	$exp_id = (int) amankan($exp_id);
	
	$sql = "SELECT a.*, (select b.user_username from tb_user b where b.user_id = a.pengalaman_user_id) as username
                FROM tb_pengalaman a
		WHERE a.pengalaman_id = '{$exp_id}' LIMIT 1";
	$data = good_query_assoc($sql);
	return $data;
}

function Exp_edit($t_judul, $t_isi, $location, $lat, $lot, $t_waktu, $kategori, $komen)
{
    $exp_id     = sanitize($_SESSION['edit_pengalaman_id']);
    $user_id    = sanitize($_SESSION['user_id']);
    $t_judul    = sanitize($t_judul);
    $location   = sanitize($location);
    $lat        = sanitize($lat);
    $lot        = sanitize($lot);
    $date       = sanitize($t_waktu);
    $kategori   = sanitize($kategori);
    $t_isi      = clean_text($t_isi);
    
    $sql = "UPDATE tb_pengalaman a SET a.pengalaman_judul = '{$t_judul}', a.pengalaman_isi = '{$t_isi}', a.pengalaman_lokasi = '{$location}', a.pengalaman_lat = '{$lat}', a.pengalaman_lot = '{$lot}', a.pengalaman_date = '{$date}', a.pengalaman_kategori = '{$kategori}', a.pengalaman_flag_komen = '{$komen}'
            WHERE pengalaman_id = '{$exp_id}'";
    $sqlInsert = good_query($sql);
    
    if ($sqlInsert == TRUE){    
        return true;
    }else{
        return FALSE;
    }
}

function Exp_viewed($exp_id)
{
    $exp_id = (int) $exp_id;
    $sql = "UPDATE tb_pengalaman SET pengalaman_stats = pengalaman_stats+1
            WHERE pengalaman_id = '{$exp_id}'";
    good_query($sql);
}

function Exp_delete($exp_id)
{
    $exp_id = (int) $exp_id;
    $sql = "DELETE FROM tb_pengalaman
            WHERE pengalaman_id = '{$exp_id}'";
    $sqlDelete = good_query($sql);
    
     if ($sqlDelete == TRUE){    
        return true;
    }else{
        return FALSE;
    }
}

