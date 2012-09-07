<?php
	session_start();
	ini_set('display_errors', 'On');
	require_once 'search_behind.php';
	require_once 'book_behind.php';
	require_once 'db.php';
	require_once 'common.php';
	require_once 'menu.php';
	$db = db_connect();
	
	if(isset($_POST['submit']) && strcmp($_POST['submit'], "Checkout") == 0){
		if(!isset($_SESSION['uid'])){
			alert("This is awkward, but you have to be logged in to do that...");
		}
		else {
			checkout_book($_SESSION['uid'], $_POST['bid'], $db);
		}
	}

	build_header();
 ?>
	<div id="main" class="wrapper">
		<aside>
			<h3>Change Search</h3>
			<br>
			 Search by Author
			 <br>
				<form action="search.php" method="post">
					<input type="text" name="author_search_terms" />
					<input type="submit" value="Search" name="author_submit">
				</form>
				<br>
			Search by ISBN
			<br>
				<form action="search.php" method="post">
					<input type="text" name="isbn_search_terms" />
					<input type="submit" value="Search" name="isbn_submit">
				</form>
				Search by Genre
			<br>
				<form action="search.php" method="post">
					<input type="text" name="genre_search_terms" />
					<input type="submit" value="Search" name="genre_submit">
				</form>
				Search by Keywords
			<br>
				<form action="search.php" method="post">
					<input type="text" name="key_search_terms" />
					<input type="submit" value="Search" name="key_submit">
				</form>
				Search by Dewey Decimal
			<br>
				<form action="search.php" method="post">
					<input type="text" name="dewey_search_terms" />
					<input type="submit" value="Search" name="dewey_submit">
				</form>
		</aside>
		<article>
			<header>
				<h2>Search by Title</h2>
				<form action="search.php" method="post">
					<input type="text" name="search_terms" />
					<input type="submit" value="Search" name="submit">
				</form>
				<br />
				<form action="search.php" method="post">
					<input type="submit" value="View All" name="submit">
				</form>
			</header>
			<h3>Results</h3>
			<?php
				$db = db_connect();
				if(isset($_POST['submit']) && strcmp($_POST['submit'], "View All") == 0){
					echo view_all($db);
				}else{
						if (isset($_POST['submit']) && strcmp($_POST['submit'], "Search") == 0){
					echo (empty($_POST['search_terms'])) ? 'It\'d help if you entered a search term.' : run_search($_POST['search_terms'], $db);
				} 
						if (isset($_POST['author_submit']) && strcmp($_POST['author_submit'], "Search") == 0){
					echo (empty($_POST['author_search_terms'])) ? 'You didn\'t enter a search term!' : run_author_search($_POST['author_search_terms'], $db); }
						if (isset($_POST['genre_submit']) && strcmp($_POST['genre_submit'], "Search") == 0){
					echo (empty($_POST['genre_search_terms'])) ? 'You didn\'t enter a search term!' : run_genre_search($_POST['genre_search_terms'], $db); }
						if (isset($_POST['isbn_submit']) && strcmp($_POST['isbn_submit'], "Search") == 0){
					echo (empty($_POST['isbn_search_terms'])) ? 'You didn\'t enter a search term!' : run_isbn_search($_POST['isbn_search_terms'], $db); }
						if (isset($_POST['dewey_submit']) && strcmp($_POST['dewey_submit'], "Search") == 0){
					echo (empty($_POST['dewey_search_terms'])) ? 'You didn\'t enter a search term!' : run_dewey_search($_POST['dewey_search_terms'], $db); }
						if (isset($_POST['key_submit']) && strcmp($_POST['key_submit'], "Search") == 0){
					echo (empty($_POST['key_search_terms'])) ? 'You didn\'t enter a search term!' : run_key_search($_POST['key_search_terms'], $db); }
					}
			?>
		</article>
	</div>
	<br><br><br><br><br><br><br><br><br>
	<div id="footer-container">
		<footer class="wrapper">
			<h3>Site by Katherine Maack and Austin Valeske</h3>
		</footer>
	</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>

<script src="js/script.js"></script>
<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

</body>
</html>
