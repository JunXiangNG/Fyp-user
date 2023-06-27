<?php



error_reporting(0);

session_start();
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	echo "<div style='font-size: 20px; padding: 10px; color:green;'>Welcome, $username!</div>";
	
}
$connect = mysqli_connect("localhost","root","","fyp");


?>

<?php 
    if(empty($username)) {
        echo "<script type='text/javascript'>alert('You must be logged in to continue.');</script>";
        echo '<script>window.location.href = "home.php";</script>';
    }
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>checkout</title>
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
<style>
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
</style>
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
			            <form action="#" class="search-wrap">
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

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="http://localhost/fyp/cart.php">Add to cart</a></span> / <span>Checkout</span></p>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-sm-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
							<p><span><a href="cart.php" >01</a></span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center active">
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
                
	      $product_id = $row['product_id'];
                $product_image = $row['product_image'];
                $product_name = $row['product_name'];
                $product_price = $row['product_price'];
                $user_quantity = $row['user_quantity'];
		
                $total_cost = $product_price * $user_quantity; 
                $subtotal += $total_cost; 
				}
			}
		
            ?>
			<form method="POST" class="colorlib-form" style="background-color: #88c8bc;">
				<div class="row">
					<div class="col-md-7">
						<h2>Billing Address</h2>

						<div class="row">
						<?php
									$username = $_SESSION['username'];
									$result = mysqli_query($connect, "SELECT * FROM users WHERE username='$username'");
									$count = mysqli_num_rows($result);

									// Display user data and edit form
									if ($count > 0) {
									  $row = mysqli_fetch_assoc($result);
									  $id = $row['user_id'];
									  $username = $row['username'];
									  $gender = $row['gender'];
									  $birthday = $row['birthday'];
									  $email = $row['email'];
									  $phone=$row['phone'];
									  $address=$row['address'];
									  $town=$row['town_city'];
									  $state=$row['state_province'];
									  $zipcode=$row['zip_postalcode'];

									}

								?>

							<div class="col-md-6">
								
							
								<div class="form-group">
									<label for="receivername">Receiver Name</label>
									<input type="text" name="received_name" class="form-control" value="<?php echo $username; ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group">
						<label for="phonenumber">Phone Number</label>
						<input type="text" name="phone" class="form-control" pattern="\d{3}-\d{7}" title="Please enter a correct phone number in the format, for example: 012-1234567"value="<?php echo $phone; ?>" required>

						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" name="address" class="form-control" placeholder="Address" pattern="^[0-9]+(, )?.+" title="Please enter a correct address in the format , for example: 26, jalan ah looh" value="<?php echo $address; ?>" required>

						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label for="state" >Select State:</label>
								<body onload="populateCities()">
								<label for="state" >Select State:</label><br>
								<select id="state" name="state_province" class="input-field" onchange="populateCities()"style="width: 200px; height: 50px; padding: 5px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" required>
								<option value="">- Select State -</option>
								<option value="Johor" <?php if ($state == "Johor") echo "selected"; ?>>Johor</option>
								<option value="Selangor" <?php if ($state == "Selangor") echo "selected"; ?>>Selangor</option>
								<option value="Melaka" <?php if ($state == "Melaka") echo "selected"; ?>>Melaka</option>
								<option value="Pahang" <?php if ($state == "Pahang") echo "selected"; ?>>Pahang</option>
								<option value="Negeri Sembilan" <?php if ($state == "Negeri Sembilan") echo "selected"; ?>>Negeri Sembilan</option>
								<!-- Add more state options here -->
						</select>
						</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
								
							<label for="city">Select City:</label><br>
								<select id="city" name="town_city" class="input-field" value="<?php echo $town; ?>"style="width: 200px; height: 50px; padding: 5px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" required>
    							<option value="">- Select City -</option>
 							 </select>
							</div>
						</div>
						</div>
						<div class="form-group">
							<label for="zipcode">Zip Code</label>
							<input type="text" name="zip_postalcode" class="form-control" placeholder="Zip Code" pattern="[0-9]{5}" title="Please enter a correct zip code for example: 83700" value="<?php echo $zipcode; ?>" required>
						</div>
					</div>
					
					<div class="col-md-5">
						<div class="cart-detail" style="background-color: whitesmoke;">
							<h2>Cart Total</h2>
							<ul>
								
								<li>
									
									<div class="sub">
									<p><span>Subtotal:</span> <span class="price">RM <?php echo number_format($subtotal, 2); ?></span></p>
									
									
								</div>
								</li>
								<li>
									<span>Shipping</span><span>Free Shipping</span>
										
								</li>
								<li><span>Total</span><span class="price">RM <?php echo number_format($subtotal, 2); ?></span></li>
								<input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">

							</ul>
						</div>
						<div class="row">
									
						<div class="col-md-10">
								<div class="form-group">
									<label for="Card Name">Card Holder Name</label>
									<input type="text" id="cardname"  name="card_name" class="form-control" placeholder="" required>
								</div>
							</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="Card Number">Card Number</label>
										<input name="card_number"type="tel" class="input-lg form-control " pattern="[0-9]{16}" title="Please enter a 16-digit card number"  required>
								</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
								<label for="card_expire">Card Expire</label>
								<input name="card_expire" id="cc-exp" type="text" class="input-lg form-control cc-exp" pattern="(0[1-9]|1[0-2])\/(20[2-9]\d|2[3-9]\d{2}|[3-9]\d{3})" min="2024-01"title="Please enter a card expiration date in the format MM/YYYY" placeholder="MM/YYYY" required>
							</div>
							</div>
							</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="card expire">CVV</label>
										<input name="cvv" class="input-lg form-control "  pattern="[0-9]{3,}" title="Please enter the correct CVV"required>
									</div>
							</div>
							<div class="col-md-12">
							<button type="submit" name="savebtn" class="btn btn-primary btn-addtocart">
								<span>Place an order</span>
							</button>
							
							</form>
							</div>
							
							</div>
						
						</div>
					</div>
				</div>
								
		</div>
	    </div>

	    <?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$connect = mysqli_connect("localhost", "root", "", "fyp");

