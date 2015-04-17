<?php
//fungsi template ada di sini
include_once "_include/template.php";
include_once "_include/trip.php";

//ambil data trip dari database, lemparan adalah trip_id
$trip_id = 110;
$db_trip = trip_get_by_id($trip_id);
$_SESSION['user_id'] = 1;
$user_id = $_SESSION['user_id'];
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
	  <!-- Modernizr -->
	  <!-- <script src="js/modernizr.js"></script> -->
	  <!-- FlexSlider -->
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
	    $(function(){
	      SyntaxHighlighter.all();
	    });
	    $(window).load(function(){
	      $('.flexslider').flexslider({
	        animation: "slide",
	        controlNav: "thumbnails",
	        start: function(slider){
	          $('body').removeClass('loading');
	        }
	      });
	    });
	  </script>
	
	
	  <!-- Syntax Highlighter -->
	  <<!-- script type="text/javascript" src="js/shCore.js"></script>
	  <script type="text/javascript" src="js/shBrushXml.js"></script>
	  <script type="text/javascript" src="js/shBrushJScript.js"></script> -->
	
	  <!-- Optional FlexSlider Additions -->
	  <!-- <script src="js/jquery.easing.js"></script>
	  <script src="js/jquery.mousewheel.js"></script> -->
	<!-- ahir dari Plug-in untuk carousel -->
	
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
				<li>Jumlah teman yg di cari: <?= Trip_count_member_joined($trip_id)."/".$db_trip['trip_quota'] ?> </li>
			</ol>
		</div>
		
		<br/>
		
		<div class="ui-bar ui-bar-a">
			<h3>Tanya-Jawab</h3>
		</div>
		
		<div class="ui-body ui-body-a">
			<form id="tanyajawab">
				<textarea cols="40" rows="8" name="t_tanya" id="Ttanya"></textarea>
				<button class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-edit" id="btn_tanya">Tanya</button>
			</form>
		<ul data-role="listview" data-inset="true">
<?php 
		Tmplt_comment_trip1($trip_id);

?>
		<!-- <li>
			<img src="_gambar/user/3.jpg">
			<strong>Orang 1</strong>
			<hr/>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>
			<p class="ui-li-aside">Kemarin, <strong>16:24</strong></p>
		</li>
	
		<li>
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
		</li> -->
		</ul>
		
		<div data-role="controlgroup" data-type="horizontal" data-mini="true" class="ketengah">
		    <a href="#" class="ui-btn">1</a>
			<a href="#" class="ui-btn">2</a>
		    <a href="#" class="ui-btn">3</a>
		</div>
		
		</div>
		<br/>	
		<div class="ui-bar ui-bar-a">
			<h3>Member yang join</h3>
		</div>
		
		<div class="ui-body ui-body-a">
			<img src="_gambar/user/3.jpg" width="80px"> <img src="_gambar/user/3.jpg" width="80px"> <img src="_gambar/user/3.jpg" width="80px"> <img src="_gambar/user/3.jpg" width="80px"> <img src="_gambar/user/3.jpg" width="80px"> 
		</div>
		<script type="text/javascript">
	        $('#btn_tanya').on('click', function(){
		        var pertanyaan 	= $('#Ttanya').val();
		        //console.log(pertanyaan);
		    if (pertanyaan.length > 0){ 
		        $.ajax({
		        	type: 'post',
			        url: 'ajax.php?do=tanya',
			        data: 'i='+<?= $trip_id ?>+'&pertanyaan='+pertanyaan, // data yg dikirimkan
			        async: 'true',
			        dataType: 'json',
			        beforeSend: function() {
	                // menampilkan loading spiner sebelum data dikirim
	                    $.mobile.loading( "show", {text: "Mohon tunggu",textVisible: true}); 
	                },
	                complete: function() {
	                // menyembunyikan loading spiner sebelum data dikirim
	                    $.mobile.loading("hide");
	                },
			        success: function(result){
						if (result.status){
	        				alert(result.pesan);
	        				console.log(result.v);
						}else{
							alert('error dikit');
						}
			        	console.log(result);
			        },
			        error: function (request,error) {
	                	// This callback function will trigger on unsuccessful action                
	                	alert('Network bermasalah, silahkan coba lagi!');
	                	console.log(error)
	                }
	
			        });
		    }else{
	        	alert('Isikan komentar anda');
		    }
		    return false; // cancel original event to prevent form submitting
	        });
	        
        </script>
	</article><!-- /content -->
	<?php
		get_footer();
	?>
</section><!-- /page -->

</body>
</html>