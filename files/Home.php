<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title style="color: white;">Airport Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>

	<a href="index.php" style="color: black;"><button class="btn btn-default" >Log out</button></a>
	
	<div class="container" style="background-color: white;">
		


		<header class="row">
			<div class="col-sm-3 logo"><img src="../bootstrap/images/logo.png" alt="AMS."></div>
			<div class="col-sm-9 tagline" style="color: black ">Fly with The Flyers </div>
		</header>

		<div class="row">
			<nav class="navbar navbar-reverse" role="navigation" style="background-color: #428bca;">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" style="background-color: rgb(204,0,51)">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar" style="background-color: white;"></span>
			        <span class="icon-bar"style="background-color: white;"></span>
			        <span class="icon-bar "style="background-color: white;"></span>
			      </button>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="navbar">
			      <ul class="nav navbar-nav">
			        <li class="active"><a href="Airport.php" style="color: white;font-weight:bolder;">Airport</a></li>
			        <li><a href="Flight.php" style="color: white;font-weight:bolder;">Flight</a></li>
			        <li><a href="Worker.php" style="color: white;font-weight:bolder; ">Worker</a></li>

			        <li><a href="store.php" style="color: white;font-weight:bolder; ">Store</a></li>

			        <li><a href="Captain.php" style="color: white;font-weight:bolder; ">Captain</a></li>

			        <li><a href="passenger.php" style="color: white;font-weight:bolder; ">Passenger</a></li>

			        <li><a href="Ticket.php" style="color: white;font-weight:bolder; ">Ticket</a></li>

			        <li><a href="equipment.php" style="color: white;font-weight:bolder; ">Equipment</a></li>

			        <li><a href="User.php" style="color: white;font-weight:bolder; ">Users</a></li>
			         <li><a href="Tools.php" style="color: white;font-weight:bolder; ">Tools</a></li>

			       

			        <li><a href="about us.html" style="color: white;font-weight:bolder; ">About Us</a></li>
			      </ul>
			    </div><!-- end navbar-collapse -->
			  </div><!-- end container-fluid -->
			</nav>
		</div>

		<div class="row">
			<div class="col-md-10">

				<!-- sliding img -->
				<div id="locations" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#locations" data-slide-to="0" class="active"></li>
						<li data-target="#locations" data-slide-to="1"></li>
						<li data-target="#locations" data-slide-to="2"></li>
						<li data-target="#locations" data-slide-to="3"></li>
						<li data-target="#locations" data-slide-to="4"></li>
						<li data-target="#locations" data-slide-to="5"></li>
						<li data-target="#locations" data-slide-to="6"></li>
						<li data-target="#locations" data-slide-to="7"></li>
						<li data-target="#locations" data-slide-to="1"></li>

					</ol>
					<div class="carousel-inner">
						<div class="item active">
							<img src="../bootstrap/images/1.jpg" alt="">
						</div>
						<div class="item">
							<img src="../bootstrap/images/2.jpg" alt="">
							<div class="carousel-caption">
								<h3>Love of Live!</h3>
					
							</div>
						</div>
						<div class="item">
							<img src="../bootstrap/images/3.jpg" alt="">
						</div>
						<div class="item">
							<img src="../bootstrap/images/4.jpg" alt="">
							<div class="carousel-caption">
								<h3>Aircrash world crash!</h3>
							</div>
						</div>
						<div class="item">
							<img src="../bootstrap/images/5.jpg" alt="">
						</div>
						<div class="item">
							<img src="../bootstrap/images/6.jpg" alt="">
							<div class="carousel-caption">
								<h3>World of Aieroplane</h3>
							</div>
						</div>
						<div class="item">
							<img src="../bootstrap/images/7.jpg" alt="">
						</div>
						<div class="item">
							<img src="../bootstrap/images/8.jpg" alt="">
							<div class="carousel-caption">
								<h3>Golden Gate Bridge at dusk</h3>
							</div>
						</div>
						<div class="item">
							<img src="../bootstrap/images/1.jpg" alt="">
						</div>


					</div>
					<a class="left carousel-control" href="#locations" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#locations" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>


				<h2>What our customers are saying...</h2>
				<blockquote>
					<p style="color: black;">“First off, location, location, location! The Kabul Airport in Kabul is located in a wonderfully picturesque part of town. The staff were polite and friendly, and the neighborhood really did feel welcoming. I even want travel from this Airport, and the Airport staff made all the arrangements! Can't wait to make my way out to the Landon in Vienna again.” </p>
					<small>Sayeed Baktash, Kabul</small>
				</blockquote>
				<blockquote>
					<p style="color: black;">“The Parvan Airport in Begram is a great place to Fly if you're looking to be in the heart of the city, and it is in one of the most beautiful and natural place of country. They even had Miliatery to carry safe the airport, which made it easy to explore the city on Aeroplane. The front desk staff were always helpful, and made checking in and out a pleasurable experience. The plane’s modern decor and extra amenities were the icing on the cake.”</p>
					<small>Amir Mohammed, Parvan</small>
				</blockquote>
			</div>
			<div class="col-md-2">
				<div class="panel panel-primary">
					<div class="panel-heading" style="background-color: #428bca">
						<h3>About Airport Management System</h3>
					</div>
					<div class="panel-body">
						<p>Each Herat Airport reﬂects the color, ﬂavor, and personality of the local neighborhood, giving visitors an authentic travel experience that honors the history and culture of the region.</p>
						<p>With 5,000,000 population in big city, we go out of our way to make you feel at home.</p>
						<p><a href="#" class="btn btn-primary" style="background-color: #428bca">Read more </a></p>
					</div>
				</div><!-- end panel -->
			</div>
		</div>
		<footer class="row siteinfo">
			<p><a href="http://parsclick.net/" style="color: black;">The AMS created by Sayeed Baktash solely for the purpose of training. All Tools and framework associated with The web development criteria are also fictitious. This management system can handle a simple management system and it make easier handling a Airport management system.</a></p>
		</footer>
	</div><!-- end container -->

<!-- modal window -->
<div id="hongkong" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                        <h3 class="modal-title">Kwun Tong Landon</h3>
                    </div>
                    <div class="modal-body">
                        <p>In the course of a day, visitors to the Mazar Airport cant take a leisure walk on Street, the mazar Airport placed in the northest province of country means Balkh one of oldest province of the world which previously called "oom al blaad" means mother of all city. </p>
                        <p>The Mazar Airport promoted to be one of the best Airport in the country, it has so many facilities to traveler for easing their flights.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    
<!-- javascript -->
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script>
    	$('.carousel').carousel({
    		interval: 2000,
    		wrap: false
    	});
    </script>
</body>
</html>