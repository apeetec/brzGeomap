$(function() {

        // Configura as tabs
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

    $('.owl-carousel').each(function () {
        $(this).owlCarousel({
          items: 1, // Mostra um item por vez
          loop: false, // Não repete os slides
          nav: false, // Remove os botões de navegação padrão
          dots: false, // Remove os pontos de navegação padrão
          mouseDrag:false,
          touchDrag:false,
        });
      });
      const owl = $('.owl-carousel');
      $('#prev').click(function () {
        owl.trigger('prev.owl.carousel');
      });
    
      $('#next').click(function () {
        owl.trigger('next.owl.carousel');
      });
  });
  