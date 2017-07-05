<?php

$keyboards = [
	
	"start"=>['contact'],

];

// check
function run_keyboard_button($text, $chat_id, $message_id, $message) {
	global $keyboard_buttons;
	
	foreach ($keyboard_buttons as $keyboard_name => $btns) {
		foreach ($btns as $btn_name=>$btn ){
			
			if ($text == $btn['name']) {
				$func = 'btn_' . $btn_name;
				$func($chat_id, $text, $message_id, $message, IDLE);
				return true;
			}
		}
	}
	
	return false;
}

require "./keyboard_buttons/base_button.php";
foreach (glob("./keyboard_buttons/button_*.php") as $filename) {
    require ($filename);
}
