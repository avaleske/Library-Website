<?php
	require_once 'search_behind.php';
	require_once 'book_behind.php';
	
	function handle_book_submit($bid, $db){
		if(strcmp($_POST['book-submit'], "Delete") == 0){
			$sql = "DELETE FROM `Books` WHERE `bid` = '$bid'";
			$result = mysql_query($sql, $db);
			if($result == FALSE){
				alert("Sorry, but the book was not deleted.");
			}
		}
		elseif(strcmp($_POST['book-submit'], "Mark Returned") == 0){
			$query = "UPDATE Books SET uid = NULL WHERE Books.bid = $bid";
			$result = mysql_query($query);
			if($result == FALSE){
				alert("An error occured while marking the book returned.");
			}
		}
	}
	
	function handle_user_submit($uid, $db){
		if(strcmp($_POST['user-submit'], "Delete") == 0){
			$sql = "DELETE FROM `Users` WHERE `uid` = '$uid'";
			$result = mysql_query($sql, $db);
			if($result == FALSE){
				alert("Sorry, but the user was not deleted.");
			}
		}
	}
	
	function handle_review_submit($rid, $db){
		if(strcmp($_POST['review-submit'], "Delete") == 0){
			$sql = "DELETE FROM `Reviews` WHERE `rid` = '$rid'";
			$result = mysql_query($sql, $db);
			if($result == FALSE){
				alert("Sorry, but the review was not deleted.");
			}
		}
	}
	
	function handle_requested_submit($rbid, $db){
		if(strcmp($_POST['requested-submit'], "Delete") == 0){
			$sql = "DELETE FROM `Requested` WHERE `rbid` = '$rbid'";
			$result = mysql_query($sql, $db);
			if($result == FALSE){
				alert("Sorry, but the requested book was not deleted.");
			}
		}
	}
	
   function generate_admin($uid,$db){
		if($uid == -1 || !is_admin($uid)){
			return "<div><span class=\"title\">You need to be an admin to view this page.</span></div>";
		}
		else{
			return build_user_list($db).build_book_list($db).build_requested_list($db).build_review_list($db);
		}
   }
   
   function build_user_list($db){
   		$sql = "SELECT uid, username, email, phone, admin FROM `Users` ORDER BY uid";
		$result = mysql_query($sql,$db);
		$odd = True;
		$html_out = "<h3>Users</h3><table class=\"results\">";
		
		$html_out .= "<tr><th>Uid</th><th>Username</th><th>Email</th><th>Phone</th><th>Admin</th><th>Admin Tools</th></tr>";
		while($row=mysql_fetch_array($result)){
			$html_out .= $odd ? "<tr class=\"even\">" : "<tr class=\"odd\">";	
			$html_out .= "<td>$row[uid]</td><td> $row[username] </td><td> $row[email] </td><td> $row[phone] </td>";
			$html_out .= "<td>".($row['admin'] ? "Yes" : "No")."</td>";
			$html_out .= "<td>".get_user_admin_buttons($row['uid'])."</td></tr>\n";
			$odd = !$odd;	
		}
		$html_out .= "</table>";
		return $html_out;
   }
   
   function build_book_list($db){
		return "<h3>Books</h3>".build_results("SELECT bid, title, genre, author, isbn, uid FROM `Books` ORDER BY title", $db, TRUE);	
   }
   
   function build_requested_list($db){
   		$html_out = "<h3>Requested Books</h3>";
   		$sql = "SELECT R.rbid, R.title, R.author, R.isbn, U.username FROM Requested R JOIN Users U ON R.uid = U.uid ORDER BY title";	
		$result = mysql_query($sql,$db);
		$odd = True;
		$html_out .= "<table class=\"results\">";
		
		if(mysql_num_rows($result) == 0){
			$html_out .= "There are no requested books";
		}else{
			$html_out .= "<tr><th>Title</th><th>Author</th><th>ISBN</th><th>Requested By</th><th>Admin Tools</th></tr>";
			while($row=mysql_fetch_array($result)){
				$html_out .= $odd ? "<tr class=\"even\">" : "<tr class=\"odd\">";	
				$html_out .= "<td>$row[title]</td><td> $row[author] </td><td> $row[isbn] </td><td> $row[username] </td>";
				$html_out .= "<td>".get_requested_admin_buttons($row['rbid'])."</td></tr>\n";
				$odd = !$odd;	
			}
		}
		$html_out .= "</table>";
		return $html_out;
	}
   
   function build_review_list($db){
	$sql = "SELECT R.review_title, R.text, R.star_rating, B.title, R.rid, U.username FROM Reviews R JOIN Books B ON R.bid = B.bid JOIN Users U ON R.uid = U.uid ORDER BY B.title";
	$result = mysql_query($sql, $db);

	$html = "<h3>Reviews</h3>";
	if(mysql_num_rows($result) != 0){
		while($review=mysql_fetch_array($result)){
			$html .= build_review_div($review, TRUE, TRUE)."\n";
		}
	} else {
		$html .= "There are not any book reviews.";
	}
	return $html;
   }
   
   	function get_user_admin_buttons($uid){
		$out = "<span>";
		$out .= "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\"><input type=\"hidden\" value=\"$uid\" name=\"uid_to_delete\"><input type=\"submit\" value=\"Delete\" name=\"user-submit\"></form></span>";
		return $out;
	}
	
	function get_requested_admin_buttons($rbid){
		$out = "<span>";
		$out .= "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\"><input type=\"hidden\" value=\"$rbid\" name=\"rbid_to_delete\"><input type=\"submit\" value=\"Delete\" name=\"requested-submit\"></form></span>";
		return $out;
	}
   
   
?>