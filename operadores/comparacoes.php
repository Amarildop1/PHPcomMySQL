<?php

// Declaração de variável
$num1 = 20;
$num2 = 10;
$num3 = 20;
$num4 = 4;
$num5 = 7;
$texto = "4";
$texto4 = "4";

// Por padrão o PHP não mostra quando dá falso e quando é true mostra o 1.
//var_export($variavel) ta sendo usado para mostrar true ou false

// Igualdade
echo "Igualdade: </br>";
//echo $num1 == $num2, '</br>'; // false
//echo $num1 == $num3, '</br>'; // true

// A escrita abaixo exibe em forma de true e(ou) false
echo var_export($num1 == $num2, true), '</br>';
echo var_export($num1 == $num3, true), '</br>';
//------------------------------------------------------------------------------------


// Idêntico (valor e tipo)
echo "</br> Idêntico (valor e tipo): </br>";
echo var_export($num4 === $texto, true), '</br>';
echo var_export($texto === $texto, true), '</br>';
//------------------------------------------------------------------------------------


// diferente
echo "</br>Diferente: </br>";
echo var_export($num1 != $num5, true), '</br>';
echo var_export($num1 != $num3, true), '</br>';
//------------------------------------------------------------------------------------


// Não idêntico (valor e tipo)
echo "</br>Não idêntico (valor e tipo): </br>";
echo var_export($num1 !== $num4, true), '</br>';
//------------------------------------------------------------------------------------


// Maior que
echo "</br>Maior que: </br>";
echo var_export($num1 > $num4, true), '</br>';
echo var_export($num5 > $num3, true), '</br>';
//------------------------------------------------------------------------------------


// Menor que
echo "</br>Menor que: </br>";
echo var_export($num5 < $num4, true), '</br>';
echo var_export($num5 < $num2, true), '</br>';
//------------------------------------------------------------------------------------


// Maior ou igual
echo "</br>Maior ou igual: </br>";
echo var_export($num1 >= $num4, true), '</br>';
//------------------------------------------------------------------------------------


// Menor ou igual
echo "</br>Menor ou igual: </br>";
echo var_export($num1 <= $num4, true), '</br>';


?>
