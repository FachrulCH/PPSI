<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
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
</head>
<body>
<section data-role="page" id="home">
<?php
        // Memanggil fungsi untuk generate panel samping
        get_panel();
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
<?php //ob_flush(); ?>