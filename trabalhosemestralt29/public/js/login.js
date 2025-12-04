window.addEventListener("scroll", function(){
    let header = document.querySelector('#header')
    header.classList.toggle('rolagem', window.scrollY > 0)
})

document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {

            // O formulário deve enviar direto para o login.php

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Por favor, insira um e-mail válido.');
                event.preventDefault();
                return;
            }

            if (password.length < 4) {
                alert('Senha muito curta.');
                event.preventDefault();
                return;
            }

        });
    }

    // Efeito de animação da página
    const myObserver = new IntersectionObserver((entries) => {
        entries.forEach( (entry) => {
            if(entry.isIntersecting){
                entry.target.classList.add('show');
            } else {
                entry.target.classList.remove('show');
            }
        });
    });

    const elements = document.querySelectorAll('.hidden');
    elements.forEach( (element) => myObserver.observe(element));
});
