<?php
	
  session_start();

  error_reporting(E_ALL);
	$nameErr = $emailErr = $passwordErr = "";
	$name = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $_SESSION = array();
  if (empty($_POST["name"])) {
    $nameErr = "lala";
  } else {
    $name = test_input($_POST["name"]);

  }
  

  if(!empty($_POST["password"])){	
   $password = test_input($_POST["password"]);  
} 
else {
	$passwordErr="lalalalla";
}

  }
  if($nameErr =='' && $passwordErr =='')
  {$_SESSION['sess_name'] = $name;
  header('Location: books.php');}
  else
  {header('Location: login.html');}


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>