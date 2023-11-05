document.addEventListener('DOMContentLoaded', function() {
    const alternativas = document.querySelectorAll('.alternativas-card input.opcaoRadio');

    alternativas.forEach(function(alternativa) {
        alternativa.addEventListener('change', function() {
            const label = this.parentElement; // Obtém o elemento pai (o <label>)

            const allRadios = document.querySelectorAll('.alternativas-card input.opcaoRadio');

            allRadios.forEach(function(radio) {
                const parentLabel = radio.parentElement;
                if (!radio.checked) {
                    parentLabel.classList.remove('alternativas-activate');
                }
            });

            if (this.checked) {
                label.classList.add('alternativas-activate');
            } else {
                label.classList.remove('alternativas-activate');
                label.classList.add('alternativas-card');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const alternativas = document.querySelectorAll('.alternativas-card');

    alternativas.forEach(function(alternativa) {
        alternativa.addEventListener('contextmenu', function(event) {
            event.preventDefault(); // Previne o menu de contexto padrão do navegador

            if (this.classList.contains('rightButton')) {
                this.classList.remove('rightButton'); // Remove a classe se já estiver presente
            } else {
                this.classList.add('rightButton'); // Adiciona a classe se não estiver presente
            }
        });
    });
});

