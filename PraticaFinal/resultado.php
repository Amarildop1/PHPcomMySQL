<?php
include("db.php");

$consumo_solido = 0.5; // kg por pessoa
$consumo_liquido = 1.0; // litros por pessoa

$resConvidados = mysqli_query($conn, "SELECT * FROM convidados");
$total_pessoas = 0;

while ($c = mysqli_fetch_assoc($resConvidados)) {
    $total_pessoas += 1 + $c['dependentes'];
}

$resItens = mysqli_query($conn, "SELECT * FROM lista_itens");

$itens = [];
while ($i = mysqli_fetch_assoc($resItens)) {
    $itens[] = $i['nome'];
}

// divide: metade sólidos, metade líquidos | por estética visual no resultado
$qtde_itens = count($itens);
$meio = ceil($qtde_itens / 2);

$sólidos = array_slice($itens, 0, $meio);
$líquidos = array_slice($itens, $meio);

function imagemItem($item) {
    $img = 'imagens/' . strtolower(str_replace(' ', '_', $item)) . '.png';
    return file_exists($img) ? $img : 'imagens/bisteca.png';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Churrasco</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Resumo do Churrasco</h1>
    <p>Total de pessoas: <strong><?= $total_pessoas ?></strong></p>
    <p>Consumo estimado por pessoa: <strong><?= $consumo_solido ?> kg sólidos</strong> e <strong><?= $consumo_liquido ?> L líquidos</strong></p>

    <h2>Sólidos</h2>
    <?php foreach ($sólidos as $item): ?>
        <div class="item">
            <img src="<?= imagemItem($item) ?>" alt="<?= $item ?>">
            <span><?= $item ?> - <?= number_format(($consumo_solido * $total_pessoas) / count($sólidos), 2) ?> kg</span>
        </div>
    <?php endforeach; ?>

    <h2>Líquidos</h2>
    <?php foreach ($líquidos as $item): ?>
        <div class="item">
            <img src="<?= imagemItem($item) ?>" alt="<?= $item ?>">
            <span><?= $item ?> - <?= number_format(($consumo_liquido * $total_pessoas) / count($líquidos), 2) ?> L</span>
        </div>
</div>
    <?php endforeach; ?>
    
</body>
</html>
