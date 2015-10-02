<?php 

class Db {
	// The database connection
	protected static $connection;

	public function connect() {

		if(!isset(self::$connection)) {
			self::$connection = new mysqli('localhost',"root","","gotit");
		}

		if(self::$connection === false) {
			return false;
		}
		return self::$connection;
	}

	/**
	 * Query the database
	 */
	public function query($query) {
		// Connect to the database
		$connection = $this -> connect();
		$result = $connection -> query($query);
		return $result;
	}

	/**
	 * Fetch rows from the database (SELECT query)
	 */
	public function select($query) {
		$rows = array();
		$result = $this -> query($query);
		if($result === false) {
			return false;
		}
		while ($row = $result -> fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}

	/**
	 * Fetch the last error from the database
	 */
	public function error() {
		$connection = $this -> connect();
		return $connection -> error;
	}



}