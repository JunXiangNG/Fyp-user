<!DOCTYPE HTML>
<html>
	<head>
	<title>Add to cart page</title>
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
    width: 24px;
    font-size: 12px;
    font-weight: 400;
    text-align: center;
    margin-left: 1px;
}

.quantity button {
  margin-right: 5px;
  padding: 0 5px;
  width: 19px;
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
  left: 50px;
  transform: translateY(-50%);
}

.btn span {
  display: inline-block;
  margin-left: 30px;
}


.update-button {
  display: inline-block;
  position: relative;
  padding: 3px 1px;
  border: none;
  border-radius: 3px;
  background-color: gray;
  color: #fff;
  text-align: center;
  text-decoration: none;
  font-size: 10px;
  font-weight: 100;
  cursor: pointer;
  height: 80px;
}

.update-button:hover {
  background-color: black;
}

	</style>
	</head>
	<body>
		
	<script type="text/javascript">

function confirmation() {
    if (confirm("Do you want to delete this product?")) {
        return true;
    } else {
        return false;
    }
}



</script>
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
						<p class="bread"><span><a href="http://localhost/fyp/user_home_page.php">Home</a></span> / <span>Shopping Cart</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<table>
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="product-name d-flex">
							<div class="one-forth text-left px-4">
								<span>Product Details</span>
							</div>
							
							<div class="one-eight text-left px-8">
								<span>Price</span>
							</div>
							
							<div class="one-eight text-left pr-4">
								<span>Quantity</span>
							</div>
							<div class="one-eight text-right pr-6">
								<span>Size</span>
							</div>
							<div class="one-eight text-right pr-8">
								<span>Color</span>
							</div>
							<div class="one-eight text-right pr-6">
								<span>Gender</span>
							</div>
							<div class="one-eight text-right pr-4">
								<span>Total</span>
							</div>

							<div class="one-eight text-right pr-4">
								<span>Remove</span>
							</div>
						</div>
	  <tbody>
	  <?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $subtotal = 0; 

    $select_query = "SELECT * FROM add_to_cart WHERE username = '$username'";
    $result = mysqli_query($connect, $select_query);

    if ($result === false) {
	
        die(mysqli_error($connect));
	
    }
?>
   <div class="row row-pb-lg">
    <div class="col-md-12">
	  <?php
	  
