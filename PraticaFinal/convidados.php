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

        if (isset($_POST['limpar'])) {
            $_SESSION['convidados'] = [];
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

                <div class="itens-home adicionando-itens" style="margin-bottom:20px;">
                    <h1> Adicionar Convidados </h1>

                    <form method="post" class="form-inline-column">

                        <div style="display: flex; gap: 10px; margin-bottom: 10px;">

                            <input type="text" name="nome" placeholder="Nome do convidado" autofocus required style="flex: 1;">

                            <div>
                                <label for="dep">Quantidade de Dependentes:</label>
                                <input type="number" name="dep" value="0" min="0" style="width: 38px;">
                            </div>
                        </div>

                        <div style="text-align: right;">
                            <input type="submit" name="add_conv" value="Adicionar Convidado">
                        </div>

                    </form>

                </div>

                <div class="itens-home adicionando-itens" style="margin-bottom:20px;">

                    <h2> Convidados </h2>
                    <div class="flex-row">

                        <ul>
                            <?php foreach ($_SESSION['convidados'] as $convidado): ?>
                                <li><?= htmlspecialchars($convidado) ?></li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="btn-group" style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 10px;">
                            <form method="post">
                                <input type="submit" name="voltar" value="Voltar para Itens">
                            </form>

                            <form method="post">
                                <input type="submit" name="finalizar" value="Finalizar e Processar">
                            </form>

                            <form method="post">
                                <input type="submit" name="limpar" value="Limpar Tudo" title="Limpar lista de convidados">
                            </form>

                        </div>
                    </div> <!-- Final .flex-row -->
                </div>

            </div> <!-- Final .container -->
        </body>  
    </html>
