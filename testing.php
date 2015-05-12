<?php
include_once "_include/db_function.php";
include_once "_include/trip.php";
include_once '_include/template.php';
include_once '_include/user.php';

//$trip_id = '110';
//Tmplt_comment_trip1($trip_id);

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


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- validator -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<!-- validator -->
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/jquery.timeago.js"></script>
	
</head>
<body>

<?php
//$d = "3";
//$d = enkripsi($d);
//$e = dekripsi($d);
////
//echo "enkripsi => $d <br/>";
//echo "dekripsi => $e <br/>";
//$data = Trip_get_tanya(110);
//echo "<pre>";
//print_r($data);

// cek data trip
//$sql = "select * from v_trip_list where trip_id = 110 limit 2;" ;
//echo "<pre>";
//print_r(Trip_load_new());
//print_r(Trip_load_hot(1,2));
//$ar = Tmplt_get_kategori1();
//print_r($ar);
//echo '</pre>';

//foreach ($ar as $b) {
//    echo $b['param_name'];
//}

//*********testing User_new($namaLengkap, $username, $email, $pwd)
//
//$simpan = User_new('haci kiwir', 'papatong', 'imel@imel.com', md5('katasandi'));
//
//var_dump($simpan);

//***** ketersediaan user buat register

//$status = User_tersedia('alula');
//var_dump($status);
//$status = User_email_tersedia('fachrul.fch@gmail.co');
//var_dump($status);

//$userprofile = User_get_profil(1);
//var_dump($userprofile);
//$url = "http://localhost/PPSIoop/_gambar/galeri/o/bajak.jpg";
$url = "_gambar/galeri/o/bajak.jpg";
echo "<img src=".$url." />";
echo $url;

print_r(getimagesize($url), true);

$data = getimagesize($url);
$width = $data[0];
$height = $data[1];
echo "<br/>dimensi yg lain:".$width;

?>
<!-- 
<abbr class="timeago" title="2015-04-20">July 17, 2008</abbr>
<hr/>
<form name="myform" id="myform" action="" method="POST">  
<input type="hidden" value="" name="id_soal">
<input type="text" name="asoy">
<input type="hidden" value="" name="soal">
	<input type="radio" name="name" checked="checked" value=""/><br>
	<br><input type="submit" name="submit" value="Submit"> 
</form>
<script type="text/javascript">
		$.validator.setDefaults({
			submitHandler: function() {
				alert("submitted!");
				}
			});
		$("#myform").validate({
			debug: false,
			rules: {
				name: "required",
				asoy: "required"
			},
			messages: {
				name: "Pilih pilihan anda.",
			}


		});
</script> 
<script type="text/javascript">
		 jQuery("abbr.timeago").timeago();
	</script>
 -->
</body>
</html>