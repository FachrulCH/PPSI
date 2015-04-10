<?php
include_once "_include/db_function.php";
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
$json = get_db_param('transportasi');
foreach($json->transportasi as $value) {
        echo $value->id . ", " . $value->name . "<br>";
    }
?>