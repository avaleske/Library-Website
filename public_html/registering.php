<?php        
    ini_set('display_errors', 'On');
    require_once 'db.php';
    require_once 'access_control.php';
	require_once 'common.php';
	require_once 'menu.php';
	require_once 'register.php';
	$db = db_connect();
	if (isset($_POST['submitok']) && strcmp($_POST['submitok'], "OK") == 0){
		if(strcmp($_POST['newname'], "") != 0 && strcmp($_POST['password'], "") && strcmp($_POST['password2'], "") != 0 && strcmp($_POST['newemail'], "") != 0 && strcmp($_POST['line_1'], "") != 0 && strcmp($_POST['city'], "") != 0 && strcmp($_POST['state'], "") != 0 && strcmp($_POST['zip'], "") != 0){
				if(strcmp($_POST['password'], $_POST['password2']) == 0){
					register_new($_POST['newname'], $_POST['password'], $_POST['newemail'], $_POST['phone'], $_POST['line_1'], $_POST['line_2'], $_POST['city'], $_POST['state'], $_POST['zip'], $db);	
				}
				else{
					alert("So basically, your passwords didn't match.");
				}
		} else{
			alert("What did the fine print say about filling out required fields?");
		}
		
	}
	build_header();
?>
	<div id="main" class="wrapper">
		<article>
 			<div><span class="title">New User Registration Form</span></div>
			<div class="content">
 			<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
				<table  class="login-label">
				
				<tr> <td>Userame</td>
					<td> <input name="newname" type="text" maxlength="100" size="25" /> <font color="orangered" size="+1"><tt><b>*</b></tt></font> </td> </tr>
				<tr> <td>Password</td>
					<td> <input name="password" type="password" maxlength="100" size="25" /> <font color="orangered" size="+1"><tt><b>*</b></tt></font> </td> </tr><tr> 
					<tr> <td>And Password Again</td>
					<td> <input name="password2" type="password" maxlength="100" size="25" /> <font color="orangered" size="+1"><tt><b>*</b></tt></font> </td> </tr><tr> 
					
					<td>E-Mail Address</td> 
					<td> <input name="newemail" type="text" maxlength="100" size="25" /> <font color="orangered" size="+1"><tt><b>*</b></tt></font> </td> </tr>
					<td>Phone Number</td> 
					<td> <input name="phone" type="text" maxlength="100" size="25" /> <font color="#CCCCCC" size="+1"><tt><b>*</b></tt></font> </td> </tr>
					<td>Address</td> 
					<td> <input name="line_1" type="text" maxlength="100" size="25" /> <font color="orangered" size="+1"><tt><b>*</b></tt></font> </td> </tr>
					<td>Address Line 2</td> 
					<td> <input name="line_2" type="text" maxlength="100" size="25" /> <font color="#CCCCCC" size="+1"><tt><b>*</b></tt></font> </td> </tr>
					<td>City</td> 
					<td> <input name="city" type="text" maxlength="100" size="25" /> <font color="orangered" size="+1"><tt><b>*</b></tt></font> </td> </tr>
					<td>State</td> 
					<td> <input name="state" type="text" maxlength="100" size="25" /> <font color="orangered" size="+1"><tt><b>*</b></tt></font> </td> </tr>
					<td>Zipcode</td> 
					<td> <input name="zip" type="text" maxlength="100" size="25" /> <font color="orangered" size="+1"><tt><b>*</b></tt></font> </td> </tr>
				<tr> <td colspan="2"> 
					
				<input type="submit" name="submitok" value="OK" /> </td> </tr>
				<tr><td colspan="2"><font color="orangered" size="+1"><tt><b>*</b></tt></font>indicates a required field</td></tr>							
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
