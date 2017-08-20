<?php

class start_command extends base_command {
	public $name = 'start';
	public $description = '/start';
	function run($chat_id, $text, $message, $state) {
		global $telegram, $db;
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
			
				$db->set_state(START);

				break;
		}
	}
}
