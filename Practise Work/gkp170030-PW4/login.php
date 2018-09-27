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
   

  if (empty($_POST["mail1"])) {
    $emailErr = "lala";
  } else {
    $email = test_input($_POST["mail1"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "lala"; 
    }
  }
  

  if(!empty($_POST["password"])){	
   $password = test_input($_POST["password"]);
   if (strlen($_POST["password"]) < 6) {
        $passwordErr = "Your Password Must Contain At Least 6 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
} 
  }
  if($nameErr =='' && $passwordErr =='' && $emailErr=='')
  {$_SESSION['sess_name'] = $name;
  $_SESSION['sess_mail'] = $email;
  header('Location: welcome.php');}
  else
  {header('Location: login.html');}


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>