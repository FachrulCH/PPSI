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
        <script src="<?= URLSITUS ?>js/jquery.cookie.js"></script>
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
                    <p>Atau kamu juga bisa buat <a href="<?= URLSITUS ?>trip/baru/" data-ajax="false">rencana perjalananmu</a> sendiri</p>
                </div>
                <div data-role="navbar">
                    <ul>
                        <li><a href="#" class="ui-btn-active">Rencana Teman</a></li>
                        <li><a href="#" class="sekitar">Teman sekitarmu</a></li>
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
                                <h2><?= @$u['user_username'] . $u['konjungsi'] . " ke " . @$u['trip_tujuan'] ?></h2>
                                <p><?= @$u['trip_judul'] ?></p>
                                <p class="ui-li-aside garisKotak"> <?= @$u['trip_date'] ?> </p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <script type="text/javascript">
                    $(document).ready(function () {
                        function showPosition(position) {
                            // simpan posisi user di cookie, selama membuka browser
                            $.cookie("lat", position.coords.latitude);
                            $.cookie("lng", position.coords.longitude);
                            $.cookie("ijin", 1, { expires: 3 });
                            $(':mobile-pagecontainer').pagecontainer('change', '#sekitarmu', {
                                transition: 'flip',
                                showLoadMsg: true
                            });
                            //alert(position.coords.latitude +"<br>" + position.coords.longitude);

                        }

                        function showError(error) {
                            switch (error.code) {
                                case error.PERMISSION_DENIED:
                                    alert("User denied the request for Geolocation.");
                                    break;
                                case error.POSITION_UNAVAILABLE:
                                    alert("Location information is unavailable.");
                                    break;
                                case error.TIMEOUT:
                                    alert("The request to get user location timed out.");
                                    break;
                                case error.UNKNOWN_ERROR:
                                    alert("An unknown error occurred.");
                                    break;
                            }
                        }
                        $('.sekitar').on('click', function () {
                            //alert("di klik");
                            if ($.cookie("ijin") != 1) {
                                var check = confirm("TemanBackpacker.com perlu ijin untuk mengakses lokasi kamu sekarang");
                                if (check == true) {
                                    // Kalo udah di setujui, akses user posisi
                                    // load modernizr dinamicly buat akses html5 geolocation
                                    $.getScript('<?= URLSITUS ?>src/geograpi/modernizr-geo.js', function () {
                                        if (Modernizr.geolocation) {
                                            //elem.innerHTML = 'Your browser supports geolocation.';
                                            navigator.geolocation.getCurrentPosition(showPosition, showError, {maximumAge: 600000});
                                        } else {
                                            //'Your browser does not support geolocation.';
                                            // gunakan plugin js geoposition kalo tidak mendukung html5
                                            $.getScript('<?= URLSITUS ?>src/geograpi/geoPosition.js', function () {
                                                if (geoPosition.init()) {  // Geolocation Initialisation
                                                    geoPosition.getCurrentPosition(showPosition, showError, {maximumAge: 600000});
                                                } else {
                                                    // You cannot use Geolocation in this device
                                                }
                                            });

                                        }
                                    });
                                }
                                else {
                                    return false;
                                }
                            } else {
                                $(':mobile-pagecontainer').pagecontainer('change', '#sekitarmu', {
                                transition: 'flip',
                                showLoadMsg: true
                            });
                            }
                        });
                    });
                </script>
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
                        <li><a href="#" class="sekitar">Teman sekitarmu</a></li>
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

//                        $('.sekitar').on('click', function () {
//                            //alert("di klik");
//                            //$(':mobile-pagecontainer').pagecontainer('change', '#sekitarmu', {
////                            transition: 'flip',
////                                    changeHash: false,
////                                    reverse: true,
////                                    showLoadMsg: true
////                        });
//                    });
                    });
            </script>
        </section>

        <section data-role="page" id="sekitarmu">
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
                        <li><a href="#" class="sekitar ui-btn-active">Teman sekitarmu</a></li>
                        <li><a href="#cari">Cari detail</a></li>
                    </ul>
                </div><!-- /navbar -->
                sekitar member
                <ul data-role="listview" data-inset="true" data-divider-theme="a" id="listUserSekitar">
                        <li>
                            <a href="" data-ajax="false">
                                <img src="<?= URLSITUS . "_gambar/user/default.gif" ?>" class="ui-li-thumb">
                                <h2>Nama user</h2>
                                <p>Biografi user</p>
                                <p class="ui-li-aside garisKotak"> 2 Km </p>
                            </a>
                        </li>
                </ul>
                <script src="<?= URLSITUS ?>js/main.js"></script>
                <script type="text/javascript">
                    $(document).on("pagebeforeshow", "#sekitarmu", function () { // When entering pagetwo
                        //alert("pagetwo is about to be shown ");
                        var latLng = "lat="+ $.cookie("lat")+"&lng="+$.cookie("lng");
                        //console.log("kirim "+latLng);
                        var URL = '<?= URLSITUS ?>';
                        customAjax('<?= URLSITUS ?>api/usersekitar/',latLng,function (data) {
                            console.log(data);
                            //$('#listUserSekitar').empty();
                                    for(i=0; i<data.length; i++) {
                                        //alert(obj.tagName);
                                         var html = '<li><a href="" data-ajax="false"><img src="'+URL+'_gambar/user/'+data[i].user_foto+'" class="ui-li-thumb"/><h2>'+data[i].user_username+'</h2><p>'+data[i].user_info+'</p><p class="ui-li-aside garisKotak">'+data[i].distance+' Km</p></a></li>';
                                         $('#listUserSekitar').append(html);
                                    };
                                    $('#listUserSekitar').listview('refresh');
                                 });
                    });
                </script>
            </article>
        </section>
    </body>
</html>
<?php
//ob_flush(); ?>