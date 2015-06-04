<?php
// template di include di bawah:
// db_function.php -> trip.php

function get_meta($title=null)
{
echo "<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>";
echo '
	<title>'.$title.'</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="shortcut icon" href="css/favicon.ico" type="image/x-icon">
        <link rel="icon" href="'.URLSITUS.'css/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="'.URLSITUS.'css/jquery.mobile.structure-1.4.5.min.css" />
	<link rel="stylesheet" href="'.URLSITUS.'css/themes/jquery.mobile.icons.min.css" />
	<script src="'.URLSITUS.'js/jquery.min.js"></script>
	<script src="'.URLSITUS.'js/jquery.mobile-1.4.5.min.js"></script>';

//tambah google font
//penggunaan => font-family: 'Asap', sans-serif;
echo "  <link href='http://fonts.googleapis.com/css?family=Asap' rel='stylesheet' type='text/css'>";
echo '<link rel="stylesheet" href="'.URLSITUS.'css/themes/tema-merah.min.css" />
        <link rel="stylesheet" href="'.URLSITUS.'css/tb.css" />';
echo "<script>var URLSITUS='".URLSITUS."'</script>";
}

function get_panel()
{
    //*** Kalau user sudah login
    if (isLogin()){
        require_once dirname(__FILE__).DIRECTORY_SEPARATOR."user.php";;
        $user_id        = $_SESSION['user_id'];
        $user           = User_get_by_id($user_id);
        $tripnya_user   = User_member_trip($user_id); //==> ambil data user's trip
        $notif          = User_notifikasi();

        echo '
	<div data-role="panel" id="menuPanel" data-position="right" data-position-fixed="true" data-display="push">
		<div class="ketengah">
			<a href="#">';
        if (empty($user['user_foto'])){                
            echo '<img src="'.URLSITUS.'_gambar/user/userpic.gif" width="80">';
        }else{
            echo '<img src="'.URLSITUS.'_gambar/user/'.$user['user_foto'].'" width="100">';
        }
        echo '          </a>
			<p><b>'.$user['user_username'].'</b></p>
			<p class="hrfKecil">"'.$user['user_bio'].'"</p>
		</div>
	<ul data-role="listview" data-inset="true">
	<li><a href="'.URLSITUS.'" class="ui-icon-home hrfKecil" data-ajax="false" data-transition="flip">Beranda</a></li>
        <li><a href="'.URLSITUS.'username/'.make_seo_name($user['user_username']).'/" class="ui-icon-user hrfKecil" data-ajax="false" data-transition="flip">Profil</a></li>
        <li><a href="'.URLSITUS.'trip/" class="ui-icon-location hrfKecil" data-ajax="false" data-transition="flip">Trip</a></li>
        <li><a href="'.URLSITUS.'pengalaman/" class="ui-icon-star hrfKecil" data-ajax="false" data-transition="flip">Pengalaman</a></li>';
	//<li><a href="#" class="ui-star hrfKecil" data-transition="pop">Notifikasi <span class="ui-li-count">11</span></a></li>';
        
        // *** notifikasi di panel
        if (!empty($notif)){
            echo '<div data-role="collapsible" data-mini="true" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" id="notifikasi">
                <h5>Notifikasi <span class="ui-li-count">'.count($notif).'</span></h5>
                <ul data-role="listview">';
            foreach ($notif as $n) {
                echo '<li><a href="'.URLSITUS . $n['notif_href'].'" class="notifikasiList normalin hrfKecilBgt" data-ajax="false" target="_blank" data-value="'.$n['notif_id'].'">'.$n['notif_pengirim'].$n['notif_label'].'</a></li>';
            }
            echo '</ul></div>';
        }
        
        /*
         * Cek apakah user memiliki trip aktif, kalo ada tampilkan trip link nya
         */
        if (!empty($tripnya_user)){
            echo'
            <li data-role="list-divider" class="hrfKecil" >Perjalanan</li>';
            foreach ($tripnya_user as $t) {
                echo'
                    <li><a href="'.URLSITUS ."trip/lihat/". make_seo_name($t['trip_judul']) ."/".$t['trip_id'].'/" class="ui-icon-location hrfKecil" data-transition="slidefade" data-ajax="false">'.$t['trip_judul'].'</a></li>';
            }
            echo'
                <li data-role="list-divider"></li>';
        }
	echo'
        <li><a href="#" class="ui-icon-search hrfKecil" data-transition="slidefade">Cari</a></li>
	<li><a href="'.URLSITUS.'user/profil/#akun" class="ui-icon-gear hrfKecil" data-transition="turn" data-ajax="false">Pengaturan</a></li>
	<li><a href="#" class="ui-icon-info hrfKecil" data-transition="fade">Bantuan</a></li>
        <li><a href="#" class="ui-icon-delete hrfKecil" data-transition="slideup">Laporkan error!</a></li>
        <li><a href="'.URLSITUS.'user/logout/" class="ui-icon-power hrfKecil" data-transition="slideup" data-ajax="false">Logout</a></li>
	</ul>
	</div><!-- /footer -->
	</div><!-- /panel -->';
    }else{
        //*** Kalo user belum login
        echo '  <div data-role="panel" id="menuPanel" data-position="right" data-position-fixed="true" data-display="overlay">
                <p class="ketengah" style="padding-top: 20px;">
                Selamat Datang di TemanBackpacker, situs untuk menemukan rencana liburan dan teman baru mu,'.tautan('user/registrasi/', 'Ayo gabung!').'</a>
            </p>
            <p class="ketengah">Ada 100 Travelers yang berbagi'. tautan('trip/', '1.000 ulasan perjalanan') .' , dan '.tautan('galeri.php', '2.000 foto') .' loh</p>
                <a href = "#popupLogin" data-rel = "popup" data-position-to = "window" class = "ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-check ui-btn-icon-left ui-btn-a" data-transition = "pop">Login | Pendaftaran</a>
                </div>
            ';
    }
}
function get_panel_search()
{
echo '
	<div data-role="panel" id="panelSearch" data-position="right" data-position-fixed="true" data-display="push">
            <form action="#" method="get">
                <input type="search" placeholder="Mau jalan jalan kemana?" class="ui-btn-inline">
                <button class="ui-btn ui-icon-search ui-btn-icon-left ui-mini">Cari</button>
            </form>
            <p>Atau coba masuk ke menu pencarian</p>
            <a href="#" class="ui-btn">Pencarian detail</a>
	</div><!-- /panel -->';
}

