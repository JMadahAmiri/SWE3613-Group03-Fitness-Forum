<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Set the viewport so this responsive site displays correctly on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitness Forum</title>
    <!-- Include bootstrap CSS -->
    <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="includes/style.css" rel="stylesheet">
</head>
    <!-- Site header and navigation -->
    <header class="top" role="header">
        <div class="container">
            <a href="index.html" class="navbar-brand pull-left">
				<!--<img class="imagebox" src="fitness-logo.jpeg">-->
				Fitness Forum
            </a>
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="glyphicon glyphicon-align-justify"></span>
            </button>
            <nav class="navbar-collapse collapse" role="navigation">
                <ul class="navbar-nav nav">
                    <li><a href="login.php">Log In</a></li>
					<li><a href="forums.php">Forum List</a></li>
					<li><a href="recipes.php">Private Messages</a></li>
					<li><a href="useraccount.php">User Account Panel</a></li>
				</ul>
            </nav>
        </div>
    </header>

<body>
    <!-- Page Content -->
	<div class="middle">
		<div class="container">
			<div class="well bs-component">
				<div class="row">
					<div class="col-sm-12">
						<h2><center>Bulletin Board</center></h2>
						<p><center>Welcome to Fitness Forum. Join the community and talk about all things fitness. From hiking, to body-building, to swimming, we have a forum for you!</center></p>
<?php
include 'connection';
mysql_connect ($server,  $username, $password) or die ('I cannot connect  to the database because: ' . mysql_error());
mysql_select_db($database);
//grab message from notification editor
if(!$_GET['notification_message'] == "")
{
	$notification_title = $_GET['notification_title'];
	$notification_message = $_GET['notification_message'];
	$query = "UPDATE tbl_notifications SET message=".$notification_message." WHERE notification_id = 1";
	
	//-query the database table 
	$query = mysql_query($query);
}
//print the current notification
while($row = mysql_fetch_assoc($query))
{
	$current_title  =$row['title']; 
	$current_message=$row['message'];
	echo "Notification: ".$current_message;
}
session_start();
$_SESSION['username']='admin';
//only admin can see this Notification Editor
if($_SESSION['username']=='admin')
{
echo '<form method='post' action='index.php'>
		<br>Notification Editior:<br>
        title: <br><input type='text' name='notification_title' /><br>
        message: <br><textarea name='notification_message' /></textarea><br>
        <input type='submit' value='Submite update' />
    </form>';
}
?>

					</div>
				</div>
			</div>
			<!-- /.well bs-component -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.middle -->
</body>
</html>
