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
                        
                        
	<?php
session_start();
require("config.php");

$user = $_SESSION['user'];

if (isset($_POST['view_old'])) {
$user = $_SESSION['user'];
$query = mysql_query("SELECT * FROM tbl_private_messages WHERE user_receiver_id = '$user'")or die(mysql_error());
while($row2 = mysql_fetch_array($query))
{ 
  echo "<table border=1>";
  echo "<tr><td>";
  echo "Message ID#: ";
  echo $row2['id'];
  echo "</td></tr>";
  echo "<tr><td>";
  echo "To: ";
  echo $row2['user_receiver_id'];
  echo "</td></tr>";
  echo "<tr><td>";
  echo "From: ";
  echo $row2['from_user'];
  echo " ";
  echo "</td></tr>";
  echo "<tr><td>";
  echo "Message: ";
  echo bb ($row2['message']);
  echo "</td></tr>";
  echo "</br>";
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<table border="0">
<tr><td colspan=2></td></tr>
<tr><td></td><td>
<input type="hidden" name="id" maxlength="32" value = "<?php echo $row2['id']; ?>">
</td></tr>
<tr><td colspan="2" align="right">
<input type="submit" name="delete" value="Delete PM # <?php echo $row2['id']; ?>">
</td></tr>
</table>
</form>
<?php
}
}

if (isset($_POST['delete'])) {
$id = $_POST['id'];
$user = $_SESSION['username'];
$sql = mysql_query("UPDATE tbl_private_messages SET deleted = 'yes' WHERE id = '$id' AND user_receiver_id = '$user'")or die(mysql_error());
echo "Your message has been succesfully deleted.";
}

$sql = mysql_query("SELECT * FROM tbl_private_messages WHERE user_receiver_id = '$_SESSION[username]'")or die(mysql_error());
while($row = mysql_fetch_array($sql))
{ 
$user = $_SESSION['user'];
  echo "<table border=1>";
  echo "<tr><td>";
  echo "Message ID#: ";
  echo $row[id];
  echo "</td></tr>";
  echo "<tr><td>";
  echo "To: ";
  echo $row[user_receiver_id];
  echo "</td></tr>";
  echo "<tr><td>";
  echo "From: ";
  echo $row[from_user];
  echo "</td></tr>";
  echo "<tr><td>";
  echo "Message: ";
  echo $row[message];
  echo "</td></tr>";
  echo "</br>";
  mysql_query("UPDATE tbl_private_messages SET read_yet = 'yes' WHERE user_receiver_id = '$user' AND id ='$row_id'")or die(mysql_error());
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<table border="0">
<tr><td colspan=2></td></tr>
<tr><td></td><td>
<input type="hidden" name="id" maxlength="32" value = "<?php echo $row['id']; ?>">
</td></tr>
<tr><td colspan="2" align="right">
<input type="submit" name="delete" value="Delete PM # <?php echo $row['id']; ?>">
</td></tr>
</table>
</form>

<?

}
echo "</table>";
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
