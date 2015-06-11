<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";

$menu       = sanitize($_GET['menu']); // pengalaman / trip / user
$tipe       = sanitize($_GET['tipe']); // tanya / diskusi / pm
$chat_id    = sanitize($_GET['id']); // trip id / user_id

harus_login(); // validasi hanya user yg udah login

if ($menu == 'trip'){
    include_once '_include/trip.php';
    
    $header = "Pertanyaan";
    if ($tipe == 'tanya'){
        $_SESSION['lihatTrip'] = $chat_id;
        $data = Trip_get_tanya_all($chat_id);
        $trip = Trip_get_by_id($chat_id);
        $judul = $trip['trip_judul'];
        $subJudul = $trip['trip_tujuan'];
        $asal = URLSITUS . "trip/lihat/" . make_seo_name($trip['trip_judul']) . "/" . $trip['trip_id']. "/";
    }elseif($tipe == 'diskusi'){
        $_SESSION['lihatTrip'] = $chat_id;
        $data = Trip_get_diskusi_all($chat_id);
        $trip = Trip_get_by_id($chat_id);
        $member_trip = Trip_member_join($chat_id);
        $judul = $trip['trip_judul'];
        $subJudul = $trip['trip_tujuan'];
        $asal = URLSITUS . "trip/lihat/" . make_seo_name($trip['trip_judul']) . "/" . $trip['trip_id']. "/";
    }
}
?>
<!doctype html>
<html>
    <head>
        <?php
        // memanggil fungsi untuk generate meta tag dan include file CSS & JS yg diperlukan
        // memiliki argumen title halaman
        get_meta('Obrolan');
        ?>

    </head>
    <body>
        <section data-role="page" id="home">
            <?php
            // Memanggil fungsi untuk generate panel samping
            get_panel();
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header($header);
            ?>
            <article role="main" class="ui-content">
                <div class="ketengah">
                    <a href="<?= $asal?>" data-ajax="false" target="_blank"><h3><?= $judul ?></h3></a>
                    <p><?= $subJudul ?></p>
                </div>
                <div class="ditengah">
                    <?php
                    if (!empty($member_trip)){
                        //debuging($member_trip);
                        foreach ($member_trip as $d) {
                            echo "<a href='" . URLSITUS . "username/" . strtolower($d['user_username']) . "/" . "' target='_blank' title='" . $d['user_username'] . "'>
                                <div class='circle left' style=\"background-image: 
                                    url('" . URLSITUS . '_gambar/user/' . $d['user_foto'] . "')\">
                                 </div>
                                 </a>";
                        }
                    }
                    ?>
                </div>
                
                <div class="ui-body ui-body-a">
                        <form id="tanyajawab">
                            <input type="hidden" value="" name="tid">
                            <input type="hidden" value="" name="uid">
                            <input type="hidden" value="<?= $tipe  ?>" name="tipe">
                            <textarea cols="40" rows="8" name="t_tanya" id="Ttanya" maxlength="250"></textarea>
                            <button class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-edit" id="btn_tanya">Tanya</button>
                        </form>
                        <div style="clear: both;"></div>
                        <div id="listTanya">
<?php
            //debuging($data);
        if (!empty($data)){
            echo Tmplt_listing($data);
        }
?>
                    </div>
                    </div>
            </article><!-- /content -->
            <?php
            get_footer();
            ?>
        </section><!-- /page -->
<script type="text/javascript" src="<?= URLSITUS ?>js/jquery.timeago.js"></script> <!-- konversi ke waktu relative -->
<script type="text/javascript" src="<?= URLSITUS ?>js/main.js" ></script>
<script type="text/javascript">
    $(document).ready(function () {
        jQuery("abbr.timeago").timeago(); 	/*konversi ke waktu relative*/
        
        $('#btn_tanya').on('click', function () {
            var pertanyaan = $('#Ttanya').val();
            var kirim = $("#tanyajawab").serialize();
            console.log(kirim);
            if (pertanyaan.length > 0) {
            // Menggunakan fungsi sendiri untuk memanggil ajax
            // format argumen adalah (URL,DATA,Callcack function)
                customAjax('<?= URLSITUS ?>api/chating/', kirim, function (data) {
                    $("#listTanya").html(data);         // refrest list
                    $("#Ttanya").val(''); 		// kotak pertanyaan di kosongin
                    jQuery("abbr.timeago").timeago();   // refrest keterangan waktu
                    setTimeout('$("#dialogy").popup(\'close\');',500);
                });
            } else {
                dialogin('Isikan komentar anda');
            }
            return false; // cancel original event to prevent form submitting
        });
        
    });
</script>
    </body>
</html>
<?php
//ob_flush(); ?>