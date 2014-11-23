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
					<legend>Add Category</legend>
					<div class="form_group">
					
					
					<?PHP
					include 'connection.php';
					//Create subforum

					if($_SERVER['REQUEST_METHOD'] != 'POST')
					{						
						$query = "
						SELECT 
							subforum_ID,
							title 
						FROM 
							swe3613_db03p2.tbl_subforums tbl_subforums";
						$qresult = mysql_query($query);
						if($qresult == false)
						{
							echo "qresult error";
						}	
						echo '<form method="post" action = "">
							Category name*: <input type="text" name="title" />
							Parent Subforum: <select class "selectpicker" name="parent_id">
							<input type="submit" value="Add category" />
							';

						
						while($row = mysqli_fetch_array($qresult))
						{	
							echo"<option value=\"" , $row['parent_id'] ,"\">",$row['title'],"</option>";
						}
							
						echo '<input type="submit" value="Add subforum" />
							</form>';
					}
					else
					{
						$sql = "INSERT INTO 
						tbl_subforums(title, parent_id)
							VALUES(
							'"mysql_real_escape_string($_POST['title'])"',
							'"mysql_real_escape_string($_POST['parent_id'])"'
							);"
						$result = mysql_query($sql);
						if(!result)
						{
							//something went wrong
							echo 'Error' . mysql_error();
						}
						else
						{
							echo 'New category successfully added.';
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
	</div>
</body>
</html>
