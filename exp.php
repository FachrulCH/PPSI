<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
//    ob_start("ob_gzhandler");
//else
//    ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";
include_once "_include/Exp.php";
$breadcumb = array
               (array("link"=> URLSITUS, "text"=>"Home"),
                array("link"=> URLSITUS."pengalaman/#home", "text"=>"Pengalaman")
               );

$m      = isset($_GET['m'] ) ? $_GET['m'] : 'new';
$page   = isset($_GET['page'] ) ? (int) $_GET['page'] : 1; // mengambil data trip
if ($m == 'hot'){
    $exp    = Exp_list_hot();
    $breadcumb[] = array("link"=> URLSITUS."pengalaman/#hot", "text"=>"Seru");
}else{
    $exp    = Exp_list_new($page, 23);
}
?>
<!doctype html>
<html>
    <head>
<?php
        // memanggil fungsi untuk generate meta tag dan include file CSS & JS yg diperlukan
        // memiliki argumen title halaman
        get_meta('TemanBackpacker.com');
?>
    </head>
    <body>
        <section data-role="page" id="home" class="trip-grid">
<?php
            // Memanggil fungsi untuk generate panel samping
            get_panel();
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Pengalaman');
?>
            <article role="main" class="ui-content" class="ui-content" >
                <span style="float:left;">
                    <div class="breadcrumb">
                        <div id="brdcmb">
                            <ul>
<!--                                <li><a href="" data-ajax="false">Home</a></li>
                                <li><a href="pengalaman/#home">Pengalaman</a></li>-->
<?php
                                Tmplt_generate_breadcumb($breadcumb);
?>
                            </ul>
                        </div>
                    </div>
                </span>
                <?php //print_r($breadcumb)?>
                <span style="float:right;">
                    <a href="<?= URLSITUS ?>pengalaman/baru/" class="ui-btn ui-btn-inline ui-icon-edit ui-btn-icon-left" data-ajax="false">Buat pengalaman baru</a>
                </span>
                
                <div style="clear: both;"></div>
                
                <div data-role="navbar">
                    <ul>
                        <li><a href="?m=new" data-transition="flip" <?php if (!isset($_GET['m']) OR $_GET['m'] == 'new'){ echo 'class="ui-btn-active"'; }?> >Baru</a></li>
                        <li><a href="?m=hot" data-transition="fade" <?php if (@$_GET['m'] == 'hot'){ echo 'class="ui-btn-active"'; }?>>Seru</a></li>
                        <li><a href="#browse" data-transition="pop">Telusuri</a></li>
                    </ul>
                </div><!-- /navbar -->
                
                
                <hr/>
                <ul data-role="listview" data-inset="true">
<?php
                if ($exp == FALSE){
                    echo 'Data Pengalaman tidak ditemukan';
                }else{
                   
                    //while ($t = mysqli_fetch_assoc($exp)){
//                    foreach ($exp as $t) {
//                        // cek ada foto trip nya apa ngak
//                        if (!empty($t['foto'])){
//                            $foto = $t['foto'];
//                        }else{
//                            $foto = "default.gif";
//                        }
//?>
<!--                    <li><a href="//<?= URLSITUS ."pengalaman/lihat/". make_seo_name($t['pengalaman_judul']) ."/".$t['pengalaman_id'] ?>/" data-ajax="false">
                            <img src="//<?= URLSITUS ?>_gambar/galeri/thumb2/<?= $foto ?>" class="ui-li-thumb">
                            <h3 class="judulList">//<?= $t['pengalaman_judul'] ?></h3>
                            <span class="hrfKecil">Dari //<?= $t['username'] ?></span> | <span class="hrfKecil"><?= $t['pengalaman_lokasi'] ?></span>
                            <p class="ui-li-aside garisKotak">//<?= $t['pengalaman_kategori'] ?></p>
                        </a></li>-->
<?php
//                    }
    Tmplt_generate_list_exp($exp);
                }
?>
                </ul>
                
            </article><!-- /content -->
<?php
            get_footer();
?>
        </section><!-- /page -->
        
    </body>
</html>
<?php // ob_flush(); ?>