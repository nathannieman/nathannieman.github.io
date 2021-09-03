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
	$error = "";
	if(isset($_POST['login-button']))
	{
		$conn = mysqli_connect(HOST,USER,PASS,DB);

		$user= $_POST["un"]; 
        $pass = $_POST["pw"];
		$pass = saltHash($pass);
		$sql = "SELECT username, password FROM user WHERE username = '".$user."' AND  password = '".$pass."';";
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result) > 0 )
		{
			$_SESSION['granted'] = true;
			setcookie('name', $user, time() + 3600);
		}
		if(!isGranted()) $error = '<h1 class="warning">Access Denied</h1>';
		
		mysqli_close($conn);
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACME Home</title>
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="main-wrapper">
			<?php include('includes/nav.php'); ?>
			<main>
				<?php if (!isGranted()) : ?>
					<img src="img/logo.png" width="auto" height="auto">
					<p>ACME delivery service is second to none; Wile E. can merely drop an order into a mailbox, and have the product in his hands within seconds.</p>
					<div class="stuff">
						<form method="post" action="">
							<h2>Please Log-In</h2>
							<?php echo $error; ?>
							<input id="field" type="text" name="un" placeholder="Username">
							<input id="field" type="password" name="pw" placeholder="Password">
							<button id="but" class="submit" type="submit" name="login-button">Log-In</button><br>
							<button id="but" formaction="create-account.php" class="reset" type="submit">Create Account</button>
						</form>
					</div>
				<?php else : ?>
					<h1 class="hello">Welcome to ACME's online shopping page!</h1>
					<img src="img/logo.png" width="auto" height="auto"><br><br>
					<p class="home">ACME delivery service is second to none; Wile E. can merely drop an order into a mailbox, and have the product in his hands within seconds.</p>
					<p class="home">ACME offers a wide range of home improvement products including hardware, automotive, electrical, lawn and garden, paint lumber, and plumbing. Find everything you need in one place, with the assurance of the highest level of customer service. </p>
				<?php endif; ?>
			</main>
		</div>
	</body>
</html>