<?php 

	function request_new($title, $author, $isbn, $mysql_handle){
		//$date = date(DATE_ISO8601);
		 $uid = ($_SESSION['uid']);
		 $sql = "INSERT INTO `Requested` (isbn, title, author, uid) VALUES 
		 ('$isbn', '$title', '$author', '$uid')";
		 //$sql = "INSERT INTO Requested (`rbid` ,`isbn` ,`title` ,`author` ,`uid` ,`date_requested`)VALUES (NULL , 'afasdfd', 'asfds', 'asdfdas', '2', NULL)";
		$result = mysql_query($sql, $mysql_handle);
		if(!$result) {
			alert("The requested book could not be submitted.");
		}
		else{
			alert("Thanks for the request!", TRUE);
		}
	}
?>