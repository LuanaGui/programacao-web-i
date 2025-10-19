<?php
$disciplinas = [
    "GERÊNCIA DE PROJETOS",
    "ENGENHARIA DE SOFTWARE II",
    "ALGORITMOS II",
    "PROGRAMAÇÃO WEB I",
    "BANCO DE DADOS II"
];

$professores = [
    "JULLIAN HERMANN",
    "JULLIAN HERMANN",
    "FERNANDO BASTOS",
    "CLEBER NARDELLI",
    "MARCO AURÉLIO"
];

for ($i = 0; $i < 5; $i++) {
    echo "Disciplina " . $disciplinas[$i] . ", professor " . $professores[$i] . ".<br>";
}
?>
