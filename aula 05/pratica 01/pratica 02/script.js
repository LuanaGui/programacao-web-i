function linha() {
  let tabela = document.getElementById("tabelaNotas");
  let qtdLinhas = tabela.rows.length;
  let qtdColunas = tabela.rows[0].cells.length;

  let novaLinha = tabela.insertRow(qtdLinhas);

  
  novaLinha.insertCell(0).innerHTML = "Médias";

  
  for (let c = 1; c < qtdColunas; c++) {
    let soma = 0;
    for (let l = 1; l < qtdLinhas; l++) {
      soma += parseFloat(tabela.rows[l].cells[c].innerHTML);
    }
    let media = soma / (qtdLinhas - 1);
    novaLinha.insertCell(c).innerHTML = media.toFixed(1);
  }
}

function coluna() {
  let tabela = document.getElementById("tabelaNotas");
  let qtdLinhas = tabela.rows.length;
  let qtdColunas = tabela.rows[0].cells.length;

  
  tabela.rows[0].insertCell(qtdColunas).innerHTML = "Média";

  
  for (let l = 1; l < qtdLinhas; l++) {
    let soma = 0;
    for (let c = 1; c < qtdColunas; c++) {
      soma += parseFloat(tabela.rows[l].cells[c].innerHTML);
    }
    let media = soma / (qtdColunas - 1);
    tabela.rows[l].insertCell(qtdColunas).innerHTML = media.toFixed(1);
  }
}
