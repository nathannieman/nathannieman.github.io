<?php
    $access = '';

    if ($_SERVER['HTTP_HOST'] == 'localhost')
	{
		define('HOST', 'localhost');
		define('USER', 'root');
		define('PASS', '1550');
		define('DB', 'passwords');
	}
	else
	{
		define('HOST', 'sql101.freesite.vip');
		define('USER', 'frsiv_27675738');
		define('PASS', 'Nastynate15');
		define('DB', 'frsiv_27675738_passwords');
	}

    $conn = mysqli_connect(HOST, USER, PASS, DB);

    if(isset($_POST["submit"])){

        $name = $_POST["username"]; 
        $password = $_POST["password"]; 
        $secretCode = $_POST["secret-code"];

        $sql = "SELECT username FROM user_table WHERE username = '".$name."';";
        $result = mysqli_query($conn, $sql);

        $secret = "SELECT secretCode FROM secret_table WHERE secretCode = '".$secretCode."';";
        $check = mysqli_query($conn, $secret);

        $newAccount = "INSERT INTO user_table (username, password) VALUES ('".$name."', password('".$password."'));";

        if(mysqli_num_rows($result) > 0){ 
            $access = '<p>Username already exists</p>';
        }
        else if(mysqli_num_rows($check) == 0){
            $access = '<p>The secret code you submitted is incorrect</p>';
        }
        else{ 
            mysqli_query($conn, $newAccount);
            $access = '<p>Congrats! Your account has been created.</p>';
        }
    }   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Less of an Insecurity</title>
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <script src="js/script.js"></script>
    </head>
    <body>
    <?php 
        echo $access; 
    ?>
        <form id="field" method="post">
				<div class="stuff">
            <input  id="field" name="username" type="text" placeholder="Username">
            <input id="field" name="password" oninput="verifyStuff(this);" type="password" placeholder="Password">
            <input id="field" oninput="verifyStuff(this);" type="password" placeholder="Verify Password">
            <input id="field" name= "secret-code" type="password" placeholder="Secret Code">
            <button name= "submit" id="but" class="submit" type="submit">Create Account</button> 
            <button type="reset" id="but" class="reset" value="Reset">Reset</button> 
				</div>
        </form>
        <p id="confirm-password"></p>
    </body>
</html>