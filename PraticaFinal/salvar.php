<?php
    session_start();
    include("db.php");

    $itens = $_SESSION['itens'];
    $convidados = $_SESSION['convidados'];

    mysqli_query($conn, "DELETE FROM lista_itens");
    mysqli_query($conn, "DELETE FROM convidados");

    foreach ($itens as $item) {
        mysqli_query($conn, "INSERT INTO lista_itens (nome) VALUES ('" . mysqli_real_escape_string($conn, $item) . "')");
    }

    foreach ($convidados as $linha) {
        list($nome, $dep) = explode(",", $linha);
        mysqli_query($conn, "INSERT INTO convidados (nome, dependentes) VALUES ('" . mysqli_real_escape_string($conn, $nome) . "', " . (int)$dep . ")");
    }

    header("Location: resultado.php");
    exit();
?>