function get_header($title=null)
{
	echo '
	<header data-role="header" id="header">
		<h1>'.$title.'</h1>
        <a href="#" data-rel="back"  class="ui-btn ui-icon-carat-l ui-btn-icon-notext ui-corner-all" >Back
          </a>
        <a href="#menuPanel" class="ui-btn ui-icon-bars ui-btn-icon-notext ui-corner-all">Default panel</a>
	</header><!-- /header -->';
}

function get_header_index($title=null)
{
	echo '
	<header data-role="header" id="header">
		<h1>'.$title.'</h1>
        <a href="#panelSearch" class="ui-btn ui-icon-search ui-btn-icon-notext ui-corner-all ui-btn-right">Pencarian</a>
	</header><!-- /header -->';
}


function get_footer()
{
    //tambah popup
    if (isLogin() == false){
        // kalo user belum login, muncul tomobl pop up
        $tombolLogin = '<li><a href = "#popupLogin" data-rel = "popup" data-position-to = "window" class = "ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-check ui-btn-icon-left ui-btn-a" data-transition = "pop">Login | Pendaftaran</a></li>';
        echo '
            <div data-role ="popup" id="popupLogin" data-theme = "a" class = "ui-corner-all">
            <div style = "padding:10px 20px;">
            <h3>Hai kamu, selamat datang :)</h3>
            <label for = "lg" class = "ui-hidden-accessible">Sudah terdaftar?</label>
            <a href="'. URLSITUS .'user/login/" class="ui-btn ui-icon-action ui-btn-icon-left" id="lg">Login</a>
            <label for = "pw" class = "ui-hidden-accessible">Mau bergabung?</label>
            <a href="'. URLSITUS .'user/registrasi/" class="ui-btn ui-icon-user ui-btn-icon-left">Daftar</a>
            </div>
            </div>';
        
    }
echo '
	<div data-role="footer" style="overflow:hidden; text-align:center" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li><a href="#header" data-ajax="false">Back to top</a></li>
				<li><a href="#">Report bug</a></li>
                                '.@$tombolLogin.'
			</ul>
		</div><!-- /navbar -->
	<small>© 2015 TemanBackpacker.com</small>
	</div><!-- /footer -->

	';
}

