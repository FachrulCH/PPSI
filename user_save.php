<?php

/////////////////
$captcha=$_POST['g-recaptcha-response'];
$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeO_QUTAAAAAHV1shZF4h2BnhS7QdrrzRDI5YaJ&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);

if ($response['success'] == false) {
    echo '<h2>You are spammer ! Get the @$%K out</h2>';
} else {
    //echo $_POST['g-recaptcha-response'];
    echo '<h2>Thanks for posting comment.</h2>';
}
?>