// script.js - Mostra 1 pergunta por vez, envia resposta via AJAX e avança automaticamente
document.addEventListener('DOMContentLoaded', () => {
  const perguntas = Array.from(document.querySelectorAll('.pergunta'));
  if (!perguntas.length) return;

  perguntas.forEach((p, i) => {
    p.classList.toggle('ativa', i === 0);
  });

  perguntas.forEach((pergunta, idx) => {
    const radios = pergunta.querySelectorAll('input[type="radio"]');

    radios.forEach(radio => {
      radio.addEventListener('change', async () => {
        const perguntaId = radio.name.match(/\d+/)[0];
        const valor = radio.value;

        // Envia resposta automaticamente via AJAX
        try {
          await fetch('../src/respostas.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id_pergunta=${encodeURIComponent(perguntaId)}&valor=${encodeURIComponent(valor)}`
          });
        } catch (err) {
          console.error('Erro ao enviar resposta:', err);
        }

        // Avança para a próxima pergunta
        const next = perguntas[idx + 1];
        pergunta.classList.remove('ativa');

        if (next) {
          setTimeout(() => {
            next.classList.add('ativa');
            next.scrollIntoView({ behavior: 'smooth', block: 'center' });
          }, 200);
        } else {
          // Se for a última pergunta, redireciona
          setTimeout(() => {
            window.location.href = 'obrigado.php';
          }, 400);
        }
      });
    });
  });

  // Acessibilidade: avançar com teclado Enter/Espaço
  document.querySelectorAll('.escala label').forEach(lbl => {
    lbl.setAttribute('tabindex', '0');
    lbl.addEventListener('keydown', e => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        lbl.click();
      }
    });
  });
});
