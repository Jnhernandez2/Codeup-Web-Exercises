<?php

class Log
{
	public $filename;

	public $handle;

	public $date ;

	public $time;

	public function __construct($prefix = 'log') {

		$this->date = date('Y-m-d');
		$this->time = date('h:i:s');
		$this->filename = $prefix . '-' . $this->date . '.log';
		$this->handle = fopen($this->filename, 'a');
	}

	public function logMessage($logLevel, $message) {
	
	    fwrite($this->handle, $this->date . " " . $this->time . " " . $logLevel . $message . PHP_EOL);
		
	}

	public function info($message) {

		$this->logMessage('INFO: ', $message);
	}

	public function error($message) {

		$this->logMessage('ERROR: ', $message);
	}

	public function __destruct() {

		fclose($this->handle);
	}
}