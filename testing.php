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
//$url = "_gambar/galeri/o/bajak.jpg";
//echo "<img src=".$url." />";
//echo $url;
//
//print_r(getimagesize($url), true);
//
//$data = getimagesize($url);
//$width = $data[0];
//$height = $data[1];
//echo "<br/>dimensi yg lain:".$width;

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
<!-- <script>
    var pattern = Trianglify({
      height: window.innerHeight,
      width: window.innerWidth,
      cell_size: 30+Math.random()*100});
  var str = "<img src=\"" + pattern.canvas() + "\" \/>";
    document.body.appendChild(str);
    //document.getElementById("background").style.backgroundImage=pattern.svg();
    //document.getElementById("cek").setAttribute('src',pattern.svg());
    $('.background').append(pattern.canvas());
     $('#cek').attr('src',pattern.svg());
  </script>
  <div id="background"></div>
  <img src="" id="cek"/>-->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- validator -->
<!--	<script type="text/javascript" src="js/jquery.js"></script>
	 validator 
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/jquery.timeago.js"></script>
        <script src="src/trianglify/trianglify.min.js"></script>
        
        <script src="<?= URLSITUS ?>js/FileAPI/FileAPI.min.js"></script>
        <script src="<?= URLSITUS ?>js/FileAPI/FileAPI.exif.js"></script>
        <script src="<?= URLSITUS ?>js/FileAPI/jquery.fileapi.min.js"></script>
        <script src="<?= URLSITUS ?>src/jcrop/jquery.Jcrop.min.js"></script>
        <script src="<?= URLSITUS ?>js/jquery.modal.js"></script>
        <link rel="stylesheet" href="<?= URLSITUS ?>src/jcrop/jquery.Jcrop.min.css" />
        <link rel="stylesheet" href="<?= URLSITUS ?>src/jcrop/jquery.Jcrop.min.css" />-->
</head>
<style type="text/css">
    .popup__body {
  margin: 10px 10px 5px;
}
</style>
<body>
<!-- 
 <script type="text/javascript">
     $(document).ready(function() {
        $('#userpic').fileapi({
   url: 'http://rubaxa.org/FileAPI/server/ctrl.php',
   accept: 'image/*',
   imageSize: { minWidth: 200, minHeight: 200 },
   elements: {
      active: { show: '.js-upload', hide: '.js-browse' },
      preview: {
         el: '.js-preview',
         width: 200,
         height: 200
      },
      progress: '.js-progress'
   },
   onSelect: function (evt, ui){
      var file = ui.files[0];
      if( !FileAPI.support.transform ) {
         alert('Your browser does not support Flash :(');
      }
      else if( file ){
         $('#popup').modal({
            closeOnEsc: true,
            closeOnOverlayClick: false,
            onOpen: function (overlay){
               $(overlay).on('click', '.js-upload', function (){
                  $.modal().close();
                  $('#userpic').fileapi('upload');
               });
               $('.js-img', overlay).cropper({
                  file: file,
                  bgColor: '#fff',
                  maxSize: [$(window).width()-100, $(window).height()-100],
                  minSize: [200, 200],
                  selection: '90%',
                  onSelect: function (coords){
                     $('#userpic').fileapi('crop', file, coords);
                  }
               });
            }
         }).open();
      }
   }
});
     });
 </script>
 
 <div id="userpic" class="userpic">
   <div class="js-preview userpic__preview"></div>
   <div class="btn btn-success js-fileapi-wrapper">
      <div class="js-browse">
         <span class="btn-txt">Choose</span>
         <input type="file" name="filedata">
      </div>
      <div class="js-upload" style="display: none;">
         <div class="progress progress-success"><div class="js-progress bar"></div></div>
         <span class="btn-txt">Uploading</span>
      </div>
   </div>
</div>
 
<div id="popup" class="popup" style="display: none;">
        <div class="popup__body"><div class="js-img"></div></div>
        <div style="margin: 0 0 5px; text-align: center;">
                <div class="js-upload btn btn_browse btn_browse_small">Upload</div>
        </div>
</div>-->
<?php //
//$u = User_seperjalanan();
//print_r(json_encode($u));
?>

<?php
echo "ini hasilnya coy=>" . dekripsi("313233343536373832");

?>
</body>
</html>