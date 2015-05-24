<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";
include_once "_include/user.php";

$userList = User_seperjalanan();
//print_r(json_encode($userList));
//print_r($userList);
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
            get_header('Temukan teman seperjalan');
            ?>
            <article role="main" class="ui-content">
                <div id="listHeader">
                    <p>Bertemu dengan teman backpacker, yang punya tempat tujuan dan waktu yang pas dengan kamu</p>
                    <p>Atau kamu juga bisa buat <a href="<?= URLSITUS?>trip/baru/" data-ajax="false">rencana perjalananmu</a> sendiri</p>
                </div>
                <div data-role="navbar">
                    <ul>
                        <li><a href="#" class="ui-btn-active">Rencana Teman</a></li>
                        <li><a href="#">Teman sekitarmu</a></li>
                        <li><a href="#cari" data-transition="flip">Cari detail</a></li>
                    </ul>
                </div><!-- /navbar -->
                <ul data-role="listview" data-inset="true" data-divider-theme="a">
                    <?php
                    foreach ($userList as $u) {
//                if ($u['trip_date1'] != '0000-00-00'){
//                    $kata_sambung = "ingin";
//                }
                        ?>
                        <li>
                            <a href="<?= URLSITUS . "username/" . make_seo_name(@$u['user_username']) ?>/" data-ajax="false">
                                <img src="<?= URLSITUS . "_gambar/user/" . @$u['user_foto'] ?>" class="ui-li-thumb">
                                <h2><?= @$u['user_username'] . $u['konjungsi']." ke " . @$u['trip_tujuan'] ?></h2>
                                <p><?= @$u['trip_judul'] ?></p>
                                <p class="ui-li-aside garisKotak"> <?= @$u['trip_date'] ?> </p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </article><!-- /content -->
            <?php
            get_footer();
            ?>
        </section><!-- /page -->
        <section data-role="page" id="cari">
            <?php
            // Memanggil fungsi untuk generate panel samping
            get_panel();
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Temukan teman seperjalan');
            ?>
            <article role="main" class="ui-content">
                <div id="listHeader">
                    <p>Mencari teman seperjalanan? Disini kamu bisa menemukan teman yg memiliki tujuan dan waktu yg cocok sama kamu!</p>
                </div>
                <div data-role="navbar">
                    <ul>
                        <li><a href="#home" data-transition="flip">Rencana Teman</a></li>
                        <li><a href="#">Teman sekitarmu</a></li>
                        <li><a href="#cari" class="ui-btn-active">Cari detail</a></li>
                    </ul>
                </div><!-- /navbar -->
                <ul data-role="listview" data-inset="true">
                    <form id="f_pencarian">
                        <li class="ui-field-contain">
                            <label for="t_tujuan">Menuju ke</label>
                            <input type="text" name="t_tujuan" id="t_tujuan" value="" data-clear-btn="true" required="required">
                            <div id="hasil"> 
                                <input name="location" type="hidden" value="">
                                <input name="administrative_area_level_1" type="hidden" value="">
                                <input name="administrative_area_level_2" type="hidden" value="">
                                <input name="formatted_address" type="hidden" value="" id="lokasi2">
<!--					<span name="administrative_area_level_1" id="lokasi"></span>-->
                            </div>	
                        </li>
                        <li class="ui-field-contain">
                            <label for="t_ttl">Dari tanggal</label>
                            <input type="date" name="t_ttl" id="t_ttl" value="<?php echo date('Y-m-d'); ?>" data-clear-btn="true" min="<?php echo date('Y-m-d'); ?>">
                        </li>
                        <li class="ui-field-contain">
                            <label for="s_jk">Jenis Kelamin</label>
                            <select name="s_jk" id="s_jk" data-role="slider" data-theme="b">
                                <option value="L">L</option>
                                <option value="P" selected="">P</option>
                            </select>
                        </li>
                        <li class="ui-field-contain">
                            <label for="t_judul">Umur</label>
                            <input type="number" name="t_judul" id="t_judul" value="" data-clear-btn="true" min="17">
                        </li>
                        <li class="ui-field-contain">
                            <button id="b_cari">Cari</button>
                        </li>
                    </form>
                </ul>
            </article>
            <!-- Peta -->
            <script src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
            <script src="<?= URLSITUS ?>js/jquery.geocomplete.min.js"></script>
            <!-- End Peta -->
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#t_tujuan").geocomplete({
                        details: "#hasil"
                    });
                    
                    $('#f_pencarian').on('submit', function (e) {
                        e.preventDefault();
                        alert('proses pencarian');
                    });
                });
            </script>
        </section>
    </body>
</html>
<?php
//ob_flush(); ?>