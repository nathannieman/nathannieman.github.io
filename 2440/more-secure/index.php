<?php 
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
	
	function connectToDB()
	{
		$conn = mysqli_connect(HOST,USER,PASS,DB);
		return $conn;
	}

	$access = '';
	if(isset($_POST['submit']))
	{
		$con = connectToDB();
		$sql = 'SELECT * FROM password;';
		$results = mysqli_query($con, $sql);
		if(!mysqli_num_rows($results)) return false;
		while ($record = mysqli_fetch_array($results, MYSQLI_ASSOC))
		{
			$id[] = $record['id'];
			$user[] = $record['username'];
			$pass[] = $record['password'];
			$login[] = $record['logins'];
		}
		
		$idArray = [];
		for ($i = 0; $i < sizeof($id); $i+=1){
			$idArray[$i] = $id[$i];
		}
		
		$userArray = [];
		for ($i = 0; $i < sizeof($user); $i+=1){
			$userArray[$i] = $user[$i];
		}
	
		$pwArray = [];
		for ($i = 0; $i < sizeof($pass); $i+=1){
			$pwArray[$i] = $pass[$i];
		}
		
		if(in_array(strtolower($_POST['user']), $userArray) && in_array(strtolower($_POST['password']), $pwArray))
		{
			if(strtolower($_POST['user']) == $userArray[1] && strtolower($_POST['password']) == $pwArray[1] 
			|| strtolower($_POST['user']) == $userArray[2] && strtolower($_POST['password']) == $pwArray[2] 
			|| strtolower($_POST['user']) == $userArray[3] && strtolower($_POST['password']) == $pwArray[3] 
			|| strtolower($_POST['user']) == $userArray[4] && strtolower($_POST['password']) == $pwArray[4])
			{
				$access = 0;
				if($access == 0) $access = 'Access Granted';		
			} 
			else $access = 1;
		} 
		else $access = 1;
		
		mysqli_close($con);
	} 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Insecurity</title>
        <link type="text/css" rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <?php 
            ob_start();
            include ('includes/users.txt'); 
            $data = ob_get_clean();

				if($access == 1 || $access == "")
				{
					if ($access == 1) echo '<p class="warning">Access Denied</p>'; else echo '';
					echo '<form id="field" method="post">';
						echo '<div class="stuff">';
							echo '<label for="userName" id="field">Enter Your Userame:</label>';
							echo '<input name="user" id="field" type="text" placeholder="Username" value="">';
						echo '</div>';
						echo '<div class="stuff">';
							echo '<label for="password" id="field">Enter Your Password:</label>';
							echo '<input name="password" id="field" type="password" placeholder="Password" value="">';
						echo '</div>';
						echo '<div class="buttons">';
							echo '<button name= "submit" id="but" class="submit" type="submit">Log In</button>';
							echo '<button type="reset" id="but" class="reset" value="Reset">Reset</button><br>';
							echo '<button id="but" formaction="create-account.php" type="submit">Create Account</button>';
						echo '</div>';
					echo '</form>';
				}
				else
				{
					echo '<form id="field">';
					echo '<h1 class="header">'.$access.'</h1>';
					echo '<h2 class="header">Hello<br>'.$_POST['user'].'</h2>';
					if (($_POST['user']) == $userArray[1])
					{
						echo '<p class="header">Welcome to your page<br>'.$_POST['user'].'</p>';
					}
					if (($_POST['user']) == $userArray[2])
					{
						echo '<p class="header">This is your page<br>'.$_POST['user'].'</p>';
					}
					if (($_POST['user']) == $userArray[3])
					{
						echo '<p class="header">Home Page of<br>'.$_POST['user'].'</p>';
					}
					if (($_POST['user']) == $userArray[4])
					{
						echo '<p class="header">Welcome Back!<br>'.$_POST['user'].'</p>';
					}
					echo '</form>';
				}	
			?>
    </body>
</html>