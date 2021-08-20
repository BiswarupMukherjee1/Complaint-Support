<?php

	define("DB_SERVER", "localhost");
	define("DB_USER", "cms");
	define("DB_PASS", "cms");
	define("DB_NAME", "cms");
	//connecting databse
  function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect();
    return $connection;
  }
	//disconnecting databse
  function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }
 //to prevent sql injection
  function db_escape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
  }
	//to check error
  function confirm_db_connect() {
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }
  function confirm_result_set($result_set) {
    if (!$result_set) {
    	exit("Database query failed.");
    }
  }

?>
