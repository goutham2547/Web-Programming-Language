<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<?
$search = $_GET["search"];
?>


<form action="books.php" method="GET">
<input type="text" name="search" value="<? echo $search ?>">
<input type="submit" value="Search">
</form>


<?

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

$sql = "SELECT * FROM Book";

if ($search){
	$sql .= " WHERE BookTitle LIKE '%$search%' ";

}


$result = mysqli_query($conn, $sql);

echo "<table class='table table-striped'><tr><td>Book Title</td><td>List Price</td></tr>";

while($row = mysqli_fetch_array($result)){
	echo "<tr><td>". $row["BookTitle"] ."</td><td>". $row["ListPrice"]."</td>";
	echo "<td><a href = 'cart.php?bookid=".$row["BookID"]."'>Add to the cart</a></td>";
    echo "</tr>";
}

echo "</table>";
mysqli_close();

?>

</body>
</html>
