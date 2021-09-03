<?php
	function saltHash($word)
	{
		$salt1 = 'ruoiweufjajoaiwrjflkasdjlfksdkjfl;asdjlfka';
		$salt2 = 'adfjlsdfo42we80uoialgjsd;ofjahfkljask';
		
		$word = $salt1.$word.$salt2;
		$word = hash('sha512', $word);
		
		return $word;
	}
	
	function isGranted()
	{
		if(isset($_SESSION['granted'])) return true;
		
		return false;
	}
	
	function eatCookie($name)
	{
		setcookie($name, '', time()-3600);
	}
?>