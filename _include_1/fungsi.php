<?php
function nvl($var,$rep){
	$var = trim($var);
	$var =  isset($var) ? $var : $rep;
	return $var;
}

function html_price($num) {

	$output = "Rp ".number_format($num, 0, '', '.').",-";

	return $output;
}

function cleanInput($input) {

  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );

    $output = preg_replace($search, '', $input);
    return $output;
  }
function sanitize($input) {
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
        $output = mysql_real_escape_string($input);
    }
    return $output;
}

function make_seo_name($title) {
	//If you have a title, for something like a blog or product, and want to make an seo-friendly name to call it, here is a function.
	return preg_replace('/[^a-z0-9_-]/i', '', strtolower(str_replace(' ', '-', trim($title))));
}

function enkripsi($string){
    $string = "T3M4N".$string;             //tambah prefix TEMAN biar panjang enkripsi ga kependekan
	$data   = bin2hex($string);
	return $data;
}

function dekripsi($string){
	$enkripsi =  pack("H*" , $string);
    return substr($enkripsi,5);         // ilangin prefix TEMAN (5 char)
}
?>