<?php
//pastikan chat di include/require setelah db_function.php
require_once 'db_function.php';
//karena chat.php akan menggunakan fungsi dari sana

function Chat_save_tanya($chat_trip_id,$chat_sender,$chat_mesej){
        date_default_timezone_set('asia/jakarta');
        $waktu          = date("Y-m-d H:i:s", time());
	// sanitize inputan
	$chat_trip_id 	= (int) $chat_trip_id;
	$chat_sender 	= sanitize($chat_sender);
	$chat_mesej 	= potong(sanitize($chat_mesej),250);
	
	$sql = "INSERT INTO tb_chat(chat_trip_id, chat_sender, chat_type, chat_mesej, chat_date)
		VALUES ('{$chat_trip_id}', '{$chat_sender}', '2', '{$chat_mesej}','{$waktu}')";
	$sqlInsert = good_query($sql);
	
	if ($sqlInsert){
		return true;
	} else{
		return false;
	}
}


?>