function Tmplt_button_user($user_status)
{
	if ($user_status == 'A'){
		// Klo user nya adalah host
		echo '
			<a href="" data-ajax="false" class="ui-btn ui-mini ui-icon-comment ui-btn-icon-right">Pertanyaan</a>
			<a href="#" class="ui-btn ui-mini ui-icon-user ui-btn-icon-right">Diskusi</a>
			<a href="#" class="ui-btn ui-mini ui-icon-gear ui-btn-icon-right">Manage member</a>';
	}elseif ($user_status == 'B'){
		// Status B => Ijin join
		echo '
			<a href="" data-ajax="false" class="ui-btn ui-mini ui-icon-comment ui-btn-icon-right" onClick="func_go_tanya()">Tanya</a>
			<a href="#batalJoin" class="ui-btn ui-mini ui-icon-plus ui-btn-icon-right" data-rel="popup" data-position-to="window" data-transition="flip">Menunggu Approval</a>';
	}elseif ($user_status == 'C'){
		// Status user C => udah join
		echo '
			<a href="" data-ajax="false" class="ui-btn ui-mini ui-icon-comment ui-btn-icon-right">Pertanyaan</a>
			<a href="#" class="ui-btn ui-mini ui-icon-user ui-btn-icon-right">Diskusi</a>
			<a href="#batalJoin" class="ui-btn ui-mini ui-icon-minus ui-btn-icon-right" data-rel="popup" data-position-to="window" data-transition="pop">Batal Gabung</a>';
	}else{
		// Selain semuanya, alias member umum
		echo '<a href="" data-ajax="false" class="ui-btn ui-mini ui-icon-comment ui-btn-icon-right" onClick="func_go_tanya()">Tanya</a>
		      <a href="#ijinJoin" id="btn_gabung" class="ui-btn ui-mini ui-icon-plus ui-btn-icon-right" data-rel="popup" data-position-to="window" data-transition="pop">Ijin Gabung</a>';
	}
		
}

function Tmplt_generate_dialog($dialog_id, $dialog_judul, $dialog_isi,$dialog_p,$dialog_func)
{
    echo '<div data-role="popup" id="'.$dialog_id.'" data-overlay-theme="b" data-theme="b" data-dismissible="false" style="max-width:400px;">
<div data-role="header" data-theme="a">
<h1>'.$dialog_judul.'</h1>
</div>
<div role="main" class="ui-content">
<h3 class="ui-title">'.$dialog_isi.'</h3>
<p>'.$dialog_p.'</p>
<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Tidak</a>
<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-transition="flow" onClick="'.$dialog_func.'">Ya</a>
</div>
</div>    ';
}

function Tmplt_comment_trip1($trip_id)
{
	// Muncul default setelah trip di load
	// Fungsi untuk mengambil semua pertanyaan dari suatu trip
	// return mysql query
	$data = Trip_get_tanya($trip_id);
	
//	while ($d = mysqli_fetch_array($data)){
//	/* echo'<li>
//			<img src="_gambar/user/3.jpg">
//			<strong>'.$d['user_name'].'</strong>
//			<hr/>
//			<p>'.$d['chat_mesej'].'</p>
//			<p class="ui-li-aside">'.$d['chat_date'].'</p>
//		</li>'; */
//	// Looping data tanya 
//	echo '
//	<div class="dataPertanyaan">
//	<hr/>
//		<img class="thumb" src="_gambar/user/'.$d['user_foto'].'">
//	<div class="usr">'.$d['user_name'].'</div>
//	<div>
//		<span class="usrHdr"><abbr class="timeago" title="'.$d['chat_date'].'">'.$d['chat_date'].'</abbr></span>';
//	// klo user login yg punya post, user itu bisa edit
//	if ($d['chat_sender'] == @$_SESSION['user_id']){
//	echo '<span class="usrHdr" style="float: right;"><a href="#" class="editTanya">edit</a> | <a href="#" class="deleteTanya">delete</a></span>';
//	}
//	echo '</div>
//	<hr/>
//		<div class="usrDtl">
//		<p>'.$d['chat_mesej'].'</p>
//	</div>
//	</div>';
//	}

//        //REMARK GANTI JADI FETCH ASSOC
//        if (count(array_filter($data)) == 0 )
//        {
//        	echo "";
//        	$kosong = true;
//        }else{
        //foreach ($data as $d) {
        while ($d = mysqli_fetch_assoc($data) ) {
        	$kosong = false;
            echo '
            <div class="dataPertanyaan">
                <hr/>
                <img class="thumb" src="'.URLSITUS.'_gambar/user/'.$d['user_foto'].'">
                <div class="usr">'.$d['user_name'].'</div>
                <div><span class="usrHdr">
                    <abbr class="timeago" title="'.$d['chat_date'].'">'.$d['chat_date'].'</abbr></span>';

                // klo user login yg punya post, user itu bisa edit
                if ($d['chat_sender'] == @$_SESSION['user_id']){
                    echo '<span class="usrHdr" style="float: right;"><a href="#" class="editTanya">edit</a> | <a href="#" class="deleteTanya">delete</a></span>';
                }
                
                echo '
                </div>
                <hr/>
                <div class="usrDtl">
                    <p>'.$d['chat_mesej'].'</p>
                </div>
            </div>';
        }
    }

//} REMARK GANTI JADI FETCH ASSOC

