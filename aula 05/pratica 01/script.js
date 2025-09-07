function calcular() {
    let n1 = Number(document.getElementById("num1").value);
    let n2 = Number(document.getElementById("num2").value);
    let op = document.getElementById("operacao").value;
    let resultado;

    if (isNaN(n1) || isNaN(n2)){
        alert("Preencha ambos os campos!");
        return;
    }

    if (op === "/" && n2 === 0){
        alert("Divisão por ZERO NÃO PERMITIDA!");
        return;
    }

    if (op === "+"){
        resultado = n1 + n2;
    } else if (op === "-"){
        resultado = n1 - n2;
    } else if (op === "*"){
        resultado = n1 * n2;
    } else if (op === "/"){
        resultado = n1 / n2;
    }

    let campoResultado = document.getElementById("resultado");
    campoResultado.style.display = "block";
    campoResultado.textContent = resultado;

    if (resultado > 0) {
        campoResultado.style.color = "green";
        //campoResultado.style.backgroundColor = "green";
    } else if (resultado < 0) {
        campoResultado.style.color = "red";
        //campoResultado.style.backgroundColor = "red";
    } else {
        campoResultado.style.color = "gray";
        //campoResultado.style.backgroundColor = "gray";
    }

    campoResultado.style.fontWeight = "bold";
    campoResultado.style.fontSize = "20px";
}
    document.getElementById("operacao").addEventListener("change", function () {
    document.getElementById("num1").value = "";
    document.getElementById("num2").value = "";
    document.getElementById("resultado").style.display = "none"; 
});