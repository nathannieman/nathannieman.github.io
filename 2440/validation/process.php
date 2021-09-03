<?php
	$ec = 0;
	
	if(!empty($_POST['firstName']) && !empty($_POST['email']) && !empty($_POST['phone']))
	{
		$firstNames = $_POST['firstName'];
		$emails = $_POST['email'];
		$phones = $_POST['phone'];
		
		if (!preg_match("/^[a-zA-Z-' ]*$/",$firstNames)) 
		{
			$eName = $firstNames;
			$eEmail = $emails;
			$ePhone = $phones;
			$ec += 1;
		}
		if (!preg_match("/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i",$emails))
		{
			$eName = $firstNames;
			$eEmail = $emails;
			$ePhone = $phones;
			$ec += 2;
		}
		if (!preg_match("/\(?\d{3}\)?\d{3}-\d{4}$/",$phones))
		{
			$eName = $firstNames;
			$eEmail = $emails;
			$ePhone = $phones;
			$ec += 4;
		}
		if ($ec) header('location: .?firstNamed='.$_POST['firstName'].'&emaild='.$_POST['email'].'&phoned='.$_POST['phone'].'&ec='.$ec);
	}
	else
	{
		if (!empty($_POST['firstName'])) $eName = $_POST['firstName'];
		if (!empty($_POST['email'])) $eEmail = $_POST['email'];
		if (!empty($_POST['phone'])) $ePhone = $_POST['phone'];
		header('location: .?sub=true&firstNamed='.$_POST['firstName'].'&emaild='.$_POST['email'].'&phoned='.$_POST['phone'].'&ec=8');
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Process</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<form>
			<label>Your First Name:</label>
			<div id="php">
				<?php
					echo $firstNames;
				?>
			</div>
			<label>Your Email:</label>
			<div id="php">
				<?php
					echo $emails;
				?>
			</div>
			<label>Your Phone Number:</label>
			<div id="php">
				<?php
					echo $phones;
				?>
			</div>
			<p id="message">Thank You! Now I have your information...</p>
		</form>
	</body>
</html>