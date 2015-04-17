<?php
include_once 'fungsi.php';

function good_query($string, $debug=0)
{
    if ($debug == 1)
        print $string;

    if ($debug == 2)
        error_log($string);

    $result = mysql_query($string);

    if ($result == false)
    {
        error_log("SQL error: ".mysql_error()."\n\nOriginal query: $string\n");
	// Remove following line from production servers 
        die("SQL error: ".mysql_error()."\b<br>\n<br>Original query: $string \n<br>\n<br>");
    }
    return $result;
}

function good_query_list($sql, $debug=0)
{
    // this function require presence of good_query() function
    $result = good_query($sql, $debug);
	
    if($lst = mysql_fetch_row($result))
    {
	mysql_free_result($result);
	return $lst;
    }
    mysql_free_result($result);
    return false;
}

function good_query_assoc($sql, $debug=0)
{
    // this function require presence of good_query() function
    $result = good_query($sql, $debug);
	
    if($lst = mysql_fetch_assoc($result))
    {
	mysql_free_result($result);
	return $lst;
    }
    mysql_free_result($result);
    return false;
}

function good_query_value($sql, $debug=0)
{
    // this function require presence of good_query_list() function
    $lst = good_query_list($sql, $debug);
    return is_array($lst)?$lst[0]:false;
}

function good_query_table($sql, $debug=0)
{
    // this function require presence of good_query() function
    $result = good_query($sql, $debug);
	
    $table = array();
    if (mysql_num_rows($result) > 0)
    {
        $i = 0;
        while($table[$i] = mysql_fetch_assoc($result)) 
			$i++;
        unset($table[$i]);                                                                                  
    }                                                                                                                                     
    mysql_free_result($result);
    return $table;
}

// mysql connecting and disconnecting 
function good_connect($host, $user, $pwd, $db)
{
	$link = @mysql_connect($host, $user, $pwd);
	if (!$link) {
		die('Can\'t connect to database server (check $host, $user, $pwd)');
		error_log('Can\'t connect to database server (check $host, $user, $pwd)');
	}
	
	$has_db = mysql_select_db($db);
	if (!$has_db)
	{
		die('Can\'t select database (check $db)');
		error_log('Can\'t select database (check $db)');
	}
        return $link;
}

function good_close()
{
	mysql_close();
}

// Another trivial functions

function good_row(&$result)
{
    return mysql_fetch_row($result);
}

function good_assoc(&$result)
{
    return mysql_fetch_assoc($result);
}

function good_num(&$result)
{
    return mysql_num_rows($result);
}

function good_free(&$result)
{
    return mysql_free_result($result);
}

// if you don't remember which functions 
// do need mysql resource, and which don't
// you may pass mysql resource to all...
function good_last($notused = 0)
{
    return mysql_insert_id();
}

function good_affected($notused = 0)
{
    return mysql_affected_rows();
}


function get_db_param($name){
    $sql = "SELECT * FROM tb_parameter WHERE parameter_name ='{$name}'";
    $doSql = good_query_assoc($sql);
    $json = json_decode($doSql["parameter_desc"]);
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
	$input = mysql_real_escape_string($input);
	return $input;
}

function session_cek(){
	if (!isset($_SESSION)) { session_start(); }
}

define("URLSITUS", "http://localhost:8080/PPSI/"); // ==> URL web nya, buat <a href> 

define("DBHOST", "localhost");
define("DBNAME", "db_temanbackpacker");
define("DBUSER", "root");
define("DBPASS", "");

/* $dbhost='localhost';
$dbname='db_temanbackpacker';
$dbuser='root';
$dbpass=''; */

$db = good_connect(DBHOST,DBUSER,DBPASS,DBNAME);
$statuskoneksi = "connected"; 

session_cek();

?>