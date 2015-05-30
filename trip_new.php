<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";

harus_login(); // validasi hanya user yg udah login

seqid_generate('sq_trip');              // Generate ID Trip
$_SESSION['exp_id'] = seqid_getlast('sq_trip');    // ambil ID terahir
$loadKategori1      = Tmplt_get_kategori1();
$loadJenis          = Tmplt_get_jenis_trip();
?>
<!doctype html>
<html>
    <head>
        <?php
        // memanggil fungsi untuk generate meta tag dan include file CSS & JS yg diperlukan
        // memiliki argumen title halaman
        get_meta('Perjalanan Baru');
        ?>
    </head>
    <body>
        <section data-role="page" id="home">
            <?php
            // Memanggil fungsi untuk generate panel samping
            get_panel();
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Inspirasi');
            ?>
            <!-- include libraries BS3 -->
            <link rel="stylesheet" href="<?= URLSITUS ?>src/summernote/bootstrap.min.css" />
            <script type="text/javascript" src="<?= URLSITUS ?>src/summernote/bootstrap.min.js"></script>
            <link rel="stylesheet" href="<?= URLSITUS ?>css/font-awesome.min.css" />

            <!-- include summernote -->
            <link rel="stylesheet" href="<?= URLSITUS ?>src/summernote/summernote.css">
            <script type="text/javascript" src="<?= URLSITUS ?>src/summernote/summernote.js"></script>
            <!-- Peta -->
            <script src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
            <script src="<?= URLSITUS ?>js/jquery.geocomplete.min.js"></script>
            <!-- End Peta -->
            <script type="text/javascript" src="<?= URLSITUS ?>js/jquery.validate.min.js"></script>
            <script src='https://www.google.com/recaptcha/api.js'></script>
            <article role="main" class="ui-content">
                <div class="ui-bar ui-bar-a">
                    <h3>Mari membuat rencana perjalanan kamu sendiri atau bersama dengan teman menuju tempat terbaik di nusantara :)</h3>
                </div>
                <form action="#" id="formTrip" method="post" data-ajax="false" id="newTrip" enctype="multipart/form-data">
                    <ul data-role="listview" data-inset="true">
                        <li class="ui-field-contain">
                            <label for="t_judul">Judul</label>
                            <input type="text" name="t_judul" id="t_judul" value="" data-clear-btn="true">
                        </li>
                        <li class="ui-field-contain">
                            <textarea class="summernote" placeholder="Tuliskan inspirasi perjalananmu!" id="t_isi" name="t_isi"></textarea>
                        </li>
                        
                        <li class="ui-field-contain">
                            <label for="t_asal">Meeting poin</label>
                            <input type="text" name="t_asal" id="t_asal" value="" data-clear-btn="true">
                            <div id="hasil_asal"> 
                                <input name="asal_lokasi" data-geo="location" type="hidden" value="">
                                <input name="asal_addres" data-geo="formatted_address" type="hidden" value="">
                            </div>
                        </li>
                        
                        <li class="ui-field-contain">
                            <label for="t_tujuan">Tujuan</label>
                            <input type="text" name="t_tujuan" id="t_tujuan" value="" data-clear-btn="true">
                            <div id="hasil"> 
                                <input name="location" type="hidden" value="">
                                <input name="formatted_address" type="hidden" value="" id="lokasi2">
                            </div>
                        </li>
                        
                        <li class="ui-field-contain" id="tgl1">
                            <label for="t_tgl1">Dari Tgl</label>
                            <input type="date" name="t_tgl1" id="t_tgl1" value="<?php echo date('Y-m-d'); ?>" data-clear-btn="true">
                        </li>
                        <li class="ui-field-contain" id="tgl2">
                            <label for="t_tgl2">Sampai Tgl</label>
                            <input type="date" name="t_tgl2" id="t_tgl2" value="<?php echo date('Y-m-d'); ?>" data-clear-btn="true">
                        </li>
                        <li class="ui-field-contain">
                            <label for="ckTGL">Belum tau kapan, tapi pengen banget kesana (trip impian)</label>
                            <input type="checkbox" name="dreamdestination" id="ckTGL"> 
                        </li>
                        
                        <li class="ui-field-contain">
                            <label for="s_jenis">Jenis Trip</label>
                            <select name="s_jenis" id="s_jenis" data-native-menu="false">
                                <option>Pilih kategori</option>
                                <?php
                                // Semua data jenis dari parameter di munculkan
                                foreach ($loadJenis as $j) {
                                    ?>
                                    <option value="<?= $j['param_id'] ?>"><?= $j['param_name'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </li>
                        
                        <li class="ui-field-contain">
                            <label for="kategori1">Kategori</label>
                            <select name="kategori1" id="kategori1" data-native-menu="false">
                                <option>Pilih kategori</option>
                                <?php
                                // Semua data kategori dari parameter di munculkan
                                foreach ($loadKategori1 as $k) {
                                    ?>
                                    <option value="<?= $k['param_id'] ?>"><?= $k['param_name'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </li>
                        <li class="ui-field-contain" id="detailKategori" style="display: none;">
                            <label for="kategori2">Detail Kategori</label>
                            <select name="kategori2" id="kategori2">
                                <option>Pilih kategori</option>
                            </select>
                        </li>

                        <li class="ui-field-contain">
                            <label for="multiupload">Galeri</label>
                            <div id="multiupload">
                                <div class="b-upload__hint"></div>

                                <div class="js-files b-upload__files">
                                    <div class="js-file-tpl b-thumb" data-id="<%=uid%>" title="<%-name%>, <%-sizeText%>">
                                        <div data-fileapi="file.remove" class="b-thumb__del">x</div>
                                        <div class="b-thumb__preview">
                                            <div class="b-thumb__preview__pic"></div>
                                        </div>
                                        <% if( /^image/.test(type) ){ %>
                                        <div data-fileapi="file.rotate.cw" class="b-thumb__rotate"></div>
                                        <% } %>
                                        <div class="b-thumb__progress progress progress-small"><div class="bar"></div></div>
                                        <div class="b-thumb__name"><%-name%></div>
                                    </div>
                                </div>
                                <div style="clear: both"></div>
                                <hr/>
                                <div id="unggah" class="ui-grid-a">
                                    <input type="file" name="filedata" class="ui-btn ui-btn-inline ui-mini"/>
                                    <span class="js-upload ui-btn ui-btn-inline ui-mini ui-icon-action ui-btn-icon-left">Upload</span>
                                </div>
                        </li>
                        <li class="ui-field-contain">
                            <label for="s_komen">Ijinkan komentar</label>
                            <select name="s_komen" id="s_komen" data-role="slider" data-theme="b">
                                <option value="1">Ya</option>
                                <option value="0">Tdk</option>
                            </select>
                        </li>
                        <li class="ui-field-contain">
                            <label for="s_join">Ijinkan member join</label>
                            <select name="s_join" id="s_join" data-role="slider" data-theme="b">
                                <option value="1">Ya</option>
                                <option value="0">Tdk</option>
                            </select>
                        </li>
                        <span style="float: left;">
                            <input type="submit" id="posting" name="filedata" class="ui-btn ui-icon-action ui-btn-icon-left" value="Post"/></span><span style="float: right;"><div class="g-recaptcha" data-sitekey="6LeO_QUTAAAAAJnyTjLm5B9lxRlB6a9Eod8ietRP"></div></span>
                    </ul>
                </form>
                </div>
                <script>
                    window.FileAPI = {
                        debug: false//true // debug mode
                        , staticPath: 'js/FileAPI/' // path to *.swf
                    };
                </script>
                <script src="<?= URLSITUS ?>js/FileAPI/FileAPI.min.js"></script>
                <script src="<?= URLSITUS ?>js/FileAPI/FileAPI.exif.js"></script>
                <script src="<?= URLSITUS ?>js/FileAPI/jquery.fileapi.min.js"></script>
                <script src="<?= URLSITUS ?>js/main.js"></script>
                <script type="text/javascript">
                    //jQuery(function ($){
                    $(document).ready(function () {
                        $('#ckTGL').on('change', function () {
                            if ($(this).prop('checked')) {
                                //alert('is checked');
                                $("input[type=date]").val("");
                                $("#tgl1").hide(300);
                                $("#tgl2").hide(300);
                            } else {
                                $("#tgl1").show(300);
                                $("#tgl2").show(300);
                            }
                        });

                        $('.summernote').summernote({
                            height: 200,
                            toolbar: [
                                //[groupname, [button list]]
                                ['style', ['bold', 'italic', 'underline']],
                                ['para', ['ul', 'paragraph']],
                                ['insert', ['link']],
                                ['misc', ['undo', 'redo', 'codeview']],
                            ]
                        });


                        $("#t_tujuan").geocomplete({
                            details: "#hasil"
                        });
                        
                        $("#t_asal").geocomplete({
                        details: "#hasil_asal",
                        detailsAttribute: "data-geo"
                        });

                        $('#kategori1').change(function () {
                            var id = $(this).val();
                            if (id == '') {
                                dialogin('Pilih kategori dahulu');
                            } else {
                                customAjax('<?= URLSITUS ?>api/kategori/', '&id=' + id, function (data) {
                                    console.log(data);
                                    $('#detailKategori').show(300); /*munculin list detail kategori*/
                                    $('#kategori2').empty();
                                    //$.each(data, function(key, val) {
                                    for (i = 0; i < data.length; i++) {
                                        //alert(obj.tagName);
                                        var html = '<option value="' + data[i].param_id + '">' + data[i].param_name + '</option>';
                                        $('#kategori2').append(html);
                                    }
                                    ;
                                })
                            }
                            ;
                        });
                        $('#multiupload').fileapi({
                            multiple: true,
                            url: '<?= URLSITUS ?>upload/trip/',
                            elements: {
                                ctrl: {upload: '.js-upload'},
                                empty: {show: '.b-upload__hint'},
                                emptyQueue: {hide: '.js-upload'},
                                list: '.js-files',
                                maxSize: FileAPI.MB * 5, // max file size
                                accept: 'image/*',
                                imageSize: {minWidth: 320, minHeight: 240, maxWidth: 3840, maxHeight: 2160},
                                file: {
                                    tpl: '.js-file-tpl',
                                    preview: {
                                        el: '.b-thumb__preview',
                                        width: 80,
                                        height: 80
                                    },
                                    upload: {show: '.progress', hide: '.b-thumb__rotate'},
                                    complete: {hide: '.progress'},
                                    progress: '.progress .bar'
                                }
                            },
                            imageTransform: {
                                // crop & resize
                                //'medium': { width: 320, height: 240, preview: true },
                                // crop & resize
                                //'small': { width: 100, height: 100 }
                                // resize by max side
                                maxWidth: 1280,
                                maxHeight: 1280
                            },
                            imageOriginal: false,
                            onFileRemoveCompleted: function (evt, file) {
                                // Send ajax-request
                                $.post('remove-ctrl.php', {uid: FileAPI.uid(file)});
                            }
                        });

                        $('#posting').on('click', function () {
                            $('#t_isi').html($('.summernote').code());
                            var data = $('#formTrip').serialize();
                            //data += '&t_isi='+$('.summernote').code();
                            //alert("Proses save");
                            //console.log(data);
                            customAjax('<?= URLSITUS ?>api/rencanabaru/', data, function (data) {
                                //console.log(data);
                                setTimeout('window.location.href = "<?= URLSITUS ?>trip/"', 2500);

                            });
                            return false; // cancel original event to prevent form submitting
                        });

                    });
                </script>
            </article><!-- /content -->
            <?php
            get_footer();
            ?>
        </section><!-- /page -->

    </body>
</html>
<?php
//ob_flush(); ?>