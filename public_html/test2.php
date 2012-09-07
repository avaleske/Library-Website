<?php
   	session_start();
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	require_once 'menu.php';
	require_once 'db.php';
	$db = db_connect();
 ?>
 <div id="main" class="wrapper">
		<aside>
			<h3>Featured Novel</h3>
<img src='http://img52.imageshack.us/img52/2742/200pxhungergames.jpg' border='0'/></a>
<h3>The Hunger Games</h3>
In a future North America,
where the rulers of Panem
maintain control through an
annual televised survival
competition pitting young
people from each of the twelve
districts against one another,
sixteen-year-old Katniss's
skills are put to the test
when she voluntarily takes
her younger sister's place.
		</aside>
		<article>
			<header>
				<h2>About the Site</h2>
				<p>

Click "Search" to find out if what you're looking for is 
available in our library catalog, be it a specific novel, author, genre, etc. 
<br><br>
If you need to return to this page, simply click "Home."
<br><br>
If you have created a profile already and logged in, you can view your information in 
"Profile."
<br><br>
Press "Logout" to logout of your profile.
<br><br>
If you search for a specific book that you would like to borrow and cannot find it in our 
database, 
request the written work and we may have it available in the near future.
</p>
			</header>
			<h3>For Grading Purposes</h3>
				<p>
Database information located at Austin Valeske's db.
<br>

</p>	
			<h3>Third header</h3>
				<p><img 
src="http://25.media.tumblr.com/tumblr_lspot2oHUs1qa87q8o1_500.png"></p>
			<footer>
			<h3>Helpful links</h3>
				<p>
<a href="https://secure.engr.oregonstate.edu:8000/teach.php?type=want_auth">TEACH</a>
<br>
<a href="http://www.ci.oswego.or.us/library/policy/documents/IntellectualFreedom.pdf">Policy on
Intellectual Freedom</a>
<br>
</p>
			</footer>
		</article>
	</div>
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