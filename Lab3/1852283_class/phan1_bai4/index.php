<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" >
    <title>Document</title>
</head>
<body>
    <?php
        echo "<table>";
        for ($x=1;;$x++) {
            if($x>7) break;
            echo "<tr> \n";
            for ($y=1;;$y++){
                if($y>7) break;
                echo "<td>" .$x*$y ."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>

