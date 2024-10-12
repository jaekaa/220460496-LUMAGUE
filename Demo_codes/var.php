<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Variables</title>
</head>
<body>
   <h1>Variable Declaration</h1>
    <p>$variableName=value;</p> 


    <h3>String</h3>
    <?php
        $lastName="Rizal";
        $firstName='Jose';

        echo "<p>";
        echo $lastName;
        echo "<br>";
        echo $firstName;
        echo "<br>";

        echo "My name is " . $firstName ." " . $lastName;
        echo "</p>";



    ?>

    <h3>Integer</h3>
        <?php
        $num1='10';
        $num2='20';
        
        $sum= $num1+$num2;
        echo $sum;


        ?>
    
    <h3>Boolean</h3>
        <?php    
    $stat=True;
    $stat2=False;

    echo $stat;
    echo $stat2;
    ?>


    <h3>Float</h3>

        <?php 
            $grade=74.5;
            $bonus=1;
            echo $grade+$bonus;
        ?>

    
    <h3>Array</h3>
    <?php 
        $list = array('Name', 75 , True); 

        echo $list[0];
        echo $list[1];
        echo $list[2];
    ?>
</body>
</html>