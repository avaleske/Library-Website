<?php
    ini_set('display_errors', 'On');
	require_once 'access_control.php';
	require_once 'common.php';
	require_once 'menu.php';
	build_header();
 ?>
	<div id="main" class="wrapper">
		<article>
			<h3>Login</h3>
			<form action="login.php" method="post">
				Username:<br /><input type="text" name="username" /><br >
				Password:<br /><input type="password" name="pwd" /><br />
				<input type="submit" value="Go" name="submit">
			</form>
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
