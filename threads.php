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
            <a href="#" class="navbar-brand pull-left">
				<!--<img class="imagebox" src="fitness-logo.jpeg">-->
				Fitness Forum
            </a>
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="glyphicon glyphicon-align-justify"></span>
            </button>
            <nav class="navbar-collapse collapse" role="navigation">
                <ul class="navbar-nav nav">
					<li><a href="login.php">Login</a></li>
                    <li><a href="">Home</a></li>
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
					$sql = "SELECT tbl_subforum.title, 
								tbl_subforum.subforum_id, 
								tbl_subforum.parent_id
							FROM swe3613_db03p2.tbl_subforum tbl_subforum
							WHERE tbl_subforum.subforum_id=".mysql_real_escape_string($_GET['id']);		  
					$result = mysql_query($sql);
					if(!result)
					{
						echo 'The categories could not be displayed, please try again.';
					}
					else
					{
						if(mysql_num_rows($result)==0)
						{
							echo 'No categories does not exist.';
						}
						else
						{
							while($row = mysql_fetch_assoc($result))
							{
								//print Category user are in.
								echo '<h2>'.$row['tbl_subforum.title'].'</h2>';
							}
							//Get topic query.
							$sql = "SELECT tbl_threads.thread_id,
										   tbl_threads.title,
										   tbl_threads.post_count,
										   tbl_threads.subform_id,
										   tbl_threads.user_id
									FROM swe3613_db03p2.tbl_threads tbl_threads
									WHERE tbl_threads.thread_id=".mysql_real_escape_string($_GET['id']);
							$result = mysql_query($sql);
							if(!$result)
							{
								echo 'Topic not available';
							}
							else
							{
								if(mysql_num_rows($result)==0)
								{
									echo 'No topic created.';
								}
								//prepare forum table
								echo	'<table border="1">
										<tr>
											<th>Topic</th>
										</tr>';
								//fill the forum table
								while($row = mysql_fetch_assoc($result))
								{
									echo	'<table border="1">
										<tr>
											<td>
												<p>
													<a href="forums.php?id='.$row['tbl_threads.thread_id'].'">
														'.$row['tbl_threads.title'].'
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