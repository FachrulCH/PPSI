<?php
//fungsi template ada di sini
include_once "_include/template.php";
include_once "_include/Exp.php";

//ambil data trip dari database, lemparan adalah trip_id
$exp_id = (int) $_GET['id'];
$exp = Exp_get_by_id($exp_id);

Exp_viewed($exp_id); //==>> update statistik experienced

$gambar = array('galeri_foto_url' =>array("badak.jpg","bajak.jpg","masjid-jawa-tengah.jpg","kitchenadventurerdonut.jpg","air-terjun-gitgit-bal.jpg","anak-band.jpg","kitchenadventurercheesecakebrownie.jpg"));
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
            .g-recaptcha{
                float: right;
            }
        </style>
        <script src='https://www.google.com/recaptcha/api.js'></script>
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
        <style type="text/css">
        .picture {
          width: 100%;
          float: left;
        }
        .picture img {
          width: 100%;
          height: auto;
        }
        .picture figure {
          display: block;
          float: left;
          margin: 0 5px 5px 0;
          width: 80px;
        }
        .picture figcaption {
          display: none;
        }
        </style> 
        <!--   end PHOTOSWIPE     -->
    </head>
    <body>
        <section data-role="page" id="home">
<?php
            // Memanggil fungsi untuk generate panel samping
            get_panel();

            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Pengalaman');
?>
            <article role="main" class="ui-content">
                <span style="float: right"><a href="<?= URLSITUS ."pengalaman/edit/". make_seo_name($exp['pengalaman_judul']) ."/".$exp['pengalaman_id'] ?>/" class="ui-btn ui-shadow ui-icon-edit ui-btn-icon-left" data-ajax="false">Edit</a></span>
                <h3 class="ui-bar ui-bar-a"><?= $exp['pengalaman_judul'] ?></h3>
                <p class="ketengah"><?= tautan('username/'.  make_seo_name($exp['username']), $exp['username']) ." | ". $exp['pengalaman_judul'] ." | ". date("j-M-Y", strtotime($exp['pengalaman_date'])) ?></p>
                
                <div class="ditengah">
                <!--     PHOTOSWIPE     -->
                <div class="picture" itemscope>
<?php
            foreach ($gambar['galeri_foto_url'] as $g) {
                $uri = "_gambar/galeri/o/". $g;
                $url = URLSITUS ."_gambar/galeri/o/". $g;
                list($width, $height, $type, $attr) = getimagesize($uri);
                //list($width, $height) = getimagesize($uri);
                echo "<figure itemprop='associatedMedia' itemscope>
		   <a href=".$url." itemprop='contentUrl' data-size=". $width ."x". $height ." data-index='0'>
		   <img src=".URLSITUS ."_gambar/galeri/thumb2/". $g ." itemprop='thumbnail' alt='Image description' />
		    </a>
		  </figure>";
                
                //echo "dimensions: " . $width . "x" . $height;
            }
                
               

?>

		</div>
                <!--    END PHOTOSWIPE     -->
                </div>
                <div class="ui-body ui-body-a">
                    <?= $exp['pengalaman_isi'] ?>	
                </div>

                <br/>
<?php
//*** Kalo flag komentar aktif
if ($exp['pengalaman_flag_komen'] == 1){
?>
                <div class="ui-bar ui-bar-a">
                    <h3>Komentar</h3>
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

                    </div>

                    <div class="ketengah">Pertanyaan yg ditampilkan adalah 10 pertanyaan teratas, klik link di bawah</div>
                    <a href="#" class="ui-btn ui-mini">Lihat semua pertanyaan</a>

                </div>
<?php
    }
?>
                <br/>
                
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
<script type="text/javascript">
	(function($) {
    var $pswp = $('.pswp')[0];
    var image = [];

    $('.picture').each( function() {
        var $pic     = $(this),
            getItems = function() {
                var items = [];
                $pic.find('a').each(function() {
                    var $href   = $(this).attr('href'),
                        $size   = $(this).data('size').split('x'),
                        $width  = $size[0],
                        $height = $size[1];

                    var item = {
                        src : $href,
                        w   : $width,
                        h   : $height
                    }

                    items.push(item);
                });
                return items;
            }

        var items = getItems();

        $.each(items, function(index, value) {
            image[index]     = new Image();
            image[index].src = value['src'];
        });

        $pic.on('click', 'figure', function(event) {
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
})(jQuery);

</script>
<!--   END PHOTOSWIPE     -->
    </body>
</html>