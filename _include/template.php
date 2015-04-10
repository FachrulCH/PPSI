<?php
function get_meta($title=null){
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
?>