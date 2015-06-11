<?php
//fungsi template ada di sini
include_once "_include/template.php";
include_once "_include/trip.php";

//ambil data trip dari database, lemparan adalah trip_id
$trip_id = (int) $_GET['id'];
$trip = Trip_get_by_id($trip_id);
// catat di session buat kalo di edit
$_SESSION['lihatTrip']      = $trip_id;
$_SESSION['lihatTripHref']  = "trip/lihat/" . make_seo_name($trip['trip_judul']) . "/" . $trip['trip_id']. "/";

Trip_viewed($trip_id); //==>> update statistik experienced
$statusUser = Trip_cek_status_user(@$_SESSION['user_id'],$trip_id);
        
$trip_kategori = Tmplt_getKategori($trip['trip_kategori']);
$trip_jenis = Tmplt_getKategori($trip['trip_jenis']);
$lokasi = implode(",", array_slice(explode(",", $trip['trip_tujuan']), 0, 2));

$gambar = Trip_galeri($trip_id);
$breadcumb = array
    (array("link" => URLSITUS, "text" => "Home"),
    array("link" => URLSITUS . "trip/#home", "text" => "Trip"),
    array("link" => URLSITUS . "#", "text" => $trip_kategori['parent_name']),
    array("link" => URLSITUS . "trip/lihat/" . make_seo_name($trip['trip_judul']) . "/" . $trip['trip_id']. "/" , "text" => $trip['trip_judul'])
);

$calon_member_trip  = Trip_member_mau_gabung($trip_id);
$member_trip        = Trip_member_join($trip_id);

?>
<!doctype html>
<html>
    <head>
        <?php
        // memanggil fungsi untuk generate meta tag dan include file CSS & JS yg diperlukan
        // memiliki argumen title halaman
        get_meta('TemanBackpacker.com');
        ?>
        <!--        PHOTOSWIPE     -->
        <!-- Core CSS file -->
        <link rel="stylesheet" href="<?= URLSITUS ?>src/photoswipe/photoswipe.css"> 

        <!-- Skin CSS file (styling of UI - buttons, caption, etc.)
             In the folder of skin CSS file there are also:
             - .png and .svg icons sprite, 
             - preloader.gif (for browsers that do not support CSS animations) -->
        <link rel="stylesheet" href="<?= URLSITUS ?>src/photoswipe/default-skin/default-skin.css"> 

        <!-- Core JS file -->
        <script src="<?= URLSITUS ?>src/photoswipe/photoswipe.min.js"></script> 

        <!-- UI JS file -->
        <script src="<?= URLSITUS ?>src/photoswipe/photoswipe-ui-default.min.js"></script>
        <!--   end PHOTOSWIPE     -->
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
                <span style="float:left;">
                    <div class="breadcrumb">
                        <div id="brdcmb">
                            <ul>
                                <!--                                <li><a href="" data-ajax="false">Home</a></li>
                                                                <li><a href="trip/#home">Pengalaman</a></li>-->
<?php
Tmplt_generate_breadcumb($breadcumb);
?>
                            </ul>
                        </div>
                    </div>
                </span>
<?php
if (@$_SESSION['user_id'] == $trip['trip_user_id']){
?>
                <span style="float: right"><a href="<?= URLSITUS . "trip/edit/" . make_seo_name($trip['trip_judul']) . "/" . $trip['trip_id'] ?>/" class="ui-btn ui-shadow ui-icon-edit ui-btn-icon-left" data-ajax="false">Edit</a></span>
<?php
}
?>
                <h3 class="ui-bar ui-bar-a"><?= $trip['trip_judul'] ?></h3>

                <div class="author">
                    <span> 
                        <a href="<?= URLSITUS .'username/' . make_seo_name($trip['username']) . '/'?>" class="noStyle"> 
                            <img src="<?= URLSITUS . "_gambar/user/" . $trip['user_foto'] ?>" class="miniFoto">
                        <span><?= $trip['username'] ?></a></span>
                    </span>
                    <div>Dibuat: <abbr class="timeago" title="<?= $trip['trip_created_date'] ?>"><?= $trip['trip_created_date'] ?></abbr></div>
                </div>
                <div class="ditengah">
                    <!--     PHOTOSWIPE     -->
                    <div class="picture" itemscope>
