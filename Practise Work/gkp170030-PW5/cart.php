<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
</head>
<body>

<?php
$user = 'root';
$password = 'root';
$db = 'bookstore';
$host = 'localhost';
$port = 3306;
$conn = mysqli_connect(
   $host, 
   $user, 
   $password, 
   $db,
   $port
);

if (!$conn){
	echo "Connection failed!";
	exit;
}

session_start();
$bokid = $_GET["bookid"];
$name= $_SESSION["sess_name"];

$sql1 = "INSERT INTO bookstore.shoppingcart (UserName,BookID) VALUES ('$name','$bokid')";
if ($conn->query($sql1) === TRUE) {
   echo "<b>Book added to cart</b>";
	} 
else {
    echo "<b>Book already in cart</b>";
	}

$sql2 = "SELECT * FROM Book,shoppingcart WHERE Book.BookID=shoppingcart.BookID AND shoppingcart.UserName='$name'";
$result = mysqli_query($conn, $sql2);

echo "<table class='table table-striped'><tr><td>Book Title</td><td>Listed Price</td></tr>";
while($row = mysqli_fetch_array($result)){
  echo "<tr><td>". $row["BookTitle"] ."</td><td>". $row["ListPrice"]."</td></tr>";
  $sum += $row['ListPrice'];
}
echo "</table>";
echo "<br>";
echo "<hr>";
echo "&nbsp&nbspCart Total: $sum";
mysqli_close($conn);
?>

<hr>
<a href="books.php">Continue Shopping</a>
</br>
<a href="logout.php">Logout</a>



</body>
</html>


