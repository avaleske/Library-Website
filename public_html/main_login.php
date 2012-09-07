<?php
        session_start();
        ini_set('display_errors', 'On');
        require_once 'access_control.php';
 ?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title></title>
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="viewport" content="width=device-width,initial-scale=1">

        <link rel="stylesheet" href="css/style.css">

        <script src="js/libs/modernizr-2.0.min.js"></script>
        <script src="js/libs/respond.min.js"></script>
</head>


<table width="300" border="0" align="center" cellpadding="0" 
cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="checklogin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" 
bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Member Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="text" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<body>
        <div id="header-container">
                <header class="wrapper">
                        <h1 id="title">Awesome Library of Awesomness</h1>
                        <nav>
                                <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="search.php">Search</a></li>
                                        <li><a href="profile.php">Profile</a></li>
                                        <li><a href="admin.php">Admin</a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                </ul>
                        </nav>
                </header>
        </div>
        <div id="main" class="wrapper">
                <article>
                        <h3>Login</h3>
                        <form action="login.php" method="post">
                                Username:<br /><input type="text" name="username" /><br>
								 Password:<br /><input 
type="password" name="pwd" /><br />
                                <input type="submit" value="Go">
                        </form>
                        <?php
                                echo $_SESSION['username'];
                                echo $_POST['pwd'];
                        ?>
                </article>   
        </div>
        <div id="footer-container">
                <footer class="wrapper">
                        <h3>A nice footer</h3>
                </footer>
        </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script 
src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>
                
<script src="js/script.js"></script>
<script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your 
site's$
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
