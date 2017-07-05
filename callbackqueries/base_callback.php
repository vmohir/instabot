<?php

class base_callback {
	public $name;

	function __construct() {
	}
	function run($id, $from, $message, $data) {
		return false;
	}
}
