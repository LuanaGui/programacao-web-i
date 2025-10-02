<?php

$notas = [8.5, 7.0, 6.5, 9.0];
$faltas = [1, 0, 0, 1, 1, 0, 0, 0, 0, 1]; // (1 = falta, 0 = presença)


function calcularMedia($notas) {
    $soma = 0;
    $totalNotas = count($notas);
    
    for ($i = 0; $i < $totalNotas; $i++) {
        $soma += $notas[$i];
    }
    
    $media = $soma / $totalNotas;
    return $media;
}


function verificarAprovacaoNota($media) {
    if ($media >= 7) {
        return "Aprovado por nota";
    } else {
        return "Reprovado por nota";
    }
}


function calcularFrequencia($faltas) {
    $totalAulas = count($faltas);
    $totalFaltas = 0;

    for ($i = 0; $i < $totalAulas; $i++) {
        if ($faltas[$i] == 1) {
            $totalFaltas++;
        }
    }

    $frequencia = (($totalAulas - $totalFaltas) / $totalAulas) * 100;
    return $frequencia;
}


function verificarAprovacaoFrequencia($frequencia) {
    if ($frequencia >= 70) {
        return "Aprovado por frequência";
    } else {
        return "Reprovado por frequência";
    }
}

$media = calcularMedia($notas);
$statusNota = verificarAprovacaoNota($media);

$frequencia = calcularFrequencia($faltas);
$statusFrequencia = verificarAprovacaoFrequencia($frequencia);


echo "Média das notas: " . number_format($media, 2, ',', '.') . "<br>";
echo "Status por nota: $statusNota<br><br>";

echo "Frequência: " . number_format($frequencia, 2, ',', '.') . "%<br>";
echo "Status por frequência: $statusFrequencia<br><br>";


if ($media >= 7 && $frequencia >= 70) {
    echo "<strong>Resultado final: Aprovado</strong>";
} else {
    echo "<strong>Resultado final: Reprovado</strong>";
}

?>
