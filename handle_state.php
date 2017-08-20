<?php 

//--------------------- Enum of STATEs ---------------------------

//STATEs should be revised
define("IDLE", 0);
define("CONTACT", 1);
define("CONTACT_ADMIN_ANSWER", 2);
define("START", 3);
define("LASTNAME", 4);
// get chat state from database
function get_chat_state($text, $username, $fullname) {
	global $db;
	$state = IDLE; // no state

	if ($db->user_is_new()) {
		$db->insert(0, $text, $username, $fullname);
	} else {
		$state = $db->get_state();
		$db->set_last_message($text);
		$db->set_username($username);
		$db->set_fullname($fullname);
	}
	return $state;
}
function handle_state($state, $chat_id, $text, $message_id, $message) {
	$func = $class = '';
	switch ($state) {
		case CONTACT:
		case CONTACT_ADMIN_ANSWER:
			$class = 'contact_command';
			break;
		case START:
		case LASTNAME:
			$class = 'start_command';
			break;
		case IDLE:
		default:
			return false;
	}
	if (class_exists($class)) {
		$command = new $class();
		$command->run($chat_id, $text, $message_id, $message, $state);
	} else if ($func !== '') {
		$func($chat_id, $text, $message_id, $message, $state);
	}

	return true;
}
function add_admin($admin_chat_id) {
	global $db;
	$db->set_permission(ADMIN, $admin_chat_id);
}
