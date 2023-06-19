<!DOCTYPE HTML>
<html>
	<head>
	<title>Men product details </title>
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
	<style>

.quantity{
    display: flex;
}
.quantity p{
    font-size: 18px;
    font-weight: 500;
}
.quantity input{
    width: 60px;
    font-size: 17px;
    font-weight: 400;
    text-align: center;
    margin-left: 1px;
}

.quantity button {
  margin-right: 10px;
  padding: 0 5px;
  width: 40px;
  background-color: gray;
  color: #fff;
}

.quantity button:last-child {
  margin-left: 10px;
}
.btn {
  display: inline-block;
  position: relative;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: gray;
  color: #fff;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  font-weight: 500;
  cursor: pointer;
}

.btn i {
  position: absolute;
  top: 50%;
  left: 10px;
  transform: translateY(-50%);
}

.btn span {
  display: inline-block;
  margin-left: 20px;
}

.images {

    justify-content: flex-start;
    align-items: center;
    width: 100%;
    margin-top: 15px;
}

.small-img {
    display: flex; 
    gap: 10px; 
}

.small-img img {
    width: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.small-img:hover img {
    transform: scale(1.2);
}


	</style>
	</head>
	<body>
	<?php

include 'dataconnection.php';
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<div style='font-size: 20px; padding: 10px; color:green;'>Welcome, $username!</div>";
}
?>
	<?php