<?php
if (!empty($gambar)) {
    foreach ($gambar as $g) {
        $uri = "_gambar/galeri/o/" . $g['galeri_foto_url'];
        $url = URLSITUS . "_gambar/galeri/o/" . $g['galeri_foto_url'];
        list($width, $height, $type, $attr) = getimagesize($uri);
        //list($width, $height) = getimagesize($uri);
        echo "<figure itemprop='associatedMedia' itemscope>
		   <a href=" . $url . " itemprop='contentUrl' data-size=" . $width . "x" . $height . " data-index='0'>
		   <img src=" . URLSITUS . "_gambar/galeri/thumb2/" . $g['galeri_foto_url'] . " itemprop='thumbnail' alt='" . $g['galeri_foto_judul'] . "' />
		    </a>
		  </figure>";

        //echo "dimensions: " . $width . "x" . $height;
    }
}
//print_r($gambar);
?>

                    </div>
                    <div class="clear"></div>
                    <!--    END PHOTOSWIPE     -->
                    <hr/>
                    <fieldset data-role="controlgroup" data-type="horizontal" class="ketengah">
<?php
                Tmplt_button_user($statusUser);
?>
                    </fieldset>
                    <hr/>
                </div>
                <ul data-role="listview" data-inset="true">
                    <li class="ui-field-contain">
                        <label for="tujuan">Tujuan</label>
                        <p id="tujuan"><?= $trip['trip_tujuan'] ?></p>
                    </li>
                    <li class="ui-field-contain">
                        <label for="tujuan">Meeting poin</label>
                        <p id="tujuan"><?= $trip['trip_asal'] ?></p>
                    </li>
                <?php
                if (!empty($trip_jenis['param_name'])){
                ?>
                    <li class="ui-field-contain">
                        <label for="tujuan">Jenis Trip</label>
                        <p id="tujuan"><?= $trip_jenis['param_name'] ?></p>
                    </li>
                <?php } 
                if (!empty($trip_kategori['parent_name'])){
                ?>
                    <li class="ui-field-contain">
                        <label for="tujuan">Kategori Trip</label>
                        <p id="tujuan"><?= $trip_kategori['parent_name'] . " - " . $trip_kategori['param_name'] ?></p>
                    </li>
                <?php } ?>
                </ul>

                <h3 class="blok">Detail rencana</h3>

                <div class="ui-body ui-body-a">
<?= $trip['trip_detail'] ?>	
                </div>

                <br/>
<?php
//*** Kalo flag komentar aktif
if ($trip['trip_flag_comm'] == 1) {
    ?>
                    <style type="text/css">
                        .g-recaptcha{
                            float: right;
                        }
                    </style>
                    <script src='https://www.google.com/recaptcha/api.js'></script>
                    <div class="ui-bar ui-bar-a">
                        <h3>Pertanyaan</h3>
                    </div>

                    <div class="ui-body ui-body-a">
                        <form id="tanyajawab">
                            <input type="hidden" value="" name="tid">
                            <input type="hidden" value="" name="uid">
                            <textarea cols="40" rows="8" name="t_tanya" id="Ttanya" maxlength="250"></textarea>
                            <button class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-edit" id="btn_tanya">Tanya</button>
                            <div class="g-recaptcha" data-sitekey="6LeO_QUTAAAAAJnyTjLm5B9lxRlB6a9Eod8ietRP"></div>
                        </form>
                        <div style="clear: both;"></div>
                        <div id="listTanya">

                        

<?php
                    $kosong = true;                 // list tanya default nya kosong
                    $kosong = Tmplt_comment_trip1($trip_id);  // tampilan list pertanyaan
?>
                    </div>
                    </div>
    <?php
} //*** END Kalo flag komentar aktif

