<?php
    $SALARIO01 = 1000;
    $SALARIO02 = 2000;

    $SALARIO02 = $SALARIO01;

    $SALARIO01 = $SALARIO02 + 1;

    $SALARIO01 = $SALARIO01 * 1.10;

    echo "Valor do SALÁRIO 1: ", $SALARIO01 . " e o valor do SALÁRIO 2:" . $SALARIO02;
?>