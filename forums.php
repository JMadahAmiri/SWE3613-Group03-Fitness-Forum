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
			<img class="imagebox" src="fitness-logo.jpeg">
            </a>
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="glyphicon glyphicon-align-justify"></span>
            </button>
            <nav class="navbar-collapse collapse" role="navigation">
                <ul class="navbar-nav nav">
                    <li><a href="#">Home</a></li>
					<li><a href="forums.php">Forum List</a></li>
					<li><a href="recipes.php">Private Messages</a></li>
					<li><a href="useraccount.php">User Account Panel</a></li>
                </ul>
            </nav>
        </div>
    </header>
<body>
<?PHP
	include 'connection.php';
	$sql = "SELECT subforum_id, title FROM tbl_subforums";
	$result = mysql_query($sql);
	if(!result)
	{
		echo 'The categories could not be displayed, please try again.';
	}
	else
	{
		if(mysql_num_rows($result)==0)
		{
			echo 'No categories defined yet.';
		}
		else
		{
			//prepare forum table
			echo	'<table border="1">
					<tr>
						<th>Category</th>
					</tr>';
			//fill the forum table
			while($row = mysql_fetch_assoc($result))
			{
				echo	'<table border="1">
					<tr>
						<td>
							<h3>
								<a href="MainMenu.html?id>'.$row['subforum_id'].'">
									'.$row['title'].'
								</a>
							<h3>
						</td>	
					</tr>';
			}
		}
		
	}
	?>
</body>
</html>