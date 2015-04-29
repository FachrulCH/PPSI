<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";

?>
<!doctype html>
<html>
<head>
<?php
        // memanggil fungsi untuk generate meta tag dan include file CSS & JS yg diperlukan
        // memiliki argumen title halaman
        get_meta('Pengalaman Baru');
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
    <link rel="stylesheet" href="src/summernote/bootstrap.min.css" />
    <script type="text/javascript" src="src/summernote/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css" />

    <!-- include summernote -->
    <link rel="stylesheet" href="src/summernote/summernote.css">
    <script type="text/javascript" src="src/summernote/summernote.js"></script>
    <!-- Peta -->
    <script src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
    <script src="js/jquery.geocomplete.min.js"></script>
    <!-- End Peta -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
      $(function() {
        $('.summernote').summernote({
          height: 200,
           toolbar: [
            //[groupname, [button list]]

            ['style', ['bold', 'italic', 'underline']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'paragraph']],
            ['insert', ['picture', 'link']],
            ['misc', ['undo', 'redo']],
          ]
        });
        
        
        $("#t_tujuan").geocomplete({
                          details: "#hasil"
                  });
//                  var lokasi = $("#lokasi").html();
//                          $("#lokasi2").val(lokasi);

        $('form').on('submit', function (e) {
          e.preventDefault();
          alert($('.summernote').code());
        });
        
      });
    </script>
    <style type="text/css">
                .b-upload {
                    white-space: nowrap;
                }
                .b-upload__name,
                .b-upload__size {
                    display: inline-block;
                    position: relative;
                    overflow: hidden;
                    max-width: 150px;
                    vertical-align: middle;
                }
                .b-upload__size {
                    color: #666;
                    font-size: 12px;
                }

                .b-upload .js-files:after {
                    clear: both;
                    content: '';
                    display: block;
                }


                .b-upload__hint {
                    padding: 5px 8px;
                    font-size: 12px;
                    white-space: normal;
                    border-radius: 3px;
                    background-color: rgba(0,0,0,.08);
                }
                .b-thumb {
                    float: left;
                    margin: 3px;
                    padding: 5px;
                    overflow: hidden;
                    position: relative;
                    box-shadow: 0 0 2px rgba(0,0,0,.4);
                    background-color: #fff;
                }
                .b-thumb__del {
                    top: -6px;
                    right: -1px;
                    color: #FF0000;
                    cursor: pointer;
                    opacity: 0;
                    z-index: 999;
                    position: absolute;
                    font-size: 20px;
                    -webkit-transition: opacity .1s ease-in;
                    -moz-transition: opacity .1s ease-in;
                    transition: opacity .1s ease-in;
                }
                .b-thumb:hover .b-thumb__del {
                    opacity: 1;
                }

                .b-thumb__rotate {
                    top: 40%;
                    left: 50%;
                    width: 32px;
                    height: 32px;
                    cursor: pointer;
                    margin: -16px 0 0 -16px;
                    position: absolute;
                    background: url('css/uploader/rotate.png');
                }

                .b-thumb__preview {
                    width: 80px;
                    height: 80px;
                    -webkit-transition: -webkit-transform .2s ease-in;
                    -moz-transition: -moz-transform .2s ease-in;
                    transition: transform .2s ease-in;
                }
                .b-thumb__preview__pic {
                    width: 100%;
                    height: 100%;
                    background: url('css/uploader/file-icon.png') 50% 50% no-repeat;
                }

                .b-thumb__name {
                    width: 80px;
                    overflow: hidden;
                    font-size: 12px;
                }

                .b-thumb__progress {
                    top: 75px;
                    left: 10px;
                    right: 10px;
                    position: absolute;
                }
                .progress .bar {
                        width: 0;
                        top: 0;
                        left: 0;
                        bottom: 0;
                        position: absolute;
                        background-color: #f60;
                }


                .progress-small {
                    height: 5px;
                    padding: 1px;
                    box-shadow: 0 0 1px 1px rgba(255, 255, 255, 0.3);
                    border-radius: 10px;
                    background-color: rgba(0,0,0,.5);
                }
                .progress-small .bar {
                    width: 0;
                    height: 100%;
                    position: static;
                    border-radius: 10px;
                    background-color: orange;
                }

    </style>
    <article role="main" class="ui-content">
        <div class="ui-bar ui-bar-a">
            <h3>Bagikan pengalaman petualanganmu!</h3>
        </div>
            <form action="#" method="post" data-ajax="false" id="newTrip" enctype="multipart/form-data">
                <ul data-role="listview" data-inset="true">
                    <li class="ui-field-contain">
                        <label for="t_judul">Judul</label>
                        <input type="text" name="t_judul" id="t_judul" value="" data-clear-btn="true">
                    </li>
                    <li class="ui-field-contain">
                        <textarea class="summernote" placeholder="Tuliskan inspirasi perjalananmu!"></textarea>
                    </li>
                    <li class="ui-field-contain">
                        <label for="t_tujuan">Dimana?</label>
                        <input type="text" name="t_tujuan" id="t_tujuan" value="" data-clear-btn="true">
                    </li>
                    <li class="ui-field-contain">
                        <label for="t_judul">Kapan?</label>
                        <input type="date" name="t_judul" id="t_judul" value="" data-clear-btn="true">
                    </li>
                    <li class="ui-field-contain">
                        <label for="t_judul">Kategori</label>
                        <input type="text" name="t_judul" id="t_judul" value="" data-clear-btn="true">
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
                    <span style="float: left;"><input type="submit" name="filedata" class="ui-btn ui-icon-action ui-btn-icon-left" value="Post"/></span><span style="float: right;"><div class="g-recaptcha" data-sitekey="6LeO_QUTAAAAAJnyTjLm5B9lxRlB6a9Eod8ietRP"></div></span>
                </ul>
            </form>
        </div>
        <script>
            window.FileAPI = {
                  debug: true // debug mode
                , staticPath: 'js/FileAPI/' // path to *.swf
            };
        </script>
        <script src="js/FileAPI/FileAPI.min.js"></script>
        <script src="js/FileAPI/FileAPI.exif.js"></script>
        <script src="js/FileAPI/jquery.fileapi.min.js"></script>

        <script type="text/javascript">
        jQuery(function ($){
                        $('#multiupload').fileapi({
                                multiple: true,
                                url: 'upload_galeri.php',
                                elements: {
                                        ctrl: { upload: '.js-upload' },
                                        empty: { show: '.b-upload__hint' },
                                        emptyQueue: { hide: '.js-upload' },
                                        list: '.js-files',
                                                                        maxSize: FileAPI.MB*5, // max file size
                                                                        accept: 'image/*',
                                                                        imageSize: { minWidth: 320, minHeight: 240, maxWidth: 3840, maxHeight: 2160 },
                                                                        file: {
                                                                                tpl: '.js-file-tpl',
                                                                                preview: {
                                                                                        el: '.b-thumb__preview',
                                                                                        width: 80,
                                                                                        height: 80
                                                                                },
                                                                                upload: { show: '.progress', hide: '.b-thumb__rotate' },
                                                                                complete: { hide: '.progress' },
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
            });
        </script>
    </article><!-- /content -->
<?php
        get_footer();
?>
</section><!-- /page -->

</body>
</html>
<?php //ob_flush(); ?>