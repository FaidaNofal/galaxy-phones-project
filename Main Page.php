<?php
    session_start();
      $con = mysqli_connect("localhost","root","","phones");

    if (isset($_POST['add'])) 
    {
    	if (isset($_SESSION['cart'])) 
    	{
    		$item_array_id = array_column($_SESSION['cart'], "product_id");
    		if (!in_array($_GET['id'], $item_array_id)) 
    		{
    			$count = count($_SESSION['cart']);
    			$item_array = array
    			(
    				'product_id' => $_GET["id"],
    				'item_name' => $_POST['hidden_name'],
    				'item_price' => $_POST['hidden_price'],
    				'item_quantity' => $_POST['quantity'],
    			);
    			$_SESSION['cart'][$count] = $item_array;
    			echo '<script>window.location="Main Page.php"</script>';
    		}
    		else 
    		{
    			echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="Main Page.php"</script>';
    		}
    	}
    	else
    	{
    		$item_array = array
    		(
    			'product_id' => $_GET["id"],
    			'item_name' => $_POST['hidden_name'],
    			'item_price' => $_POST['hidden_price'],
    			'item_quantity' => $_POST['quantity'],
    		);
    		$_SESSION['cart'][0] = $item_array;
    	}
    }

    if (isset($_GET['action'])) 
    {
    	if ($_GET['action'] == 'delete') 
    	{
    		foreach ($_SESSION['cart'] as $keys => $value) 
    		{
    			if ($value['product_id'] == $_GET['id']) 
    			{
    				unset($_SESSION['cart'][$keys]);
    				echo '<script>alert("Product has been Removed from cart")</script>';
                    echo '<script>window.location="Main Page.php"</script>';
    			}
    		}
    	}
    }
