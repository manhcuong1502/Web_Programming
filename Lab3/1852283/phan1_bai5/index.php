<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab3 phần 1 bài 5</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">       
    </head>
   <body>
   <?php include 'caculator.php';?>
      <div class="container text-center" style="margin-top: 100px;">
         <div class="row">
           <div class="col-2">

           </div>
           <div class="col-8">
            <form method="post" action="index.php">              
               <div class="input-group mb-3" style="width: 50%; margin: auto;">
                  <span class="input-group-text" id="inputGroup-sizing-default">A :</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="A" name="A">
               </div>
               <div class="input-group mb-3" style="width: 50%; margin: auto;">
                  <span class="input-group-text" id="inputGroup-sizing-default">B :</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="B" name="B">
               </div>
               <div class="input-group mb-3" style="width: 50%; margin: auto;">
                  <span class="input-group-text" id="inputGroup-sizing-default">Kết quả :</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="rs" name="rs" 
                  value = "<?php echo (isset($result))?$result:'';?>">
               </div>
               <button type="submit" class="btn btn-info" value="cong" name="mybutton">Cộng</button>
               <button type="submit" class="btn btn-info" value="tru" name="mybutton">Trừ</button>
               <button type="submit" class="btn btn-info" value="nhan" name="mybutton">Nhân</button>
               <button type="submit" class="btn btn-info" value="chia" name="mybutton">Chia</button>
               <button type="submit" class="btn btn-info" value="luythua" name="mybutton">Lũy Thừa</button>
               <button type="submit" class="btn btn-info" value="nghichdao" name="mybutton">Nghịch Đảo</button>
                  <br>
            </form>
           </div>
           <div class="col-2">
           </div>
         </div>
       </div>
   </body>
   </head>
</html>
