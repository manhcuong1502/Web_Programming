<?php
$fnameErr = $lnameErr = $emailErr = $bdErr = $passErr   = "";
$err = 0;
$fname=  $lname = $email = "";
$succesMessage="";

    if(isset($_POST["submit"])){
        $fname = $_POST['FirstName'];
        $lname = $_POST['LastName'];
        $email = $_POST['Email'];
        $pass = $_POST['pass'];
        $day = $_POST['dobday'];
        $month = $_POST['dobmonth'];
        $year  = $_POST['dobyear'];
        if(strlen($fname) < 2){
            $fnameErr = "* Please enter your first name!";
            $err++;
        }
        if(strlen($lname) < 2){
            $lnameErr = "* Please enter your last name!";
            $err++;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "* Invalid email format!";
            $err++;
        }
        if(strlen($pass) < 2){
            $passErr = "* Your password too short";
            $err++;
        }
        if(empty($day) && empty($month) && empty($year)){
            $bdErr = "* Enter your birthday!";
            $err++;
        }
        if($err == 0){
            $succesMessage ="Complete!";
        }
    }
?>