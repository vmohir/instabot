<?php

class start_command extends base_command {
	public $name = 'start';
	public $description = '/start';
	function run($chat_id, $text, $message, $state) {
		global $telegram, $db;
		switch($state) {
			case START:
				$firstname = $text;
				log_debug($text, 110179059);
				$db->set_state(LASTNAME);
				sendMessage("نام خانوادگی خود را وارد کنید");
				break;
			case LASTNAME:
				log_debug($text, 110179059);
				$lastname = $text;
				sendMessage($firstname . $lastname);
				reset_state();
				break;
			default:
				sendMessage("نام خود را وارد کنید");
				log_debug($text, 110179059);
				$db->set_state(START);
				break;
		}
	}
}
