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
        get_header('Pertanyaan');
?>
	<article role="main" class="ui-content">
            <h3 class="ui-bar ui-bar-a ui-corner-all">Pertanyaan 1</h3>
            <div class="ui-body ui-body-a ui-corner-all">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse accumsan blandit fermentum. Pellentesque cursus mauris purus, auctor commodo mi ullamcorper nec. Donec semper mattis eros, nec condimentum ante sollicitudin quis. Etiam orci sem, porttitor ut tellus nec, blandit posuere urna. Proin a arcu non lacus pretium faucibus. Aliquam sed est porttitor, ullamcorper urna nec, vehicula lorem. Cras porttitor est lorem, non venenatis diam convallis congue.</p>
            </div>
            
            <h3 class="ui-bar ui-bar-a ui-corner-all" id="geolocation">Kenapa Teman Backpacker tidak bisa </h3>
            <div class="ui-body ui-body-a ui-corner-all">
                <p>TemanBackpacker.com menggunakan fitur Geolocation untuk menemukan perkiraan posisi dimana kamu berada</p> 
                <p>Secara default, browser yang kamu gunakan akan menanyakan apakah kamu memberikan ijin TemanBackpacker.com untuk mengakses lokasi kamu.</p>
                <p>Untuk mengoptimalkan fitur pencarian, seperti menu "teman sekitar" kita perlu mengetahui lokasi kamu.</p>
                <p>Tapi jika sebelumnya kamu telah menolak untuk memberikan informasi lokasi, maka secara permanen kita tidak bisa mengakses lokasi kamu, perlu ada perubahan pada browser kamu yang disesuaikan, sangat mudah untuk mengaktifkan kembali permintaan lokasi, pilih browser kamu:</p>
                <ul>
                    <li><a href="https://support.google.com/chrome/answer/142065?hl=id">Chrome</a></li>
                    <li><a href="https://www.mozilla.org/id/firefox/geolocation/">Mozilla Firefox</a></li>
                    <li><a href="http://blogs.msdn.com/b/ie/archive/2011/02/17/w3c-geolocation-api-in-ie9.aspx">Internet Explorer</a></li>
                    <li><a href="https://support.apple.com/id-id/HT202080">Safari</a></li>
                    <li><a href="http://help.opera.com/Mac/10.60/id/geolocation.html">Opera</a></li>
                </ul>
                
                atau kunjungi situs ini <a href="https://waziggle.com/BrowserAllow.aspx">waziggle.com</a>
            </div>
            
            <h3 class="ui-bar ui-bar-a ui-corner-all">Pertanyaan 3</h3>
            <div class="ui-body ui-body-a ui-corner-all">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse accumsan blandit fermentum. Pellentesque cursus mauris purus, auctor commodo mi ullamcorper nec. Donec semper mattis eros, nec condimentum ante sollicitudin quis. Etiam orci sem, porttitor ut tellus nec, blandit posuere urna. Proin a arcu non lacus pretium faucibus. Aliquam sed est porttitor, ullamcorper urna nec, vehicula lorem. Cras porttitor est lorem, non venenatis diam convallis congue.</p>
            </div>
	</article><!-- /content -->
<?php
        get_footer();
?>
</section><!-- /page -->

</body>
</html>
<?php //ob_flush(); ?>