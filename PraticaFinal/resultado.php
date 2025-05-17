<?php
    include("db.php");

    $consumo_solido = 0.5; // kg por pessoa
    $consumo_liquido = 1.0; // litros por pessoa

    $resConvidados = mysqli_query($conn, "SELECT * FROM convidados");
    $total_pessoas = 0;

    while ($c = mysqli_fetch_assoc($resConvidados)) {
        $total_pessoas += 1 + $c['dependentes'];
    }

    $solidos = [];
    $liquidos = [];

    $resItens = mysqli_query($conn, "SELECT nome, tipo FROM lista_itens");

    while ($i = mysqli_fetch_assoc($resItens)) {
        if ($i['tipo'] === 'liquido') {
            $liquidos[] = $i['nome'];
        } else {
            $solidos[] = $i['nome'];
        }
    }


    function imagemItem($item) {
        $img = 'imagens/' . strtolower(str_replace(' ', '_', $item)) . '.png';
        return file_exists($img) ? $img : 'imagens/churrasco.png';
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['voltarParaItens'])) {
            header("Location: index.php");
            exit;
        }

        if (isset($_POST['voltarParaConvidados'])) {
            header("Location: convidados.php");
            exit;
        }
    }
?>


<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <title>CHURRASCO PHP - Resumo</title>
            <link rel="stylesheet" href="style.css">
        </head>

        <body>
            <div class="container">
                <div class="itens-home adicionando-itens" style="margin-bottom:20px;">
                    <h1>Resumo do Churrasco</h1>

                    <p>Total de pessoas: <strong><?= $total_pessoas ?></strong></p>
                    <p>Consumo estimado por pessoa: <strong><?= $consumo_solido ?> kg de sólidos</strong> e <strong><?= $consumo_liquido ?> L de líquidos</strong></p>

                    <div class="flex-lado-a-lado">
                        <div class="coluna">

                            <h2>Sólidos</h2>
                            <?php foreach ($solidos as $item): ?>
                                <div class="item">
                                    <img src="<?= imagemItem($item) ?>" alt="<?= $item ?>">
                                    <span><?= $item ?> - <?= number_format(($consumo_solido * $total_pessoas) / count($solidos), 2) ?> kg</span>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="coluna">
                            <h2>Líquidos</h2>

                            <?php foreach ($liquidos as $item): ?>
                                <div class="item">
                                    <img src="<?= imagemItem($item) ?>" alt="<?= $item ?>">
                                    <span><?= $item ?> - <?= number_format(($consumo_liquido * $total_pessoas) / count($liquidos), 2) ?> L</span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                <div class="itens-home adicionando-itens" style="margin-bottom:20px;">
                        <div class="btn-group flex-lado-a-lado">
                            <form method="post">
                                <input type="submit" name="voltarParaItens" value="Voltar para Itens">
                            </form>

                            <form method="post">
                                <input type="submit" name="voltarParaConvidados" value="Voltar para Convidados">
                            </form>
                        </div>
                </div>

            </div> <!-- Final .container -->

            <footer>
                <p> &copy; 2025 - Amarildo </p>
            </footer>
        </body>
    </html>
