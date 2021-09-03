<?php
	session_start();
    $access = '';

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

	include_once('includes/functions.php');
    if(isset($_POST["submit"]))
	{
		$conn = mysqli_connect(HOST, USER, PASS, DB);
		$name = ((isset($_POST['un']) ? $_POST['un'] : false));
		$password = ((isset($_POST['pw']) ? $_POST['pw'] : false));

        $sql = "SELECT username FROM user WHERE username = '".$name."';";
        $result = mysqli_query($conn, $sql);
		
		$password = saltHash($password);
		
        $newAccount = 'INSERT INTO user (username, password) VALUES ("'.$name.'","'.$password.'");';
		
		if((isset($_GET['un'])) == "")
		{
			$access = '<p class="warning">Fields Cannot Be Blank</p>';
		}
		
        if(mysqli_num_rows($result) > 0){ 
            $access = '<p class="warning">Username already exists</p>';
        }
        else{ 
            mysqli_query($conn, $newAccount);
            $access = '<p class="valid">Success! Your account has been created.</p>';			
        }
		mysqli_close($conn);
    }   

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ACME Create Account</title>
		<meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <script defer src="js/script.js"></script>
    </head>
    <body>
		<div class="main-wrapper">
			<?php include('includes/nav.php'); ?>
			<main>
				<form id="field" method="post">
						<h1>Create your ACME account</h1>
						<?php 
							echo $access; 
						?>
						<input id="username" name="un" type="text" placeholder="Username">
						<p id="pin"></p>
						<p id="pins"></p>
						<p id="msg"></p>
						<input id="pw" name="pw" oninput="validate(this);" type="password" placeholder="Password">
						<input id="cpw" name="v-password" oninput="validate(this);" type="password" placeholder="Verify Pass">
						<div class="buttons">
							<button name="submit" id="main-button" type="submit">Create Account</button><br>
							<button type="reset" id="but" class="reset" value="Reset">Reset</button>
							<button id="but" formaction="index.php" type="submit" class="submit">Login</button>
						</div>
				</form>
			</main>
		</div>
    </body>
</html>