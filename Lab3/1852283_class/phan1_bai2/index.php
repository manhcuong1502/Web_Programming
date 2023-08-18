<?php
    function printNotify($x){
        $y=$x%5;
        switch($y){
            case 0: 
                echo "Hello";
                break;
            case 1:
                echo "How are you?";
                break;
            case 2:
                echo "I'm doing well, thank you";
                break;
            case 3:
                echo "See you later";
                break;
            case 4:
                echo "Good-bye";
                break;
        }
    }
    printNotify(random_int(1,1000));
?>