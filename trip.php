<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
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
	<style type="text/css">
		.profilePic{
			text-align: center;
			height: 150px;
		}
		.hrfKecil{
			font-size: 10px;
			margin: -15px 0px 5px 0px;
		}
		hr{
			border-top-color: #DADADA;
		}
		.breadcrumb{
			position: relative;
			display: block;
  			overflow: hidden;
			clear: both;
			font-size: 1.1em;
		}
		.breadcrumb li {
			display: inline;
		}
		.breadcrumb li+li:before {
			content:"» ";
		}
		#brdcmb{
			position: relative;
			left: -30px;
		} 

/***** start responsive style grid*/
/* First breakpoint is 48em (768px). 3 column layout. Tiles 250x250 pixels incl. margin at the breakpoint. */
@media ( min-width: 48em ) {
	.trip-grid .ui-content {
		padding: .5625em; /* 9px */
	}
	.trip-grid .ui-listview li {
		float: left;
		width: 30.9333%; /* 33.3333% incl. 2 x 1.2% margin */
		height: 14.5em; /* 232p */
		margin: .5625em 1.2%;
	}
	.trip-grid .ui-listview li > .ui-btn {
		-webkit-box-sizing: border-box; /* include padding and border in height so we can set it to 100% */
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		height: 100%;
	}
	.trip-grid .ui-listview li.ui-li-has-thumb .ui-li-thumb {
		height: auto; /* To keep aspect ratio. */
		max-width: 100%;
		max-height: none;
	}
	/* Make all list items and anchors inherit the border-radius from the UL. */
	.trip-grid .ui-listview li,
	.trip-grid .ui-listview li .ui-btn,
	.trip-grid .ui-listview .ui-li-thumb {
		-webkit-border-radius: inherit;
		border-radius: inherit;
	}
	/* Hide the icon */
	.trip-grid .ui-listview .ui-btn-icon-right:after {
		display: none;
	}
	/* Make text wrap. */
	.trip-grid .ui-listview h2,
	.trip-grid .ui-listview p {
		white-space: normal;
		overflow: visible;
		position: absolute;
		left: 0;
		right: 0;
	}
	/* Text position */
	.trip-grid .ui-listview h2 {
		font-size: 1.25em;
		margin: 0;
		padding: .125em 1em;
		bottom: 50%;
	}
	.trip-grid .ui-listview p {
		font-size: 1em;
		margin: 0;
		padding: 0 1.25em;
		min-height: 50%;
		bottom: 0;
	}
	/* Semi transparent background and different position if there is a thumb. The button has overflow hidden so we don't need to set border-radius. */
	.ui-listview .ui-li-has-thumb h2,
	.ui-listview .ui-li-has-thumb p {
		background: #111;
		background: rgba(255, 255, 255, 0.5);

	}
	.ui-listview .ui-li-has-thumb h2 {
		bottom: 35%;
	}
	.ui-listview .ui-li-has-thumb p {
		min-height: 35%;
	}
	/* ui-li-aside has class .ui-li-desc as well so we have to override some things. */
	.trip-grid .ui-listview .ui-li-aside {
		padding: .125em .625em;
		width: auto;
		min-height: 0;
		top: 0;
		left: auto;
		bottom: auto;
		/* Custom styling. */
		background: #FFFFFF;
		background: rgba(255, 255, 255, 0.85);
		-webkit-border-top-right-radius: inherit;
		border-top-right-radius: inherit;
		-webkit-border-bottom-left-radius: inherit;
		border-bottom-left-radius: inherit;
		-webkit-border-bottom-right-radius: 0;
		border-bottom-right-radius: 0;
	}
	/* If you want to add shadow, don't kill the focus style. */
	.trip-grid .ui-listview li {
		-moz-box-shadow: 0px 0px 9px #111;
		-webkit-box-shadow: 0px 0px 9px #111;
		box-shadow: 0px 0px 9px #111;
	}
	/* Images mask the hover bg color so we give desktop users feedback by applying the focus style on hover as well. */
	.trip-grid .ui-listview li > .ui-btn:hover {
		-moz-box-shadow: 0px 0px 12px #33ccff;
		-webkit-box-shadow: 0px 0px 12px #33ccff;
		box-shadow: 0px 0px 12px #33ccff;
	}
	/* Animate focus and hover style, and resizing. */
	.trip-grid .ui-listview li,
	.trip-grid .ui-listview .ui-btn {
		-webkit-transition: all 500ms ease;
		-moz-transition: all 500ms ease;
		-o-transition: all 500ms ease;
		-ms-transition: all 500ms ease;
		transition: all 500ms ease;
	}
}