while ($row = mysqli_fetch_assoc($result)) {
    $cart_id = $row['cart_id'];
    $product_image = $row['product_image'];
    $product_gender = $row['product_gender'];
    $product_name = $row['product_name'];
    $product_price = $row['product_price'];
    $user_quantity = $row['user_quantity'];
    $user_color = $row['user_color'];
    $user_size = $row['user_size'];
   
    $total_cost = $product_price * $user_quantity;
    $subtotal += $total_cost;
    echo '<script>';
    echo 'var productQuantity = ' . $product_quantity . ';'; //pass the product_quantity value to java srcipt button quantity
   echo '</script>';
   
?>
    <div class="product-cart d-flex">
        <div class="one-forth">
            <div class="product-img" style="background-image: url('<?php
            $imageData = $row['product_image'];
            if ($imageData) {
                $imageData = base64_encode($imageData);
                echo 'data:image/jpeg;base64,' . $imageData;
            } else {
                echo 'path/to/default/image.jpg'; // Provide a default image path if the product image is empty
            }
            ?>');">
            </div>

            <div class="display-tc">
                <h3><?php echo $product_name; ?></h3>
            </div>
        </div>
        <div class="one-eight text-center px-10">
            <div class="display-tc">
                <span class="price">RM <?php echo $product_price; ?></span>
            </div>
        </div>

        <?php
        if (isset($_GET["edit"])) { //edit quantity of table add_to_cart 
            $cart_id = $_GET["cart_id"];
            $query = "SELECT * FROM add_to_cart
                     WHERE cart_id = $cart_id";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($result);
        }
        ?>
        <form name="addfrm" method="post" action="">
            <div class="one-eight text-left pr-10">
                <div class="display-tc">
                    <div class="quantity">
                        <div class="quantity-container">
                            <button type="button" onclick="decreaseValue(<?php echo $cart_id; ?>)">-</button>
                            <input type="number" id="myNumber_<?php echo $cart_id; ?>" name="quantity" min="1" max="5" value="<?php echo $user_quantity; ?>" readonly required>
                            <button type="button" onclick="increaseValue(<?php echo $cart_id; ?>)">+</button>
		        
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" name="savebtn_<?php echo $cart_id; ?>" value="UPDATE" alt="Update" class="update-button">
        </form>


                    <?php
						if (isset($_POST["savebtn_$cart_id"])) {
							$user_quantity = $_POST['quantity']; // update $user_quantity

						

							// Update quantity in the "add_to_cart" table
							mysqli_query($connect, "UPDATE add_to_cart SET user_quantity='$user_quantity' WHERE cart_id=$cart_id");

							// Redirect or display a success message
							echo "<script type='text/javascript'>
									alert('Quantity Updated');
									window.location.href = 'cart.php';
									
								</script>";
						
							}
							?>
							

				<div class="one-eight text-right pr-6">
                        <div class="display-tc">
                            <span class="price" style="margin-left: -10px;" ><?php echo $user_size; ?></span>
                        </div>
                    </div>

					<div class="one-eight text-right pr-6">
                        <div class="display-tc">
                            <span class="price"><?php echo $user_color; ?></span>
                        </div>
                    </div>
					<div class="one-eight text-right px-4">
                        <div class="display-tc">
                            <span class="price"><?php echo $product_gender; ?></span>
                        </div>
                    </div>

                    <div class="one-eight text-right pr-6">
                        <div class="display-tc">
                            <span class="price">RM<?php echo number_format($total_cost, 2); ?></span>
			<input type="hidden" name="total_cost" value="<?php echo $total_cost; ?>">

                        </div>
                    </div>
                    <div class="one-eight text-right pr-6">
                        <div class="display-tc">
                            <a href="cart.php?del&cart_id=<?php echo $row['cart_id']; ?>" onclick="return confirmation();" class="closed"></a>
                        </div>

                        </div>
						</div> 
            </div>
        </div>
    </div>

<?php
            
						}
        }

?>
<div class="row row-pb-lg">
    <div class="col-md-12">
        <div class="total-wrap">
            <div class="row">
                <div class="col-sm-8">
                </div>
                <div class="col-sm-4 text-center">
                    <div class="total">
                        <div class="sub">
                            <p><span>Subtotal:</span> <span class="price">RM<?php echo number_format($subtotal, 2); ?></span></p>
                            <p><span>Delivery:</span> <span>Free Shipping</span></p>
                        </div>
                        <div class="grand-total">
                            <p><span><strong>Total:</strong></span> <span class="price">RM<?php echo number_format($subtotal, 2); ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</tbody>

</table>
<div class="row">
    <div class="col-md-12 text-left">
		
  	<p>
	<a href="http://localhost/fyp/checkout.php" class="btn btn-primary" style="float: right;">Proceed to Checkout</a>
	</p>

    </div>
</div>
<?php 
    if(empty($cart_id)) {
        echo "<script type='text/javascript'>alert('You must be add product first.');</script>";
        echo '<script>window.location.href = "user_home_page.php";</script>';
    }
?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<?php //remove product

if (isset($_REQUEST["del"])) 
{
    $cart_id = $_REQUEST["cart_id"];
    
    $delete_query = "DELETE FROM add_to_cart  WHERE cart_id = $cart_id";
    $result = mysqli_query($connect, $delete_query);
	
    
    if ($result === false) {
        die(mysqli_error($connect));
    }
   
	
	echo '<script>window.location.href = "cart.php";</script>';
	//refresh the page
	exit();
}

?>

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

	<script>
					function increaseValue(orderId) {
					var input = document.getElementById('myNumber_' + orderId);
					var value = parseInt(input.value, 10);
					value = isNaN(value) ? 1 : value;
					
					if (value < 5 || value <productQuantity) {
					
					value++;
					}

					document.getElementById('myNumber_' + orderId).value = value;
					}




					function decreaseValue(orderId) {
					var value = parseInt(document.getElementById('myNumber_' + orderId).value, 10);
					value = isNaN(value) ? 1 : value;
					value--;
					if (value < 1) {
					value = 1;
					}
					document.getElementById('myNumber_' + orderId).value = value;
					}




								</script>
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
	<script type="text/javascript"></script>


	</body>
</html>
