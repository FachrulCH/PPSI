<?php
function nvl($var,$rep)
                {
	$var = trim($var);
	$var =  isset($var) ? $var : $rep;
	return $var;
}

function html_price($num) 
{

	$output = "Rp ".number_format($num, 0, '', '.').",-";

	return $output;
}

function cleanInput($input) 
{

  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );

    $output = preg_replace($search, '', $input);
    return $output;
  }
function sanitize($input) 
  {
    global $db;
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = $db->real_escape_string($input);
    }
    return $output;
}

function make_seo_name($title) 
{
	//If you have a title, for something like a blog or product, and want to make an seo-friendly name to call it, here is a function.
	return preg_replace('/[^a-z0-9_-]/i', '', strtolower(str_replace(' ', '-', trim($title))));
}

function make_image_name($name)
{
    return preg_replace("/[^a-z0-9.-]/u","", strtolower(str_replace(' ', '-', trim($name))));
}

function tautan($url,$text)
                {
    return "<a href=".URLSITUS.$url." data-ajax=\"false\" data-role=\"none\">{$text}</a>";
}

function enkripsi($string)
{
    $string = "12345678".$string;             //tambah prefix TEMAN biar panjang enkripsi ga kependekan
	$data   = bin2hex($string);
	return $data;
}

function dekripsi($string)
{
	$enkripsi =  pack("H*" , $string);
    return substr($enkripsi,8);         // ilangin prefix TEMAN (5 char)
}

function potong($string,$max)
                {
    return substr($string,0,$max);
}

function get_user_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function clean_text($string)
{
    return strip_tags(addslashes($string), '<p><span><b><i><u><ul><li><ol><a><table><tr><td><th><img>');
}

function umur($tgl)
{
    return floor((time() - strtotime($tgl)) / 31556926);
}

function tanggalan($tgl)
{
    $date=date_create($tgl);
    return date_format($date,"d-M-y");
}
?>