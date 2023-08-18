<?php
    for ($x = 0; ; $x++) {
        if ($x > 100 ) break;
        if ($x % 2 == 1)
            echo "$x ";
     }
    echo "<br/>";
    $x=0;
    while ($x<=100){
        if ($x % 2 == 1)
            echo "$x ";
        $x++;
    }
?>