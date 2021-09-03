<?php
 	session_start();
	if ($_SERVER['HTTP_HOST'] == 'localhost')
	{
		define('HOST', 'localhost');
		define('USER', 'root');
		define('PASS', '1550');
		define('DB', 'catalog');
	}
	else
	{
		define('HOST', 'sql202.byethost11.com');
		define('USER', 'b11_29258139');
		define('PASS', 'Nastynate15');
		define('DB', 'b11_29258139_catalog');
	}
	include ('includes/functions.php');
	$conn = mysqli_connect(HOST,USER,PASS,DB);
	
	if (isset($_GET['id']) && !empty($_GET['id']))
	{
		$sql = 'SELECT * FROM product WHERE id = '.$_GET['id'];
		
		$results = mysqli_query($conn, $sql);
		
		$cat = '<table id="product"><tr><th>Image</th><th>Product Name</th><th>Description</th><th>Price</th><th>Add to Cart</th></tr>';
		$dog = '';
		$bird = '</table>';
		
		while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
		{
			$dog .= '<tr><td><img id="pimg" src='.$row['image'].'></td>';
			$dog .= '<td>'.$row['name'].'</td>';
			$dog .= '<td id="desc">'.$row['description'].'</td>';
			$dog .= '<td>$'.$row['price'].'</td>';
			$dog .= '<td><div><form id="addcart" method="post"><input type="hidden" name="id" value='.$_GET['id'].'><input id="carts" type="number" min="1" name="qty" placeholder="Qty">';
			$dog .= '<input id="cart-button" type="submit" value="Add" name="add-to-cart"></form></div></td></tr>';
		}
		
		$table = $cat.$dog.$bird;		
	}
	
	if (isset($_POST['add-to-cart']))
	{
		$duplicate = false;
		$sql = 'SELECT * FROM product WHERE id = '.$_POST['id'].' LIMIT 1';
		
		$results = mysqli_query($conn, $sql);
		
		while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
		{
			$price = $row['price'];
			$prodName = $row['name'];
		}
		if (isset($_POST['add-to-cart']) && ($_POST['qty']) != '')
		{
			if (!isset($_SESSION['product-id']))
			{
				$_SESSION['product-id'] = array();
				$_SESSION['qty'] = array();
				$_SESSION['price'] = array();
				$_SESSION['prod-name'] = array();
			}
			else
			{
				for ($i = 0; $i < sizeof($_SESSION['product-id']); $i++)
				{
					if ($_SESSION['product-id'][$i] == $_POST['id'])
					{
						$duplicate = $i;
					}
				}
			}
			if ($duplicate !== false)
			{
				$_SESSION['qty'][$duplicate] += $_POST['qty'];
			}
			else
			{
				array_push($_SESSION['product-id'], $_POST['id']);
				array_push($_SESSION['qty'], $_POST['qty']);
				array_push($_SESSION['price'], $price);
				array_push($_SESSION['prod-name'], $prodName);
			}
		}
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACME Products</title>
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<script defer src="js/script.js"></script>
	</head>
	<body>
		<div class="main-wrapper">
			<?php include('includes/nav.php'); ?>
			<main id="prod">
				<h1>ACME Product Page</h1>
				<div id="tables">
					<?php
					if (isset($_POST['add-to-cart']) && isGranted() && ($_POST['qty']) != '')
					{
						echo "<h2 class='valid' id='success'>Item added to cart!<br><br><a href='cart.php'>View Cart</a></h2>";
					}
					if (isset($_POST['add-to-cart']) && ($_POST['qty']) == '')
					{
						echo "<h2 class='invalid'>Quantity must be entered!</h2>";
					}
					if(isset($_POST['add-to-cart']) && !isGranted())
					{
						echo "<h2 class='invalid'>Must log-in to add to cart!</h2>";
						unset($_SESSION['product-id']);
					}
						echo $table;
					?>
				</div>
			</main>
		</div>
	</body>
</html>