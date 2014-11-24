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
                <li><a href="login.php">Login</a></li>
                <li><a href="index.html">Home</a></li>
                <li><a href="forums.php">Forum List</a></li>
                <li><a href="privatemessages.php">Private Messages</a></li>
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
					<legend>Create Thread</legend>
					<form action="" method = "post">
					<tr><td></td><td>
					<input type="hidden" name="user_sender_id" maxlength="32" value = <?php echo $_SESSION['username']; ?>>
					</td></tr>
					<tr><td>Title: </td><td>
					<input type="text" name="thread_title" maxlength="32" value = "">
					</td></tr>
					<div></div>
					<tr><td>Content: </td><td>
					<TEXTAREA NAME="post_content" COLS=50 ROWS=10 WRAP=SOFT></TEXTAREA>
					</td></tr>
					<div></div>
					<input type="submit" name="submit" value="Create thread">
					<div></div>
					<?PHP 
						include 'connection.php';
						$con = mysqli_connect($server,$username,$password);
						mysqli_select_db($con, $database);
						//Select current list of forums
						$query = "
						SELECT 
							subforum_ID,
							title 
						FROM 
							tbl_subforums";
						$qresult = mysql_query($query);
						if($qresult == false)
						{
							echo "qresult error";
						}	
						//Display  forum list
						echo '
						<div></div>Parent Subforum: <select name="subforum_id">';
						while($row = mysql_fetch_array($qresult))
						{	
							echo'<option value="'.$row['subforum_id'].'">
							'.$row['title'].'
							</option>';
						}
							echo'</select>';
					?>
					
					<tr><td colspan="2" align="right">
					<?PHP
					include 'connection.php';
					$con = mysqli_connect($server,$username,$password);
					mysqli_select_db($con, $database);
					session_start();
					//Create thread

					 if (!isset($_POST['submit']))
					{	
						$con = mysqli_connect($server,$username,$password);
						mysqli_select_db($con, $database);
					}
					else
					{
						//$user_sender_id = $_POST['user_sender_id'];
						$user_sender_id = 0;
						$title = mysql_real_escape_string($_POST['thread_title']);
						$content = mysql_real_escape_string($_POST['post_content']);
						$subforum_id = $_POST['subforum_id'];
						$sql2 = "INSERT INTO
							tbl_threads(title, subform_id, user_id)
							VALUES('$title', '$subforum_id', '$user_sender_id')";
						$thread_id = mysql_insert_id($con);
						$result2 = mysql_query($sql2);
						if(!result2)
						{
							//something went wrong
							echo 'Error' . mysql_error();
						}
						else
						{
						$sql = "
							INSERT INTO 
							tbl_posts(content, sticky, post_timestamp, user_id, thread_id)
							VALUES('$content', 0, now(),'$user_sender_id', SELECT MAX(thread_id) FROM tbl_threads)";

						$result = mysql_query($con, $sql);
						if(!result)
						{
							//something went wrong
							echo 'Error' . mysql_error();
						}
						else
						{
							echo 'New thread successfully created';
						}
						}
					}
					
					?>
					</div>
					</div>
				</form>
				<!-- /.row -->
			</div>
			<!-- /.well bs-component -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.middle -->
	</div>
</body>
</html>
