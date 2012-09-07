<?php
	require_once 'db.php';
	function alert($text, $good = FALSE){
		$alert['text'] = $text;
		$alert['good'] = $good;
		$_POST['alerts'][] = $alert;
	}
	function is_admin($uid, $db = NULL){
		$db = ($db == NULL) ? db_connect() : $db;
		$query = "SELECT * FROM Users WHERE uid = '$uid' AND admin != 0";
		$result = mysql_query($query, $db);
		return (mysql_num_rows($result) == 1) ? TRUE : FALSE;
	}
?>
