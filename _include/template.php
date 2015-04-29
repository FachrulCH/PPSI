<?php
// template di include di bawah:
// db_function.php -> trip.php

function get_meta($title=null)
{
echo "<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>";
echo '
	<title>'.$title.'</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="shortcut icon" href="css/favicon.ico" type="image/x-icon">
        <link rel="icon" href="css/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/jquery.mobile.structure-1.4.5.min.css" />
	<link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>';

//tambah google font
//penggunaan => font-family: 'Asap', sans-serif;
echo "  <link href='http://fonts.googleapis.com/css?family=Asap' rel='stylesheet' type='text/css'>
        <link rel='stylesheet' href='css/themes/tema-merah.min.css' />
        <link rel='stylesheet' href='css/tb.css' />
    "; 
}

function get_panel()
{
echo '
	<div data-role="panel" id="menuPanel" data-position="right" data-position-fixed="true" data-display="overlay">
		<div class="ketengah">
			<a href="#"><img src="css/images/profile.jpg" width="100px"></a>
			<p><b>Si Bolang</b></p>
			<p class="hrfKecil">"Ini Statusnya"</p>
		</div>
	<ul data-role="listview" data-inset="true">
	<li><a href="'.URLSITUS.'index.php" class="ui-icon-home hrfKecil" data-ajax="false" data-transition="flip">Beranda</a></li>
        <li><a href="'.URLSITUS.'trip.php" class="ui-icon-location hrfKecil" data-ajax="false" data-transition="flip">Trip</a></li>
        <li><a href="'.URLSITUS.'user_profile.php" class="ui-icon-user hrfKecil" data-ajax="false" data-transition="flip">User</a></li>
        <li><a href="'.URLSITUS.'exp_new.php" class="ui-icon-star hrfKecil" data-ajax="false" data-transition="flip">Inspirasi</a></li>
	<li><a href="#" class="ui-star hrfKecil" data-transition="pop">Notifikasi <span class="ui-li-count">11</span></a></li>
	<li data-role="list-divider">Perjalanan</li>
	<li><a href="#" class="ui-icon-location hrfKecil" data-transition="slidefade">Trip hopping island Belitung</a></li>
	<li><a href="#" class="ui-icon-location hrfKecil" data-transition="slidefade">Trip Pendakian puncak gunung Tambora</a></li>
	<li data-role="list-divider"></li>
	<li><a href="#" class="ui-icon-search hrfKecil" data-transition="slidefade">Cari</a></li>
	<li><a href="#" class="ui-icon-gear hrfKecil" data-transition="turn">Pengaturan</a></li>
	<li><a href="#" class="ui-icon-info hrfKecil" data-transition="fade">Bantuan</a></li>
	<li><a href="#" class="ui-icon-power hrfKecil" data-transition="slideup">Logout</a></li>
        <li><a href="#" class="ui-icon-delete hrfKecil" data-transition="slideup">Laporkan error!</a></li>
	</ul>
	</div><!-- /footer -->
	</div><!-- /panel -->';
}
function get_panel_search()
{
echo '
	<div data-role="panel" id="panelSearch" data-position="right" data-position-fixed="true" data-display="overlay">
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
	<header data-role="header">
		<h1>'.$title.'</h1>
        <a href="#" data-rel="back"  class="ui-btn ui-icon-carat-l ui-btn-icon-notext ui-corner-all" >Back
          </a>
        <a href="#menuPanel" class="ui-btn ui-icon-bars ui-btn-icon-notext ui-corner-all">Default panel</a>
	</header><!-- /header -->';
}

function get_header_index($title=null)
{
	echo '
	<header data-role="header">
		<h1>'.$title.'</h1>
        <a href="#panelSearch" class="ui-btn ui-icon-search ui-btn-icon-notext ui-corner-all ui-btn-right">Pencarian</a>
	</header><!-- /header -->';
}


function get_footer()
{
	echo '
	<div data-role="footer" style="overflow:hidden; text-align:center">
		<div data-role="navbar">
			<ul>
				<li><a href="#">Back to top</a></li>
				<li><a href="#">Desktop Version</a></li>
				<li><a href="#">Report bug</a></li>
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
			<a href="#btn_tanya" data-ajax="false" class="ui-btn ui-mini ui-icon-comment ui-btn-icon-right">Pertanyaan</a>
			<a href="#" class="ui-btn ui-mini ui-icon-user ui-btn-icon-right">Diskusi</a>
			<a href="#" class="ui-btn ui-mini ui-icon-gear ui-btn-icon-right">Manage member</a>';
	}elseif ($user_status == 'B'){
		// Status B => Ijin join
		echo '
			<a href="#btn_tanya" data-ajax="false" class="ui-btn ui-mini ui-icon-comment ui-btn-icon-right">Tanya</a>
			<a href="#" class="ui-btn ui-mini ui-icon-plus ui-btn-icon-right" id="ijinGabung">Ijin Gabung</a>';
	}elseif ($user_status == 'C'){
		// Status user C => udah join
		echo '
			<a href="#btn_tanya" data-ajax="false" class="ui-btn ui-mini ui-icon-comment ui-btn-icon-right">Pertanyaan</a>
			<a href="#" class="ui-btn ui-mini ui-icon-user ui-btn-icon-right">Diskusi</a>
			<a href="#" class="ui-btn ui-mini ui-icon-minus ui-btn-icon-right">Batal Gabung</a>';
	}else{
		// Selain semuanya, alias member umum
		echo '<a href="#btn_tanya" data-ajax="false" class="ui-btn ui-mini ui-icon-comment ui-btn-icon-right">Tanya</a>
			<a href="#" class="ui-btn ui-mini ui-icon-plus ui-btn-icon-right" id="ijinGabung">Ijin Gabung</a>';
	}
		
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
                <img class="thumb" src="_gambar/user/'.$d['user_foto'].'">
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
                <img class="thumb" src="_gambar/user/'.$d['user_foto'].'">
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
			<img src="_gambar/user/'.$d['user_foto'].'" width="80px"> 	
			';
	}
        
//    foreach ($data as $d) {
//        echo'<img src="_gambar/user/'.$d['user_foto'].'" width="80px">';
//    }
}

?>