<?php
function nvl($var,$rep){
	$var = trim($var);
	$var =  isset($var) ? $var : $rep;
	return $var;
}
?>