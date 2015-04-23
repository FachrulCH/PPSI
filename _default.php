<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";

?>
<!doctype html>
<html>
<head>
	<?php
		// memanggil fungsi untuk generate meta tag dan include file CSS & JS yg diperlukan
		// memiliki argumen title halaman
		get_meta('TemanBackpacker.com');
	?>
	<style type="text/css">
		.profilePic{
			text-align: center;
			height: 150px;
		}
		.hrfKecil{
			font-size: 10px;
			margin: -15px 0px 5px 0px;
		}

	</style>
</head>
<body>
<section data-role="page" id="home">
	<?php
		// Memanggil fungsi untuk generate panel samping
		get_panel();
	?>
	<?php
		// Membuat menu header, isinya tombol back dan panel
		// Memiliki argumen variabel jugul header
		get_header('Defaultin');
	?>
	<article role="main" class="ui-content">
		<ul data-role="listview" data-inset="true" data-divider-theme="a">
		<li data-role="list-divider">Trip Terbaru</li>
			<li><a href="#">Inbox</a></li>
			<li><a href="#">Outbox</a></li>
			<li data-role="list-divider">Contacts</li>
			<li><a href="#">Friends</a></li>
			<li><a href="#">Work</a></li>
		</ul>
	</article><!-- /content -->
	<?php
		get_footer();
	?>
</section><!-- /page -->

</body>
</html>
<? ob_flush(); ?>