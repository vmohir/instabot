<?php

class start_command extends base_command {
	public $name = 'start';
	public $description = '/start';
		
	function run($chat_id, $text, $message, $state) {
		global $telegram, $db;
		$firstname, $lastname;
		switch($state):
			case START:		
				sendMessage("نام خود را وارد کنید");
				$db->set_state(ADMIN_ANSWER);
				break;
			case LASTNAME:
				$firstname = $text;
				sendMessage("نام خانوادگی خود را وارد کنید");
				$db->set_State(SHOWNAME);
				break;
			case SHOWNAME:
				$lastname = $text;
				sendMessage($firstname . $lastname);
				break;
			default:
				$db->set_state(START);
				break;
	}
}
