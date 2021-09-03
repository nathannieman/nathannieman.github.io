<nav>
	<ul>
		<img src="img/logo1.png" width="auto" height="50" id="logo">
		<?php echo (!isGranted() ? '<li><a href=".">Log-In</a></li>' : ''); ?> 
		<?php echo (!isGranted() ? '<li><a href="create-account.php">Create Account</a></li>' : ''); ?> 
		<?php echo (isGranted() ? '<li><a href=".">Home</a></li>' : ''); ?> 
		<li><a href="catalog.php">Products</a></li>
		<?php echo (isGranted() ? '<li><a href="cart.php">View Cart</a></li>' : ''); ?> 
		<?php echo (isGranted() ? '<li><a href="logout.php">Log-Out</a></li>' : ''); ?> 
	</ul>
</nav>
