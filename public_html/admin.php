<?php
	session_start();
    ini_set('display_errors', 'On');
	require_once 'common.php';
	require_once 'db.php';
	require_once 'admin_behind.php';
	require_once 'menu.php';
	
	$db = db_connect();
	$uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : "-1";
	if(!is_admin($uid)){
		alert("You must be an administrator to view this page.");
	}
	if(isset($_POST['book-submit'])){
		handle_book_submit($_POST['bid'], $db);
	}
	elseif(isset($_POST['user-submit'])){
		handle_user_submit($_POST['uid_to_delete'], $db);
	}
	elseif(isset($_POST['review-submit'])){
		handle_review_submit($_POST['rid'], $db);
	}
	elseif(isset($_POST['requested-submit'])){
		handle_requested_submit($_POST['rbid_to_delete'], $db);
	}
	
	
	build_header();
?>
	<div id="main" class="wrapper">
		<article>
			<?php echo generate_admin($uid,$db) ?>
		</article>
	</div>
	<div id="footer-container">
		<footer class="wrapper">
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
