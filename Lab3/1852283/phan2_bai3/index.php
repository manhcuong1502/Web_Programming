<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VIEW PRODUCTS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
         rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">       
    </head>
    <body>
        <div class="container my-5">
            <h3>READ PRODUCTS</h3>
            <a class="btn btn-primary" href="add.php" role="button">Create New Product</a>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
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
                            <tr>
                                <td class='col-md-1'>$row[id]</td>
                                <td class='col-md-2'>$row[name]</td>
                                <td class='col-md-5'>$row[description]</td>
                                <td class='col-md-2'>$row[price]</td>
                                <td class='col-md-2'>
                                    <a class='btn btn-info' href='read.php?id=$row[id]' role='button'>Read</a>
                                    <a class='btn btn-primary' href='edit.php?id=$row[id]' role='button'>Edit</a>
                                    <a class='btn btn-danger' href='#' role='button'>Delete</a>
                                </td>
                            </tr>
                        ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>