<?php
//fungsi template ada di sini
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
	<script>
      $(function(){
          $('#t_rencana').editable({inlineMode: false, 
          	theme: 'red', 
          	placeholder: 'Tuliskan ide perjalananmu...'
          });

          $("#t_tujuan").geocomplete({
			details: "#hasil"

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
		#lokasi{
			font-size: 11px;
		}

	</style>
	<script src="js/jquery.ui.datepicker.js"></script>
    <script id="mobile-datepicker" src="js/jquery.mobile.datepicker.js"></script>
	<link rel="stylesheet" href="css/jquery.mobile.datepicker.css">
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
		<form action="save_perjalanan.php" method="post" data-ajax="false">
			<ul data-role="listview" data-inset="true">
				<li class="ui-field-contain">
				<label for="t_judul">Judul Trip:</label>
					<input type="text" name="t_judul" id="t_judul" value="" data-clear-btn="true">
				</li>
				
				<li class="ui-field-contain">
				<label for="t_tujuan">Kota Tujuan:</label>
					<input type="text" name="t_tujuan" id="t_tujuan" value="" data-clear-btn="true">
				</li>
				<li>
				<label for="lokasi">Lokasi:</label>
				<div id="hasil"> 
					<input name="location" type="hidden" value="">
					<span name="formatted_address" id="lokasi"></span>
				</div>	
				</li>
				
				<li class="ui-field-contain">
				
				<label for="s_status_trip">Status Trip:</label>
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
									
				<label for="t_quota">Quota:</label>
				<input type="range" name="t_quota" id="t_quota" min="0" max="25" data-highlight="true">
				</li>
				
				<li class="ui-field-contain">
				<label for="t_tgl1">Tanggal berangkat:</label>
					<input type="text" data-role="date" id="t_tgl1" name="t_tgl1">
				</li>
				
				<li class="ui-field-contain">
				<label for="t_tgl2">Tanggal pulang:</label>
					<input type="text" data-role="date" id="t_tgl2" name="t_tgl2">
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
				
				<li class="ui-field-contain">
				<label for="t_meeting">Meeting Poin:</label>
					<input type="text" name="t_meeting" id="t_meeting" value="" data-clear-btn="true">
				</li>
				
				<li class="ui-field-contain">
				<label for="t_rencana">Rencana Perjalanan:</label>
					
					<div id='t_rencana' style="margin-top: 30px;">
				</li>
			</ul>
		</form>	
		</div> 
	
	</article><!-- /content -->

</section><!-- /page -->


</body>
</html>