<?php

class start_command extends base_command {
	public $name = 'start';
	public $description = '/start';
	function run($chat_id, $text, $message, $state) {
		global $telegram, $db;
		$check=0;
		
		switch($state) {
			case START:
				$firstname = $text;
				sendMessage("نام خانوادگی خود را وارد کنید");
				$db->set_state(LASTNAME);
				log_debug($text, 110179059);
				break;
			case LASTNAME:
				log_debug($text, 110179059);
				$lastname = $text;
				sendMessage($firstname . $lastname);
				reset_state();
				log_debug($text, 110179059);
				break;
			default:
				if($check==0){
					sendMessage("نام خود را وارد کنید");
					$db->set_state(START);	
					$check=1;
					break;
				}
				if($check==1){
					$firstname = $text;
					sendMessage("نام خانوادگی خود را وارد کنید");
					$db->set_state(LASTNAME);
					log_debug($text, 110179059);
					$check=2;
					break;
				}
				if($check==2){
					log_debug($text, 110179059);
					$lastname = $text;
					sendMessage($firstname . $lastname);
					reset_state();
					log_debug($text, 110179059);
					$check=3;
					break;
				}
		}
		
	}
}