/* Second breakpoint is 63.75em (1020px). 4 column layout. Tiles will be 250x250 pixels incl. margin again at the breakpoint. */
@media ( min-width: 63.75em ) {
	.trip-grid .ui-content {
		padding: .625em; /* 10px */
	}
	/* Set a max-width for the last breakpoint to prevent too much stretching on large screens.
	By setting the max-width equal to the breakpoint width minus padding we keep square tiles. */
	.trip-grid .ui-listview {
		max-width: 62.5em; /* 1000px */
		margin: 0 auto;
	}
	/* Because of the 1000px max-width the width will always be 230px (and margin left/right 10px),
	but we stick to percentage values for demo purposes. */
	.trip-grid .ui-listview li {
		width: 23%;
		height: 230px;
		margin: .625em 1%;
	}
}


/***** end responsive style grid*/
	</style>
</head>
<body>
<section data-role="page" id="home" class="trip-grid">
	<?php
		// Memanggil fungsi untuk generate panel samping
		get_panel();
	?>
	<?php
		// Membuat menu header, isinya tombol back dan panel
		// Memiliki argumen variabel jugul header
		get_header('Perjalanan');
	?>
	<article role="main" class="ui-content" class="ui-content" >
			<div data-role="navbar">
			<ul>
				<li><a href="#" class="ui-btn-active">New Trip</a></li>
				<li><a href="#">Hot Trip</a></li>
				<li><a href="#">Search Trip</a></li>
			</ul>
		</div><!-- /navbar -->
		<span style="float:left;">
		<div class="breadcrumb">
			<div id="brdcmb">
			<ul>
				<li><a href="#home">Home</a></li>
				<li><a href="#trip">Trip</a></li>
			</ul>
			</div>
		</div>
		</span>
		<span style="float:right;">
			<a href="html.html" class="ui-btn ui-btn-inline ui-icon-edit ui-btn-icon-left">Buat trip baru</a>
		</span>
		<div style="clear: both;"></div>
		<hr/>
		<ul data-role="listview" data-inset="true">
        	<li><a href="#">
            	<img src="_gambar/user/3.jpg" class="ui-li-thumb">
            	<h2>Bandung</h2>
                <p>Wisata Kuliner</p>
                <p class="ui-li-aside">Kuliner</p>
            </a></li>
        	<li><a href="#">
            	<img src="_gambar/user/3.jpg" class="ui-li-thumb">
            	<h2>Jakarta</h2>
                <p>Museum Tour di hari pahlawan</p>
                <p class="ui-li-aside">Kota</p>
            </a></li>
        	<li><a href="#">
            	<img src="_gambar/user/3.jpg" class="ui-li-thumb">
            	<h2>Jogja</h2>
                <p>Serunya petualangan di desa penuh budaya</p>
                <p class="ui-li-aside">Budaya</p>
            </a></li>
        	<li><a href="#">
            	<img src="_gambar/user/3.jpg" class="ui-li-thumb">
            	<h2>Jakarta</h2>
                <p>Pulau Seribu</p>
                <p class="ui-li-aside">Alam</p>
            </a></li>
        	<li><a href="#">
            	<img src="_gambar/user/3.jpg" class="ui-li-thumb">
            	<h2>Nexus 7</h2>
                <p>Rumours about new full HD Nexus 7</p>
                <p class="ui-li-aside">Android</p>
            </a></li>
        	<li><a href="#">
            	<img src="_gambar/user/3.jpg" class="ui-li-thumb">
            	<h2>Firefox OS</h2>
                <p>ZTE to launch Firefox OS smartphone at MWC</p>
                <p class="ui-li-aside">Firefox</p>
            </a></li>
        	<li><a href="#">
            	<img src="_gambar/user/3.jpg" class="ui-li-thumb">
            	<h2>Tizen</h2>
                <p>First Samsung phones with Tizen can be expected in 2013</p>
                <p class="ui-li-aside">Tizen</p>
            </a></li>
        	<li><a href="#">
            	<h2>Symbian</h2>
                <p>Nokia confirms the end of Symbian</p>
                <p class="ui-li-aside">Symbian</p>
            </a></li>
        </ul>
	</article><!-- /content -->
	<?php
		get_footer();
	?>
</section><!-- /page -->

</body>
</html>
<? ob_flush(); ?>