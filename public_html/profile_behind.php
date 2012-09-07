<?php
    require_once("book_behind.php");
	require_once("search_behind.php");
	
	function build_checked_out_list($uid, $db){
		if($uid == NULL){
			return "";
		}
		$sql = "SELECT bid, title, genre, author, isbn, uid FROM `Books`WHERE uid = '$uid' ORDER BY title";
		return build_results($sql, $db);
	}
	
	function build_review_list($uid, $db){
		if($uid == NULL){
			return "";
		}
		$sql = "SELECT R.review_title, R.text, R.star_rating, B.title FROM Reviews R JOIN Books B ON R.bid = B.bid WHERE R.uid = $uid ORDER BY B.title";
		$result = mysql_query($sql, $db);
	
		$html = "";
		if(mysql_num_rows($result) != 0){
			while($review=mysql_fetch_array($result)){
				$html .= build_review_div($review, TRUE)."\n";
			}
		} else {
			$html .= "You have not reviewed any books.";
		}
		return $html;
	}
	
	function build_info_div($uid, $db){
		if($uid == NULL){
			return "";
		}
		$sql = "SELECT * FROM Users U JOIN Address A ON U.aid = A.aid WHERE uid = $uid";
		$result=mysql_query($sql,$db);
		$user = mysql_fetch_array($result);
		
		$tr = "<tr class=\"label\">";
		$tr_c = "<tr class=\"info\">";
		$close = "</tr>\n";
		
		if(mysql_num_rows($result) == 0){
			$html_out = "<div><span class=\"title\">The user info could not be found.</span></div>";
		}
		else{
			$html_out = "<div><span class=\"title\">Your Profile</span></div>";
			$html_out .= "<div class=\"content\"><table class=\"book\">";
			$html_out .= "$tr<td>Username</td><td>Phone</td>$close";
	 	        $html_out .= "$tr_c<td>$user[username] </td><td>$user[phone] </td>$close";
			$html_out .= "$tr<td>Update Password</td><td>Address</td>$close";
                $html_out .= "$tr_c<td>".get_password_form()."</td><td colspan='2'>".get_address($user)."</td>$close";
			$html_out .= "$tr<td>Email</td>$close";
                $html_out .= "$tr_c<td>$user[email] </td>$close";
                $html_out .= "$tr_c<td> </td>$close";
			$html_out .= "</table></div>";
		}
		return $html_out;
	}

	function get_address($user){
		$html = "<table><tr class='address'><td colspan='2'>$user[line_1]</td></tr>\n";
		$html .= strcmp($user['line_2'], "") ? "" : "<tr class='address'><td colspan='2'>$user[line_2]</td></tr>\n";
		$html .= "<tr class='address'><td colspan='2'>$user[city]</td></tr>\n
			<tr class='address'><td>$user[state]</td><td>$user[zip]</td></tr></table>";
		return $html;
	}
	
	function get_password_form(){
		$html = "<form method=\"post\" action=\"$_SERVER[PHP_SELF]\">";
		$html .= "Password:<br /><input type=\"password\" name=\"pass1\" /><br />";
		$html .= "And again:<br /><input type=\"password\" name=\"pass2\" /><br />";
		$html .= "<input type=\"submit\" value=\"Update\" name=\"submit_pass\"></form>";
		return $html;
	}
	
	function validate_password($pass1, $pass2, $uid, $db){
		if(strcmp($pass1, $pass2) == 0){
			$sql = "UPDATE `Users` SET `password` = '$pass1' WHERE `Users`.`uid` = $uid";
			$result = mysql_query($sql, $db);
			if($result){
				alert("Your password was successfully updated!", TRUE);
			}
			else {
				alert("Um, the password update failed... Sorry!");
			}
		}
		else {
			alert("So basically, your passwords don't match.");
		}
	}
?>