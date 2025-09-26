<?php
    $SALARIO01 = 1000;
    $SALARIO02 = 2000;

    $SALARIO02 = $SALARIO01;

    $SALARIO01 = $SALARIO02 + 1;

    $SALARIO01 = $SALARIO01 * 1.10;

    echo "Valor do SALÁRIO 1: ", $SALARIO01 . " e o valor do SALÁRIO 2:" . $SALARIO02. "<br>";

    if ($SALARIO01 > $SALARIO02) {
        echo "O valor do SALÁRIO 1 é MAIOR que o valor do SALÁRIO 2";
    } elseif ($SALARIO01 < $SALARIO02) {
        echo "O valor do SALÁRIO 1 é MENOR que o valor do SALÁRIO 2";
    } else {
        echo "Os SALÁRIOS são IGUAIS";
    }
?>