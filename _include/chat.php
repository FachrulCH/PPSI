<?php
//pastikan chat di include/require setelah db_function.php
require_once 'db_function.php';
//karena chat.php akan menggunakan fungsi dari sana

function Chat_save_tanya($chat_trip_id,$chat_sender,$chat_mesej){
	// sanitize inputan
	$chat_trip_id = (int) $chat_trip_id;
	$chat_sender = amankan($chat_sender);
	$chat_mesej = amankan($chat_mesej);
	
	$sql = "INSERT INTO tb_chat(chat_trip_id, chat_sender, chat_type, chat_mesej)
			VALUES ('{$chat_trip_id}', '{$chat_sender}', '2', '{$chat_mesej}')";
	$sqlInsert = good_query($sql);
	if ($sqlInsert){
		return true;
	} else{
		return false;
	}
}


?>