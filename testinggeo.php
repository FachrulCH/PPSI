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
            get_header('Defaultin');
            ?>
            <article role="main" class="ui-content">
                <button id="cek">Lokasimu</button>
                <div id="hasil"></div>
            </article><!-- /content -->
            <?php
            get_footer();
            ?>
        </section><!-- /page -->
        <script src="src/geograpi/modernizr-geo.js"></script>
        <script src="src/geograpi/geoPosition.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                elem = document.getElementById('hasil');
                $('#cek').on('click', function () {
                    if (Modernizr.geolocation) {
                        //elem.innerHTML = 'Your browser supports geolocation.';
                        navigator.geolocation.getCurrentPosition(showPosition, showError, {maximumAge: 600000});
                    } else {
                        //elem.innerHTML ='Your browser does not support geolocation.';
                        if (geoPosition.init()) {  // Geolocation Initialisation
                            geoPosition.getCurrentPosition(showPosition, showError, {maximumAge: 600000});
                        } else {
                            // You cannot use Geolocation in this device
                        }
                        geoPositionSimulator.init();

                    }


                    function showPosition(position) {
                        elem.innerHTML = "Latitude: " + position.coords.latitude +
                                "<br>Longitude: " + position.coords.longitude;
                    }

                    function showError(error) {
                        switch (error.code) {
                            case error.PERMISSION_DENIED:
                                elem.innerHTML = "User denied the request for Geolocation."
                                break;
                            case error.POSITION_UNAVAILABLE:
                                elem.innerHTML = "Location information is unavailable."
                                break;
                            case error.TIMEOUT:
                                elem.innerHTML = "The request to get user location timed out."
                                break;
                            case error.UNKNOWN_ERROR:
                                elem.innerHTML = "An unknown error occurred."
                                break;
                        }
                    }
                });
            });
        </script>
    </body>
</html>
<?php
//ob_flush(); ?>