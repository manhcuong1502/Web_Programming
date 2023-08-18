<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shop";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql ="SELECT * FROM products";
    $result = $conn->query($sql);
    if(!$result){
        die("Connection failed: " . $conn->connect_error);
    }

    while($row = mysqli_fetch_array($result)){
        echo "
        <div class='col-sm-4'>
            <div class='card' >
                <img class='card-img-top' src='$row[image]' alt='Card image cap' style='height:200px;'>
                <div class='card-body text-center'>
                    <p class='card-text'>Price: 10$</p>
                    <a href='detail.php?id=$row[id]' class='btn btn-primary'>Buy now</a>
                </div>
                </div>
        </div>
    ";
    }
?>