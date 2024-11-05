<?php
    include "db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $author = $_POST['author'];

        if (!empty($title) && !empty($author)) {
            $query = "INSERT INTO books (title, author) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $title, $author);

            if ($stmt->execute()) {
                $message = "New book added successfully!";
            } else {
                $message = "Failed to add new book.";
            }
            $stmt->close();
        } else {
            $message = "Please fill in all fields";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Book</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #e6f3ff;
                margin: 0;
                padding: 20px;
                color: #333;
            }
            h2 {
                color: #0066cc;
                text-align: center;
            }
            form {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                margin: 0 auto;
            }
            input[type="text"] {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }
            input[type="submit"] {
                background-color: #0066cc;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #0052a3;
            }
            a {
                display: block;
                text-align: center;
                margin-top: 20px;
                color: #0066cc;
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }
            .message {
                text-align: center;
                margin-bottom: 20px;
                padding: 10px;
                border-radius: 4px;
                background-color: #d4edda;
                color: #155724;
            }
        </style>
    </head>
    <body>
        <h2>Add a New Book</h2>

        <?php
        if (isset($message)) {
            echo "<div class='message'>$message</div>";
        }
        ?>

        <form method="post" action="add.php">
            <input type="text" name="title" placeholder="Title" required><br>
            <input type="text" name="author" placeholder="Author" required><br>
            <input type="submit" value="Add Book">
        </form>
        <a href="index.php">Back to Library</a>
    </body>
</html>