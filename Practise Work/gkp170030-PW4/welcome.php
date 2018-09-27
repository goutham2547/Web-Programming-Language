<?php
	session_start();
	if(!isset($_SESSION['sess_name'])){
		header('Location: login.html');
		exit();
	}
	if(isset($_SESSION['count']))
  {
  	  $_SESSION['count']++;
  }
  else {
	$_SESSION['count']=1;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome!</title>
</head>
<body>
	<h1>Welcome <?php echo $_SESSION["sess_name"] ?></h1>
	<p> You have visited the website for <?php echo $_SESSION['count'] ?> </p>
	<form method="post" action="logou.php">
	<input type="submit" name="submit" value="Sign out">
	</form>
	<br>
	<br>
	<form method="post" action="welcome.php">
	<input type="submit" name="submit" value="Refresh">
	</form>
</body>
</html>