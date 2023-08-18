<?php
$result;
 if(isset($_POST['mybutton']))
 {
     if(($_POST['mybutton'] == "nghichdao")){
        if(is_numeric($_POST["A"]) && !is_numeric($_POST['B'])){
            $result = 1/$_POST["A"];
        }else if(!is_numeric($_POST["A"]) && is_numeric($_POST['B'])){
            $result = 1/$_POST["B"];
        }else{
            echo "<script type='text/javascript'>alert('Please enter A or B');</script>";
        }
     }
     else if(is_numeric($_POST["A"]) && is_numeric($_POST['B'])){
        $value1=$_POST["A"];
        $value2=$_POST["B"];
        if($_POST['mybutton'] == "cong"){
            $result = $value1 + $value2;
        }
        if($_POST['mybutton'] == "tru"){
            $result = $value1 - $value2;
        }
        if($_POST['mybutton'] == "nhan"){
            $result = $value1 * $value2;
        }
        if($_POST['mybutton'] == "chia"){
            $result = $value1 / $value2;
        }
        if($_POST['mybutton'] == "luythua"){
            $result = $value1 ** $value2;
        }

     }else{
        echo "<script type='text/javascript'>alert('A hoặc B không phải là số ');</script>";
     }
     //Rest of your code...
 }

?>