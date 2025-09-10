document.addEventListener("DOMContentLoaded", function() {
    const carousel = document.getElementById('background-carousel');

    // Lista das imagens do carrossel (ajuste os caminhos conforme suas imagens)
    const images = [
        'images/familia1.jpg',
        'images/familia2.jpg',
        'images/familia3.jpg'
    ];

    let currentIndex = 0;

    function changeBackground() {
        carousel.style.backgroundImage = `url('${images[currentIndex]}')`;
        currentIndex++;
        if (currentIndex >= images.length) {
            currentIndex = 0;
        }
    }

    // Inicializa o background
    changeBackground();

    // Troca a cada 5 segundos
    setInterval(changeBackground, 5000);
});
