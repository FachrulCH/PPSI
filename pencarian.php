<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";

$latlng = $_GET['location'];
$lokasi = $_GET['t_tujuan'];

// Data Trip
$postdata = http_build_query(
        array(
            't_def' => '8',
            'location' => $latlng
        )
);

$opts = array('http' =>
    array(
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context = stream_context_create($opts);

$result = json_decode(file_get_contents(URLSITUS . 'api/tripsearch/', false, $context));

// Data User
$koordinat = explode(',', $latlng);
$postdata2 = http_build_query(
        array(
            'rand' => '1',
            'lat' => $koordinat[0],
            'lng' => $koordinat[1]
        )
);

$opts2 = array('http' =>
    array(
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata2
    )
);

$context2 = stream_context_create($opts2);

$result2 = json_decode(file_get_contents(URLSITUS . 'api/usersekitar/', false, $context2));
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
            get_header('Cari Trip');
            ?>
            <article role="main" class="ui-content">
                <div class="ketengah">
                    <?= $lokasi ?>
                    <hr/>
                    <img src="http://maps.googleapis.com/maps/api/staticmap?center=<?= $latlng ?>&zoom=14&scale=1&size=<?= round($_COOKIE['resolution'] / 1.5) . "x" . round($_COOKIE['resolution'] / 3) ?>&maptype=roadmap&format=jpg&visual_refresh=true&markers=icon:http://temanbackpacker.com/css/favicon.ico%7Cshadow:true%7C<?= $latlng ?>" alt="<?= $lokasi ?>">
                </div>
                <hr/>
                <div data-role="navbar">
                    <ul>
                        <li><a href="#home" class="ui-btn-active">Cari Trip</a></li>
                        <li><a href="#teman" data-transition="flip">Cari Teman</a></li>
                        <li><a href="#pengalaman" data-transition="flip">Cari Pengalaman</a></li>
                    </ul>
                </div><!-- /navbar -->
                <ul data-role="listview" data-inset="true">
                    <?php
//                    echo "<pre>";            
                    //print_r($result);
//                    echo "</pre>";
                    if (!empty($result2)){
                    foreach ($result->data as $t) {
                        echo '<li>'
                        . '<a href="" data-ajax="false">'
                        . '<img src="' . URLSITUS . '_gambar/galeri/thumb2/'.$t->trip_gambar.'" class="ui-li-thumb">'
                        . '<p class="normalin"><b>' . $t->trip_judul . '</b></p>'
                        . '<p class="hrfKecilBgt">' . $t->label . '</p>'
                        . '<p class="hrfKecilBgt normalin">' . $t->trip_date . '</p>'
                        . '<p class="ui-li-aside garisKotak">' . $t->distance . ' Km</p></a>'
                        . '</li>';
                    }
                    }else{
                        echo 'tidak ditemukan perjalanan temanbackpacker disini >_<';
                    }
                    ?>
                </ul>

            </article><!-- /content -->
            <?php
            get_footer();
            ?>
        </section><!-- /page -->

        <section data-role="page" id="teman">
            <?php
            // Memanggil fungsi untuk generate panel samping
            get_panel();
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Cari Teman');
            ?>
            <article role="main" class="ui-content">
                <div class="ketengah">
                    <?= $lokasi ?>
                    <hr/>
                    <img src="http://maps.googleapis.com/maps/api/staticmap?center=<?= $latlng ?>&zoom=14&scale=1&size=<?= round($_COOKIE['resolution'] / 1.5) . "x" . round($_COOKIE['resolution'] / 3) ?>&maptype=roadmap&format=jpg&visual_refresh=true&markers=icon:http://temanbackpacker.com/css/favicon.ico%7Cshadow:true%7C<?= $latlng ?>" alt="<?= $lokasi ?>">
                </div>
                <hr/>
                <div data-role="navbar">
                    <ul>
                        <li><a href="#home" data-transition="flip">Cari Trip</a></li>
                        <li><a href="#teman" class="ui-btn-active">Cari Teman</a></li>
                        <li><a href="#pengalaman" data-transition="flip">Cari Pengalaman</a></li>
                    </ul>
                </div><!-- /navbar -->
                <ul data-role="listview" data-inset="true">
                    <?php
//                    echo "<pre>";            
//                    print_r($result2);
//                    echo "</pre>";
                    if (!empty($result2)){
                    foreach ($result2->data as $u) {
                        echo '<li>'
                        . '<a href="' . URLSITUS . 'username/' . strtolower($u->user_username) . '/" data-ajax="false">'
                        . '<img src="' . URLSITUS . '_gambar/user/' . $u->user_foto . '" class="ui-li-thumb"/>'
                        . '<h2>' . $u->user_username . '</h2>'
                        . '<p>' . $u->user_lokasi . '</p><p class="ui-li-aside garisKotak">' . $u->distance . ' Km</p></a>'
                        . '</li>';
                    }
                    }else{
                        echo 'tidak ditemukan user temanbackpacker disini >_<';
                    }
?>
                </ul>

            </article><!-- /content -->
            <?php
            get_footer();
            ?>
        </section><!-- /page -->
        
        <section data-role="page" id="pengalaman">
            <?php
            // Memanggil fungsi untuk generate panel samping
            get_panel();
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Cari Teman');
            ?>
            <article role="main" class="ui-content">
                <div class="ketengah">
                    <?= $lokasi ?>
                    <hr/>
                    <img src="http://maps.googleapis.com/maps/api/staticmap?center=<?= $latlng ?>&zoom=14&scale=1&size=<?= round($_COOKIE['resolution'] / 1.5) . "x" . round($_COOKIE['resolution'] / 3) ?>&maptype=roadmap&format=jpg&visual_refresh=true&markers=icon:http://temanbackpacker.com/css/favicon.ico%7Cshadow:true%7C<?= $latlng ?>" alt="<?= $lokasi ?>">
                </div>
                <hr/>
                <div data-role="navbar">
                    <ul>
                        <li><a href="#home" data-transition="flip">Cari Trip</a></li>
                        <li><a href="#teman" class="ui-btn-active">Cari Teman</a></li>
                        <li><a href="#pengalaman" data-transition="flip">Cari Pengalaman</a></li>
                    </ul>
                </div><!-- /navbar -->
                <ul data-role="listview" data-inset="true">
                    coming soo000on :)
                    <?php
//                    echo "<pre>";            
//                    print_r($result2);
//                    echo "</pre>";
//                    if (!empty($result2)){
//                    foreach ($result2->data as $u) {
//                        echo '<li>'
//                        . '<a href="' . URLSITUS . 'username/' . strtolower($u->user_username) . '/" data-ajax="false">'
//                        . '<img src="' . URLSITUS . '_gambar/user/' . $u->user_foto . '" class="ui-li-thumb"/>'
//                        . '<h2>' . $u->user_username . '</h2>'
//                        . '<p>' . $u->user_lokasi . '</p><p class="ui-li-aside garisKotak">' . $u->distance . ' Km</p></a>'
//                        . '</li>';
//                    }
//                    }else{
//                        echo 'tidak ditemukan user temanbackpacker disini >_<';
//                    }
?>
                </ul>

            </article><!-- /content -->
            <?php
            get_footer();
            ?>
        </section><!-- /page -->
    </body>
</html>
<?php
//ob_flush(); ?>