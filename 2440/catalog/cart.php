<?php
 	session_start();
	include ('includes/functions.php');
	if(!isGranted()) header('location: .');
	if(isset($_POST['update']))
	{
		for ($x = 0; $x < sizeof($_SESSION['qty']); $x++)
		{
			$postID = 'qty-'.$x;
			$_SESSION['qty'][$x] = $_POST[$postID];
			if ($_SESSION['qty'][$x] == 0)
			{
				unset($_SESSION['product-id']);
			}
		}
	}
	if(isset($_POST['clear']))
	{
		unset($_SESSION['product-id']);
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACME Cart</title>
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="main-wrapper">
			<?php include('includes/nav.php'); ?>
			<main>
				<h1>Shopping Cart</h1>
				<?php 
					if(!isset($_SESSION['product-id']))
					{
						echo '<h1 class="warning">Your Cart is Empty</h1>';
					}
					if (isset($_POST['submit']) && isset($_SESSION['product-id']))
					{	
						$tabler = '<h1 class="valid">Your order has been submitted!</h1>';
						$tabler .= '<div><table id="cartt"><tr><th colspan="4">Your Order:</th></tr>';
						$tabler .= '<tr><th>Product Name</th><th>Price</th><th>Qty</th><th>Total</th></tr>';
						$tables = '';
						$tabled = '</table></div>';
						$total = 0;
						
						for ($x = 0; $x < sizeof($_SESSION['product-id']); $x++)
						{
							$tables .= '<tr><td>'.$_SESSION['prod-name'][$x].'</td>';
							$tables .= '<td>$'.$_SESSION['price'][$x].'</td>';
							$tables .= '<td>'.$_SESSION['qty'][$x].'</td>';
							$tables .= '<td>$'.$_SESSION['price'][$x] * $_SESSION['qty'][$x].'</td>';
							$total += ($_SESSION['price'][$x] * $_SESSION['qty'][$x]);
						}
						$tables .= '<tr><td colspan="3">Grand Total:</td><td>$'.$total.'</td></tr>';
						$tablen = $tabler.$tables.$tabled;
						echo $tablen;
						unset($_SESSION['product-id']);
					}
					else 
					{
						if(isset($_SESSION['product-id']))
						{

							$tableCat = '<form method="POST"><div><table id="cartt"><tr><th>Product Name</th><th>Price</th><th>Qty</th><th>Total</th></tr>';
							$tableDog = '';
							$tableBird = '</table></div>';
							$total = 0;
							for ($x = 0; $x < sizeof($_SESSION['product-id']); $x++)
							{
								$tableDog .= '<tr><td>'.$_SESSION['prod-name'][$x].'</td>';
								$tableDog .= '<td>$'.$_SESSION['price'][$x].'</td>';
								$tableDog .= '<td><input name="qty-'.$x.'" id="carts" type="number" min="0" value='.$_SESSION['qty'][$x].'></input></td>';
								$tableDog .= '<td>$'.$_SESSION['price'][$x] * $_SESSION['qty'][$x].'</td>';
								$total += ($_SESSION['price'][$x] * $_SESSION['qty'][$x]);
							}
							$tableDog .= '<tr><td colspan="3">Grand Total:</td><td>$'.$total.'</td></tr>';
							$table = $tableCat.$tableDog.$tableBird;
							echo $table;
							echo "<button name='update' id='but' class='submit' type='submit'>Update Cart</button>";
							echo "<button name='submit' id='but' class='submit' type='submit'>Submit Order</button>";
							echo "<button name='clear' type='submit'id='but' class='reset'>Clear Cart</button>";
							echo "</form>";
						}
					}
				?>
			</main>
		</div>
	</body>
</html>