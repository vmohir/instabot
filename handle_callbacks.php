<?php 

function run_callback_queries($id, $from, $message, $data) {
	global $telegram;
	$data = json_decode($data, true);
	$callback_class = $data['f'] . '_callback';

	if (class_exists($callback_class)) {
		// run the callback
		$callback = new $callback_class();
		$answer_data = $callback->run($id, $from, $message, $data);
		
		// send answer to callback query
		$answer_data['callback_query_id'] = $id;
		$telegram->answerCallbackQuery($answer_data);
	}
}

require "./callbackqueries/base_callback.php";
foreach (glob("./callbackqueries/callback_*.php") as $filename) {
    require ($filename);
}
