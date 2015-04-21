<?php
include_once 'fungsi.php';

function good_query($string, $debug=0)
{
    if ($debug == 1) {
        print $string;
    }

    if ($debug == 2) {
        error_log($string);
    }

    $result = mysql_query($string);

    if ($result == false)
    {
    	// harus di remark ini biar ga tampil di web
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

$db = good_connect(DBHOST,DBUSER,DBPASS,DBNAME);
$statuskoneksi = "connected"; 

session_cek();

?>