function Tmplt_comment_trip2($trip_id)
{
	// fungsi ini di pakai untuk Ajax request dari ajax.php saat tambah pertanyaan
	// Fungsi untuk mengambil semua pertanyaan dari suatu trip
	// return mysql query
	$data = Trip_get_tanya($trip_id);
        $listTanya = "";
        //foreach ($data as $d) {
        while ($d = mysqli_fetch_assoc($data) ) {
            $listTanya .= '
            <div class="dataPertanyaan">
                <hr/>
                <img class="thumb" src="'.URLSITUS.'_gambar/user/'.$d['user_foto'].'">
                <div class="usr">'.$d['user_name'].'</div>
                <div><span class="usrHdr">
                    <abbr class="timeago" title="'.$d['chat_date'].'">'.$d['chat_date'].'</abbr></span>';

                // klo user login yg punya post, user itu bisa edit
                if ($d['chat_sender'] == @$_SESSION['user_id']){
                    $listTanya .= '<span class="usrHdr" style="float: right;"><a href="#" class="editTanya">edit</a> | <a href="#" class="deleteTanya">delete</a></span>';
                }
                
                $listTanya .= '
                </div>
                <hr/>
                <div class="usrDtl">
                    <p>'.$d['chat_mesej'].'</p>
                </div>
            </div>';
        }
        return $listTanya;

}

function Tmplt_trip_member_join($trip_id){
    $data = Trip_member_join($trip_id);
	while ($d = mysqli_fetch_array($data)){
		echo'
			<img src="'.URLSITUS.'_gambar/user/'.$d['user_foto'].'" width="80px"> 	
			';
	}
        
//    foreach ($data as $d) {
//        echo'<img src="_gambar/user/'.$d['user_foto'].'" width="80px">';
//    }
}

function Tmplt_get_kategori1(){
    $sql = "SELECT * FROM tb_param WHERE param_parent = 0 
        order by param_name ";
    $selectSql = good_query_allrow($sql);
    return $selectSql;
}

function Tmplt_get_kategori2($id){
    $id  = (int) $id;
    $sql = "SELECT * FROM tb_param WHERE param_parent = {$id} 
        order by param_name ";
    $selectSql = good_query_allrow($sql);
    return $selectSql;
}

function Tmplt_get_jenis_trip(){
    // Mengambil jenis trip seperti Open trip, share cost, travel
    $sql = "SELECT * FROM tb_param WHERE param_parent = 26 
        order by param_name ";
    $selectSql = good_query_allrow($sql);
    return $selectSql;
}

function Tmplt_generate_list_exp($exp) 
{
     foreach ($exp as $t) {
        // cek ada foto trip nya apa ngak
        if (!empty($t['foto'])){
            $foto = $t['foto'];
        }else{
            $foto = "default.gif";
        }
        echo '<li><a href="'. URLSITUS .'pengalaman/lihat/'. make_seo_name($t['pengalaman_judul']) .'/'.$t['pengalaman_id'] .'/" data-ajax="false">
                            <img src="'. URLSITUS .'_gambar/galeri/thumb/'. $foto .'" class="ui-li-thumb">
                            <h3 class="judulList">'. $t['pengalaman_judul'] .'</h3>
                            <span class="hrfKecil">Dari '. $t['username'] .'</span> | <span class="hrfKecil">'. $t['pengalaman_lokasi'] .'</span>
                            <p class="ui-li-aside garisKotak">'. $t['pengalaman_kategori'] .'</p>
             </a></li>';
                    }
}

function Tmplt_generate_list_exp_index($exp) 
{
     foreach ($exp as $t) {
        // cek ada foto trip nya apa ngak
        if (!empty($t['foto'])){
            $foto = $t['foto'];
        }else{
            $foto = "default.gif";
        }
        echo '<li><a href="'. URLSITUS .'pengalaman/lihat/'. make_seo_name($t['pengalaman_judul']) .'/'.$t['pengalaman_id'] .'/" data-ajax="false">
                            <img src="'. URLSITUS .'_gambar/galeri/thumb/'. $foto .'" class="ui-li-thumb">
                            <h2>'. $t['pengalaman_judul'] .'</h2>
                            <p>
                            <span class="hrfKecil">Dari '. $t['username'] .'</span> | <span class="hrfKecil">'. $t['pengalaman_lokasi'] .'</span>
                            </p>
                            <p class="ui-li-aside garisKotak">'. $t['pengalaman_kategori'] .'</p>
             </a></li>';
                    }
}

function Tmplt_generate_breadcumb($breadcumb)
{
    foreach ($breadcumb as $url) {
        echo "<li><a href='" . $url['link'] . "' data-ajax='false'>" . $url['text'] . "</a></li>";
    }
}

function Tmplt_getKategori($id) 
{
    $id = (int) $id;
    $sql = "SELECT * FROM v_param_parent WHERE param_id = '{$id}'";
    return good_query_assoc($sql);
}
?>