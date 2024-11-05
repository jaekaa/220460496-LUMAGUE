<?php
    include "db.php";
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM books WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $message = "Book successfully removed.";
        } else {
            $message = "Error removing book: " . $conn->error;
        }
        $stmt->close();
    }

    header("Location: index.php");
    exit();
?>