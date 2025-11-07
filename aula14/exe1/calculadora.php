<?php
class Calculadora {
    //Soma
    public function somar($a, $b) {
        return $a + $b;
    }

    //Subtrai
    public function subtrair($a, $b) {
        return $a - $b;
    }

    //Multiplicar
    public function multiplicar($a, $b) {
        return $a * $b;
    }

    //DIvidi
    public function dividir($a, $b) {
        if ($b == 0) {
            return "Erro: divisão por zero!";
        }
        return $a / $b;
    }
}
?>
