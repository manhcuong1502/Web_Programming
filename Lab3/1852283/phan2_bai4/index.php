<html>
<head>
    <title>Lab3 phần 2 bài 4/title>
</head>
<body>
    <h1>List products</h1>
    <form action="a.php" method="GET">
        <input type="submit" value="List all products">
    </form>
</body>
</html>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM products";
$result = $conn->query($sql);


echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Image</th></tr>";

if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["image"] . "</td>";
        echo "</tr>";
    }
} else
?>