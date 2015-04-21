<?php
//fungsi template ada di sini
include_once "_include/template.php";
include_once "_include/trip.php";

//ambil data trip dari database, lemparan adalah trip_id
$trip_id = 110;
$trip_id_rahasia = enkripsi($trip_id);
$db_trip = trip_get_by_id($trip_id);
$_SESSION['user_id'] = 1;
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
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
        <script defer src="js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="js/jquery.timeago.js"></script> <!-- konversi ke waktu relative -->
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
            .profilePic{
                text-align: center;
                height: 150px;
            }
            .hrfKecil{
                font-size: 10px;
                margin: -15px 0px 5px 0px;
            }
            .ketengah{
                text-align: center;
            }
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
            get_header('Trip');
            ?>
            <article role="main" class="ui-content">
                <h3 class="ui-bar ui-bar-a"><?= $db_trip['trip_judul'] ?></h3>
                <!-- Carousel -->
                <section class="slider">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="css/images/kitchen_adventurer_cheesecake_brownie.jpg">
                                <img src="css/images/kitchen_adventurer_cheesecake_brownie.jpg" />
                            </li>
                            <li data-thumb="css/images/kitchen_adventurer_lemon.jpg">
                                <img src="css/images/kitchen_adventurer_lemon.jpg" />
                            </li>
                            <li data-thumb="css/images/kitchen_adventurer_donut.jpg">
                                <img src="css/images/kitchen_adventurer_donut.jpg" />
                            </li>
                            <li data-thumb="css/images/kitchen_adventurer_caramel.jpg">
                                <img src="css/images/kitchen_adventurer_caramel.jpg" />
                            </li>
                        </ul>
                    </div>
                </section>
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
                    </form>
                    <div id="listTanya">
                        <?php
                        Tmplt_comment_trip1($trip_id);
                        ?>
                    </div>
                    <!--<hr/>
                            <img class="thumb"src="_gambar/user/3.jpg">
                            <div class="usr">Nama</div>
                    <div>
                            <span class="usrHdr">Kemarin, 04:13</span><span class="usrHdr" style="float: right;">#10</span>
                    </div>
                    <hr/>
                    <div class="usrDtl">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
                    </div>
    
                    <!-- <li>
                            <img src="_gambar/user/3.jpg">
                            <strong>Orang 2</strong>
                            <hr/>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </p>
                            <p>Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.
                            </p>
                            <p class="ui-li-aside">Kemarin, <strong>16:20</strong></p>
                    </li>
            
                    <li>
                            <img src="_gambar/user/3.jpg">
                            <strong>Orang 3</strong>
                            <hr/>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
                            Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.
                            <p class="ui-li-aside">Kemarin, <strong>16:10</strong></p>
                    </li>
                    </ul> -->

                    <!-- <div data-role="controlgroup" data-type="horizontal" data-mini="true" class="ketengah">
                    <a href="#" class="ui-btn">1</a>
                            <a href="#" class="ui-btn">2</a>
                    <a href="#" class="ui-btn">3</a>
                    </div> -->
                    <div class="ketengah">Pertanyaan yg ditampilkan adalah 10 pertanyaan teratas, klik link di bawah</div>
                    <a href="#" class="ui-btn ui-mini">Lihat semua pertanyaan</a>

                </div>
                <br/>

                <div id="memberJoin">	
                    <div class="ui-bar ui-bar-a">
                        <h3>Member yang join</h3>
                    </div>

                    <div class="ui-body ui-body-a">
                        <?php Tmplt_trip_member_join($trip_id) ?>
                    </div>
                </div>
                <script src="js/main.js" type="text/javascript"></script>
                <script type="text/javascript">
                    (function ($) {
                        
                        function customAjax(u, d, theCallbackStuff) {
                            $.ajax({
                              type: "post",
                              url: u,
                              data: d,
                              async: true,
                              dataType: 'json',
                              beforeSend: function () {
                                // menampilkan loading spiner sebelum data dikirim
                                $.mobile.loading("show", {text: "Mohon tunggu", textVisible: true});
                                },
                              success: function (result) {
                                $.mobile.loading("hide");
                                if (result.status == '1'){
                                    dialogin(result.pesan);
                                    $("#listTanya").html(result.data);
                                    }else{
                                    dialogin(result.pesan);
                                    } 
                                    //dialogin("Pertanyaan kamu berhasil tersimpan");
                                    $("#Ttanya").val(''); 				// kotak pertanyaan di kosongin
                                    jQuery("abbr.timeago").timeago(); 	/*refresh konversi ke waktu relative*/
                                    },
                              error: function (request, error) {
                              // This callback function will trigger on unsuccessful action                
                              dialogin('Network bermasalah, silahkan coba lagi!');
                              }
                            });
                          }
                          
                        jQuery("abbr.timeago").timeago(); 	/*konversi ke waktu relative*/
                        
                        $('#btn_tanya').on('click', function () {
                            var pertanyaan = $('#Ttanya').val();
                            var kirim = 'id=<?= $user_id_rahasia ?>&i=<?= $trip_id ?>&pertanyaan='+ pertanyaan  ;
                            
                            //var kirim = $("#tanyajawab").serialize();
                            console.log(kirim);
                            if (pertanyaan.length > 0) {
                                $.ajax({
                                    type: 'post',
                                    url: 'ajax.php?do=tanya',
                                    data: kirim, // data yg dikirimkan
                                    async: true,
                                    dataType: 'json',
                                    beforeSend: function () {
                                        // menampilkan loading spiner sebelum data dikirim
                                        $.mobile.loading("show", {text: "Mohon tunggu", textVisible: true});
                                    },
                                    /* complete: function() {
                                     // menyembunyikan loading spiner sebelum data dikirim
                                     $.mobile.loading("hide");
                                     }, */
                                    success: function (result) {
                                        $.mobile.loading("hide");
                                        if (result.status == '1'){
                                            dialogin(result.pesan);
                                         //alert(result.pesan);
                                         //console.log(result.v);
                                         //load data tanya terbaru ke dalam DIV
                                         //$("#listTanya").load("view.php","m=listTanya&id="+$trip_id);
                                         //$("#Ttanya").val('');
                                         $("#listTanya").html(result.data);
                                         }else{
                                            dialogin(result.pesan);
                                         } 
                                            //dialogin("Pertanyaan kamu berhasil tersimpan");
                                        $("#Ttanya").val(''); 				// kotak pertanyaan di kosongin
                                        //$("#listTanya").html(result);		// hasil pencarian di masukin ke ID
                                        //console.log("hasilnya: "+result);
                                        jQuery("abbr.timeago").timeago(); 	/*refresh konversi ke waktu relative*/
                                    },
                                    error: function (request, error) {
                                        // This callback function will trigger on unsuccessful action                
                                        dialogin('Network bermasalah, silahkan coba lagi!');
                                        //console.log(error);
                                        //console.log(request);
                                    }

                                });
                            } else {
                                alert('Isikan komentar anda');
                            }
                            return false; // cancel original event to prevent form submitting
                        });

                        $('#ijinGabung').on('click', function () {
                            console.log("button di klik");
                            $.ajax({
                                type: 'post',
                                url: 'ajax.php?do=ijingabung',
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