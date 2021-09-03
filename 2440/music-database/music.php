<!doctype html>
<html lang="en">
	<head>
		<title>Music-Database</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<ul>
			<div class="navlist-right">
			<li><a href="index.php">Home</a></li>
			<li><a class="active" href="music.php">Music</a></li>
			<li><a href="products.php">Products</a></li>
			</div>
		</ul>
				<?php
					echo "<table id='tshirt'><tr><th>My Favorite Albums</th></tr>";
					$albums = array("Cilvia Demo","Hellboy","Stankonia","ATLiens","Aquemini","XXX","Black Star","Graduation","OK Computer","Kid A");
					shuffle($albums);
					foreach ($albums as $album) echo "<tr><td>".output($album)."</td></tr>";				
					echo "</table>";
				?>
	</body>
</html>
<?php	
	function output($input)
	{
		$return = "";
		$return .= $input;
		return $return;
	}
?>
