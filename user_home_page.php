<?php

include 'dataconnection.php';
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<div style='font-size: 20px; padding: 10px; color:green;'>Welcome, $username!</div>";
}
?>

<!DOCTYPE HTML>
<html>
	<head>
	<title>User Home</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<?php
    $connect = mysqli_connect("localhost", "root", "", "fyp");
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
	?>	
	<?php 
    if(empty($username)) {
        echo "<script type='text/javascript'>alert('You must be logged in to continue.');</script>";
        echo '<script>window.location.href = "login.php";</script>';
    }
?>
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="http://localhost/fyp/user_home_page.php">4M Online Sport Shoe Store</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
						<form action="http://localhost/fyp/search.php" class="search-wrap" method="GET">
						<div class="form-group">
							<input type="search" name="search" required value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" class="form-control search" placeholder="Search product">
							<button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
						</div>
					</form>

						
			         </div>
		         </div>

				 <?php
					$select_query = "SELECT * FROM brand";
					$result = mysqli_query($connect, $select_query);
						
					?>

					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="active"><a href="http://localhost/fyp/user_home_page.php">Home</a></li>
								<li class="has-dropdown">
									<a href="http://localhost/fyp/men.php">Men</a>

							
								</li>
								<li class="has-dropdown">
									<a href="http://localhost/fyp/women.php">Women</a>
									
													
								</li>
							
								<li><a href="http://localhost/fyp/about.php">About</a></li>
								<li><a href="viewreview.php">Review</a></li>
                                <li class="has-dropdown">
									<a href="#">Account</a>
									<ul class="dropdown">
										<li><a href="profile.php">Edit Profile</a></li>
										<li><a href="order_history.php">Order History</a></li>
                                        <li><a href="logout.php">Logout</a></li>
									</ul>
									
									<?php
								
								if (isset($_SESSION['username'])) {
								$username = $_SESSION['username'];
								mysqli_select_db($connect, "fyp");
								$result = mysqli_query($connect, "select * from add_to_cart WHERE username = '$username'");	
								$count = mysqli_num_rows($result);//used to count number of rows

								}
								if ($result === false) {
									die(mysqli_error($connect));
								}

							
								?>

								<li class="cart">
									<a href="http://localhost/fyp/cart.php#">
										<i class="icon-shopping-cart"></i> <?php echo $count; ?>
									</a>
								</li>	
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">Welcome to 4M Online Sport Shoe Store</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">Let's start a great shopping trip together !</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/background.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-sm-6 offset-sm-3 text-center slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Men's</h1>
					   					<h2 class="head-2">Shoes</h2>
					   					<h2 class="head-3">Collection</h2>
					   					<p class="category"><span>New running shoes</span></p>
					   					<p><a href="http://localhost/fyp/men.php" class="btn btn-primary">Shop Collection</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(https://wallpaper.dog/large/624695.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-sm-6 offset-sm-3 text-center slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
									   <h1 class="head-1">Women's</h1>
					   					<h2 class="head-2">Shoes</h2>
					   					<h2 class="head-3">Collection</h2>
					   					<p class="category"><span>New running shoes</span></p>
					   					<p><a href="http://localhost/fyp/women.php" class="btn btn-primary">Shop Collection</a></
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			
			  	</ul>
		  	</div>
		</aside>
		<div class="colorlib-intro">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2 class="intro">It started with a simple idea: Create quality, well-designed products that I wanted myself.</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="colorlib-product">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="http://localhost/fyp/men.php" class="featured-img" style="background-image:url(https://th.bing.com/th/id/OIP.Yi12XLxOgMVFDDvaTTo18wHaFB?pid=ImgDet&rs=1);"></a>
							<div class="desc">
								<h2><a href="http://localhost/fyp/men.php">Shop Men's Collection</a></h2>
							</div>
						</div>
					</div>
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="http://localhost/fyp/women.php" class="featured-img" style="background-image: url(https://th.bing.com/th/id/OIP.GYdHBiUO9hbTg0L7zBzizwHaHa?pid=ImgDet&w=700&h=700&rs=1);"></a>
							<div class="desc">
								<h2><a href="http://localhost/fyp/women.php">Shop Women's Collection</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
						<h2>View All Product</h2>
					</div>
				</div>
				<?php
$select_query = "SELECT * FROM product INNER JOIN product_details ON product.product_id = product_details.product_id ";

if(isset($_GET['brands']))
{
    $brands = $_GET['brands'];
    $brand_ids = implode(',', $brands);
    $select_query .= " AND product.brand_id IN ($brand_ids)";
}

$result = mysqli_query($connect, $select_query);
?>


        <?php
        $products = array(); // Array to group variations by product ID

        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_image = $row['product_image'];
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];

            // Check if the product ID already exists in the array
            if (!isset($products[$product_id])) {
                $products[$product_id] = array(
                    'product_id' => $product_id,
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_image' => $product_image,
                    'variations' => array() // Array to store variations
                );
            }

            // Add the current variation to the variations array
            $variation = array(
                'product_color' => $row['product_color'],
                'product_size' => $row['product_size']
            );
            $products[$product_id]['variations'][] = $variation;
        }

        $uniqueProducts = array(); // Array to store unique products

        foreach ($products as $product) {
            $product_name = $product['product_name'];

            // Check if the product with the same name already exists in the array
            if (!isset($uniqueProducts[$product_name])) {
                // Add the product to the array if it doesn't exist
                $uniqueProducts[$product_name] = $product;
            }
        }
?>

		<div class="container">
		<div class="d-flex flex-wrap">
		<?php foreach ($uniqueProducts as $product) { ?>
            <div class="col-md-4 col-lg-4 mb-4 text-center">
                <div class="product-entry border">
                    <a href="http://localhost/fyp/product_detail.php?product_id=<?php echo $product['product_id']; ?>" class="prod-img">
                        <?php
                        // Display the image for the first variation
                        $firstVariation = $product['variations'][0];
                        $imageData = $product['product_image'];

                        if ($imageData) {
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" class="img-fluid" />';
                        } else {
                            echo 'No Image';
                        }
                        ?>
                        <div class="desc">
                            <h2><?php echo $product['product_name']; ?></h2>
                            <span class="price">RM <?php echo $product['product_price']; ?></span>
                            <?php foreach ($product['variations'] as $variation) { ?>
                                <p></p>
                            <?php } ?>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>
	</div>
</div>


		<div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Trusted Partners</h2>
					</div>
				</div>
				<div class="row">
					<div class="col partner-col text-center">
					<img src="images/brand-1.jpg" class="img-fluid" style="max-width: 50%;" alt="Free html4 bootstrap 4 template">

					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-2.jpg" class="img-fluid" style="max-width: 50%;" alt="Free html4 bootstrap 4 template">
					</div>
					
				</div>
			</div>
		</div>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col footer-col colorlib-widget">
						<h4>About 4M Online Sport Shoe Store</h4>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
							<li><a href="viewreview.php">Review</a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="about.php">About us</a></li>
								
							</ul>
						</p>
					</div>

					

					<div class="col footer-col">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>28,Jalan Bukit Beruang, <br> Taman Bukit Beruang</li>
							<li><a href="tel://1234567920">+60 11-26121234</a></li>
							<li><a href="mailto:info@yoursite.com">www.4M.com</a></li>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">4M</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
							<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
   <!-- popper -->
   <script src="js/popper.min.js"></script>
   <!-- bootstrap 4.1 -->
   <script src="js/bootstrap.min.js"></script>
   <!-- jQuery easing -->
   <script src="js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>


