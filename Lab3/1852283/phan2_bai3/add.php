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
    $name ="";
    $description="";
    $price ="";
    $img_name ="";
    $img_size ="";
    $img_name ="";
    $img_err ="";
    
    $errMessage = "";
    $succesMessage="";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST["name"];
        $description=$_POST["description"];
        $price =$_POST["price"];
        if(isset($_FILES['file'])){
            $img_name = $_FILES['file']['name'];
            $img_size = $_FILES['file']['size'];
            $tmp_name = $_FILES['file']['tmp_name'];
            $img_err = $_FILES['file']['error'];
            $allowedExts = array("jpg", "jpeg", "gif", "png");
            $nameParts = explode(".", $_FILES["file"]["name"]);
            $extension = end($nameParts);
        }
        do{
            if(empty($name) || empty($description) || empty($price) || empty($img_name)){
                $errMessage = "All the fields are requried";
                break;
            }
            if(strlen($name) <= 5){
                $errMessage = "Please enter name.";
                break;
            }
            if(strlen($img_name) > 255){
                $errMessage = "Your image name too long.";
                break;
            }
            if(!is_numeric($price)){
                $errMessage = "Please enter price.";
                break;
            }
            if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/png")
            || ($_FILES["file"]["type"] == "image/pjpeg"))
            && ($_FILES["file"]["size"] < 2000000)
            && in_array($extension, $allowedExts)) {
                if ($_FILES["file"]["error"] > 0) {
                    $errMessage =  "Return Code: " . $_FILES["file"]["error"];
                    break;
                }
                else {
                    if (file_exists("upload/" . $_FILES["file"]["name"])) {
                        $errMessage = $_FILES["file"]["name"] . " already exists. ";
                        break;
                    }
                    else {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                    "upload/" . $_FILES["file"]["name"]);
                    }
                }
            }
            else {
                $errMessage = "Invalid file";
                break;
            }

            $sql = "INSERT INTO products (name,description,price,image)" .
                    "VALUES ('$name' ,'$description',  '$price', '$img_name') ";
            $result = $conn->query($sql);
            if(!$result){
                $errMessage = "Invalied query" . $conn->error;
                break;
            }
            $name ="";
            $description="";
            $price ="";
            $img_name ="";
            $img_size ="";
            $img_name ="";
            $img_err ="";
            
            $errMessage = "";
            $succesMessage="Complete!";            

        }while(false);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
         rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">       
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>ADD</title>
</head>
<body>
        <div class="container my-5">
            <h3>NEW DATA</h3>
            <?php
                if(!empty($errMessage)){
                    echo "
                    <div class='alert alert-danger' role='alert'> 
                    $errMessage
                    </div>
                    ";
                }
            ?>
            <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" maxlength="40" value="<?php echo $name?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3" maxlength="5000"><?php echo $description?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" maxlength="40" value="<?php echo $price?>">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" name="file" id="file">
                <br>
                <?php
                    if(!empty($img_name)){
                        $link = "upload/" .$img_name;
                        if(strpos($img_name, 'http') === 0 || strpos($img_name, 'https') === 0) {
                            // the url starts with http or https
                            // strpos
                            echo "
                            <img src= '$img_name' alt='$img_name' style='height:200px; width:200px;'>
                            ";
                        }else{
                            echo "
                            <img src= '$link' alt='$img_name' style='height:200px; width:200px;'>
                            ";
                        }
                    }
                ?>
            </div>
            <?php
                if(!empty($succesMessage)){
                    echo "
                    <div class='alert alert-primary' role='alert'> 
                    $succesMessage
                    </div>
                    ";
                }
            ?>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancel</a>
            </form>
        </div>
</body>
</html>