<?php
	function run_search($search_terms, $mysql_handle)
	{		
		return build_results("SELECT bid, title, genre, author, isbn, uid FROM `Books` WHERE title LIKE '%$search_terms%'  ORDER BY title", $mysql_handle);
	}
	
	function view_all($mysql_handle){
		return build_results("SELECT bid, title, genre, author, isbn, uid FROM `Books` ORDER BY title", $mysql_handle);	
	}
	
	function build_results($search_sql, $mysql_handle, $admin_mode = FALSE){
		$result = mysql_query($search_sql,$mysql_handle);
		$odd = True;
		$html_out = "<table class=\"results\">";
		
		if(mysql_num_rows($result) == 0){
			$html_out .= "So we couldn't find anything that matched your search.<br />Try just one word from the title.";
		}else{
			$html_out .= "<tr><th>Title</th><th>Author</th><th>Genre</th><th>ISBN</th>";
			$html_out .= $admin_mode ? "<th>Admin Tools</th>" : "<th>Status</th>";
			$html_out .= "</tr>";
			while($row=mysql_fetch_array($result)){
				$html_out .= $odd ? "<tr class=\"even\">" : "<tr class=\"odd\">";	
				$html_out .= "<td><a href=\"book.php?bid=$row[bid]\"> $row[title]</a> </td><td> $row[author] </td><td> $row[genre] </td><td> $row[isbn] </td>";
				if($admin_mode){
					$html_out .= "<td>".get_book_admin_buttons($row['uid'],$row['bid'])."</td></tr>\n";
				}else{
					$html_out .= "<td>".get_list_checkout_button($row['uid'],$row['bid'])."</td></tr>\n";
				}
				$odd = !$odd;	
			}
		}
		$html_out .= "</table>";
		return $html_out;
	}
	
	function get_book_admin_buttons($uid, $bid){
		$out = "<span>";
		$out .= "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\"><input type=\"hidden\" value=\"$bid\" name=\"bid\"><input type=\"submit\" value=\"Delete\" name=\"book-submit\">";
		$out .= "<input type=\"submit\" value=\"Mark Returned\" name=\"book-submit\"";
		$out .= ($uid == NULL) ? "disabled=\"disabled\"" : "";
		$out .= "></form></span>";
		return $out;
	}
	
	function get_list_checkout_button($uid, $bid){
		$out = "<span >";
		if($uid == NULL){
			return $out."<form action=\"$_SERVER[PHP_SELF]\" method=\"post\"><input type=\"hidden\" value=\"$bid\" name=\"bid\"><input type=\"submit\" value=\"Checkout\" name=\"submit\"></form></span>";
		}
		else if (isset($_SESSION['uid']) && $uid == $_SESSION['uid']){
			return $out."You've checked this out.</span>";
		}
		else{
			return $out."Unavailable</span>";
		}
	}
	function run_author_search($author_search_terms, $mysql_handle)
	{		
		return build_results("SELECT bid, title, genre, author, isbn, uid FROM `Books` WHERE author LIKE '%$author_search_terms%' ORDER BY title", $mysql_handle);
	}
	function run_isbn_search($isbn_search_terms, $mysql_handle)
	{		
		return build_results("SELECT bid, title, genre, author, isbn, uid FROM `Books` WHERE isbn LIKE '%$isbn_search_terms%'  ORDER BY title", $mysql_handle);
	}
	function run_genre_search($genre_search_terms, $mysql_handle)
	{		
		return build_results("SELECT bid, title, genre, author, isbn, uid FROM `Books` WHERE genre LIKE '%$genre_search_terms%'  ORDER BY title", $mysql_handle);
	}
	function run_key_search($key_search_terms, $mysql_handle)
	{		
		return build_results("SELECT bid, title, genre, author, isbn, uid FROM `Books` WHERE keywords LIKE '%$key_search_terms%'  ORDER BY title", $mysql_handle);
	}
	function run_dewey_search($dewey_search_terms, $mysql_handle)
	{		
		return build_results("SELECT bid, title, genre, author, isbn, uid FROM `Books` WHERE dewey_decimal LIKE '%$dewey_search_terms%'  ORDER BY title", $mysql_handle);
	}
?>
