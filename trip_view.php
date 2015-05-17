<?php
//fungsi template ada di sini
include_once "_include/template.php";
include_once "_include/trip.php";

//ambil data trip dari database, lemparan adalah trip_id
$trip_id = (int) $_GET['id'];
$trip_id_rahasia = enkripsi($trip_id);
$db_trip = trip_get_by_id($trip_id);
//$_SESSION['user_id'] = 2;
$user_id = $_SESSION['user_id'];
$user_id_rahasia = enkripsi($user_id);
?>
<!doctype html>
<html>
    <head>
        <?php
        // memanggil fungsi untuk generate meta tag dan include file CSS & JS yg diperlukan
        // memiliki argumen title halaman
        get_meta('TemanBackpacker.com');
        ?>
        <!-- Plug-in untuk carousel -->
        <!-- Carousel -->
        <link rel="stylesheet" href="<?= URLSITUS ?>css/flexslider.css" type="text/css" media="screen" />
        <script defer src="<?= URLSITUS ?>js/jquery.flexslider.js"></script>
        <script type="text/javascript">
            $(function () {
                SyntaxHighlighter.all();
            });
            $(window).load(function () {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails",
                    start: function (slider) {
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>

        <style type="text/css">
            .thumb{
                width: 32px;
                float: left;
                margin-right: 5px;

            }
            .usr{
                overflow: hidden;
                font-size: .875em;

            }
            .usrHdr{
                font-size: .7500em;
                padding-right: 5px;
                font-style: italic;
            }
            .usrDtl{
                font-size: .800em;
                text-align: justify;

            }
            p{
                white-space:pre-wrap;
                text-align: justify;
            }
            .blur-filter {
                -webkit-filter: blur(2px);
                -moz-filter: blur(2px);
                -o-filter: blur(2px);
                -ms-filter: blur(2px);
                filter: blur(2px);
            }
            .carouselWrap{
                max-width: 400px;
                margin-left: auto;
                margin-right: auto;
            }
            .g-recaptcha{
                float: right;
            }
        </style>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <section data-role="page" id="home">
<?php
            // Memanggil fungsi untuk generate panel samping
            get_panel();

            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Rencana Perjalanan');
?>
            <article role="main" class="ui-content">
                <h3 class="ui-bar ui-bar-a"><?= $db_trip['trip_judul'] ?></h3>
                <!-- Carousel -->
                <div class="carouselWrap">
                     <section class="slider">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="<?= URLSITUS ?>_gambar/galeri/fit/badak.jpg">
                                    <img src="<?= URLSITUS ?>_gambar/galeri/fit/badak.jpg" />
                                </li>
                                <li data-thumb="<?= URLSITUS ?>_gambar/galeri/fit/kitchenadventurercaramel.jpg">
                                    <img src="<?= URLSITUS ?>_gambar/galeri/fit/kitchenadventurercaramel.jpg" />
                                </li>
                                <li data-thumb="<?= URLSITUS ?>_gambar/galeri/fit/bajak.jpg">
                                    <img src="<?= URLSITUS ?>_gambar/galeri/fit/bajak.jpg" />
                                </li>
                                <li data-thumb="<?= URLSITUS ?>_gambar/galeri/fit/kitchenadventurercaramel.jpg">
                                    <img src="<?= URLSITUS ?>_gambar/galeri/fit/kitchenadventurercaramel.jpg" />
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
                <!-- End Carousel -->
                <fieldset data-role="controlgroup" data-type="horizontal" class="ketengah">
<?php
                Tmplt_button_user(Trip_cek_status_user($user_id));
?>
                </fieldset>

                <br/>

                <div class="ui-bar ui-bar-a">
                    <h3>Info Rencana Perjalanan</h3>
                </div>
                <div class="ui-body ui-body-a">
                    <?= $db_trip['trip_info'] ?>	
                </div>

                <br/>

                <div class="ui-bar ui-bar-a">
                    <h3>Detail Rencana Perjalanan</h3>
                </div>
                <div class="ui-body ui-body-a">
                    <ol data-role="listview">
                        <li>Jenis kegiatan: <?= Trip_kategori_view($db_trip['trip_kategori']) ?></li>
                        <li>Meeting Point: <?= $db_trip['trip_meeting_point'] ?></li>
                        <li>Waktu Perjalanan : <?= $db_trip['trip_date1'] ?> s/d <?= $db_trip['trip_date2'] ?></li>
                        <li>Jumlah teman yg di cari: <?= Trip_count_member_joined($trip_id) . "/" . $db_trip['trip_quota'] ?> </li>
                    </ol>
                </div>

                <br/>

                <div class="ui-bar ui-bar-a">
                    <h3>Tanya-Jawab</h3>
                </div>

                <div class="ui-body ui-body-a">
                    <form id="tanyajawab">
                        <input type="hidden" value="<?= $trip_id ?>" name="tid">
                        <input type="hidden" value="<?= $user_id ?>" name="uid">
                        <textarea cols="40" rows="8" name="t_tanya" id="Ttanya" maxlength="250"></textarea>
                        <button class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-edit" id="btn_tanya">Tanya</button>
                         <div class="g-recaptcha" data-sitekey="6LeO_QUTAAAAAJnyTjLm5B9lxRlB6a9Eod8ietRP"></div>
                    </form>
                    <div style="clear: both;"></div>
                    <div id="listTanya">
<?php
                    $kosong = true;                 // list tanya default nya kosong
                    Tmplt_comment_trip1($trip_id);  // tampilan list pertanyaan
?>
                    </div>
<?php
                    if ($kosong != true){           // Kalo list tanya tidak kosong maka muncul berikut
?>
                    <div class="ketengah">Pertanyaan yg ditampilkan adalah 10 pertanyaan teratas, klik link di bawah</div>
                    <a href="#" class="ui-btn ui-mini">Lihat semua pertanyaan</a>
<?php
}
?>
                </div>
                <br/>

                <div id="memberJoin">	
                    <div class="ui-bar ui-bar-a">
                        <h3>Member yang join</h3>
                    </div>

                    <div class="ui-body ui-body-a">
<?php 
                    Tmplt_trip_member_join($trip_id) 
?>
                    </div>
                </div>
                <script type="text/javascript" src="<?= URLSITUS ?>js/jquery.timeago.js"></script> <!-- konversi ke waktu relative -->
                <script type="text/javascript" src="<?= URLSITUS ?>js/main.js" ></script>
                <script type="text/javascript">
                    (function ($) {
                        jQuery("abbr.timeago").timeago(); 	/*konversi ke waktu relative*/
                                                
                        $('#btn_tanya').on('click', function () {
                            if(grecaptcha.getResponse() == ""){
                                dialogin("Klik captcha dahulu");
                                return false;
                            }
                            var pertanyaan = $('#Ttanya').val();
                            var capcay = $('#g-recaptcha-response').val();
                            var kirim = 'id=<?= $user_id_rahasia ?>&i=<?= $trip_id ?>&pertanyaan='+ pertanyaan +'&capcay='+capcay  ;
                            
                            //var kirim = $("#tanyajawab").serialize();
                            console.log(kirim);
                            if (pertanyaan.length > 0) {
                                
//                                Menggunakan fungsi sendiri untuk memanggil ajax
//                                format argumen adalah (URL,DATA,Callcack function)

                                customAjax('<?= URLSITUS ?>ajax.php?do=tanya',kirim,function (data) {
                                    $("#listTanya").html(data);         // refrest list
                                    $("#Ttanya").val(''); 		// kotak pertanyaan di kosongin
                                    jQuery("abbr.timeago").timeago();   // refrest keterangan waktu
                                    grecaptcha.reset();                 //refresh capcay
                                 });
                            } else {
                                dialogin('Isikan komentar anda');
                            }
                            return false; // cancel original event to prevent form submitting
                        });

                        $('#ijinGabung').on('click', function () {
                            //console.log("button di klik");
                            $.ajax({
                                type: 'post',
                                url: '<?= URLSITUS ?>ajax.php?do=ijingabung',
                                data: "maugabung", // data yg dikirimkan
                                async: 'true',
                                dataType: 'json',
                                beforeSend: function () {
                                    // menampilkan loading spiner sebelum data dikirim
                                    $.mobile.loading("show", {text: "Mohon tunggu", textVisible: true});
                                    console.log("data di kirim");
                                },
                                success: function (result) {
                                    $.mobile.loading("hide");
                                    if (result.status == true) {
                                        alert(result.pesan);
                                        console.log(result);
                                    } else {
                                        alert('error dikit');
                                    }
                                },
                                error: function (request, error) {
                                    alert('Network bermasalah, silahkan coba lagi!');
                                }

                            });
                        });
                        //$('.editTanya').click(function () {
                        $(document).on('click', '.editTanya', function(){
                            //var pesan = $("div.dataPertanyaan div.usrDtl").text();

                            var pertanyaan = $(this).parent().parent().parent().find('.usrDtl').text();
                            pertanyaan = $.trim(pertanyaan);
                            //alert("edit coy "+pertanyaan); 
                            $("#Ttanya").val(pertanyaan);
                            $("#btn_tanya").text("Update");
                            return false;
                        });
                    })(jQuery);
                </script>
            </article><!-- /content -->
            <?php
            get_footer();
            ?>
        </section><!-- /page -->

    </body>
</html>