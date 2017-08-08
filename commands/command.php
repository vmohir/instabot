<?php

class first_command extends base_command {
	public $name = 'start';
	public $description = '/start';
		
	function run($chat_id, $text, $message, $state) {
		global $telegram, $db, $username;
		$message_id = $message->getMessageId();
		switch ($state) {
			case START:
				$btn = create_glassy_btn('get_username', 'admin', ['c' => $chat_id, 'm' => $message_id]);
				$reply_markup = create_glassy_keyboard([[$btn]]);
				$username = get_username($chat_id);
				send_message_to_admin(create_report_from_a_user_message('show username', $text), $reply_markup);
				reset_state(SUCCESS_MESSAGE);
				break;
			case ADMIN:
				$telegram->sendmessage($username);
				
			default:
				$db->set_state(START);
				break;
		}



			
