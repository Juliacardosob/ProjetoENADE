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
            event.preventDefault();

            if (this.classList.contains('rightButton')) {
                this.classList.remove('rightButton');
            } else {
                this.classList.add('rightButton');
            }
        });
    });
});

