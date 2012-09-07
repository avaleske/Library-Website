<?php
	function db_connect(){
		$dbhost = '<dbhost>';
		$dbname = '<dbname>';
		$dbuser = '<username>';
		$dbpass = '<password>';
		$mysql_handle = mysql_connect($dbhost, $dbuser, $dbpass)
			or die("Error connecting to database server");
		mysql_select_db($dbname, $mysql_handle)
			or die("Error selecting database: $dbname");
		#echo 'Successfully connected to database!';
		return $mysql_handle;
	}
?>
