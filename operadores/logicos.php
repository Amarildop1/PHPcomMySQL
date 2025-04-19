<?php

$verdadeiro = true;
$falso = false;

// Por padrão o PHP não mostra quando dá falso e quando é true mostra o 1.

// E
echo '</br>';
echo var_export($verdadeiro && $falso, true), '</br>';
echo var_export($verdadeiro && $verdadeiro, true), '</br>';

// OU
echo '</br>';
echo var_export($verdadeiro || $falso, true), '</br>';
echo var_export($verdadeiro || $verdadeiro, true), '</br>';

// NÃO
echo '</br>';
echo var_export(!$verdadeiro, true), '</br>';
echo var_export(!$falso, true), '</br>';


?>
