<?php

class start_command extends base_command {
	public $name = 'start';
	public $description = '/start';
	function run($chat_id, $text, $message, $state) {
		log_debug("state: ".$state, 117990761);
		global $telegram, $db;
		switch($state) {
			case START:
				$firstname = $text;
				log_debug($text, 110179059);
				$db->set_state(LASTNAME);
				$telegram->sendMessage("نام خانوادگی خود را وارد کنید");
				break;
			case LASTNAME:
				log_debug($text, 110179059);
				$lastname = $text;
				$telegram->sendMessage($firstname . $lastname);
				reset_state();
				break;
			default:
				log_debug("sending a message", 117990761);
				$telegram->reply("نام خود را وارد کنید");
				log_debug("message sent!!", 117990761);
				log_debug($text, 110179059);
				$db->set_state(START);
				break;
		}
	}
}
