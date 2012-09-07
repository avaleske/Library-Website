<?php 

	function register_new($loginid, $password, $email, $phone, $line_1, $line_2, $city, $state, $zip, $mysql_handle){
	
		$sql="INSERT INTO `Address` (`aid`, `line_1`, `line_2`, `city`, `state`, `zip`) VALUES 
		(NULL, '$line_1', '$line_2', '$city', '$state', '$zip')";
		$result = mysql_query($sql, $mysql_handle);
		if($result == FALSE){
			alert("A database error occured, sorry!");
		}
		else{
			$id = mysql_insert_id($mysql_handle);
			$sql2="INSERT INTO `Users` (`uid`, `username`, `password`, `email`, `phone`, `aid`) VALUES
			(NULL,'$loginid','$password','$email','$phone', $id)";
			$result = mysql_query($sql2, $mysql_handle);
			if($result == FALSE){
				alert("A database error occured, sorry!");
			}
			else{
				alert("The user $loginid has been added. Welcome!", TRUE);
				$_SESSION['username'] = $loginid;
				$_SESSION['pwd'] = $password;
				$search_sql = "SELECT * FROM Users WHERE username = '$loginid' AND password = '$password'";
    			$result = mysql_query($search_sql,$mysql_handle);		
				if (!$result) { alert("Um.. A database error occured. Sorry!"); }
				else{
					$row = mysql_fetch_array($result);
					$_SESSION['uid'] = $row['uid'];
					alert("Successful login!", TRUE);
				}	
			}
		}
	}

?>
<!-- <html>
<body>
<head>
<meta HTTP-EQUIV="REFRESH" content="0; url="http://web.engr.orst.edu/~valeskea/register.html">
</head></body></html> -->

