<?php

class start_command extends base_command {
	public $name = 'start';
	public $description = '/start';
		
	function run($chat_id, $text, $message, $state) {
		global $telegram, $db;
		$firstname, $lastname;
		switch($state):
			case START:		
				$telegram->sendMessage("نام خود را وارد کنید");
				$btn = create_glassy_btn($text, "last name", ['c' => $chat_id, 'm' => $message_id]);
				$reply_markup = create_glassy_keyboard([[$btn]]);
				$db->set_state(LASTNAME);
				break;
			case LASTNAME:
				$firstname = $text;
				$telegram->sendMessage("نام خانوادگی خود را وارد کنید");
				$btn = create_glassy_btn($text, "finished", ['c' => $chat_id, 'm' => $message_id]);
				$reply_markup = create_glassy_keyboard([[$btn]]);
								
				$db->set_State(SHOWNAME);
				break;
			case SHOWNAME:
				$lastname = $text;
				$telegram->sendMessage($firstname . $lastname);
				break;
			default:
				$db->set_state(START);
				break;
	}
}
