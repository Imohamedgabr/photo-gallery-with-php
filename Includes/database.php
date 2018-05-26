<?php
	require_once('Database_config/config.php');

	class MySQLDatabase{

		private $connection;
		// put the connection in a consruct function
		function __construct(){
			$this->open_connection();
		}

		function open_connection(){
		 	$this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		 	if (mysqli_connect_errno()) {
		 		die("Database connection failed: " . 
		 			mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
		 	}
		 }
		 public function close_connection(){
		 	if (isset($this->connection)) {
		 		mysqli_close($this->connection);
		 		unset($this->connection);
		 	}
		 }

		 // function takes the query as argument
		 // and returns the result of the query 
		 public function query($sql){
		 	$result = mysqli_query($this->connection, $sql);
		 	// the foncirm query is down there 
		 	// it makes sure the query returns a result
		 	$this->confirm_query($result,$sql);

		 	return $result;
		 }

		private function confirm_query($result,$sql){
			if (!$result) {
				echo $sql;
		 		die("<br /> database query failed");
		 	}
		}

		// we make it public to call it from outside the class
		public function escape_value($string){
			// it puts a back slash infront of every '' Abostrphy
			$escapred_string = mysqli_real_escape_string($this->connection, $string);
			return $escapred_string;
		}

		// * database neutral * function
		public function fetch_array($result_set){
			return mysqli_fetch_array($result_set);
		}

		public function num_rows($result_set){
			return mysqli_num_rows($result_set);
		}

		public function insert_id(){
			return mysqli_insert_id($this->connection);
		}
		public function affected_rows(){
			return mysqli_affected_rows($this->connection);
		}

	}

	// creating this instance will automatically run the construction
	// so no need for this step down here
	$database = new MySQLDatabase();
	// $database->open_connection();
	// this $database variable will be availabe in any page if we include this file in it
	// we can assign it as a reference by this name 
	$db =& $database;

?>