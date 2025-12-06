<?php


function limpar_string($texto) {
    return trim(filter_var($texto, FILTER_SANITIZE_STRING));
}

function limpar_email($email) {
    return trim(filter_var($email, FILTER_SANITIZE_EMAIL));
}


function validar_nome($nome) {
    return strlen($nome) >= 2;
}

function validar_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validar_estado($estado) {
    $estados_validos = ["SC","PR","RS","SP","RJ"];
    return in_array($estado, $estados_validos);
}

function validar_senha($senha) {
    return strlen($senha) >= 4;
}



function sanitizar_dados_pessoa($dados) {
    return [
        "nome"      => limpar_string($dados["nome"] ?? ""),
        "sobrenome" => limpar_string($dados["sobrenome"] ?? ""),
        "email"     => limpar_email($dados["email"] ?? ""),
        "senha"     => limpar_string($dados["senha"] ?? ""),
        "cidade"    => limpar_string($dados["cidade"] ?? ""),
        "estado"    => limpar_string($dados["estado"] ?? "")
    ];
}

?>
