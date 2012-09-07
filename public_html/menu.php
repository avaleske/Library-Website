<?php
require_once 'common.php';
function build_header(){
echo "<!doctype html>
<!--[if lt IE 7]> <html class=\"no-js ie6 oldie\" lang=\"en\"> <![endif]-->
<!--[if IE 7]>    <html class=\"no-js ie7 oldie\" lang=\"en\"> <![endif]-->
<!--[if IE 8]>    <html class=\"no-js ie8 oldie\" lang=\"en\"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js\" lang=\"en\"> <!--<![endif]-->
<head>
	<meta charset=\"utf-8\">
	<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">

	<title></title>
	<meta name=\"description\" content=\"\">
	<meta name=\"author\" content=\"\">

	<meta name=\"viewport\" content=\"width=device-width,initial-scale=1\">

	<link rel=\"stylesheet\" href=\"css/style.css\">

	<script src=\"js/libs/modernizr-2.0.min.js\"></script>
	<script src=\"js/libs/respond.min.js\"></script>
</head>
<body>
	<div id=\"header-container\">
		<header class=\"wrapper\">
			<h1 id=\"title\">Awesome Library of Awesomeness</h1>";

	echo "<nav><ul><li><a href=\"index.php\">Home</a></li>
					<li><a href=\"search.php\">Catalog</a></li>";
if(isset($_SESSION['uid'])){ 
    echo "<li><a href=\"profile.php\">Profile</a></li>";
	echo "<li><a href=\"request.php\">Request Books</a></li>";
	if(is_admin($_SESSION['uid'])){
		echo"<li><a href=\"admin.php\">Admin</a></li>";
	}
	echo "<li><a href=\"logout.php\">Logout</a></li></ul></nav></header></div>";
}
else{
	echo "<li><a href=\"registering.php\">Register</a></li>";
    echo "<li><a href=\"login.php\">Login</a></li></ul></nav></header></div>";
}
echo "<div class=\"wrapper\">";
	if(isset($_POST['alerts'])){
		foreach($_POST['alerts'] as $alert){
			echo $alert['good'] ? "<div id=\"alert-container-good\">" : "<div id=\"alert-container-bad\">";
			echo $alert['text']."</div>";
		}
		unset($_POST['alerts']);
	}
echo "</div>";
}
?>