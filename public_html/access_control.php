<?php
	session_start();
	require_once 'db.php';
	require_once 'common.php';
	#$username = isset($_POST['username']) ? $_POST['username'] : $_SESSION['username'];
	#$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_SESSION['pwd'];
	if(isset($_POST['username'])){
		$username = isset($_POST['username']) ? $_POST['username'] : NULL;
		$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : NULL;

		$_SESSION['username'] = $username;
		$_SESSION['pwd'] = $pwd;

		$mysql_handle = db_connect();
		$search_sql = "SELECT * FROM Users WHERE username = '$username' AND password = '$pwd'";
    	$result = mysql_query($search_sql,$mysql_handle);		
		if (!$result) { alert("Um.. A database error occured. Sorry!"); }
		
		if (mysql_num_rows($result) == 0) {
			alert("That user you specified? They don't exist. Try again.");
			unset($_SESSION['username']);
			unset($_SESSION['pwd']);
		}
		else{
			$row = mysql_fetch_array($result);
			$_SESSION['uid'] = $row['uid'];
			alert("Successful login!", TRUE);
		}
	}
?>
