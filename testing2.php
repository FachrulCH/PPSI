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
        get_meta('TemanBackpacker.com');
?>

        <script src="<?= URLSITUS ?>js/FileAPI/FileAPI.min.js"></script>
        <script src="<?= URLSITUS ?>js/FileAPI/FileAPI.exif.js"></script>
        <script src="<?= URLSITUS ?>js/FileAPI/jquery.fileapi.min.js"></script>
        <script src="<?= URLSITUS ?>src/jcrop/jquery.Jcrop.min.js"></script>
        <script src="<?= URLSITUS ?>js/jquery.modal.js"></script>
        <link rel="stylesheet" href="<?= URLSITUS ?>src/jcrop/jquery.Jcrop.min.css" />
        <link rel="stylesheet" href="<?= URLSITUS ?>css/css/fileupload.css" />
        <style type="text/css">
            .ui-input-text, .ui-input-search {
                /* margin: .5em 0; */
                /* border-width: 1px; */
                border-style: hidden;
              }
              
#userpic input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.tombol{
    margin-top: 105px;
}
        </style>                
</head>
<body>
<section data-role="page" id="home">
<?php
        // Memanggil fungsi untuk generate panel samping
        get_panel();
        // Membuat menu header, isinya tombol back dan panel
        // Memiliki argumen variabel jugul header
        get_header('Defaultin');
?>
	<article role="main" class="ui-content">
		<ul data-role="listview" data-inset="true" data-divider-theme="a">
		<li data-role="list-divider">Trip Terbaru</li>
			<li><a href="#">Inbox</a></li>
			<li><a href="#">Outbox</a></li>
			<li data-role="list-divider">Contacts</li>
			<li><a href="#">Friends</a></li>
			<li><a href="#">Work</a></li>
		</ul>
            <div class="ketengah">
                <div id="userpic" class="userpic">
                    <div class="js-preview userpic__preview"></div>
                    <div class="js-fileapi-wrapper tombol">
                        <span class="ui-btn ui-icon-plus ui-btn-icon-left">
                            <span>Pilih</span>
                            <input type="file" name="filedata" class="upload">
                        </span>
                        <div class="js-upload" style="display: none;">
                            <div class="progress progress-success"><div class="js-progress bar"></div></div>
                            <span class="btn-txt">Uploading</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="popup" class="popup" style="display: none;">
                <div class="popup__body"><div class="js-img"></div></div>
                <div style="margin: 0 0 5px; text-align: center;">
                    <div class="js-upload btn btn_browse btn_browse_small">Unggah</div>
                    <div class="btn btn_browse btn_browse_small" onclick="$.modal().close();$('.userpic__preview').empty()">Batal</div>
                </div>
            </div>

	</article><!-- /content -->
<?php
        get_footer();
?>
</section><!-- /page -->



<script type="text/javascript">
     $(document).ready(function() {
        $('#userpic').fileapi({
   url: 'http://rubaxa.org/FileAPI/server/ctrl.php',
   accept: 'image/*',
   imageSize: { minWidth: 300, minHeight: 300 },
   elements: {
      active: { show: '.js-upload', hide: '.js-browse' },
      preview: {
         el: '.js-preview',
         width: 100,
         height: 100
      },
      progress: '.js-progress'
   },
   onSelect: function (evt, ui){
      var file = ui.files[0];
      if( !FileAPI.support.transform ) {
         alert('Your browser does not support Flash :(');
      }
      else if( file ){
         $('#popup').modal({
            closeOnEsc: true,
            closeOnOverlayClick: false,
            onOpen: function (overlay){
               $(overlay).on('click', '.js-upload', function (){
                  $.modal().close();
                  $('#userpic').fileapi('upload');
               });
               $('.js-img', overlay).cropper({
                  file: file,
                  bgColor: 'black',
                  maxSize: [$(window).width()-100, $(window).height()-100],
                  minSize: [50, 50],
                  selection: '90%',
                  onSelect: function (coords){
                     $('#userpic').fileapi('crop', file, coords);
                  }
               });
            }
         }).open();
      }
   }
});
     });
 </script>
</body>
</html>
<?php //ob_flush(); ?>