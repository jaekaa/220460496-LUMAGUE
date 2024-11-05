<?php 
    include "db.php";

    $query = "SELECT * FROM books";
    $books = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Library</title>
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
            table {
                width: 100%;
                border-collapse: collapse;
                background-color: #ffffff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            th, td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #0066cc;
                color: white;
            }
            tr:hover {
                background-color: #f5f5f5;
            }
            a {
                color: #0066cc;
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }
            .add-book {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #0066cc;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            .add-book:hover {
                background-color: #0052a3;
            }
        </style>
    </head>
    <body>
        <h2>Book Library</h2>

        <table>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>

            <?php 
                if ($books->num_rows > 0) {
                    while ($book = $books->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($book['title']) . "</td>";
                        echo "<td>" . htmlspecialchars($book['author']) . "</td>";
                        echo "<td>
                                <a href='delete.php?id=" . $book['id'] . "'>Remove</a> | 
                                <a href='edit.php?id=" . $book['id'] . "'>Edit</a>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No Books Available</td></tr>";
                }
            ?>
        </table>
        <a href="add.php" class="add-book">Add New Book</a>
    </body>
</html>