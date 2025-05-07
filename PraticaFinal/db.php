<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "churrasco";

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
?>
