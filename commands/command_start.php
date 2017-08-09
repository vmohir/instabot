<?php

class start_command extends base_command {
	public $name = 'start';
	public $description = '/start';
		
	function run($chat_id, $text, $message, $state) {
		global $telegram, $db;
		$firstname, $lastname;
		switch($state){
			case START:		
				$db->set_state(LASTNAME);
				$telegram->sendMessage("نام خانوادگی خود را وارد کنید");				
				break;
			case LASTNAME:
				$firstname = $text;
				$db->set_State(SHOWNAME);
				break;
			case SHOWNAME:
				$lastname = $text;
				$telegram->sendMessage($firstname . $lastname);
				break;
			default:
				$telegram->sendMessage("نام خود را وارد کنید");		
				$db->set_state(START);
				break;
		}
	}
}
