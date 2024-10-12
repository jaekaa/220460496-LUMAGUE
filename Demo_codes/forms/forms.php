<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Inputs</title>
</head>
<body>
    <form method="post" action ="/forms/forms.php ">

        <label for="name">Enter Your First Name:</label><br>
                <input type="text" id "name" name="name">
                <br>

                <label for="lastname">Enter Your Last Name:</label><br>

                <input type="text" id="lastname" name="lastname">              
                <br>           <label for="age">Enter your Age:</label><br>
                <input type="number" id="age" name="edad">
                <br>
                <br>
                <input type="submit" value"Submit>
    
    
        </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"  ){
            $name=htmlspecialchars($_POST['name']);
            $age=htmlspecialchars($_POST['edad']);
            $lastname=htmlspecialchars($_POST['lastname']);

            echo "<h3>You Inputs</h3>";
            echo "Name: " .$name ."<br>";
            echo "Last Name: " .$lastname ."<br>";
            echo "Age: " .$age ."<br>";
            
        };

    ?>

</body>
</html>