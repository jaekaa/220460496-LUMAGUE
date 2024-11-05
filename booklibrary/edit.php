<?php
    include "db.php";
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM books WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $book = $result->fetch_assoc();
            $title = $book['title'];
            $author = $book['author'];
        } else {
            $message = "No book found with that id";
        }
        $stmt->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $id = $_POST['id'];

        if (!empty($title) && !empty($author)) {
            $query = "UPDATE books SET title = ?, author = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssi", $title, $author, $id);

            if($stmt->execute()) {
                $message = "Book successfully updated.";
            } else {
                $message = "Error updating book: " . $conn->error;
            }
            $stmt->close();
        } else {
            $message = "Please fill in all fields.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Book</title>
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
        <h2>Update Book</h2>

        <?php
        if (isset($message)) {
            echo "<div class='message'>$message</div>";
        }
        ?>

        <form method="post" action="edit.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required><br>
            <input type="text" name="author" value="<?php echo htmlspecialchars($author); ?>" required><br>
            <input type="submit" value="Update Book">
        </form>
        <a href="index.php">Back to Library</a>
    </body>
</html>