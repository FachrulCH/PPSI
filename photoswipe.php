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
<!-- Core CSS file -->
<link rel="stylesheet" href="src/photoswipe/photoswipe.css"> 

<!-- Skin CSS file (styling of UI - buttons, caption, etc.)
     In the folder of skin CSS file there are also:
     - .png and .svg icons sprite, 
     - preloader.gif (for browsers that do not support CSS animations) -->
<link rel="stylesheet" href="src/photoswipe/default-skin/default-skin.css"> 

<!-- Core JS file -->
<script src="src/photoswipe/photoswipe.min.js"></script> 

<!-- UI JS file -->
<script src="src/photoswipe/photoswipe-ui-default.min.js"></script>
<style type="text/css">
.picture {
  width: 100%;
  float: left;
}
.picture img {
  width: 100%;
  height: auto;
}
.picture figure {
  display: block;
  float: left;
  margin: 0 5px 5px 0;
  width: 150px;
}
.picture figcaption {
  display: none;
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
		<div class="picture" itemscope itemtype="http://schema.org/ImageGallery">
		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
		   <a href="https://farm3.staticflickr.com/2567/5697107145_a4c2eaa0cd_o.jpg" itemprop="contentUrl" data-size="1024x1024" data-index="0">
		   <img src="https://farm3.staticflickr.com/2567/5697107145_3c27ff3cd1_m.jpg" itemprop="thumbnail" alt="Image description" />
		    </a>
		  </figure>

		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
		      <a href="https://farm7.staticflickr.com/6175/6176698785_7dee72237e_b.jpg" itemprop="contentUrl" data-size="1000x667" data-index="1">
		          <img src="https://farm7.staticflickr.com/6175/6176698785_7dee72237e_m.jpg" itemprop="thumbnail" alt="">
		      </a>
		  </figure>
		</div>
	</article><!-- /content -->
<?php
        get_footer();
?>
</section><!-- /page -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
 
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
 
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	(function($) {
    var $pswp = $('.pswp')[0];
    var image = [];

    $('.picture').each( function() {
        var $pic     = $(this),
            getItems = function() {
                var items = [];
                $pic.find('a').each(function() {
                    var $href   = $(this).attr('href'),
                        $size   = $(this).data('size').split('x'),
                        $width  = $size[0],
                        $height = $size[1];

                    var item = {
                        src : $href,
                        w   : $width,
                        h   : $height
                    }

                    items.push(item);
                });
                return items;
            }

        var items = getItems();

        $.each(items, function(index, value) {
            image[index]     = new Image();
            image[index].src = value['src'];
        });

        $pic.on('click', 'figure', function(event) {
            event.preventDefault();
            
            var $index = $(this).index();
            var options = {
                index: $index,
                bgOpacity: 0.7,
                showHideOpacity: true
            }

            var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
            lightBox.init();
        });
    });
})(jQuery);

</script>
</body>
</html>
<?php //ob_flush(); ?>