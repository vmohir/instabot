<?php

<<<<<<< HEAD:commands/command_start.php
class start_command extends base_command{
=======
class first_command extends base_command {
>>>>>>> b8f0cdb0e52646eae6dba3fd22724892a563c119:commands/command.php
	public $name = 'start';
	public $description = '/start';
		
	function run($chat_id, $text, $message, $state) {
		global $telegram, $db, $username;
		sendmessage(get_username(get_chat_id()));
	}
}

			
