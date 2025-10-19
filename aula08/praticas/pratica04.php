<?php
$SALARIO1 = 1100; 
$SALARIO2 = 1001;

echo "Valor do SALÁRIO 1: " . $SALARIO1 . " e o valor do SALÁRIO 2: " . $SALARIO2 . "<br>";

for ($i = 1; $i <= 100; $i++) {
    $SALARIO1++;
    if ($i == 50) {
        break;
    }
}

if ($SALARIO1 < $SALARIO2) {
    echo "SALÁRIO 1: " . $SALARIO1;
} else {
    echo "SALÁRIO 1: " . $SALARIO1 . " não é menor que SALÁRIO 2 (" . $SALARIO2 . ")";
}
?>