if (isset($_POST['savebtn'])) {
    session_start();

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $phone = $_SESSION['phone'];
        $select_query = "SELECT * FROM add_to_cart WHERE username = '$username'";
        $result = mysqli_query($connect, $select_query);

        if ($result === false) {
            die(mysqli_error($connect));
        }

        $received_name = $_POST['received_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $town = $_POST['town_city'];
        $state = $_POST['state_province'];
        $zipcode = $_POST['zip_postalcode'];
        $cardname = $_POST['card_name'];
        $cardnumber = $_POST['card_number'];
        $cardexpire = $_POST['card_expire'];
        $cvv = $_POST['cvv'];

        // Perform validation against the dummy table
        $validation_query = "SELECT COUNT(*) FROM dummy_table WHERE card_number = '$cardnumber' AND card_expire = '$cardexpire' AND cvv = '$cvv'";
        $validation_result = mysqli_query($connect, $validation_query);
        $numRows = mysqli_fetch_array($validation_result)[0];

        // Update user details
        $update_query = "UPDATE users SET phone = '$phone', address = '$address', town_city = '$town', state_province = '$state', zip_postalcode = '$zipcode' WHERE username = '$username'";
        $result2 = mysqli_query($connect, $update_query);
        if (!$result2) {
            echo "Error updating user details: " . mysqli_error($connect);
            exit;
        }

        if ($numRows > 0) {
            // Insert order table
            $insert_order_query = "INSERT INTO orders (username) VALUES ('$username')";
            $insert_order_result = mysqli_query($connect, $insert_order_query);
            $order_id = mysqli_insert_id($connect); // Get the order_id of the insert

            if ($insert_order_result) {
                // Fetch all products in the cart
                $cart_query = "SELECT * FROM add_to_cart WHERE username = '$username'";
                $cart_result = mysqli_query($connect, $cart_query);

                while ($cart_row = mysqli_fetch_array($cart_result)) {
                    $product_id = $cart_row['product_id'];
                    $product_details_id = $cart_row['product_details_id'];
                    $user_size = $cart_row['size'];
                    $user_color = $cart_row['colour'];
                    $user_quantity = $cart_row['user_quantity'];

                    // Insert order details
                    $insert_order_details_query = "INSERT INTO order_details (order_id, product_id, product_details_id, user_quantity) VALUES ('$order_id', '$product_id', '$product_details_id', '$user_quantity')";
                    $insert_order_details_result = mysqli_query($connect, $insert_order_details_query);
                    if (!$insert_order_details_result) {
                        echo "Error inserting into order_details table: " . mysqli_error($connect);
                    } else {
                        echo "Order details inserted successfully.";
                    }

                    // Insert receipts
                    $insert_receipts_query = "INSERT INTO receipts (order_id, username, phone, address, town_city, state_province, zip_postalcode, received_name) VALUES ('$order_id', '$username', '$phone', '$address', '$town', '$state', '$zipcode', '$received_name')";
                    $insert_receipts_result = mysqli_query($connect, $insert_receipts_query);

                    // Update the product quantity
                    $product_details_query = "SELECT product_details_id, product_quantity FROM product_details WHERE product_details_id = '$product_details_id'";
                    $product_details_result = mysqli_query($connect, $product_details_query);
                    $product_details_row = mysqli_fetch_assoc($product_details_result);
                    $product_quantity = $product_details_row['product_quantity'];

                    $update_query = "UPDATE product_details SET product_quantity = product_quantity - $user_quantity WHERE product_details_id = '$product_details_id'";
                    $update_result = mysqli_query($connect, $update_query);

                    if (!$update_result) {
                        echo "Error updating product quantity: " . mysqli_error($connect);
                    } else {
                        echo "Product quantity updated successfully.";
                    }
                }

                echo "<script>alert('Payment Successful.'); window.location.href = 'order-complete.php';</script>";

                // Delete items from the cart
                $delete_query2 = "DELETE FROM add_to_cart WHERE username = '$username'";
                $result = mysqli_query($connect, $delete_query2);
            } else {
                echo "Error inserting into orders table: " . mysqli_error($connect);
            }
        } else {
            //echo "<script>alert('Card Details not matched.'); window.location.href = 'http://localhost/fyp/checkout.php';</script>";
        }

        mysqli_close($connect);
    }
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


	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>


<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
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



<!--Payment-->
<script src="js/payment.js"></script>

<script>
  document.getElementById("cc-exp").addEventListener("input", function (event) {
    var input = event.target;
    var trimmed = input.value.replace(/\s+/g, "");
    var formatted = trimmed.replace(/^(\d{2})\/?(\d{0,4})/, "$1/$2");
    input.value = formatted;
  });

</script>


<script>
    function populateCities() {
      var stateSelect = document.getElementById("state");
      var citySelect = document.getElementById("city");
      var state = stateSelect.value;
      var town = "<?php echo isset($town) ? $town : ''; ?>";


      // Clear city options
      citySelect.innerHTML = '<option value="">- Select City -</option>';

      if (state === "Johor") {
        // Add Johor cities
        var johorCities = ["Yong Peng", "Segamat", "Johor Bahru", "Tangkak", "Skudai", "Muar", "Kluang", "Pasir Gudang", "Kulai"];
        for (var i = 0; i < johorCities.length; i++) {
          var option = document.createElement("option");
          option.text = johorCities[i];
          option.value = johorCities[i];
          citySelect.add(option);
        }
      } else if (state === "Selangor") {
        // Add Selangor cities
        var selangorCities = ["Petaling Jaya", "Shah Alam", "Klang", "Puchong", "Cheras", "Rawang", "Semenyih", "Putrajaya", "Cyberjaya"];
        for (var i = 0; i < selangorCities.length; i++) {
          var option = document.createElement("option");
          option.text = selangorCities[i];
          option.value = selangorCities[i];
          citySelect.add(option);
        }
} else if (state === "Melaka") {
        // Add Melaka cities
        var melakaCities = ["Ayer Keroh", "Alor Gajah", "Malacca City (Bandaraya Melaka)", "Klebang", "Jasin", "Batu Berendam", "Bukit Katil"];
        for (var i = 0; i < melakaCities.length; i++) {
          var option = document.createElement("option");
          option.text = melakaCities [i];
          option.value = melakaCities [i];
          citySelect.add(option);
        }
} else if (state === "Pahang") {
        // Add Pahang cities
        var pahangCities = ["Kuantan", "Cameron Highlands", "Temerloh", "Raub", "Mentakab", "Pekan", "Kuala Lipis", "Gambang"];
        for (var i = 0; i < pahangCities.length; i++) {
          var option = document.createElement("option");
          option.text = pahangCities[i];
          option.value = pahangCities[i];
          citySelect.add(option);
        }
} else if (state === "Negeri Sembilan") {
        // Add Negeri Sembilan cities
        var negerisembilanCities = ["Seremban", "Port Dickson", "Nilai", "Seri Menanti", "Bahau", "Kuala Pilah", "Rembau", "Gemas"];
        for (var i = 0; i < negerisembilanCities.length; i++) {
          var option = document.createElement("option");
          option.text = negerisembilanCities[i];
          option.value = negerisembilanCities[i];
          citySelect.add(option);
        }
}

// Set the selected city if it matches the previous selection
if (town !== "") {
  citySelect.value = town;
}
}

// Call the populateCities() function when the page loads
window.onload = populateCities;
</script>
	
</body>
</html>
