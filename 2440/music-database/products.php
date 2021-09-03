<!DOCTYPE html>
<html>
	<head>
		<title>Product Page</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<ul>
			<div class="navlist-right">
			<li><a href="index.php">Home</a></li>
			<li><a href="music.php">Music</a></li>
			<li><a class="active"  href="products.php">Products</a></li>
			</div>
		</ul>
		<main>
			<?php
				if(empty($_POST['sub-button']))
				{
					$emsg = "";
					
					if(!empty($_GET['sh'])) $eshirt = $_GET['sh']; else $eshirt="";
					if(!empty($_GET['co'])) $ecolor = $_GET['co']; else $ecolor="";
					if(!empty($_GET['sz'])) $esize = $_GET['sz']; else $esize="";
					if(!empty($_GET['sy'])) $estyle = $_GET['sy']; else $estyle="";
					if(!empty($_GET['fn'])) $fn = $_GET['fn']; else $fn="";
					if(!empty($_GET['ln'])) $ln = $_GET['ln']; else $ln="";
					if(!empty($_GET['em'])) $em = $_GET['em']; else $em="";
					if(!empty($_GET['ph'])) $ph = $_GET['ph']; else $ph="";
					if(!empty($_GET['ad'])) $ad = $_GET['ad']; else $ad="";
					if(!empty($_GET['ad1'])) $ad1 = $_GET['ad1']; else $ad1="";
					
					if(!empty($_GET['ec'])) $ec = $_GET['ec']; else $ec = 0;
					
					switch($ec)
					{
						case 9: $emsg = "<p class='warning'>Please Select a Style!</p>"; break;
						case 8: $emsg = "<p class='warning'>Please Select a Size!</p>"; break;
						case 7: $emsg = "<p class='warning'>Please Select a Color!</p>"; break;
						case 6: $emsg = "<p class='warning'>Please Select a Band or Artist!</p>"; break;
						case 5: $emsg = "<p class='warning'>Forgot To Enter Address!</p>"; break;
						case 4: $emsg = "<p class='warning'>Forgot To Enter Phone Number!</p>"; break;
						case 3: $emsg = "<p class='warning'>Invalid Email!</p>"; break;
						case 2: $emsg = "<p class='warning'>Forgot To Enter Last Name!</p>"; break;
						case 1: $emsg = "<p class='warning'>Forgot To Enter First Name!</p>"; break;
					}
					
					echo '<form method="post" action="products.php">';
						echo '<table id="tshirt">';
							echo '<thead>';
							echo '<tr>';
								echo '<th colspan="2"><h1>Purchase A Product</h1></th>';
							echo '</tr>';
							echo '</thead>';
							echo '<tr>';
								echo "<td>Which band or Artist?</td>";
									echo '<td>';
										echo '<select name="sh">';
											echo '<option value="" disabled '.($eshirt ? "" : " selected ").' hidden>Choose A Band or Artist</option>';
												$tshirt = array("Radiohead","The White Stripes","The Offspring","Isaiah Rashad","Outkast","Black Star","Juice Wrld","Jimmy Hendrix","Kanye West","Eminem");
												foreach($tshirt as $sh)
													echo '<option '.($sh == $eshirt ? " selected " : "").' value="'.$sh.'">'.$sh.'</option>';
										echo '</select>';
									echo '</td>';
								echo '</tr>';
								echo '<tr>';
								echo '<td>Which color?</td>';
									echo '<td>';
										echo '<select name="co">';
											echo '<option value="" disabled '.($ecolor ? "" : " selected ").' hidden>Choose A Color</option>';
												$color = array("Red","Yellow","White","Black","Blue", "Green");
												foreach ($color as $co) 
													echo '<option '.($co == $ecolor ? " selected " : "").' value="'.$co.'">'.$co.'</option>';
										echo '</select>';
									echo '</td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>What size?</td>';
									echo '<td>';
										echo '<select name="sz">';
											echo '<option value="" disabled '.($esize ? "" : " selected ").' hidden>Choose A Size</option>';
												$size = array("XS","S","M","L","XL","XXL");
												foreach ($size as $sz) 
													echo '<option '.($sz == $esize ? " selected " : "").' value="'.$sz.'">'.$sz.'</option>';
										echo '</select>';
									echo '</td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>What Style?</td>';
									echo '<td>';
										echo '<select name="sy">';
											echo '<option value="" disabled '.($estyle ? "" : " selected ").' hidden>Choose A Style</option>';
												$style = array("Hoodie","Short-Sleeve","Long-Sleeve","Jersey","Tank-Top");
												foreach ($style as $sy)
													echo '<option '.($sy == $estyle ? " selected " : "").' value="'.$sy.'">'.$sy.'</option>';
										echo '</select>';
									echo '</td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>First name</td>';
								echo '<td><input type="text" name="fname" value="'.$fn.'" placeholder="John"></td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>Last name</td>';
								echo '<td><input type="text" name="lname" value="'.$ln.'" placeholder="Appleseed"></td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>Email</td>';
								echo '<td><input type="email" name="email" value="'.$em.'" placeholder="johnapple@email.com"></td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>Phone</td>';
								echo '<td><input type="text" name="phone" value="'.$ph.'" placeholder="(123)456-7890"></td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>Mailing address</td>';
								echo '<td><input type="text" name="address" value="'.$ad.'" placeholder="123 E 1234 W"></br><input type="text" name="address1" value="'.$ad1.'" placeholder="Oakley, CA 94561"></td>';
							echo '</tr>';
							echo '<tr>';
								echo "<td colspan='2'>";
									echo $emsg;
									echo '<input class="button" type="submit" name="sub-button" value="Submit"/>';
									echo '<input type="reset" class="button">';
								echo '</td>';
							echo '</tr>';
						echo '</table>';
					echo '</form>'; 
				}
				else
				{
					$ec = 0;
		
					if (!empty($_POST['address'])) $ad = $_POST['address']; else {$ad=""; $ec =5;}
					if (!empty($_POST['address1'])) $ad1 = $_POST['address1']; else {$ad1=""; $ec =5;}
					if (!empty($_POST['phone'])) $ph = $_POST['phone']; else {$ph=""; $ec =4;}
					if (!empty($_POST['email'])) $em = $_POST['email']; else {$em=""; $ec =3;}
					if (!empty($_POST['lname'])) $ln = $_POST['lname']; else {$ln=""; $ec =2;}
					if (!empty($_POST['fname'])) $fn = $_POST['fname']; else {$fn=""; $ec =1;}
					if (!empty($_POST['sy'])) $sy = $_POST['sy']; else {$sy=""; $ec =9;}
					if (!empty($_POST['sz'])) $sz = $_POST['sz']; else {$sz=""; $ec =8;}
					if (!empty($_POST['co'])) $co = $_POST['co']; else {$co=""; $ec =7;}
					if (!empty($_POST['sh'])) $sh = $_POST['sh']; else {$sh=""; $ec =6;}
					
					if($ec) header('location: ?sh='.$sh.'&co='.$co.'&sz='.$sz.'&sy='.$sy.'&fn='.$fn.'&ln='.$ln.'&em='.$em.'&ph='.$ph.'&ad='.$ad.'&ad1='.$ad1.'&ec='.$ec);
					
					else
					{
						echo '<table id="tshirt">';
							echo '<thead>';
							echo '<tr>';
								echo '<th colspan="2"><h1>Thank You For Your Order</h1></th>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>First name:</td>';
								echo '<td>'.$_POST['fname'].'</td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>Last name:</td>';
								echo '<td>'.$_POST['lname'].'</td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>Email:</td>';
								echo '<td>'.$_POST['email'].'</td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>Phone:</td>';
								echo '<td>'.$_POST['phone'].'</td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>Mailing address:</td>';
								echo '<td>'.$_POST['address'].'<br>'.$_POST['address1'].'</td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>Ordered:</td>';
								echo '<td>Band: '.$sh.'<br>Color: '.$co.'<br>Size: '.$sz.'<br>Style: '.$sy.'</td>';
							echo '</tr>';
						echo '</table>';
					}						
					
				}
			?>
		</div>
	</body>
</html>