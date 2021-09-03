<?php 
	$access = "";
	if(isset($_POST['submit']))
	{
		$access = 0;
		$textFile = fopen('includes/users.txt', 'r');
		$usersFile = fread($textFile, filesize('includes/users.txt'));
	
		$fileArray = explode(',', $usersFile, 5);
		$returnString = implode('||>><<||', $fileArray);
		$finalArray = explode('||>><<||', $returnString, 8);
	
		$userArray = [];
		for ($i = 0; $i < sizeof($finalArray); $i+=2){
			$userArray[$i+1] = $finalArray[$i];
		}
	
		$pwArray = [];
		for ($i = 1; $i < sizeof($finalArray); $i+=2){
			$pwArray[$i+1] = $finalArray[$i];
		}
	
		fclose($textFile);  
		
		if(in_array(strtolower($_POST['user']), $userArray) && in_array(strtolower($_POST['password']), $pwArray))
		{
			if(strtolower($_POST['user']) == $userArray[1] && strtolower($_POST['password']) == $pwArray[2] 
			|| strtolower($_POST['user']) == $userArray[3] && strtolower($_POST['password']) == $pwArray[4] 
			|| strtolower($_POST['user']) == $userArray[5] && strtolower($_POST['password']) == $pwArray[6] 
			|| strtolower($_POST['user']) == $userArray[7] && strtolower($_POST['password']) == $pwArray[8])
			{
				$access = 0;
				if ($access == 0) $access = 'Access Granted';
			} 
			else $access = 1;
		} 
		else $access = 1;
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
							echo '<button type="reset" id="but" class="reset" value="Reset">Reset</button>';
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
					if (($_POST['user']) == $userArray[3])
					{
						echo '<p class="header">This is your page<br>'.$_POST['user'].'</p>';
					}
					if (($_POST['user']) == $userArray[5])
					{
						echo '<p class="header">Home Page of<br>'.$_POST['user'].'</p>';
					}
					if (($_POST['user']) == $userArray[7])
					{
						echo '<p class="header">Welcome Back!<br>'.$_POST['user'].'</p>';
					}
					echo '</form>';
				}	
			?>
    </body>
</html>