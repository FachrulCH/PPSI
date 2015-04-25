<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";

seqid_generate('sq_trip');              // Generate ID Trip
$trip_id = seqid_getlast('sq_trip');    // ambil ID terahir
$_SESSION['user_id'] = 2;
$_SESSION['trip_id'] = $trip_id;        // simpan id di session
?>
<!doctype html>
<html>
<head>

<?php
		// memanggil fungsi untuk generate meta tag dan include file CSS & JS yg diperlukan
		// memiliki argumen title halaman
		get_meta('TemanBackpacker.com');
?>
	<!-- Editor froala -->
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/froala_editor.min.css" rel="stylesheet" type="text/css">
  	<link href="css/froala_style.min.css" rel="stylesheet" type="text/css">
  	<link href="css/themes/red.css" rel="stylesheet" type="text/css">
  	<script src="js/froala_editor.min.js"></script>
  	<script src="js/plugins/font_family.min.js"></script>
	<script src="js/plugins/font_size.min.js"></script>
	<script src="js/plugins/block_styles.min.js"></script>
	<!--[if lt IE 9]>
    <script src="js/froala_editor_ie8.min.js"></script>
  	<![endif]-->
  	<!-- End editor froala -->
  	<!-- Peta -->
  	<script src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
	<script src="js/jquery.geocomplete.min.js"></script>
  	<!-- End Peta -->
  	<!-- uploader -->
	<script type="text/javascript" src="js/plupload.full.min.js"></script>
	<!-- validator -->
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script>
      $(function(){
          $('#t_rencana').editable({inlineMode: false, 
          	theme: 'red', 
          	placeholder: 'Tuliskan ide perjalananmu...'
          });

          $("#t_tujuan").geocomplete({
			details: "#hasil"
        	});
          	var lokasi = $("#lokasi").html();
			$("#lokasi2").val(lokasi);
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
		<div class="ui-bar ui-bar-a">
		<h3>Buat Rencana Perjalanan</h3>
		</div>
		<div class="ui-body ui-body-a">
		<form action="#" method="post" data-ajax="false" id="newTrip">
			<ul data-role="listview" data-inset="true">
				<li class="ui-field-contain">
				<label for="t_judul">Judul Trip:</label>
					<input type="text" name="t_judul" id="t_judul" value="" data-clear-btn="true">
				</li>
				
				<li class="ui-field-contain">
				<label for="t_tujuan">Kota Tujuan:</label>
					<input type="text" name="t_tujuan" id="t_tujuan" value="" data-clear-btn="true">
				</li>
				<li class="ui-field-contain">
				<label for="lokasi"></label>
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
					foreach($json->status_trip as $value) {
					        echo "<option value='".$value->id."'>" . $value->name . "</option>";
					    }
?>
					</select>
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
                                <label for="ckTGL">Belum tau kapan, tapi pengen banget kesana (trip impian)</label>
				<input type="checkbox" name="dreamdestination" id="ckTGL"> 
				</li>
                                
				<li class="ui-field-contain">
				<label for="t_trans">Transport:</label>
				<select name="t_trans" id="t_trans" data-mini="true">
				<option value=''></option>
<?php
				$json = get_db_param('transportasi');
				foreach($json->transportasi as $value) {
				        echo "<option value='".$value->id."'>" . $value->name . "</option>";
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
                                <li class="ui-field-contain">
<!--                                    <div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>-->
                                    <div id="unggah" class="ui-grid-a">
                                        <div class="ui-block-a"><a id="pickfiles" href="javascript:;" class="ui-btn ui-mini ui-icon-camera ui-btn-icon-left">Pilih foto galeri</a> </div>
                                        <div class="ui-block-b"><a id="uploadfiles" href="javascript:;" class="ui-btn ui-mini ui-icon-action ui-btn-icon-left">Unggah foto</a> </div>
                                    </div>
                                    <pre id="console"></pre>
                                </li>
                                <li class="ui-field-contain">
                                    <button class="ui-btn ui-icon-edit ui-btn-icon-left" type="submit">Posting</button>
                                </li>
				
			</ul>
		</form>	
		</div>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript">
    $('#ckTGL').on('change', function() { 
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
    },'Harus lebih besar dari tanggal mulai');
		$.validator.setDefaults({
			submitHandler: function() {
				//dialogin("submitted!");
				var kirim = $("#newTrip").serialize();
                                console.log(kirim);
				customAjax('<?= URLSITUS ?>ajax.php?do=trip_save',kirim,function (data) {
					dialogin(data);
                                        setTimeout('window.location.href = "<?= URLSITUS ?>trip.php"',3000);
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


</script> 
<script type="text/javascript">
var uploader = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',
	browse_button : 'pickfiles', // you can pass in id...
	container: document.getElementById('unggah'), // ... or DOM Element itself
	url : '_gambar/upload.php',
	flash_swf_url : 'js/Moxie.swf',
	silverlight_xap_url : 'js/Moxie.xap',
	
	filters : {
		max_file_size : '10mb',
		mime_types: [
			{title : "Image files", extensions : "jpg,gif,png"},
			{title : "Zip files", extensions : "zip"}
		]
	},

	init: {
		PostInit: function() {
			document.getElementById('filelist').innerHTML = '';

			document.getElementById('uploadfiles').onclick = function() {
				uploader.start();
				return false;
			};
		},

		FilesAdded: function(up, files) {
			plupload.each(files, function(file) {
				document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
			});
		},

		UploadProgress: function(up, file) {
			document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
		},

		Error: function(up, err) {
			document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
		}
	}
});

uploader.init();

</script>

    			 
	
	</article><!-- /content -->

</section><!-- /page -->


</body>
</html>
<? ob_flush(); ?>