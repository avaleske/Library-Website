<?php        
    ini_set('display_errors', 'On');
    require_once 'db.php';
    require_once 'access_control.php';
	require_once 'common.php';
	require_once 'menu.php';
	require_once 'request_behind.php';
	$db = db_connect();
	if (isset($_POST['submitok']) && strcmp($_POST['submitok'], "OK") == 0){
		if(strcmp($_POST['title'], "") != 0 && strcmp($_POST['author'], "") != 0 && strcmp($_POST['isbn'], "") != 0){		
			request_new($_POST['title'], $_POST['author'], $_POST['isbn'], $db);
		}else{
			alert("Please fill out all required fields.");
		}
	}
	build_header();
?>
	<div id="main" class="wrapper">
		<article>
 			<div><span class="title">Request A Book</span></div>
			<div class="content">
 			<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
				<table  class="login-label">
				
				<tr> <td>Title</td>
					<td> <input name="title" type="text" maxlength="100" size="25" /> <font color="orangered" size="+1"><tt><b>*</b></tt></font> </td> </tr>
				<tr> <td>Author</td>
					<td> <input name="author" type="text" maxlength="100" size="25" /> <font color="orangered" size="+1"><tt><b>*</b></tt></font> </td> </tr><tr> 
					<td>ISBN</td> 
					<td> <input name="isbn" type="text" maxlength="100" size="25" /> <font color="orangered" size="+1"><tt><b>*</b></tt></font> </td> </tr>
				<tr> <td colspan="2"> 
					<input type="reset" value="Reset Form" />
				<input type="submit" name="submitok" value="OK" /> </td> </tr>
				<tr><td colspan="2"><font color="orangered" size="+1"><tt><b>*</b></tt></font>indicates a required field</td></tr>
	<?php
	?>
				
				
				</table> </form>
			</div>
		</article>
	</div>
        <div id="footer-container">
                <footer class="wrapper">
                        <h3>Site by Katherine Maack and Austin Valeske</h3>
                </footer>
        </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script 
src="js/libs/jquery-1.6.2.min.js"><\/script>')</scrip$

<script src="js/script.js"></script>
<script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be 
your si$
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
                        
<!--[if lt IE 7 ]>
        <script 
src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->
                        
</body>
</html>