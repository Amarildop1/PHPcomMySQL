<?php
    session_start();
    if (!isset($_SESSION['itens'])) $_SESSION['itens'] = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['add_item']) && !empty(trim($_POST['item']))) {
            $_SESSION['itens'][] = trim($_POST['item']);
        }

        if (isset($_POST['limpar'])) {
            $_SESSION['itens'] = [];
        }

        if (isset($_POST['proximo'])) {
            header("Location: convidados.php");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CHURRASCO PHP - Itens</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Adicionar Itens para o Churrasco</h1>
    <form method="post" class="form-inline">
        <input type="text" name="item" placeholder="Nome do item" autofocus required>
        <input type="submit" name="add_item" value="Adicionar Item">
    </form>

    <?php if (!empty($_SESSION['itens'])): ?>
        <div class="flex-row">
            <ul>
                <?php foreach ($_SESSION['itens'] as $item): ?>
                    <li><?= htmlspecialchars($item) ?></li>
                <?php endforeach; ?>
            </ul>
            <div class="btn-group">
                <form method="post">
                    <input type="submit" name="limpar" value="Limpar Tudo">
                </form>
                <form method="post">
                    <input type="submit" name="proximo" value="Ir para Convidados">
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
