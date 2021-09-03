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
	
	$sql = 'select * from product;';
	$results = mysqli_query($conn, $sql);
	$tableCat = '<table><tr><th>Image</th><th>Product Name</th><th>Price</th><th>Product Page</th></tr>';
	$tableDog = '';
	$tableBird = '</table>';
	while ($rows = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{
		$id = $rows['id'];
		$tableDog .= '<tr><td><img id="pimgs" src='.$rows['image'].'></td>';
		$tableDog .= '<td>'.$rows['name'].'</td>';
		$tableDog .= '<td>$'.$rows['price'].'</td>';
		$tableDog .= '<td><a href="product.php?id='.$id.'">View Product</a></td></tr>';
	}
	
	$table = $tableCat.$tableDog.$tableBird;
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Acme Catalog</title>
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="main-wrapper">
			<?php include('includes/nav.php'); ?>
			<main>
				<h1 class="prod">ACME Products</h1>
				<div>
					<?php 
						if(isset($_COOKIE['name'])) echo '<h2 class="prod">Welcome '.$_COOKIE['name'].'</h2>';
					?>
					<p class="prod">We continuously strive to delight our customers with outstanding Quality of our products and services</p><br>
					<p class="product">Products from ACME</p>
					<?php
						echo $table;
					?>
				</div>
			</main>
		</div>
	</body>
</html>