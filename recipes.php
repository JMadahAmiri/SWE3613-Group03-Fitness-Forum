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
					<li><a href="inbox.php">Inbox</a></li>
                    
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
						<h2><center>Message Center</center></h2>
						 <p><center>Welcome to Message Center.</center></p>
                        
                        
<?PHP

session_start();
require("connection.php");

$content = $_POST['forward2'];
 if (isset($_POST['submit']))
{
// if the form has been submitted, this inserts it into the Database 
  $user_receiver_id = $_POST['user_receiver_id'];
  $user_sender_id = $_POST['user_sender_id'];
  $subject = $_POST['subject'];
  $content = $_POST['content'];
  
  mysql_query("INSERT INTO tbl_private_messages (content, subject) VALUES ('$subject', '$content')")or die(mysql_error());
  echo "PM succesfully sent!"; 
}
else
{
    // if the form has not been submitted, this will show the form
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<table border="0">
<tr><td colspan=2><h3>Send PM:</h3></td></tr>
<tr><td></td><td>
<input type="hidden" name="user_sender_id" maxlength="32" value = <?php echo $_SESSION['username']; ?>>
</td></tr>
<tr><td>To: </td><td>
<input type="text" name="user_receiver_id" maxlength="32" value = "">
</td></tr>
<tr><td>Subject: </td><td>
<input type="text" name="subject" maxlength="32" value = "">
</td></tr>
<tr><td>content: </td><td>
<TEXTAREA NAME="content" COLS=50 ROWS=10 WRAP=SOFT></TEXTAREA>
</td></tr>
<tr><td colspan="2" align="right">
<input type="submit" name="submit" value="Send content">
</td></tr>
</table>
</form>
<?php
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