if (!empty($member_trip)){
?>
                    <div id="memberJoin">	
                        <div class="ui-bar ui-bar-a">
                            <h3>Member yang bergabung dengan rencana trip ini</h3>
                        </div>

                        <div class="ui-body ui-body-a">
<?php
                        //Tmplt_trip_member_join($trip_id)
                        foreach ($member_trip as $d){
                        echo "<a href='". URLSITUS ."username/". strtolower($d['user_username']) ."/" ."' target='_blank' title='".$d['user_username']."'>
                            <div class='circle left' style=\"background-image: 
                                url('".URLSITUS.'_gambar/user/'.$d['user_foto']."')\">
                             </div>
                             </a>";
                        }
?>
                        </div>
                    </div>
<?php
}
?>
                <br/>
                
<?php
if ($statusUser == 'B'){
    // Status B => Ijin join
    Tmplt_generate_dialog('batalJoin', 'Batal Join Trip', '', 'Apakah kamu yakin untuk membatalkan permintaan gabung rencana trip?', 'func_eraseme()');
}elseif ($statusUser == 'C'){
    // Status user C => udah join
    Tmplt_generate_dialog('batalJoin', 'Batal Join Trip', '', 'Apakah kamu yakin untuk keluar dari rencana trip ini?', 'func_leaveme()');
}else{
    Tmplt_generate_dialog('ijinJoin', 'Join Trip', 'Apakah kamu mau ikut rencana trip ini?', 'Kamu akan menunggu approval penyelenggara trip ini untuk bisa bergabung</p><p>Kenali dulu teman seperjalanmu dengan mengunjungi profilnya dan berkirim pesan. Sehingga rencana perjalanan bisa menjadi petualangan yg lebih menarik
Selengkapnya klik <a href="'.URLSITUS .'nasehat/">Nasehat keamanan temanbackpacker</a>', 'func_addme()');
}
?>
            </article><!-- /content -->
                <?php
                get_footer();
                ?>
        </section><!-- /page -->
<?php
// Manage member khusus untuk Trip Host
if (@$_SESSION['user_id'] == $trip['trip_user_id']){
?>
        <section data-role="page" id="manageMember">
            <?php
// Memanggil fungsi untuk generate panel samping
            get_panel();

// Membuat menu header, isinya tombol back dan panel
// Memiliki argumen variabel jugul header
            get_header('Rencana Perjalanan');
            ?>
            <article role="main" class="ui-content">
                <div class="ui-body ui-body-b ui-corner-all">
                    <p>Teman seperjalanan menawarkan peluang besar untuk petualangan lebih seru, tetapi tidak menutup kemungkinan teman seperjalanan juga memiliki gaya jalan-jalan yg berbeda dengan kamu.</p>
                    <p>Kenali dulu teman seperjalanmu dengan mengunjungi profilnya dan berkirim pesan. Sehingga rencana perjalanan bisa menjadi petualangan yg lebih menarik</p>
                    Selengkapnya klik <a href="<?= URLSITUS ?>nasehat/">Nasehat keamanan temanbackpacker</a>
                </div>
                <?php
                            //print_r($member_trip);
                ?>
<?php
                    if (!empty($calon_member_trip)){
?>
                <ul data-role="listview" data-split-icon="gear" data-split-theme="a" data-inset="true">
                    <li data-role="list-divider">Persetujuan Teman Seperjalanan</li>
                    
<?php
                        foreach ($calon_member_trip as $mb) {
?>
                        <li><a href="<?= URLSITUS."username/". $mb['user_username'] ."/"?>" data-ajax="false" target="_blank">
                                <img src="<?= URLSITUS."_gambar/user/".$mb['user_foto'] ?>">
                                <h2><?= $mb['user_username'] ?></h2>
                                <p><?= $mb['user_gender'] ." | ". umur($mb['user_ttl'])." th | ". formatLokasi($mb['user_lokasi']) ?></p></a>
                            <a href="#opsiUser" class="memberOpsi" id="<?= $mb['member_user_id'] ?>">Opsi</a>
                        </li>
<?php
                    }
?>   
                </ul>
<?php
}
?>

<?php
                    if (!empty($member_trip)){
?>
                 <ul data-role="listview" data-split-icon="gear" data-split-theme="a" data-inset="true">
                     <li data-role="list-divider" id="tmnSeperjalanan">Teman Seperjalanan kamu</li>
                    
<?php
                        foreach ($member_trip as $mb) {
?>
                        <li><a href="<?= URLSITUS."username/". $mb['user_username'] ."/"?>" data-ajax="false" target="_blank">
                                <img src="<?= URLSITUS."_gambar/user/".$mb['user_foto'] ?>">
                                <h2><?= $mb['user_username'] ?></h2>
                                <p><?= $mb['user_gender'] ." | ". umur($mb['user_ttl'])." th | ". formatLokasi($mb['user_lokasi']) ?></p></a>
                            <a href="#opsiUser2" class="memberOpsi2" id="<?= $mb['member_user_id'] ?>">Opsi</a>
                        </li>
<?php
                    }
?>
                 </ul>
<?php
}
?>                        
                    
                </ul>
                <div data-role="popup" id="opsiUser" data-theme="a" data-overlay-theme="b" class="ui-content" style="max-width:340px; padding-bottom:2em;">
                    <h3>Opsi</h3>
                    <p>Apakah <span id="user_id"></span> kamu ijinkan bergabung dengan rencana perjalanan ini?</p>
                    <a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-icon-check ui-btn-icon-left ui-btn-inline ui-mini opsiAksi" data-uid="" id="btn_terima">Terima</a>
                    <a href="#" class="ui-shadow ui-btn ui-corner-all ui-btn-inline ui-mini opsiAksi" data-uid="" id="btn_tolak">Tolak</a>
                </div>
                <div data-role="popup" id="opsiUser2" data-theme="a" data-overlay-theme="b" class="ui-content" style="max-width:340px; padding-bottom:2em;">
                    <h3>Opsi</h3>
                    <p>Apakah yang akan kamu lakukan untuk teman <span id="user_id2"></span> ini?</p>
                    <a href="#" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-icon-user ui-btn-icon-left ui-btn-inline ui-mini opsiAksi" data-uid="" id="btn_profil">Lihat Profil</a>
                    <a href="#" class="ui-shadow ui-btn ui-corner-all ui-icon-forbidden ui-btn-icon-left ui-btn-inline ui-mini opsiAksi" data-uid="" id="btn_tolak2">Keluarkan dari member</a>
                </div>
            </article>
        </section>
<?php
} // END IF Manage member khusus untuk Trip Host
?>
        <!--     PHOTOSWIPE     -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">

                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>

                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--share" title="Share"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div> 
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                    </button>
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                    </button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?= URLSITUS ?>js/jquery.timeago.js"></script> <!-- konversi ke waktu relative -->
        <script type="text/javascript" src="<?= URLSITUS ?>js/main.js" ></script>
        <script type="text/javascript">
            $(document).ready(function () {
                jQuery("abbr.timeago").timeago(); 	/*konversi ke waktu relative*/
                
                $('.memberOpsi').on('click', function (event) {
                    event.preventDefault();
                    var thisRowId = $(this).attr('id');                     // ambil ID user yg di klik
                    var userName = $(this).closest('li').find('h2').text(); // ambil username yg di klik
                    $('#user_id').text(userName);                       // taruh username di popup
                    $('.opsiAksi').attr('data-uid', thisRowId);         // taruh id di popup
                    $("#opsiUser").popup("open");                       // munculkan popup
                });
                
                $('.memberOpsi2').on('click', function (event) {
                    event.preventDefault();
                    var thisRowId = $(this).attr('id');                     // ambil ID user yg di klik
                    var userName = $(this).closest('li').find('h2').text(); // ambil username yg di klik
                    $('#user_id2').text(userName);                       // taruh username di popup
                    $('.opsiAksi').attr('data-uid', thisRowId);         // taruh id di popup
                    $("#opsiUser2").popup("open");                       // munculkan popup
                });
                
                $('#btn_tolak').on('click', function () {
                    $("#opsiUser").popup("close");
                    var uid = $(this).attr('data-uid');
                    var listUser = $("[id="+uid+"]").closest('li');
                    $(listUser).slideUp(500, function() {
                        $(listUser).remove();
                    });
                    //alert(username +" berhasil di hapus");
                    
                }); 
                
                $('#btn_tolak2').on('click', function () {
                    $("#opsiUser2").popup("close");
                    var uid = $(this).attr('data-uid');
                    var listUser = $("[id="+uid+"]").closest('li');
                    
                    customAjax('<?= URLSITUS ?>api/trikickmember/', "uid="+uid, function (data) {
                           if (data === true){
                               var listUser = $("[id="+uid+"]").closest('li');
                                $(listUser).slideUp(500, function() {
                                    $(listUser).remove();
                                }); // hapus element
                           }else{
                               alert("kesalahan fungsi kick member");
                               console.log("data:"+data);
                            }
                        });
                }); 
                
                $('#btn_terima').on('click', function () {
                    $("#opsiUser").popup("close");
                    var uid = $(this).attr('data-uid');
                    customAjax('<?= URLSITUS ?>api/tripapprovemember/', "uid="+uid, function (data) {
                           if (data === true){
                               var listUser = $("[id="+uid+"]").closest('li');
                               var dupListUser = listUser.clone(); // duplikatin
                               
                                $(listUser).slideUp(500, function() {
                                    $(listUser).remove();
                                }); // hapus element
                                
                                $( "#tmnSeperjalanan" ).delay( 800 ).after(dupListUser);
                           }else{
                               alert("kesalahan fungsi tripapprove member");
                               console.log("data:"+data);
                            }
                            return false;
                        });
                        return false;
                });
                
                 $('#btn_profil').on('click', function () {
                    $("#opsiUser2").popup("close");
                    var uid = $(this).attr('data-uid');
                    var username = $('#opsiUser2').find('#user_id2').text().toLowerCase();;
                    var URL = URLSITUS + "username/"+username+"/";
                    window.open(URL, '_blank');
                    return false;
                }); 
                
                $('#btn_tanya').on('click', function () {
                    if (grecaptcha.getResponse() == "") {
                        dialogin("Klik captcha dahulu");
                        return false;
                    }
                    var pertanyaan = $('#Ttanya').val();
                    var kirim = $("#tanyajawab").serialize();
                    console.log(kirim);
                    if (pertanyaan.length > 0) {

        // Menggunakan fungsi sendiri untuk memanggil ajax
        // format argumen adalah (URL,DATA,Callcack function)

                        customAjax('<?= URLSITUS ?>api/komen/', kirim, function (data) {
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

                $(document).on('click', '.editTanya', function () {
                    $('#Ttanya').focus().select();
                    var pertanyaan = $(this).parent().parent().parent().find('.usrDtl').text();
                    pertanyaan = $.trim(pertanyaan);
                    //alert("edit coy "+pertanyaan); 
                    $("#Ttanya").val(pertanyaan);
                    $("#btn_tanya").text("Update");
                    return false;
                });
                
                $(document).on('click', '.deleteTanya', function () {
                    alert("Proses delete");
                    return false;
                });

                var $pswp = $('.pswp')[0];
                var image = [];

                $('.picture').each(function () {
                    var $pic = $(this),
                            getItems = function () {
                                var items = [];
                                $pic.find('a').each(function () {
                                    var $href = $(this).attr('href'),
                                            $size = $(this).data('size').split('x'),
                                            $width = $size[0],
                                            $height = $size[1];

                                    var item = {
                                        src: $href,
                                        w: $width,
                                        h: $height
                                    }

                                    items.push(item);
                                });
                                return items;
                            }

                    var items = getItems();

                    $.each(items, function (index, value) {
                        image[index] = new Image();
                        image[index].src = value['src'];
                    });

                    $pic.on('click', 'figure', function (event) {
                        event.preventDefault();

                        var $index = $(this).index();
                        var options = {
                            index: $index,
                            bgOpacity: 0.7,
                            showHideOpacity: true
                        }

                        var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                        lightBox.init();
                    });
                });
            });

        </script>
        <!--   END PHOTOSWIPE     -->
    </body>
</html>