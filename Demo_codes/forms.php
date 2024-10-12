<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Input Example</title>
</head>
<body>
    <h1>PHP Input Handling Example</h1>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">Enter your name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        
        <label for="age">Enter your age:</label><br>
        <input type="number" id="age" name="age"><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capture the input from the form
        $name = htmlspecialchars($_POST['name']);  // Sanitize user input
        $age = htmlspecialchars($_POST['age']);

        // Display the captured input
        echo "<h2>Your Input:</h2>";
        echo "Name: " . $name . "<br>";
        echo "Age: " . $age . "<br>";
    }
    ?>


<p>
    Explanation:
    HTML Form: The form uses the POST method and the action is set to the same PHP file (<?php echo $_SERVER['PHP_SELF']; ?>), which allows the form data to be sent to itself for processing.
</p>
<p>
    Handling Input: The $_POST superglobal is used to capture the input from the name and age fields.
    Sanitizing Input: The htmlspecialchars() function is used to prevent XSS attacks by converting special characters into HTML entities.
</p>
<p>
    Displaying Input: The captured input is then displayed back to the user.
    This is just one way to handle input in PHP. Depending on your use case, you may need to consider using additional validation and security measures.
</p>
</body>
</html>
