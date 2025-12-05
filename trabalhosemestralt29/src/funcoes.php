<?php
// Função para limpar e proteger dados recebidos do usuário
function limpar($str){
    return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
}
