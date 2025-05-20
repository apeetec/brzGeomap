  function setupTabs() {
    // Tabs owl carousel
    $('.tab').on('click', function () {
      const $tab = $(this); // Aba clicada
      const targetCarousel = $tab.data('target'); // ID do carrossel alvo
      const slideIndex = $tab.data('slide'); // Índice do slide correspondente
  
      // Atualiza as abas ativas
      $tab.siblings('.tab').removeClass('active');
      $tab.addClass('active');
  
      // Navega para o slide correspondente no carrossel alvo
      $(targetCarousel).trigger('to.owl.carousel', [slideIndex, 300]);


      // Pausar o vídeo

    });
    // Tabs materialize
  const tabs = document.querySelectorAll('.tab');
  const carouseis = document.querySelectorAll('.carousel');
  carouseis.forEach(carousel => {
      const instance = M.Carousel.getInstance(carousel);

      tabs.forEach(tab => {
          tab.addEventListener('click', function () {
              tabs.forEach(t => t.classList.remove('active'));
              this.classList.add('active');

              const slideIndex = parseInt(this.dataset.slide, 10);
              instance.set(slideIndex);
          });
      });
  });
  }
// Init do slick carousel junto das funções de avançar e voltar com o scroll do mouse
  function setupSlickSlider() {
      const $slider = $(".galeria");
      $slider.slick({
            dots: true,
            vertical: true,
            // verticalSwiping: true,
            rows: 3,
            slidesPerRow: 2,
            arrows: false,
            infinite: false,
            speed: 300,
            // adaptiveHeight: true,
        });
        $slider.on('wheel', (function(e) {
          e.preventDefault();
        
          if (e.originalEvent.deltaY > 0) {
            $(this).slick('slickNext');
          } else {
            $(this).slick('slickPrev');
          }
        }));
}

// Função de abrir e fechar o popover de localização, lembre-se, popover é diferente do modal
document.addEventListener('DOMContentLoaded', function () {
  const popover = document.getElementById("localizacao");
  popover.addEventListener("toggle", (event) => {
      if (event.newState === "open") {
          console.log("🔄 Modal aberto. Inicializando...");
          // Inicializa o carousel (Materialize)
          var carouseis = document.querySelectorAll('.carousel');
          M.Carousel.init(carouseis, {
              fullWidth: true,
              indicators: false
          });
          document.querySelector('html').style.overflowY = 'hidden';
          document.querySelector('body').style.overflowY = 'hidden';
          setupTabs();
      } 
      else {
        document.querySelector('html').style.overflowY = 'auto';
        document.querySelector('body').style.overflowY = 'auto';
          console.log("🛑 Modal fechado.");
         
      }
  });
});
// Função de abrir e fechar o popover de imagens, lembre-se, popover é diferente do modal
document.addEventListener('DOMContentLoaded', function () {
  const popover = document.getElementById("imagens");
  popover.addEventListener("toggle", (event) => {
      if (event.newState === "open") {
          console.log("🔄 Modal aberto");

          // Inicializa o carousel (Materialize)
          var carouseis = document.querySelectorAll('.carousel');
          M.Carousel.init(carouseis, {
              fullWidth: true,
              indicators: false
          });
          document.querySelector('html').style.overflowY = 'hidden';
          document.querySelector('body').style.overflowY = 'hidden';
          // Captura as imagens
          setupTabs();
          // Inicializa o Slick Slider
          setupSlickSlider();
      } 
      else {
        document.querySelector('html').style.overflowY = 'auto';
        document.querySelector('body').style.overflowY = 'auto';
          console.log("🛑 Modal fechado.");
          $('.galeria').slick('unslick'); // Remove a instância atual e destrói o slick para que ele seja reinicializado ao abrir o modal novamente
      }
  });
});