?>   
<?php
if (isset($_POST['Buy'])) 
{
	header("Location: buy.html");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Galaxy Phones</title>
	<link rel="stylesheet"  href="Main page.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"rel="stylesheet">
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="jquery-3.2.1.min.js"></script>
	</head>
<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<div class="heaher" style="background:radial-gradient(#fff,#b18874);">
<div class="container">
	<div class="navbar">
	<div class="logo">
		<h1> Galaxy </h1>  
	</div>
	<nav>
		<ul id="MenuItems">
			<li><a href="Main page.php">Home</a></li>
			<li><a href="#move">Products</a></li>
			<li><a href="contact us.html">Contact</a></li>
			<li><a href="buy.html">Account</a></li>
			<li><a href="about.html">About</a></li>
		</ul>
	</nav>
	<img src="images\cart.png" width="30px" height="30px" class="crt">
	</div>
 <div class="row">
	<div class="col-2">
		<h1>Galaxy Phones</h1>
		<p> <b> We have the best choice to buy your phone, And the lowest costs. </b>  </p>
		<p><b>Click on any device to see its information.</b></p> 
			<a href="#move" class="btn">Explore Now &#8594;</a>
			<a href="info_for_phones.php" class="btn">Explore With Information for devices &#8594;</a>
	</div>
	</div>
	</div>
  </div>
<!-------cart-------->
<div style="clear: both;"></div>
	<center>
	<div class="carttable" style="background-color: #282725; color: white;"> <br />
					<h1 style="color: #ca9c85">Shopping Cart</h1>
					<br />
		<table>
			<tr>
				<th width="30%">Product Name</th>
				<th width="10%">Quantity</th>
				<th width="13%">Single Price</th>
				<th width="10%">Total Price</th>
				<th width="17%">Remove</th>
			</tr>
			<?php
			if (!empty($_SESSION['cart'])) 
			{
				$total=0;
				foreach ($_SESSION['cart'] as $key => $value) 
				{
					?>
					<tr>
						<td><?php echo $value['item_name'] ?></td>
						<td><?php echo $value['item_quantity'] ?></td>
						<td>$ <?php echo $value['item_price'] ?></td>
						<td>$ <?php echo number_format($value['item_quantity'] * $value['item_price'], 2); ?></td>
						<td><a href="Main Page.php?action=delete&id=<?php echo $value['product_id']; ?>" style='color: #ca9c85;'>Remove</a></td>
					</tr>
					<?php
					$total = $total + ($value['item_quantity'] * $value['item_price']);
				}
					?>
					<tr>
						<td colspan="3" align="center">Total</td>
						<th colspan="2" align="center">$<?php echo number_format($total, 2); ?></th>
					</tr>
					<form method="post">
						<tr>
						<td colspan="5" align="center">
							<button name="Buy" class="btn" href="buy.html">Buy</button>
						</td>
						</tr>
					</form>
					<?php
			}
				?>
		</table>
		<br>
		</center>
	</div>
<!--------featured categories-------->
<div class="brands">
  <div class="small-container">
	<div class="row">
		<div class="col-5 show1img">
			<a href="#sas"><img src="images/download.png"></a>
		</div>
		<div class="col-5 show2img">
			<a href="#app"><img src="images/aa.png"></a>
		</div>
		<div class="col-5 show3img">
		<a href="#hu"><img src="images/d.jpg"></a>	
		</div>
		<div class="col-5 show4img">
		<a href="#no"><img src="images/nokia.png"></a>	
		</div>
	</div>
  </div>	
</div>
<!---samsung products--->
<div class="show1">
<div class="small-container">
  <h2 class="title">Samsung Phones</h2>	
	<div class="row">
<?php
	$r1 = $con->query("select * from phone_info where subject='samsung';");
		while ($row = mysqli_fetch_array($r1)) 
		{
			?>
			<div class="col-4">
				<form method="post" action="Main Page.php?action=add&id=<?php echo $row['id']; ?>"id="sas">
						<img src="<?php echo $row['image'] ?>">
						<center>
						<h4 class="prodname"><?php echo $row['name'] ?></h4> 
						<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						</div>
						<p>$<?php echo $row['price'] ?></p>
						<input type="text" name="quantity" value="1" size="4">
						<input type="hidden" name="hidden_name" value="<?php echo $row['name'] ; ?>">
						<input type="hidden" name="hidden_price" value="<?php echo $row['price'] ; ?>">
						<br>
						<input type="submit" name="add" class="btn" value="Add To Cart">
						</center>
				</form>
			</div>     
			<?php
		}
?>
</div>
</div>
</div>
<!---Apple products--->
<div class="show2">
<div class="small-container">
  <h2 class="title">Apple Phones</h2>	
	<div class="row">
<?php
	$r2 = $con->query("select * from phone_info where subject='Apple';");
		while ($row = mysqli_fetch_array($r2)) 
		{
			?>
			<div class="col-4">
				<form method="post" action="Main Page.php?action=add&id=<?php echo $row['id']; ?>" id="app">
						<img src="<?php echo $row['image'] ?>">
						<center>
							<h4 class="prodname"><?php echo $row['name'] ?></h4> 
						<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						</div>
						<p>$<?php echo $row['price'] ?></p>
						<input type="text" name="quantity" value="1" size="4">
						<input type="hidden" name="hidden_name" value="<?php echo $row['name'] ; ?>">
						<input type="hidden" name="hidden_price" value="<?php echo $row['price'] ; ?>">
						<br>
						<input type="submit" name="add" class="btn" value="Add To Cart">
						</center>
				</form>
			</div>
			<?php
		}
?>
</div>
</div>
</div>
<!---Huawei products--->
<div class="show3">
<div class="small-container">
  <h2 class="title">Huawei Phones</h2>	
	<div class="row">
<?php
	$r3 = $con->query("select * from phone_info where subject='Huawei';");
		while ($row = mysqli_fetch_array($r3)) 
		{
			?>
			<div class="col-4">
				<form method="post" action="Main Page.php?action=add&id=<?php echo $row['id']; ?>"id="hu">
					<img src="<?php echo $row['image'] ?>">
						<center>
							<h4 class="prodname"><?php echo $row['name'] ?></h4> 
						<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						</div>
						<p>$<?php echo $row['price'] ?></p>
						<input type="text" name="quantity" value="1" size="4">
						<input type="hidden" name="hidden_name" value="<?php echo $row['name'] ; ?>">
						<input type="hidden" name="hidden_price" value="<?php echo $row['price'] ; ?>">
						<br>
						<input type="submit" name="add" class="btn" value="Add To Cart">
						</center>
				</form>
			</div>
			<?php
		}
?>
</div>
</div>
</div>
<!---Nokia products--->
<div class="show4">
<div class="small-container">
  <h2 class="title">Nokia Phones</h2>	
	<div class="row">
<?php
	$r4 = $con->query("select * from phone_info where subject='Nokia';");
		while ($row = mysqli_fetch_array($r4)) 
		{
			?>
			<div class="col-4">
				<form method="post" action="Main Page.php?action=add&id=<?php echo $row['id']; ?>"id="no">
						<img src="<?php echo $row['image'] ?>">
						<center>
							<h4 class="prodname"><?php echo $row['name'] ?></h4> 
						<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						</div>
						<p>$<?php echo $row['price'] ?></p>
						<input type="text" name="quantity" value="1" size="4">
						<input type="hidden" name="hidden_name" value="<?php echo $row['name'] ; ?>">
						<input type="hidden" name="hidden_price" value="<?php echo $row['price'] ; ?>">
						<br>
						<input type="submit" name="add" class="btn" value="Add To Cart">
						</center>
				</form>
			</div>
			<?php
		}
?>
</div>
</div>
</div>
<!------all products------>
<div class="showall" id="move">
<div class="small-container">
  <h2 class="title">All Products</h2>	
	<div class="row">
			<?php
	$retrieve = $con->query("select * from phone_info;");
		while ($row = mysqli_fetch_array($retrieve)) 
		{
			?>
			<div class="col-4">
				<form method="post" action="Main Page.php?action=add&id=<?php echo $row['id']; ?>">
					<img src="<?php echo $row['image'] ?>">
						<center>
							<h4 class="prodname"><?php echo $row['name'] ?></h4> 
						<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						</div>
						<p>$<?php echo $row['price'] ?></p>
						<input type="text" name="quantity" value="1" size="4">
						<input type="hidden" name="hidden_name" value="<?php echo $row['name'] ; ?>">
						<input type="hidden" name="hidden_price" value="<?php echo $row['price'] ; ?>">
						<br>
						<input type="submit" name="add" class="btn" value="Add To Cart">
						</center>
				</form>
			</div>
			<?php
		}
		?>
	</div>
  </div>
<!--------offer----------->
<div class="offer">
	<div class="small-container">
		<div class="row">
			<div class="col-2">
				<img src="images/lll.jpg" class="offer-img ">
			</div>
			<div class="col-2">
			<p align="center"> <b>Exclusively Available on Galaxy Phone Store</b></p>
			<p align="center"> <b>Huawei P30 lite <br> 150 JD</b></p> <br />
			<p align="center"><a  href="buy.html" class="btn">Buy Now &#8594;</a></p>
			</div>
		</div>
	</div>
</div>
<!---------testimonial------->
<div class="testimonial">
	<div class="small-container">
		<div class="row">
			<div class="col-3">
				<i class="fa fa-quote-left"></i>
				<p>Great independent phone store with a variety of gourmet items, phones are easy to find. A great site that offers great services. There is a good variety of phones but you don't always have the time.
				</p><!---------->
			  <div class="rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-half-o"></i>
			  </div>
			  <img src="images/users/user1.jpg">
			  <h3>Qussai AD</h3>
			</div>
			<div class="col-3">
				<i class="fa fa-quote-left"></i>
				<p>The staff is the best in the phone shop and is locally owned. I only get pursued by employees because they have knowledgeable employees and actually pass corporate discounts on to the client. It's just a powerful one-stop shop. </p>
			  <div class="rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-half-o"></i>
			  </div>
			  <img src="images/users/user2.jpg">
			  <h3>Sammer massad</h3>
			</div>

			<div class="col-3">
				<i class="fa fa-quote-left"></i>
				<p>The staff allows me to live out my dreams of becoming a zero-waste. The best bulk selection around. Best, beautiful produce.  </p>
			  <div class="rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-half-o"></i>
			  </div>
			  <img src="images/users/user3.png">
			  <h3>Ahmad Momani</h3>
			</div>
		</div>
	</div>
</div>
<!-------------footer------>
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="footer-col-1">
				<h3>Download Our App</h3>
				<p>Download App for Android and ios mobile phone.</p>
			</div>
			<div class="footer-col-2">
				<h3>Support</h3>
				<ul>
					<li>Contact us</li>
					<li>Give Feedback</li>
					<li>Order Support</li>
				</ul>
			</div>
			<div class="footer-col-3">
				<br>
				<h3>About</h3>
				<ul>
					<li>Careers</li>
					<li>Ethics</li>
					<li>Our Business</li>
				</ul>
			</div>
            <div class="footer-col-4">
				<h3>Follow Us</h3>
				<ul>
					<li> <a href="https://web.facebook.com/GalaxyCoOrg/?_rdc=1&_rdr"target="_blank"> Facebook </a></li>
					<li> <a href="https://www.instagram.com/galaxyorganisation/"target="_blank"> Instagram </a></li>
				</ul>
			</div>
		</div>
		<hr>
		<p class="copyright">Copyright 2022 - Galaxy Phones</p>
	</div>
</div>
 <script >
  	var MenuItems = document.getElementById("MenuItems");
  	MenuItems.style.maxHeight = "0px";
  	function menutoggle() {
  	 	if (MenuItems.style.maxHeight == "0px") 
  	 	{
          MenuItems.style.maxHeight = "200px";
     	}
  	 	else
  	 	{
  	 		MenuItems.style.maxHeight = "0px";
  	 	}
  	 } 
  $(document).ready(function(){$('.carttable').hide()});
	$(document).ready(function(){$('.crt').click(function(){$('.carttable').toggle() })});
	//Get the button:
mybutton = document.getElementById("myBtn");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
  </script>
</body>
</html>