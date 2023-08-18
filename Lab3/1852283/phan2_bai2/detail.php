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

    $id="";
    $name ="";
    $description="";
    $price ="";
    $img_name ="";
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(!isset($_GET['id'])){
            header("location: index.php");
            exit;
        }
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id=$id";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        if(!$row){
            header("location: index.php");
            exit;
        }
        $name =$row['name'];
        $description=$row['description'];
        $price =$row['price'];
        $img_name =$row['image'];

    }
?>
<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab3 phần 2 bài 2</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
         rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">       
    </head>
    <body>
        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">hoangpc.com</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Bán phụ kiện</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 border bg-white">
                    <div class="row border">
                        <div class="item-button" id ="cate">
                            <b>
                                Categories
                            </b>
                        </div>
                    </div>
                    <div>
                        <div class="list-group" id="cate-item">
                            <button type="button" class="list-group-item list-group-item-action ">
                              Item 1
                            </button>
                            <button type="button" class="list-group-item list-group-item-action">Item 2</button>
                            <button type="button" class="list-group-item list-group-item-action">Item 3</button>
                            <button type="button" class="list-group-item list-group-item-action">Item 4</button>
                            <button type="button" class="list-group-item list-group-item-action">Item 5</button>
                          </div>
                    </div>
                    <div class="row border">
                        <div class="item-button" id="pro">
                            <b>
                                Top produts
                            </b>
                        </div>
                    </div>
                    <div class="list-group" id="pro-item">
                        <button type="button" class="list-group-item list-group-item-action ">
                          Item 1
                        </button>
                        <button type="button" class="list-group-item list-group-item-action">Item 2</button>
                        <button type="button" class="list-group-item list-group-item-action">Item 3</button>
                        <button type="button" class="list-group-item list-group-item-action">Item 4</button>
                        <button type="button" class="list-group-item list-group-item-action">Item 5</button>
                    </div>
                </div>
                <div class="col-md-8 border">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="index.php" style="text-decoration: none">Trang Chủ</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Phụ kiện máy tính</li>
                        </ol>
                    </nav>
                    <div class="row" style="margin-bottom:100px ;">
                        <div class="col-7" id="img">
                            <div>
                                <img src="<?php echo $img_name; ?>" width="100%" alt="" id="MainImg" style="margin-bottom: 10px;">

                                <div class="small-img-group">
                                    <div class="small-img-col">
                                        <img src="<?php echo $img_name; ?>" width="100%" alt="" class="small-img">
                                    </div>
                                    <div class="small-img-col">
                                        <img src="<?php echo $img_name; ?>" width="100%" alt="" class="small-img">
                                    </div>
                                    <div class="small-img-col">
                                        <img src="<?php echo $img_name; ?>" width="100%" alt="" class="small-img">
                                    </div>
                                     <div class="small-img-col">
                                        <img src="<?php echo $img_name; ?>" width="100%" alt="" class="small-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5" id="content">
                            <div style="margin-top: 20px;">
                                <p style="margin-bottom: 0;">
                                    TRIBAN
                                </p>
                                <h3>
                                    <?php echo $name; ?>
                                </h3>
                                <p style="color:#aeadad;margin-bottom: 0;">
                                    <?php echo "Mã sản phẩm:". $id; ?>
                                </p>
                                <h4>Mục đích sản phẩm:</h4>
                                <p>
                                    <?php echo $description; ?>
                                </p>
                                <h4><?php echo "Giá sản phẩm: ". $price ."đ"; ?></h4>
                                <div style="text-align:center" >
                                    <button type="button" class="btn btn-outline-primary" >Mua ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h3>
                            Chi tiết sản phẩm
                        </h3>
                        <p style="margin-left: 10px;">
                            <?php echo $description; ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-2 border" id ="banner">
                    <div class ="row border">
                        <img src="https://downloadwap.com/thumbs2/wallpapers/p2/2019/patterns/24/c2b69bc313499604.jpg" class="rounded" alt="banner" style="height:800px">
                    </div>
                    <div class ="row border" style="height: 200px;">

                    </div>
                </div>
            </div>
            <div class="row text-center bg-primary text-white" >
                <p>
                    Footer information...<br>
                    <a class="text-white" href="#">Link 1</a> |
                    Link 2 |
                    <a class="text-white" href="#">Link 3</a>
                </p>
            </div>
          </div>
          <script src="script.js"></script>
    </body>
</html>
