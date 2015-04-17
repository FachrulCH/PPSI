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
?>