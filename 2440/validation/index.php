<?php
	$errorName = $errorEmail = $errorPhone = $emsg = ""; $ec = 0;
		
	$errorMessage[1] = "<p class='warning'>Only letters and spaces allowed for Name!</p>";
	$errorMessage[2] = "<p class='warning'>Invalid Email!</p>";
	$errorMessage[4] = "<p class='warning'>Phone must be this format: (xxx)xxx-xxxx</p>";
	$errorMessage[5] = "<p class='warning'>Fill everything out!</p>";
	
	if(!empty($_GET['firstNamed'])) $errorName = $_GET['firstNamed'];
	if(!empty($_GET['emaild'])) $errorEmail = $_GET['emaild'];
	if(!empty($_GET['phoned'])) $errorPhone = $_GET['phoned'];
	if(!empty($_GET['ec'])) $ec = $_GET['ec'];
	
	switch($ec)
	{
		case 8: $emsg = $errorMessage[5]; break;
		case 7: $emsg = $errorMessage[1].$errorMessage[2].$errorMessage[4]; break;
		case 6: $emsg = $errorMessage[2].$errorMessage[4]; break;
		case 5: $emsg = $errorMessage[1].$errorMessage[4]; break;
		case 4: $emsg = $errorMessage[4]; break;
		case 3: $emsg = $errorMessage[2].$errorMessage[1]; break;
		case 2: $emsg = $errorMessage[2]; break;
		case 1: $emsg = $errorMessage[1]; break;
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Validation</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<main>
			<form action="process.php" method="post">
				<label for="firstName">Enter Your First Name:</label>
				<input type="text" id="firstName" name="firstName" value="<?php echo $errorName;?>" placeholder="John">
				<label for="email">Enter Your Email:</label>
				<input type="text" id="email" name="email" value="<?php echo $errorEmail;?>" placeholder="johnapple@email.com">
				<label for="phone">Enter Your Phone Number:</label>
				<input type="text" id="phone" name="phone" value="<?php echo $errorPhone;?>" placeholder='(123)456-7890'>
				<button type="submit" class="submit" value="Submit" name="submit-button">Submit</button>
				<button type="reset" class="reset" value="Reset">Reset</button>
				<?php
					echo $emsg; 
				?>
			</form>
		</main>
	</body>
</html>