// Popover de vídeos, lembre-se, popover é diferente do modal
document.addEventListener('DOMContentLoaded', function () {
  const popover = document.getElementById("videos");
  popover.addEventListener("toggle", (event) => {
      if (event.newState === "open") {
          console.log("🔄 Modal aberto. Inicializando...");
          // Inicializa o carousel (Materialize)
          var carouseis = document.querySelectorAll('.carousel');
          M.Carousel.init(carouseis, {
              fullWidth: true,
              indicators: false,
              onCycleTo:function(){
                document.querySelectorAll('.wp-video video').forEach(video => {
                  video.pause();
              });
              }
          });
          document.querySelector('html').style.overflowY = 'hidden';
          document.querySelector('body').style.overflowY = 'hidden';
          setupTabs();
      } 
      else {
        document.querySelector('html').style.overflowY = 'auto';
        document.querySelector('body').style.overflowY = 'auto';
        document.querySelectorAll('.wp-video video').forEach(video => {
          video.pause();
        });
          console.log("🛑 Modal fechado.");
         
      }
  });
});
// Popover das plantas, lembre-se, popover é diferente do modal
document.addEventListener('DOMContentLoaded', function () {
  const popover = document.getElementById("plantas");
  popover.addEventListener("toggle", (event) => {
      if (event.newState === "open") {
          console.log("🔄 Modal aberto. Inicializando...");
          // Inicializa o carousel (Materialize)
          var carouseis = document.querySelectorAll('.carousel');
          M.Carousel.init(carouseis, {
              fullWidth: true,
              indicators: false,
              shift:30
          });
          document.querySelector('html').style.overflowY = 'hidden';
          document.querySelector('body').style.overflowY = 'hidden';
          var gal = document.querySelector('#gal');
          const instance = M.Carousel.getInstance(gal);
          console.log(instance);
          document.querySelector('.carousel-next').addEventListener('click', () => {
            instance.next();
          });
          document.querySelector('.carousel-prev').addEventListener('click', () => {
            instance.prev();
          });
          setupTabs();
      } 
      else {
        document.querySelector('html').style.overflowY = 'auto';
        document.querySelector('body').style.overflowY = 'auto';
          console.log("🛑 Modal fechado.");        
      }
  });
});

// Popover de diferenciais, lembre-se, popover é diferente do modal
document.addEventListener('DOMContentLoaded', function () {
  const popover = document.getElementById("diferenciais");
  popover.addEventListener("toggle", (event) => {
      if (event.newState === "open") {
          console.log("🔄 Modal aberto. Inicializando...");
          // Inicializa o carousel (Materialize)
          var carouseis = document.querySelectorAll('.carousel');
          M.Carousel.init(carouseis, {
              fullWidth: true,
              indicators: false,
              shift:30
          });
          document.querySelector('html').style.overflowY = 'hidden';
          document.querySelector('body').style.overflowY = 'hidden';
          $('.lista-empreendimentos-textos').slick('setPosition');
          setupTabs();
      } 
      else {
        document.querySelector('html').style.overflowY = 'auto';
        document.querySelector('body').style.overflowY = 'auto';
        $('.lista-empreendimentos-textos').slick('unslick');
          console.log("🛑 Modal fechado.");        
      }
  });
});

// Função de abrir e fechar o popover de localização, lembre-se, popover é diferente do modal
document.addEventListener('DOMContentLoaded', function () {
  const popover = document.getElementById("ficha");
  popover.addEventListener("toggle", (event) => {
      if (event.newState === "open") {
          console.log("🔄 Modal aberto. Inicializando...");
          // Inicializa o carousel (Materialize)
          var carouseis = document.querySelectorAll('.carousel');
          M.Carousel.init(carouseis, {
              fullWidth: true,
              indicators: false
          });
          document.querySelector('html').style.overflowY = 'hidden';
          document.querySelector('body').style.overflowY = 'hidden';
          setupTabs();
      } 
      else {
        document.querySelector('html').style.overflowY = 'auto';
        document.querySelector('body').style.overflowY = 'auto';
          console.log("🛑 Modal fechado.");
         
      }
  });
});
