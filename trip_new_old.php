<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";
harus_login();
seqid_generate('sq_trip');              // Generate ID Trip
$trip_id = seqid_getlast('sq_trip');    // ambil ID terahir
//$_SESSION['user_id'] = 2;
$_SESSION['trip_id'] = $trip_id;        // simpan id di session
?>
<!doctype html>
<html>
    <head>

        <?php
        // memanggil fungsi untuk generate meta tag dan include file CSS & JS yg diperlukan
        // memiliki argumen title halaman
        get_meta('Buat Rencana Perjalanan');
        ?>
        <style type="text/css">
            .b-thumb__rotate {
                top: 40%;
                left: 50%;
                width: 32px;
                height: 32px;
                cursor: pointer;
                margin: -16px 0 0 -16px;
                position: absolute;
                background: url('<?= URLSITUS ?>css/css/uploader/rotate.png');
            }

            .b-thumb__preview__pic {
                width: 100%;
                height: 100%;
                background: url('<?= URLSITUS ?>css/css/uploader/file-icon.png') 50% 50% no-repeat;
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
            get_header('Rencana Perjalanan');
            ?>
            <article role="main" class="ui-content">
                <div class="ui-body ui-body-a">
                    Mari membuat rencana perjalanan kamu sendiri atau bersama dengan teman menuju tempat terbaik di nusantara :)
                </div>

                    <form action="#" method="post" data-ajax="false" id="newTrip">
                        <ul data-role="listview" data-inset="true">
                            <li class="ui-field-contain">
                                <label for="t_judul">Judul Trip:</label>
                                <input type="text" name="t_judul" id="t_judul" value="" data-clear-btn="true">
                            </li>

                            <li class="ui-field-contain">
                                <label for="t_tujuan">Kota Tujuan:</label>
                                <input type="text" name="t_tujuan" id="t_tujuan" value="" data-clear-btn="true">
                                <div id="hasil"> 
                                    <input name="location" type="hidden" value="">
                                    <input name="administrative_area_level_1" type="hidden" value="">
                                    <input name="administrative_area_level_2" type="hidden" value="">
                                    <input name="formatted_address" type="hidden" value="" id="lokasi2">
