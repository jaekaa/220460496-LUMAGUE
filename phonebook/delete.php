<?php
    include "dp.php";
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM contacts WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Contact successfully deleted.";
        } else {
            echo "Error deleting record." . $sql . "<br>" . $conn->$error;
        }
    }

    header("Location: index.php");
?>