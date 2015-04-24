<?php
//include_once 'config.php';
include_once 'fungsi.php';

defined('DBHOST') ? null : define("DBHOST", "localhost");
defined('DBUSER') ? null : define("DBUSER", "root");
defined('DBPASS') ? null : define("DBPASS", "");
defined('DBNAME') ? null : define("DBNAME", "db_temanbackpacker");

defined("URLSITUS") ? null : define("URLSITUS", "http://localhost:8080/PPSIoop/"); // ==> URL web nya, buat <a href> 



$database = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$db =& $database;

function good_query($string, $debug=0)
{
    global $db;
    
    if ($debug == 1) {
        print $string;
    }

    if ($debug == 2) {
        error_log($string);
    }

    $result = $db->query($string);

    if ($result == false)
    {
    	// harus di remark ini biar ga tampil di web
        error_log("SQL error: ".mysqli_error($db)."\n\nOriginal query: $string\n");
		// Remove following line from production servers 
        die("SQL error: ".mysqli_error($db)."\b<br>\n<br>Original query: $string \n<br>\n<br>");
    }
    return $result;
}

function good_query_list($sql, $debug=0)
{
    // this function require presence of good_query() function
    $result = good_query($sql, $debug);
	
    if($lst = $db->fetch_row($result))
    {
	$db->free_result($result);
	return $lst;
    }
    $db->free_result($result);
    return false;
}

function good_query_all($sql, $debug=0)
{
    // this function require presence of good_query() function
    $result = good_query($sql, $debug);
    if ($result->num_rows > 0){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        return false;
    }
    
}

function good_query_assoc($sql, $debug=0)
{
    // this function require presence of good_query() function
    $result = good_query($sql, $debug);
	
    if($lst = $result->fetch_assoc())
    {
	$result->free_result();
	return $lst;
    }
    $result->free_result();
    return false;
}

function get_db_param($name){
    $sql    = "SELECT * FROM tb_parameter WHERE parameter_name ='{$name}'";
    $doSql  = good_query_assoc($sql);
    $json   = json_decode($doSql["parameter_desc"]);
    // balikan berupa array dari json object
    return $json;
}

function seqid_generate($sq){
    //increment
    $sqlInc     = "UPDATE tb_seq t SET t.seq_val = t.seq_val+1 where t.seq_name = '{$sq}';";
    $doInc      = good_query($sqlInc);
    //ambil value terahir
    $sqlVal     = "select t.seq_val,t.seq_prefix from tb_seq t where t.seq_name = '{$sq}';";
    $lastVal    = good_query_assoc($sqlVal);
    $lastVal    = $lastVal['seq_prefix'] . $lastVal['seq_val'];
    return $lastVal; 
}

function seqid_getlast($sq){
    //ambil value terahir
    $sqlVal     = "select t.seq_val,t.seq_prefix from tb_seq t where t.seq_name = '{$sq}';";
    $lastVal    = good_query_assoc($sqlVal);
    $lastVal    = $lastVal['seq_prefix'] . $lastVal['seq_val'];
    return $lastVal; 
}

function amankan($input){
    $input = htmlspecialchars($input);
    //$input = $db->real_escape_string($input);
    return $input;
}

function session_cek(){
    if (!isset($_SESSION)) { session_start(); }
}

session_cek();

?>