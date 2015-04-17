<?php
include_once "_include/db_function.php";
include_once "_include/trip.php";
include_once '_include/template.php';

$trip_id = '110';
Tmplt_comment_trip1($trip_id);

//echo URLSITUS;
// tes join parameter
/* $json = get_db_param('transportasi');
echo "<pre>";
	print_r($json->transportasi[0]->name);
echo "</pre>"; */

/* foreach($json->transportasi as $value) {
	echo "<option value='".$value->id."'>" . $value->name . "</option>";
} */

// Tes trip_cek_status_user
//print_r (trip_cek_status_user(1));

// tes fungsi
/* $_SESSION['user_id'] = 'joko';
unset($_SESSION['user_id']);
echo trip_cek_status_user();
 */
/* $var = ' ';
echo nullkah($var);
echo is_null($var); */
// cara menampilkan data trip
/* $row = trip_get_by_id(110);
print_r($row);

echo "<hr/>";
echo "trip_judul :=> ".$row['trip_judul'];
 */


/*$sql = "SELECT * FROM tb_parameter WHERE parameter_id = 2";
$doSql = good_query_assoc($sql);
$json = json_decode($doSql["parameter_desc"]);
//printf("%s (%s)\n",$doSql["parameter_name"]);
print_r($json);
echo "jajal<br/><hr/>";
echo($json->transportasi[0]->id);
echo"<br/>".$json->transportasi[0]->name;
echo "<hr/>";
echo($json->transportasi[1]->id);
echo"<br/>".$json->transportasi[1]->name;
echo "<hr/>";
foreach($json->transportasi as $value) {
    echo $value->id . ", " . $value->name . "<br>";
  }*/
/*$json = get_db_param('transportasi');
foreach($json->transportasi as $value) {
        echo $value->id . ", " . $value->name . "<br>";
    }*/

/*generate ID*/
/*echo seqid_getlast('sq_trip')."<br>";
echo seqid_generate('sq_trip')."<br>";
echo seqid_getlast('sq_trip')."<br>";
$i = 0;
while ($i < 100){
	echo seqid_generate('sq_trip')."<br>";
	$i++;
}*/

/* $lokasi = '-6.23827,106.975573';
$lokasi = explode(',', $lokasi);

print_r($lokasi);
 */

?>

<?php 
/* //Testing chat save tanya
$_SESSION['user_id'] = 1;
 */?>
<!-- <form action ="ajax.php?do=tanya" method="post">
<input type="text" name="i">
<input type="text" name="pertanyaan">
<input type="submit">
</form> -->