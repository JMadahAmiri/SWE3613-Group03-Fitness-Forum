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
					<?PHP
					include 'connection.php';
					//$_GET id from forums.
					$sql = "SELECT tbl_threads.thread_id,
								   tbl_threads.title,
								   tbl_threads.post_count,
								   tbl_threads.subform_id,
								   tbl_threads.user_id
							  FROM swe3613_db03p2.tbl_threads tbl_threads
							 WHERE tbl_threads.thread_id =".mysql_real_escape_string($_GET['id']);			
					$result = mysql_query($sql);
					if(!result)
					{
						echo 'The thread could not be displayed, please try again.';
					}
					else
					{
						if(mysql_num_rows($result)==0)
						{
							echo 'Thread does not exist.';
						}
						else
						{
							while($row = mysql_fetch_assoc($result))
							{
								//print Category user are in.
								echo '<h2>'.$row['title'].'</h2>';
							}
							//Get posts query.
							$sql = "SELECT tbl_posts.content,
										   tbl_posts.sticky,
										   tbl_posts.post_timestamp,
										   tbl_posts.user_id,
										   tbl_posts.thread_id,
										   tbl_posts.post_id,
										   tbl_posts.title
										   tbl_users.users_id,
										   tbl_users.username,
										   tbl_users.password,
										   tbl_users.biography,
										   tbl_users.type
									  FROM swe3613_db03p2.tbl_posts tbl_posts
										   INNER JOIN swe3613_db03p2.tbl_users tbl_users
											  ON (tbl_posts.user_id = tbl_users.users_id)
									WHERE tbl_posts.thread_id=".mysql_real_escape_string($_GET['id']);
							$result = mysql_query($sql);
							if(!$result)
							{
								echo 'Post not available';
							}
							else
							{
								if(mysql_num_rows($result)==0)
								{
									echo 'No post created.';
								}
								//prepare forum table
								echo	'<table border="1">
										<tr>
											<th>'.$row[''].'</th>
										</tr>';
								//fill the forum table
								while($row = mysql_fetch_assoc($result))
								{
									echo	'<table border="1">
										<tr>
											<!--DISPLAY USERNAME OF POSTER-->
											<td>
												<p>
													<a href="posts.php?id='.$row['post_id'].'">
														'.$row['username'].'
													</a>
												</p>
											</td>
											<td>
												<p>
													<a href="posts.php?id='.$row['post_id'].'">
														'.$row['content'].'
													</a>
												</p>
											</td>	
										</tr>';
								}
							}
						}
					}
					?>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.well bs-component -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.middle -->
</body>
</html>