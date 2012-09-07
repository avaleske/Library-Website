<?php
	function build_book_div($bid, $mysql_handle)
	{	
		$book_sql = "SELECT bid, title, genre, author, isbn, uid FROM Books WHERE bid = $bid";
		$result=mysql_query($book_sql,$mysql_handle);
		$book = mysql_fetch_array($result);
		
		$tr = "<tr class=\"label\">";
		$tr_c = "<tr class=\"info\">";
		$close = "</tr>\n";
		
		if(mysql_num_rows($result) == 0){
			$html_out = "<div><span class=\"title\">The book could not be found.</span></div>";
		}
		else{
			$html_out = "<div><span class=\"title\">$book[title]</span>".get_checkout_button($book['uid'], $book['bid'])."</div>";
			$html_out .= "<div class=\"content\"><div class=\"cover\"><img src=\"img/covers/$book[bid].png\"></div>\n<div><table class=\"book\">";
			$html_out .= "$tr<td>Author</td>$close";
	 	        $html_out .= "$tr_c<td>$book[author] </td>$close";
			$html_out .= "$tr<td>Genre</td>$close";
                $html_out .= "$tr_c<td>$book[genre] </td>$close";
			$html_out .= "$tr<td>ISBN</td>$close";
                $html_out .= "$tr_c<td>$book[isbn] </td>$close";
			$html_out .= "</table></div></div>";
			$html_out .= build_add_review_div($bid);
		}
		return $html_out;
	}
	
	function submit_review($uid, $bid, $db){
		#$sql = "INSERT INTO Reviews (rid, review_title, text, star_rating, bid, uid VALUES (NULL, '$_POST[title]', '$_POST[review_text]', '$_POST[rating]', '$bid', '$uid')";
		$sql = "INSERT INTO `Reviews` (
				`rid` ,
				`review_title` ,
				`text` ,
				`star_rating` ,
				`r_date` ,
				`bid` ,
				`uid`)
				VALUES (
				NULL , '$_POST[title]', '$_POST[review_text]', '$_POST[rating]', '', '$bid', '$uid'
				)";

		$result = mysql_query($sql,$db);
		if($result != TRUE){
			alert("The review failed to submit.");
		}else{
			alert("Thanks for the review!", TRUE);
		}
	}
	
	function get_checkout_button($uid, $bid){
		$out = "<span class=\"checkout_wrapper\">Status: ";
		if($uid == NULL){
			return $out."<form action=\"book.php?bid=$bid\" method=\"post\"><input type=\"hidden\" value=\"$bid\" name=\"bid\"><input type=\"submit\" value=\"Checkout\" name=\"submit\"></form></span>";
		}
		else if (isset($_SESSION['uid']) && $uid == $_SESSION['uid']){
			return $out."You've checked this out.</span>";
		}
		else{
			return $out."Unavailable</span>";
		}
	}
	
	function checkout_book($uid, $bid, $mysql_handle){
		$query = "UPDATE Books SET uid = '$uid' WHERE Books.bid = $bid";
		$result = mysql_query($query);
		if($result == FALSE){
			alert("An error occured while checking out your book.");
		}else{
			alert("You've checked out the book.", TRUE);
		}
	}
	
	function build_add_review_div($bid){
		$html_out = "<h3>Write a Review</h3>
				<form action=\"book.php?bid=$bid\" method=\"post\">
					Rating<br />1:
					<input type=\"radio\" name=\"rating\" value=\"1\" />
					2:<input type=\"radio\" name=\"rating\" value=\"2\"/>
					3:<input type=\"radio\" name=\"rating\" value=\"3\"/>
					4:<input type=\"radio\" name=\"rating\" value=\"4\"/>
					5:<input type=\"radio\" name=\"rating\" value=\"5\"/>
					<br />
					Review Title<br /><input type=\"text\" name=\"title\"/>
					<br />
					Review Text<br /><textarea name=\"review_text\" rows=\"10\" cols=\"100\"></textarea>
					<br />
					<input type=\"hidden\" name=\"bid\" value=\"$bid\">
					<input type=\"submit\" value=\"Submit\" name=\"submit\">
				</form>";
				return $html_out;
	}
	
	function build_reviews($bid, $mysql_handle){
		$query = "SELECT * FROM Reviews WHERE bid = $bid";
		$result = mysql_query($query, $mysql_handle);
		
		$html = "";
		while($review=mysql_fetch_array($result)){
			$html .= build_review_div($review, FALSE)."\n";
		}
		return $html;
	}
	
	function build_review_div($review, $with_book_title, $admin_mode = FALSE){
		$html_out = "<div>";
		$html_out .= $admin_mode ? get_review_admin_buttons($review['rid']) : "";
		$html_out .= "<span class=\"review_title\">$review[review_title]";
		$html_out .= $with_book_title ? " for $review[title]" : "";
		$html_out .= "</span>";
		$html_out .= $admin_mode ? " by ".$review['username'] : "";
		$html_out .= "<span class =\"rating\">Rated a $review[star_rating] of 5</span>";
		$html_out .= "</div><div class=\"review_content\">$review[text]</div>";
		return $html_out;
	}
	
	function get_review_admin_buttons($rid){
		$out = "<span>";
		$out .= "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\"><input type=\"hidden\" value=\"$rid\" name=\"rid\"><input type=\"submit\" value=\"Delete\" name=\"review-submit\"></form></span>";
		return $out;
	}
?>
