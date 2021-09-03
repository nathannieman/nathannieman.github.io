<?php
    $option = $result = $show= false;
	 if ($_SERVER['HTTP_HOST'] == 'localhost')
	{
		define('HOST', 'localhost');
		define('USER', 'root');
		define('PASS', '1550');
		define('DB', 'webPoll');
	}
	else
	{
		define('HOST', 'sql101.freesite.vip');
		define('USER', 'frsiv_27675738');
		define('PASS', 'Nastynate15');
		define('DB', 'frsiv_27675738_webPoll');
	}
    if(isset($_GET['show'])) {
        $show = true;
    }
    if (isset($_GET['optionsRadios'])) {
        $option = $_GET['optionsRadios'];
        $mysqli = new mysqli(HOST,USER,PASS,DB);
        if ($mysqli ->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }
        $sql = "INSERT INTO votes (content) VALUES ('" . mysqli_real_escape_string($mysqli, $option). "')";
        if ($mysqli->query($sql) === false) {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
            exit();
        }

        $group = "SELECT *, COUNT(*) AS votes FROM votes group by content order by votes desc";
        $result = $mysqli->query($group);

        $totalVotes = "SELECT COUNT(*) AS total FROM votes;";
        $numResult = $mysqli->query($totalVotes);
        $row = $numResult -> fetch_assoc();
        $total = $row['total'];
        $mysqli->close();
        header("location: index.php?show=true");
        die();
        
    }
    if ($show) {
        $mysqli = new mysqli(HOST,USER,PASS,DB);
        if ($mysqli ->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $group = "SELECT *, COUNT(*) AS votes FROM votes group by content order by votes desc";
        $result = $mysqli->query($group);

        $totalVotes = "SELECT COUNT(*) AS total FROM votes;";
        $numResult = $mysqli->query($totalVotes);
        $row = $numResult -> fetch_assoc();
        $total = $row['total'];
        $mysqli->close();
        
    }
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Web-Poll</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	<div>
   <br><br><br>
   <?php 
		if (!$show) 
		{ 
			echo '<div class="container">';
				echo '<h1>Whats the best pet?</h1><hr>';
					echo '<form action="index.php">';
						echo '<ol>';
						echo '<li class="list">';
							echo '<div class="radio">';
								echo '<label><input type="radio" name="optionsRadios" value="Dog"><span>Dogs</span></label></div></li>';
						echo '<li class="list">';
							echo '<div class="radio">';
								echo '<label><input type="radio" name="optionsRadios" value="Cat"><span>Cats</span></label></div></li>';
						echo '<li class="list">';
							echo '<div class="radio">';
								echo '<label><input type="radio" name="optionsRadios" value="Fish"><span>Fish</span></label></div></li>';
						echo '<li class="list">';
							echo '<div class="radio">';
								echo '<label><input type="radio" name="optionsRadios" value="Reptile"><span>Reptile</span></label></div></li></ol><br>';
								echo '<div class="footer">';
								echo '<button type="submit" class="but">Submit</button></div>';
					echo '</form></div>';
		} 
		if ($show) 
		{
			echo '<div class="container">';
				echo '<h1>Thanks for Voting!</h1><hr>';
               echo '<form action="index.php">';
							echo '<ol class="list">';
								while($row = $result->fetch_assoc()) 
								{ 
									echo '<li class="radio"><span></span>'.$row['content'].' Votes:<span></span>'.$row['votes'].'<span></span>('.number_format(($row['votes'] * 100)/ $total  , 2) .'%)</li>';
								}
							echo '</ol>';
                  echo '<br>';
                  echo '<div class="footer">';
                     echo '<button class="but"><a href="index.php">Home</a></button>';
                  echo '</div></form></div>';
	} 
	?>
	</div>
	</body>
</html>