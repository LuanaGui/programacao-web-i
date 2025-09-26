<?php
$disciplinas = [
    ["Matemática", 5, 8.5],
    ["Português", 2, 9],
    ["Geografia", 10, 6],
    ["Educação Física", 2, 8]
];

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Disciplina</th><th>Faltas</th><th>Média</th></tr>";

for ($i = 0; $i < count($disciplinas); $i++) {
    echo "<tr>";
    for ($j = 0; $j < count($disciplinas[$i]); $j++) {
        echo "<td>" . $disciplinas[$i][$j] . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>
