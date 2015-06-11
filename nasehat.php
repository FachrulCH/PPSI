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

    </head>
    <body>
        <section data-role="page" id="home">
            <?php
            // Memanggil fungsi untuk generate panel samping
            get_panel();
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Tips');
            ?>
            <article role="main" class="ui-content">
                <div class="ui-body ui-body-a ui-corner-all">
                    <h1>Tips Keamanan Pribadi</h1>
                    <p>Teman Seperjalanan dan tempat-tempat baru membuka peluang untuk petualangan, tapi perjalanan juga dapat menjadi membingungkan. Untuk mempersiapkan diri kamu membuat keputusan yang terbaik bagi perjalanan liburan kamu, kami telah mengumpulkan beberapa tips.</p>

                    <h3>Yang harus kamu lakukan</h3>
                    <ul>
                        <li>Carilah teman seperjalanan yang memiliki rencana trip yang memiliki profil lengkap dengan reputasi bagus, foto yang jelas, dan deskripsi rinci dari diri mereka sendiri dan lihat histori perjalanan ataupun track recordnya.</li>
                        <li>Baca desktipsi rencana perjalanannya atau cari ulasan pengalaman liburan temanbackpacker untuk mendapatkan gambaran liburan di lokasi tersebut.</li>
                        <li>Apakah ada informasi yang hilang tentang kegiatan disana? jangan sungkan untuk bertanya ya.</li>
                        <li>Wisatawan perempuan dapat memilih untuk bergabung dengan teman seperjalanan perempuan, dan sebaliknya.</li>
                        <li>Pastikan kamu jelas tentang tingkat kepercaan dengan calon teman seperjalanan yang menawarkan kamu untuk bisa join dengan rencana trip mereka. Hati-hati membaca informasi tentang profil host ataupun anggota dan pastikan untuk bertanya tentang sesuatu yang belum jelas.</li>
                    </ul>
                    <h3>Komunikasi</h3>
                    <ul>
                        <li>Kenali teman seperjalanan kamu melalui sistem pesan kami. Jangan memberikan informasi kontak pribadi kamu sampai kamu bertemu/yakin.</li>
                        <li>Pastikan kamu berkomunikasi juga dengan teman-teman lainya, ijin dengan keluarga.</li>
                        <li>Ajukanlah pertanyaan! Mulailah obrolan! Mungkin kalian akan lebih nyaman ketika nanti akhirnya bertemu. Jika jawabannya membuat kamu tidak nyaman, lebih baik mencari rencana perjalanan lain lah.</li>
                    </ul>
                </div>
            </article><!-- /content -->
            <?php
            get_footer();
            ?>
        </section><!-- /page -->

    </body>
</html>
<?php
//ob_flush(); ?>