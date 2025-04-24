<?php

    $A = 20;
    $B = 10;
    $C = 5;
    $D = 2;
    $Z = "5";

    echo "A: ", $A, '</br>';
    echo "B: ", $B, '</br>';
    echo "C: ", $C, '</br>';
    echo "D: ", $D, '</br>';
    echo "Z: ", $Z, '</br>';

    // ---------------------------
    echo '</br>';

    if($A > $B){
        echo "A: ", $A, ' é maior que B: ', $B, '</br>';
    }elseif($A == $B){
        echo "A: ", $A, ' é igual a B: ', $B, '</br>';
    }else{
        echo "A: ", $A, ' é menor que B: ', $B, '</br>';
    }

    echo '</br>';

    if($C == $Z){
        echo "C: ", $C, ' é igual a Z: ', $Z, '</br>';
    }

    if($C === $Z){
        echo "C: ", $C, ' é identico a Z: ', $Z, '</br>';
    }else{
        echo "C: ", $C, ' não é identico a Z: ', $Z, '</br>';
        echo "C é um: ", gettype($C), ' e não é idêntico ao Z que é: ', gettype($Z), '</br>';
    }

    echo '</br>';


?>
