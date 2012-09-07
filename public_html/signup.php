<?php // signup.php include 'common.php'; include 'db.php';

if (!isset($_POST['submitok'])): // Display the user signup form ?> <!DOCTYPE html PUBLIC 
"-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> <head> <title>New User Registration</title>

<?php else: // Process signup submission dbConnect('valeskea-db');

if ($_POST['newid']=='' or $_POST['newname']=='' or $_POST['newemail']=='') { error('One or more 
required fields were left blank.\\n'. 'Please fill them in and try again.'); }

// Check for existing user with the new id $sql = "SELECT COUNT(*) FROM User WHERE uid = 
'$_POST[newid]'"; $result = mysql_query($sql); if (!$result) { error('A database error occurred in 
processing your '. 'submission.\\nIf this error persists, please '. 'contact 
maackk@onid.orst.edu or valaskea@onid.orst.edu.'); } if 
(@mysql_result($result,0,0)>0) { error('A user already exists with your chosen userid.\\n'. 'Please 
try another.'); }

$newpass = substr(md5(time()),0,6);

$sql = "INSERT INTO User SET uid = '$_POST[newid]', password = PASSWORD('$newpass'), username = 
'$_POST[newname]', email = '$_POST[newemail]'"; if (!mysql_query($sql)) 
error('A database error occurred in processing your '. 'submission.\\nIf this error persists, please 
'. 'contact maackk@onid.orst.edu or valeskea@onid.orst.edu.');

// Email the new password to the person. $message = "G'Day! Your personal account for the Project Web 
Site has been created! To log in, proceed to the following address: 
http://web.engr.orst.edu/~valeskea/login.php Your 
personal login ID and password are as follows: userid: $_POST[newid] password: $newpass You aren't 
stuck with this password! Your can change it at any time after you have logged in. If you have any 
problems, feel free to contact me at <maackk@onid.orst.edu>. -Katherine Maack, Austin Valeske Awesome 
Library of Awesome Webmaster "; 
mail($_POST['newemail'],"Your Password for Your Website", $message, "From: Katherine Maack 
<maackk@onid.orst.edu>");


?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html 
xmlns="http://www.w3.org/1999/xhtml"> <head> <title> Registration Complete </title> <meta 
http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> </head> <body> <p><strong>User 
registration successful!</strong></p> <p>Your userid and password have been emailed to 
<strong><?=$_POST[newemail]?></strong>, the email address you just provided in your registration 
form. To log in, click <a href="index.php">here</a> to return to the login page, and enter your new 
personal userid and password.</p> </body> </html> <?php endif; ?>

?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html 
xmlns="http://www.w3.org/1999/xhtml"> <head> <title> Registration Complete </title> <meta 
http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> </head> <body> <p><strong>User 
registration successful!</strong></p> <p>Your userid and password have been emailed to 
<strong><?=$_POST[newemail]?></strong>, the email address you just provided in your registration 
form. To log in, click <a href="login.php">here</a> to return to the login page, and enter your new 
personal userid and password.</p> </body> </html> <?php endif; ?>
