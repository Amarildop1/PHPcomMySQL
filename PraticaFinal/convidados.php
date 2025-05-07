<?php
    session_start();
    if (!isset($_SESSION['convidados'])) $_SESSION['convidados'] = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['add_conv']) && !empty(trim($_POST['nome']))) {
            $nome = trim($_POST['nome']);
            $dep = isset($_POST['dep']) ? (int)$_POST['dep'] : 0;
            $_SESSION['convidados'][] = "$nome,$dep";
        }

        if (isset($_POST['finalizar'])) {
            header("Location: salvar.php");
            exit;
        }

        if (isset($_POST['voltar'])) {
            header("Location: index.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <title>CHURRASCO PHP - Convidados</title>
            <link rel="stylesheet" href="style.css">
        </head>

        <body>
            <div class="container">
                <h1> Adicionar Convidados </h1>

                <form method="post" class="form-inline-column">
                    <input type="text" name="nome" placeholder="Nome do convidado" autofocus required>
                    <label>Quantidade de Dependentes:</label>
                    <input type="number" name="dep" value="0" min="0">
                    <input type="submit" name="add_conv" value="Adicionar Convidado">
                </form>

                <ul>
                    <?php foreach ($_SESSION['convidados'] as $convidado): ?>
                        <li><?= htmlspecialchars($convidado) ?></li>
                    <?php endforeach; ?>
                </ul>

                <div class="btn-group">
                    <form method="post">
                        <input type="submit" name="finalizar" value="Finalizar e Processar">
                    </form>
                    <form method="post">
                        <input type="submit" name="voltar" value="Voltar para Itens">
                    </form>
                </div>
            </div>
        </body>
    </html>
