<?php
//fungsi template ada di sini
include_once "_include/template.php";
include_once "_include/Exp.php";

//ambil data trip dari database, lemparan adalah trip_id
$exp_id = (int) $_GET['id'];
$exp = Exp_get_by_id($exp_id);
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
    </head>
    <body>
        <section data-role="page" id="home">
<?php
            // Memanggil fungsi untuk generate panel samping
            get_panel();

            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Trip');
?>
            <article role="main" class="ui-content">
                <span style="float: right"><a href="index.html" class="ui-btn ui-shadow ui-icon-edit ui-btn-icon-left">Edit</a></span>
                <h3 class="ui-bar ui-bar-a"><?= $exp['pengalaman_judul'] ?></h3>
                <div class="ui-body ui-body-a">
                    <?= $exp['pengalaman_isi'] ?>	
                </div>

                <br/>

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

    </body>
</html>