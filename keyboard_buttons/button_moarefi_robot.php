<?php 

class contact_button extends base_button {
	public $name = 'contact';
	public $button_label = 'تماس با ما';
	public $permission = 'USER';

	function run($chat_id, $text, $message, $state) {
		$contact_command = new contact_command();
		$contact_command->run($chat_id, $text, $message, $state);
	}
}