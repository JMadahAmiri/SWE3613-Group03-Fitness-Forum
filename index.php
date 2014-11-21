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

    <!-- Page Content -->
	<div class="middle">
		<div class="container">
			<div class="well bs-component">
				<div class="row">
					<div class="col-sm-12">
						<h2><center>Are you ready to get buff?</center></h2>
						<p><center>Welcome to Fitness Forum. Join the community and talk about all things fitness. From hiking, to body-building, to swimming, we have a forum for you!</center></p>
					</div>
				</div>
				<!-- /.row -->
				<div class="row">
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
					<!--<div class="col-sm-4">
						<center>
						<a data-toggle="modal" href="#myModal1"><img id = "img_1" class="img-circle img-responsive img-center" src="includes/images/bakery_cakes_3_FreeTiiuPix_300x300.jpg" alt="" border="0"></a>
						<h2>Baking</h2>
						<p>Provides essential baking management tools including: Recipe Management, Daily Baking Order, and Ingredient Entry</p>
						</center>
					</div>
					<div class="col-sm-4">
						<center>
						<a data-toggle="modal" href="#myModal2"><img class="img-circle img-responsive img-center" src="includes/images/pie-chart-149726_640.png" alt="" border="0"></a>
						<h2>Reports</h2>
						<p>Includes all reports avalible.</p>
						</center>
					</div>
					<div class="col-sm-4">
						<center>
						<a data-toggle="modal" href="#myModal3"><img class="img-circle img-responsive img-center" src="includes/images/customer.jpg" alt="" border="0"></a>
						<h2>Orders/Customer Entry</h2>
						<p>Enter orders and customer information.</p>
						</center>
					</div>
					-->
				</div>
				<!-- /.row -->

			</div>
			<!-- /.well bs-component -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.middle -->

  
     <!-- Modal 1 -->
  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-dialog modal-vertical-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <center><h3 class="modal-title">Baking</h4></center>
        </div>
        <div class="modal-body">
			<center>
				<div class ="btn-group-vertical">
				<a type="button" id = "btn1" class="btn btn-primary btn-lg" href="http://group04.swe3613.com/recipes.php">
				Recipes
				</a>
				<a type="button" id = "btn2" class="btn btn-primary btn-lg" href="http://group04.swe3613.com/ingredients.php">
				Ingredients
				</a>
			</center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
	  </div>
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
       <!-- Modal 2 -->
  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <center><h3 class="modal-title">Reports</h4></center>
        </div>
        <div class="modal-body">
			<center>
				<div class ="btn-group-vertical">
				<a type="button" id = "btn1" class="btn btn-primary btn-lg" href="persistentSalesHistory.php">
				Persistent Sales History
				</a>
				<a type="button" id = "btn2" class="btn btn-primary btn-lg" href="dailySales.php">
				Daily Sales Report
				</a>
				<a type="button" id = "btn3" class="btn btn-primary btn-lg" href="historicalItemSales.php">
				Historical Item Sales Report
				</a>
				<a type="button" id = "btn3" class="btn btn-primary btn-lg" href="weeklyIngredientShoppingReport.php">
				Weekly Ingredient Shopping List
				</a>
				<a type="button" id = "btn3" class="btn btn-primary btn-lg" href="productSalesComparisonReport.php">
				Product Sales Comparison Report
				</a>
				<a type="button" id = "btn3" class="btn btn-primary btn-lg" href="salesProjection.php">
				Sales Projection Report
				</a>
				<a type="button" id = "btn3" class="btn btn-primary btn-lg" href="consumerAnalysis.php">
				Consumer Analysis Report
				</a>
				<a type="button" id = "btn3" class="btn btn-primary btn-lg" href="customerInformationReport.php">
				Customer Information Report
				</a>
				<a type="button" id = "btn3" class="btn btn-primary btn-lg" href="customerMap.php">
				Customer Map
				</a>
				</div>
			</center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
       <!-- Modal 3 -->
  <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-dialog modal-vertical-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <center><h3 class="modal-title">Orders/Customer Entry</h4></center>
        </div>
        <div class="modal-body">
			<center>
				<div class ="btn-group-vertical">
				<a type="button" id = "btn2" class="btn btn-primary btn-lg" href="http://group04.swe3613.com/orders.php">
				Orders
				</a>
				<a type="button" id = "btn3" class="btn btn-primary btn-lg" href="http://group04.swe3613.com/customers.php">
				Customers
				</a>
				</div>
			</center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
	  </div>
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  	
	

    <!-- jQuery Version 1.11.0 -->
    <script src="includes/jquery/jquery-2.1.0.min.js"></script>

	    <!-- Bootstrap Core JavaScript -->
    <script src="includes/bootstrap/js/bootstrap.js"></script>

	
</body>
</html>