$connect = mysqli_connect("localhost","root","","fyp");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
<?php 
    if(empty($username)) {
        echo "<script type='text/javascript'>alert('You must be logged in to continue.');</script>";
        echo '<script>window.location.href = "home.php";</script>';
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
									<a href="cart.php">
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
											<h3><a href="#">Make your stay on our webiste more surprising and moving</a></h3>
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

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
					<p class="bread"><span><a href="http://localhost/fyp/user_home_page.php">Home</a></span>/<span><a href="http://localhost/fyp/men.php">Men</a></span>/<span>Product Details</span></p>
					</div>
				</div>
			</div>
		</div>



		<?php
if (isset($_GET['product_id'])) {
    $product_id = $_GET["product_id"];
    $select_query = "SELECT * FROM product
                     INNER JOIN product_details ON product.product_id = product_details.product_id
                     WHERE product.product_id = $product_id and product_gender ='men'";
                     
    $result_query = mysqli_query($connect, $select_query);

    if ($result_query) {
        // Display the product information
        if ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_image = $row['product_image'];
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_description = $row['product_description'];
	  $product_quantity = $row['product_quantity'];
	  $product_gender = $row['product_gender'];
	  $product_size = $row['product_size'];
	  $product_color = $row['product_color'];
        }
        
        // Display the color and size options
        
        $color_query = "SELECT DISTINCT product_color FROM product_details WHERE product_id = $product_id AND product_gender='men'";
        $size_query = "SELECT DISTINCT product_size FROM product_details WHERE product_id = $product_id AND product_gender='men'";
		$image_query = "SELECT DISTINCT product_image FROM product_details WHERE product_id = $product_id AND product_gender='men'";

        
        $color_result = mysqli_query($connect, $color_query);
        $size_result = mysqli_query($connect, $size_query);
		$image_result= mysqli_query($connect, $image_query);
?>

<form name="addfrm" method="post" action="" onsubmit="return validateForm()">
    <div class="colorlib-product">
        <div class="container">
            <div class="row row-pb-lg product-detail-wrap">
                <div class="col-sm-6">
                    <div class="item">
					<div class="image-container">
                        <div class="product-entry border">
			
						<div class="big-img">
						<?php
							$imageData = $product_image;
							 
								if ($imageData) {
									$imageData = base64_encode($imageData);
									echo '<img src="data:image/jpeg;base64,' . $imageData . '" class="img-fluid" />';
								} else {
									echo 'No Image';
								}
							
							?>

				</div>
					<div class="images">
						<div class="small-img">
							
								<?php
								while ($image_row = mysqli_fetch_assoc($image_result)) {
									$imageData = $image_row['product_image'];
									if ($imageData) {
										$imageData = base64_encode($imageData);
										echo '<img src="data:image/jpeg;base64,' . $imageData . '" onclick="showImg(this.src)" class="img-fluid" />';
									} else {
										echo 'No Image';
									}
								}
								?>
							
							
							</div>
							</div>
							</div>
							</div>
							</div>
							</div>
                <div class="col-sm-4">
                    <div class="product-desc">
                        <div class="desc">
                            <h3><?php echo $product_name; ?></h3>
                            <span class="price">RM <?php echo $product_price; ?></span>
                        </div>
						<p><b><?php echo $product_gender; ?></b></p>
                        <p><b><?php echo $product_description; ?></b></p>

                        <div class="size-wrap">
                            <div class="input-group mb-4">
                                <div class="block-26 mb-2">
                                    <div class="block-25 mb-5">
                                        <h4>Size:</h4>
                                        <ul style="list-style-type: none; padding: 0;">
                                            <?php while ($size_row = mysqli_fetch_assoc($size_result)) { ?>
                                                <li style="display: inline-block; width: 50px; height: 50px; border: 1px solid black; text-align: center; line-height: 50px; font-weight: bold;">
                                                    <input type="checkbox" id="size" name="size" value="<?php echo $size_row['product_size']; ?>" onclick="handleCheckboxChange(this); ">
                                                    <label for="size"><span style="color: black;"><?php echo $size_row['product_size']; ?></span></label>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>

                                    <div class="block-26 mb-6">
                                        <h4>Colour:</h4>
                                        <ul style="list-style-type: none; padding: 0;">
                                            <?php while ($color_row = mysqli_fetch_assoc($color_result)) { ?>
                                                <li style="display: inline-block; width: 100px; height: 50px; border: 1px solid black; text-align: center; line-height: 50px; font-weight: bold;">
                                                    <input type="checkbox" id="colourBlack" name="colour" value="<?php echo $color_row['product_color']; ?>" onclick="handleCheckboxChange(this); ">
                                                    <label for="colourBlack"><span style="color: black;"><?php echo $color_row['product_color']; ?></span></label>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                               
                        
						<br><br><br>
								<h4>Quantity :</h4>
							
								<div class="quantity">
								<button type="button" onclick="decreaseValue()">-</button>
								<input type="number" id="myNumber" name="quantity" min="1" max="5" value="1" readonly required>
								<button type="button" onclick="increaseValue()">+</button>
								
								</div>
					
								<?php

								$query = "SELECT * FROM product
								INNER JOIN product_details ON product.product_id = product_details.product_id
								WHERE product.product_id = $product_id AND product_gender='men' ";
								$result = mysqli_query($connect, $query);
								echo '<script>';
								echo 'var productQuantity = ' . $product_quantity . ';'; //pass the product_quantity value to java srcipt button quantity
								echo '</script>';
								if ($result && mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										$product_quantity = $row['product_quantity'];
										$product_name = $row['product_name'];
										$product_size = $row['product_size'];
										$product_color = $row['product_color'];
								

									if ($product_quantity <= 5) {
										echo '<br><span class="price">Notice: ' . $product_name . ', Size:' . $product_size . ',Color: ' . $product_color . ' , ' . $product_quantity . ' Item(s) left</span>';

									} else {
										echo "";
									}
								}
							}
								?>




				            </div>

							</div>
							
							</div>	
							
							
							<p class="addtocart">
							<button type="submit" name="savebtn" class="btn btn-primary btn-addtocart">
								<i class="icon-shopping-cart"></i> 
								<span>Add to Cart</span>
							</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
	}
}
?>

<?php
if (isset($_POST['savebtn'])) {
    // Get the form data
    $product_id = $_GET["product_id"];
  
   

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }

    // Query the product and product_details tables to get the product name, image, and price
    $query = "SELECT p.product_name, pd.product_price, pd.product_quantity
              FROM product p
              INNER JOIN product_details pd ON p.product_id = pd.product_id
              WHERE pd.product_id = '$product_id' AND product_gender='men' AND p.product_status = 'A'";

    $result = mysqli_query($connect, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch the result into variables
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];
       
        $user_size = $_POST['size'];
        $user_color = $_POST['colour'];
        $user_quantity = $_POST['quantity'];
        $total_cost = $product_price * $user_quantity; // Assuming $product_price is defined

        // Sanitize the input
        $username = mysqli_real_escape_string($connect, $username);
        $product_id = mysqli_real_escape_string($connect, $product_id);
        $product_name = mysqli_real_escape_string($connect, $product_name);
        $product_price = mysqli_real_escape_string($connect, $product_price);
        $total_cost = mysqli_real_escape_string($connect, $total_cost);
        $user_quantity = mysqli_real_escape_string($connect, $user_quantity);
        $user_color = mysqli_real_escape_string($connect, $user_color);
        $user_size = mysqli_real_escape_string($connect, $user_size);

        // Check if the product with the specified color and size exists
        $check_product_query = "SELECT * FROM product_details WHERE product_id = '$product_id' AND product_color = '$user_color' AND product_size = '$user_size'";
        $check_product_result = mysqli_query($connect, $check_product_query);

        if (mysqli_num_rows($check_product_result) > 0) {
            // Product with the specified color and size exists
            // Query to check if the product already exists in add to cart table
            $check_query = "SELECT * FROM add_to_cart WHERE username = '$username' AND product_id = '$product_id' AND user_size = '$user_size' AND user_color = '$user_color'";
            $check_result = mysqli_query($connect, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                // Product already exists in the add to cart table, update the add to cart
                $update_query2 = "UPDATE add_to_cart SET user_quantity = user_quantity + '$user_quantity' WHERE username = '$username' AND product_id = '$product_id' AND user_size = '$user_size' AND user_color = '$user_color'";

                $update_result2 = false;
                if ($user_quantity < 6) {
                    $update_result2 = mysqli_query($connect, $update_query2);
                }

                if ($update_result2) {
                    // Display a success message
                    echo "<script type='text/javascript'>alert('Quantity updated successfully!');</script>";
                    echo '<script>window.location.href = "http://localhost/fyp/men_product_detail.php?product_id=' . $product_id . '";</script>';
                } else {
                    // Display an error message
                    echo "<script type='text/javascript'>alert('Failed to update quantity, can only order a maximum of 5 items!');</script>" . mysqli_error($connect);
                    echo '<script>window.location.href = "http://localhost/fyp/men_product_detail.php?product_id=' . $product_id . '";</script>';
                }
            } else {
                // Query to get the product details ID
                $product_details_id_query = "SELECT product_details_id FROM product_details WHERE product_id = '$product_id' AND product_color = '$user_color' AND product_size = '$user_size'";
                $product_details_id_result = mysqli_query($connect, $product_details_id_query);
                $row = mysqli_fetch_assoc($product_details_id_result);
                $product_details_id = $row['product_details_id'];

                // Sanitize the product details ID
                $product_details_id = mysqli_real_escape_string($connect, $product_details_id);

                // Query to get the product image based on color and size
                $image_query = "SELECT product_image FROM product_details WHERE product_id = '$product_id' AND product_color = '$user_color' AND product_size = '$user_size'";
                $image_result = mysqli_query($connect, $image_query);
                $row = mysqli_fetch_assoc($image_result);
                $product_image = $row['product_image'];

                // Sanitize the product image
                $product_image = mysqli_real_escape_string($connect, $product_image);

                // Insert the data into the add_to_cart table
                $ins_query = "INSERT INTO add_to_cart (product_id,product_details_id, username, product_image, product_name, product_gender, product_price, user_size, user_color, user_quantity, total_cost)
                VALUES ('$product_id','$product_details_id', '$username', '$product_image', '$product_name', '$product_gender', '$product_price', '$user_size', '$user_color', '$user_quantity', '$total_cost')";
                $ins_result = mysqli_query($connect, $ins_query);

                if ($ins_result) {
                    // Display a success message
                    echo "<script type='text/javascript'>alert('Order placed successfully!');</script>";
                    echo '<script>window.location.href = "http://localhost/fyp/men_product_detail.php?product_id=' . $product_id . '";</script>';
                } else {
                    // Display an error message
                    echo "<script type='text/javascript'>alert('Failed to place order!');</script>" . mysqli_error($connect);
                }
            }
        } else {
            // Product does not exist with the specified color and size
            // Display an error message or handle the situation accordingly
            echo "<script type='text/javascript'>alert('Product does not exist with the specified color and size!');</script>";
            echo '<script>window.location.href = window.location.href;</script>';
        }
    } else {
        // Display an error message
        echo "<script type='text/javascript'>alert('Query error!');</script>" . mysqli_error($connect);
    }
}
?>





		

		
		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col footer-col colorlib-widget">
						<h4>About Footwear</h4>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Contact</a></li>
								<li><a href="#">Returns/Exchange</a></li>
								<li><a href="#">Gift Voucher</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Special</a></li>
								<li><a href="#">Customer Services</a></li>
								<li><a href="#">Site maps</a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					<div class="col footer-col">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col footer-col">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li><a href="#">yoursite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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

								<script>
								
    
								function increaseValue() {
									var value = parseInt(document.getElementById('myNumber').value, 10);
									value = isNaN(value) ? 1 : value;
									if (value < 5 && value < productQuantity ) {
										value++;
									}
									document.getElementById('myNumber').value = value;
								}

								function decreaseValue() {
									var value = parseInt(document.getElementById('myNumber').value, 10);
									value = isNaN(value) ? 1 : value;
									value--;
									if (value < 1) {
										value = 1;
									}
									document.getElementById('myNumber').value = value;
								}


								function handleCheckboxChange(checkbox) {
									// Uncheck all checkboxes except the one that was clicked
									var checkboxes = document.getElementsByName(checkbox.name);
									for (var i = 0; i < checkboxes.length; i++) {
										if (checkboxes[i] !== checkbox) {
											checkboxes[i].checked = false;
										}
									}
								}

								function validateForm() {
								var sizes = document.querySelectorAll('input[type=checkbox][name=size]:checked');
								var colours = document.querySelectorAll('input[type=checkbox][name=colour]:checked');
								if (sizes.length === 0 && colours.length === 0) {
									alert('Please select at least one size and colour');
									return false;
								}
								if (sizes.length === 0) {
									alert('Please select at least one size');
									return false;
								}
								if (colours.length === 0) {
									alert('Please select at least one colour');
									return false;
								}
								return true;
								}

								let bigImg = document.querySelector('.big-img img');
								function showImg(pic){
									bigImg.src = pic;
								}					

							


								</script>


	</body>
</html>
