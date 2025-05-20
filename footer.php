</main>
<footer hidden>
    <?php wp_footer(); ?>
      <!-- Materialize Scripts -->
      <script src="<?php bloginfo('template_url'); ?>/js/materialize.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
      <script src="<?php bloginfo('template_url'); ?>/js/jquery.magnify.js"></script>
      <script src="<?php bloginfo('template_url'); ?>/js/jquery.magnify-mobile.js"></script>
      <script src="https://d3js.org/d3.v7.min.js"></script>
      <!-- inicializações -->
      <script src="<?php bloginfo('template_url'); ?>/js/init.js"></script>
      <script src="<?php bloginfo('template_url'); ?>/js/funcoes-e-inits/init-owl-carousel.js"></script>

      <script>
          $(document).ready(function() {
            $('.zoom').magnify();
          });
      </script>
       <script src="<?php bloginfo('template_url'); ?>/js/fslightbox.js"></script>
       <script>
          var modalImagens = document.getElementById('imagens');
          fsLightboxInstances["gallery"].props.onOpen = function () {
            modalImagens.hidePopover();
            console.log("🔥 Lightbox aberta!");
                
          }       
          fsLightboxInstances["gallery"].props.onClose = function () {
            modalImagens.showPopover();
            console.log("🔥 Lightbox fechada!");     
          }       

        fsLightboxInstances["gallery"].props.onOpen = function () {
            modalImagens.hidePopover();
            console.log("🔥 Lightbox aberta!");
                
        }       
        fsLightboxInstances["gallery"].props.onClose = function () {
          modalImagens.showPopover();
	        console.log("🔥 Lightbox fechada!");     
        }
      </script>
      <script language="javascript">
        function initTexts(){
          $('.lista-empreendimentos-textos').slick({
          dots: true,
          infinite: false,
          speed: 300,
          slidesToShow: 5,
          slidesToScroll: 5,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
        });
        }
        initTexts();
      </script>
      

  </footer>
  </body>
</html>