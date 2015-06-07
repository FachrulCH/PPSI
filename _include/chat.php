<?php
//pastikan chat di include/require setelah db_function.php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'db_function.php';
//karena chat.php akan menggunakan fungsi dari sana

function Chat_save_tanya($chat_trip_id, $chat_sender, $chat_mesej, $chat_id = 0){
        date_default_timezone_set('asia/jakarta');
        $waktu          = date("Y-m-d H:i:s", time());
	// sanitize inputan
	$chat_trip_id 	= (int) $chat_trip_id;
	$chat_sender 	= sanitize($chat_sender);
	$chat_mesej 	= potong(sanitize($chat_mesej),250);
	
        if ($chat_id == 0){
            $sql = "REPLACE INTO tb_chat(chat_trip_id, chat_sender, chat_type, chat_mesej, chat_date)
                    VALUES ('{$chat_trip_id}', '{$chat_sender}', '2', '{$chat_mesej}','{$waktu}')";
        }
	$sqlInsert = good_query($sql);
	
	if ($sqlInsert){
            return true;
	} else{
            return false;
	}
}

function Chat_save_pm($chat_for_id, $chat_sender, $chat_mesej, $chat_title){
    date_default_timezone_set('asia/jakarta');
    $waktu = date("Y-m-d H:i:s", time());
    
    // sanitize inputan
    $chat_for_id 	= (int) $chat_for_id;
    $chat_title         = sanitize($chat_title);
    $chat_sender 	= sanitize($chat_sender);
    $chat_mesej 	= potong(sanitize($chat_mesej),250);

    $sql = "INSERT INTO tb_chat(chat_trip_id, chat_sender, chat_type, chat_mesej, chat_date, chat_title)
            VALUES ('{$chat_for_id}', '{$chat_sender}', '1', '{$chat_mesej}','{$waktu}','{$chat_title}')";
    $sqlInsert = good_query($sql);

    if ($sqlInsert){
            return true;
    } else{
            return false;
    }
}

?>