<!--					<span name="administrative_area_level_1" id="lokasi"></span>-->
                                </div>	
                            </li>

                            <li class="ui-field-contain">

                                <label for="s_status_trip">Kategori Trip:</label>
                                <select name="s_status_trip" id="s_status_trip" data-mini="true">
                                    <option value=""></option>
                                    <?php
                                    $json = get_db_param('status_trip');
                                    //json->[nama objek json]
                                    foreach ($json->status_trip as $value) {
                                        echo "<option value='" . $value->id . "'>" . $value->name . "</option>";
                                    }
                                    ?>
                                </select>
                            </li>
                            <li class="ui-field-contain">
                                <label for="ckTGL">Belum tau kapan, tapi pengen banget kesana (trip impian)</label>
                                <input type="checkbox" name="dreamdestination" id="ckTGL"> 
                            </li>
                            <li class="ui-field-contain" id="quota">					
                                <label for="t_quota">Quota:</label>
                                <input type="range" name="t_quota" id="t_quota" min="0" max="25" data-highlight="true" data-theme="b">
                            </li>


                            <li class="ui-field-contain" id="tgl1">
                                <label for="t_tgl1">Tgl berangkat:</label>
                                <input type="date" data-role="date" id="t_tgl1" name="t_tgl1">
                            </li>

                            <li class="ui-field-contain" id="tgl2">
                                <label for="t_tgl2">Tgl pulang:</label>
                                <input type="date" data-role="date" id="t_tgl2" name="t_tgl2">
                            </li>

                            <li class="ui-field-contain">
                                <label for="t_trans">Transport:</label>
                                <select name="t_trans" id="t_trans" data-mini="true">
                                    <option value=''></option>
                                    <?php
                                    $json = get_db_param('transportasi');
                                    foreach ($json->transportasi as $value) {
                                        echo "<option value='" . $value->id . "'>" . $value->name . "</option>";
                                    }
                                    ?>
                                </select>
                            </li>

                            <li class="ui-field-contain" id="mp">
                                <label for="t_meeting">Meeting Poin:</label>
                                <input type="text" name="t_meeting" id="t_meeting" value="" data-clear-btn="true">
                            </li>
                            <li class="ui-field-contain">
                                <label for="t_rencana">Rencana Perjalanan:</label>
                                <textarea name="t_rencana"></textarea>
                                <!--					<div id='t_rencana' style="margin-top: 30px;">-->
                            </li>
                            <!--                                <li class="ui-field-contain">
                                                                <div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
                                                                <div id="unggah" class="ui-grid-a">
                                                                    <div class="ui-block-a"><a id="pickfiles" href="javascript:;" class="ui-btn ui-mini ui-icon-camera ui-btn-icon-left">Pilih foto galeri</a> </div>
                                                                    <div class="ui-block-b"><a id="uploadfiles" href="javascript:;" class="ui-btn ui-mini ui-icon-action ui-btn-icon-left">Unggah foto</a> </div>
                                                                </div>
                                                                <pre id="console"></pre>
                                                            </li>-->
                            <li class="ui-field-contain">
                                <button class="ui-btn ui-icon-edit ui-btn-icon-left" type="submit">Posting</button>
                            </li>
                            <li class="ui-field-contain">
                                <div id="multiupload">
                                    <form class="b-upload b-upload_multi" action="" method="POST" enctype="multipart/form-data">
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
                                    </form>
                                </div>
                            </li>

                        </ul>
                    </form>	

                <!-- Peta -->
                <script src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
                <script src="<?= URLSITUS ?>js/jquery.geocomplete.min.js"></script>
                <!-- End Peta -->
                <script type="text/javascript" src="<?= URLSITUS ?>js/jquery.validate.min.js"></script>
                <script type="text/javascript" src="<?= URLSITUS ?>js/main.js"></script>
                <script>
                    window.FileAPI = {
                        debug: false // debug mode
                        , staticPath: '<?= URLSITUS ?>js/FileAPI/' // path to *.swf
                    };
                </script>
                <script src="<?= URLSITUS ?>js/FileAPI/FileAPI.min.js"></script>
                <script src="<?= URLSITUS ?>js/FileAPI/FileAPI.exif.js"></script>
                <script src="<?= URLSITUS ?>js/FileAPI/jquery.fileapi.min.js"></script>

                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#t_tujuan").geocomplete({
                            details: "#hasil"
                        });
                        var lokasi = $("#lokasi").html();
                        $("#lokasi2").val(lokasi);

                        $('#multiupload').fileapi({
                            multiple: true,
                            url: 'upload.php?do=trip',
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

                        $('#ckTGL').on('change', function () {
                            if ($(this).prop('checked')) {
                                //alert('is checked');
                                $("input[type=date]").val("");
                                $("#tgl1").hide(300);
                                $("#tgl2").hide(300);
                                $("#quota").hide(300);
                                $("#mp").hide(300);
                            } else {
                                $("#tgl1").show(300);
                                $("#tgl2").show(300);
                                $("#quota").show(300);
                                $("#mp").show(300);
                            }
                        });
                        jQuery.validator.addMethod("greaterStart", function (value, element, params) {
                            return this.optional(element) || new Date(value) >= new Date($(params).val());
                        }, 'Harus lebih besar dari tanggal mulai');
                        $.validator.setDefaults({
                            submitHandler: function () {
                                //dialogin("submitted!");
                                var kirim = $("#newTrip").serialize();
                                console.log(kirim);
                                customAjax('<?= URLSITUS ?>ajax.php?do=trip_save', kirim, function (data) {
                                    dialogin(data);
                                    setTimeout('window.location.href = "<?= URLSITUS ?>trip.php"', 3000);
                                });
                            }
                        });
                        $("#newTrip").validate({
                            debug: false,
                            rules: {
                                t_judul: {
                                    required: true,
                                    maxlength: 100
                                },
                                t_tujuan: "required",
                                t_tgl1: "date",
                                t_tgl2: {
                                    greaterStart: "#t_tgl1"
                                },
                                s_status_trip: {
                                    required: "#s_status_trip option:selected"
                                },
                            },
                            messages: {
                                t_judul: {
                                    required: "Judul trip kamu wajib diisi",
                                    maxlength: "Panjang maksimum judul adalah 100 karakter"
                                },
                                t_tujuan: "Masukan tujuan liburanmu",
                                t_tgl1: "Format tanggal salah",
                                s_status_trip: "Kategori Trip wajib diisi"
                            }


                        });

                    });
                </script>
            </article><!-- /content -->
        </section><!-- /page -->
    </body>
</html>
<?php
//ob_flush(); ?>