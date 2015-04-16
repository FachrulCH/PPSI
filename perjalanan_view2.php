<!doctype html>
<html>
<head>
  <title>TemanBackpacker.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <link rel="stylesheet" href="css/themes/tema-merah.min.css" />
  <link rel="stylesheet" href="css/jquery.mobile.structure-1.4.5.min.css" />
  <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.mobile-1.4.5.min.js"></script>
  <script>
    $(document).on("mobileinit", function(){
      /*
      apply overrides here
      example:
      $.mobile.activeBtnClass = "my-class";
      */
      $.mobile.defaultPageTransition = "slide";
      $.mobile.buttonMarkup.hoverDelay = 100;
      $.mobile.pageLoadErrorMessage = "Could not load page";
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
	.ketengah{
		text-align: center;
	}
  </style>

  <!-- Carousel -->
  <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
  <!-- Modernizr -->
  <script src="js/modernizr.js"></script>
  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

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
  <script type="text/javascript" src="js/shCore.js"></script>
  <script type="text/javascript" src="js/shBrushXml.js"></script>
  <script type="text/javascript" src="js/shBrushJScript.js"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="js/jquery.easing.js"></script>
  <script src="js/jquery.mousewheel.js"></script>

</head>
<body>
<section data-role="page" id="home">
<!-- Menu Samping / panel -->
  <div data-role="panel" id="menuPanel" data-position="right" data-position-fixed="true" data-display="overlay">
    <div class="profilePic">
      <a href="#"><img src="css/images/profile.jpg" width="100px"></a>
      <p>Nama Usernya</p>
      <p class="hrfKecil">"Ini Statusnya"</p>
    </div>
  <ul data-role="listview" data-inset="true">
    <li><a href="index.php" class="ui-icon-home" data-transition="flip">Beranda</a></li>
    <li><a href="#" class="ui-star" data-transition="pop">Notifikasi <span class="ui-li-count">11</span></a></li>
    <li data-role="list-divider">Perjalanan</li>
    <li><a href="#" class="ui-icon-location" data-transition="slidefade">Trip 1</a></li>
    <li><a href="#" class="ui-icon-location" data-transition="slidefade">Trip 2</a></li>
    <li data-role="list-divider"></li>
    <li><a href="#" class="ui-icon-search" data-transition="slidefade">Cari</a></li>
    <li><a href="#" class="ui-icon-gear" data-transition="turn">Pengaturan</a></li>
    <li><a href="#" class="ui-icon-info" data-transition="fade">Bantuan</a></li>
    <li><a href="#" class="ui-icon-power" data-transition="slideup">Logout</a></li>
  </ul>

  </div><!-- /panel -->
  <header data-role="header">
    <h1>Perjalanan</h1>
        <a href="#" data-rel="back"  class="ui-btn ui-icon-carat-l ui-btn-icon-notext ui-corner-all" >Back
          </a>
        <a href="#menuPanel" class="ui-btn ui-icon-bars ui-btn-icon-notext ui-corner-all">Default panel</a>
  </header><!-- /header -->

  <article role="main" class="ui-content">
	<h3 class="ui-bar ui-bar-a">Wisata Kuliner ke Bandung</h3>
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
	    <a href="#" class="ui-btn ui-icon-comment ui-btn-icon-right">Tanya</a>
		<a href="#" class="ui-btn ui-icon-user ui-btn-icon-right">Diskusi</a>
		<a href="#" class="ui-btn ui-icon-plus ui-btn-icon-right">Ijin Gabung</a>
		<a href="#" class="ui-btn ui-icon-minus ui-btn-icon-right">Batal Gabung</a>
		<a href="#" class="ui-btn ui-icon-gear ui-btn-icon-right">Manage member</a>
	</fieldset>
	
	<br/>
	
	<div class="ui-bar ui-bar-a">
		<h3>Info Rencana Perjalanan</h3>
	</div>
	<div class="ui-body ui-body-a">
		Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.
	</div>
	
	<br/>
	
	<div class="ui-bar ui-bar-a">
		<h3>Detail Rencana Perjalanan</h3>
	</div>
	<div class="ui-body ui-body-a">
		<ol data-role="listview">
			<li>Jenis kegiata: Wisata kota</li>
			<li>Meeting Point: Kampung Rambutan, Jakarta</li>
			<li>Waktu Perjalanan : 01-Jan-15 s/d 05-Jan-15</li>
			<li>Jumlah teman yg di cari: 3/5 </li>
		</ol>
	</div>
	
	<br/>
	
	<div class="ui-bar ui-bar-a">
		<h3>Tanya-Jawab</h3>
	</div>
	
	<div class="ui-body ui-body-a">
		<textarea cols="40" rows="8" name="textarea" id="Ttanya"></textarea>
		<button class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-edit">Tanya</button>
	<ul data-role="listview" data-inset="true">
    <li>
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
	</li>
	</ul>
	
	<div data-role="controlgroup" data-type="horizontal" data-mini="true" class="ketengah">
	    <a href="#" class="ui-shadow ui-btn ui-btn-icon-">1</a>
		<a href="#" class="ui-shadow ui-btn ui-btn-icon-">2</a>
	    <a href="#" class="ui-shadow ui-btn ui-btn-icon-">3</a>
	</div>
	
	</div>
	<br/>	
	<div class="ui-bar ui-bar-a">
		<h3>Member yang join</h3>
	</div>
	
	<div class="ui-body ui-body-a">
		<img src="_gambar/user/3.jpg" width="80px"> <img src="_gambar/user/3.jpg" width="80px"> <img src="_gambar/user/3.jpg" width="80px"> <img src="_gambar/user/3.jpg" width="80px"> <img src="_gambar/user/3.jpg" width="80px"> 
	</div>
  </article><!-- /content -->
</section><!-- /page -->


</body>
</html>