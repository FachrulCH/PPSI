<?php
// template di include di bawah:
// db_function.php -> trip.php

function get_meta($title=null){
echo "<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>";
echo '
	<title>'.$title.'</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="stylesheet" href="css/themes/tema-merah.min.css" />
	<link rel="stylesheet" href="css/jquery.mobile.structure-1.4.5.min.css" />
	<link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>';
}

function get_panel(){
echo '
	<div data-role="panel" id="menuPanel" data-position="right" data-position-fixed="true" data-display="overlay">
		<div class="profilePic">
			<a href="#"><img src="css/images/profile.jpg" width="100px"></a>
			<p>Nama Usernya</p>
			<p class="hrfKecil">"Ini Statusnya"</p>
		</div>
	<ul data-role="listview" data-inset="true">
	<li><a href="index.php" class="ui-icon-home" data-transition="flip">Beranda</a></li>
	<li><a href="#" class="ui-star" data-transition="pop">Notifikasi <span class="ui-li-count">11</span></a></li>
	<li data-role="list-divider">Perjalanan</li>
	<li><a href="#" class="ui-icon-location" data-transition="slidefade">Trip 1</a></li>
	<li><a href="#" class="ui-icon-location" data-transition="slidefade">Trip 2</a></li>
	<li data-role="list-divider"></li>
	<li><a href="#" class="ui-icon-search" data-transition="slidefade">Cari</a></li>
	<li><a href="#" class="ui-icon-gear" data-transition="turn">Pengaturan</a></li>
	<li><a href="#" class="ui-icon-info" data-transition="fade">Bantuan</a></li>
	<li><a href="#" class="ui-icon-power" data-transition="slideup">Logout</a></li>
	</ul>
	</div><!-- /panel -->';
}

function get_header($title=null){
	echo '
	<header data-role="header">
		<h1>'.$title.'</h1>
        <a href="#" data-rel="back"  class="ui-btn ui-icon-carat-l ui-btn-icon-notext ui-corner-all" >Back
          </a>
        <a href="#menuPanel" class="ui-btn ui-icon-bars ui-btn-icon-notext ui-corner-all">Default panel</a>
	</header><!-- /header -->';
}

function get_footer(){
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

function Tmplt_button_user($user_status){
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

function Tmplt_comment_trip1($trip_id){
	// Fungsi untuk mengambil semua pertanyaan dari suatu trip
	// return mysql query
	$data = Trip_get_tanya($trip_id);
	
	while ($d = mysql_fetch_array($data)){
	/* echo'<li>
			<img src="_gambar/user/3.jpg">
			<strong>'.$d['user_name'].'</strong>
			<hr/>
			<p>'.$d['chat_mesej'].'</p>
			<p class="ui-li-aside">'.$d['chat_date'].'</p>
		</li>'; */
	// Looping data tanya 
	echo '
	<hr/>
		<img class="thumb" src="_gambar/user/'.$d['user_foto'].'">
	<div class="usr">'.$d['user_name'].'</div>
	<div>
		<span class="usrHdr"><abbr class="timeago" title="'.$d['chat_date'].'">'.$d['chat_date'].'</abbr></span>';
	// klo user login yg punya post, user itu bisa edit
	if ($d['chat_sender'] == @$_SESSION['user_id']){
	echo '<span class="usrHdr" style="float: right;"><a href="#">edit</a> | <a href="#">delete</a></span>';
	}
	echo '</div>
	<hr/>
		<div class="usrDtl less">
		<p>'.$d['chat_mesej'].'</p>
	</div>';
	}

}

function Tmplt_trip_member_join($trip_id){
	$data = Trip_member_join($trip_id);
	while ($d = mysql_fetch_array($data)){
		echo'
			<img src="_gambar/user/'.$d['user_foto'].'" width="80px"> 	
			';
	}
}

?>