<?php
    session_start();
    if (!isset($_SESSION['itens'])) {
        $_SESSION['itens'] = [];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['add_item']) && !empty(trim($_POST['item']))) {

            $item = trim($_POST['item']);
            $tipo = $_POST['tipo'];

            if ($item && ($tipo === 'solido' || $tipo === 'liquido')) {
                $_SESSION['itens'][] = ['nome' => $item, 'tipo' => $tipo];
            }
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
                <div class="containers-internos">
                    <h1> Churrasco PHP </h1>
                    <h3> Adicionando Itens </h3>

                    <form method="post" class="form-inline">
                        <input type="text" name="item" placeholder="Nome do item" autofocus required>
                        <select name="tipo" required>
                            <option value="" disabled selected>Selecione o tipo</option>
                            <option value="solido">Sólido</option>
                            <option value="liquido">Líquido</option>
                        </select>

                        <input type="submit" name="add_item" value="Adicionar Item">
                    </form> 
                </div>


                <?php if (!empty($_SESSION['itens'])): ?>

                    <div class="containers-internos">
                        <h2> Itens </h2>
                        <div class="flex-row">

                            <ul>
                                <?php foreach ($_SESSION['itens'] as $item): ?>
                                    <li><?= htmlspecialchars($item['nome']) ?> &nbsp;&nbsp; (<?= $item['tipo'] ?>)</li>
                                <?php endforeach; ?>
                            </ul>

                            <div class="btn-group2">

                                <form method="post">
                                    <input type="submit" name="limpar" value="Limpar Tudo">
                                </form>

                                <form method="post">
                                    <input type="submit" name="proximo" value="Ir para Convidados">
                                </form>
                            </div> 

                        </div> <!-- Final .flex-row -->
                    </div>

                <?php endif; ?>

            </div> <!-- Final .container -->
        </body>
    </html>
