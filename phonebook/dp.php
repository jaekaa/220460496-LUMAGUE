<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "8022";
    $dbnme = "phonebook";

    // Create Connection

    $conn = new mysqli($servername,$username, $password, $dbnme);

    if ($conn->connect_error) {
        die ("Connection failed". $conn->connect_error);
    }
?>