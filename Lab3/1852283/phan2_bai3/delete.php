<?php

    if(isset($_GET["id"])){
        $id = $_GET["id"];
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

        $sql1 = "SELECT * FROM products WHERE id=$id";
        $result = $conn->query($sql1);
        $row = mysqli_fetch_assoc($result);
        $img_name =$row['image'];

        if($img_path = "upload/" . $img_name){
            unlink($img_path);
        }

        $sql = "DELETE FROM products WHERE id =$id";
        $conn->query($sql);
    }



    header("location: index.php");
    exit;
?>
