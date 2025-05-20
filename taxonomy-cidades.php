<?php 
get_header(); 
$term = get_queried_object();
$destino = get_term_link($term);
$term_id = $term->term_id; // Categoria principal ou seja, da data principal
$term_name = $term->name; // Nome da categoria principal
$sanitiza_term_name = sanitize_title($term_name); // Nome da categoria sem caracteres especiais

// Para buscar o estado específico apenas na página da categoria
$meta_estado = get_term_meta( $term_id, 'estado_cidade', true);
$pegar_estado = get_term_by( 'slug', $meta_estado,'estados');
$nome_estado = $pegar_estado->name;
$uf = get_term_meta( $term_id, 'uf_estado_cidade', true);
?>

    <article class="painel-home container">
        <section class="top">
            <div class="box-title">
                <h3 class="white-text center-align m-0">
                    <strong>Mapa</strong>
                </h4>
            </div>
            <div class="box-logo">
                <img class="logo" src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="Logo da BRZ Empreendimentos">
            </div>
        </section>
        <section class="box-mapa white">
            <div class="row">
                <div class="content-mapa col s12 m12 l8">
                    <svg></svg>
                </div>
                <div class="col s12 m12 l4">
                    <?php
                        // $dirbase = get_template_directory();
                        // // Post type empreendimentos
                        // require_once $dirbase . '/template-parts/lista-empreedimentos.php';
                    ?>

                    <div class="lista-de-empreendimentos">
                        <a href="<?php echo get_site_url(); ?>" class="back-home"><i class="fa-solid fa-xmark"></i></a>
                        <div class="swiper">
                            <div class="swiper-wrapper">
                            <?php
                                $dirbase = get_template_directory();
                                // Post type empreendimentos
                                require_once $dirbase . '/template-parts/lista-empreedimentos.php';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer">

        </section>

    </article>
<?php get_footer(); ?>
<script>
    const svg = d3.select("svg");
    const box_mapa = document.querySelector('.box-mapa .content-mapa');
    const box_mapa_svg = document.querySelector('.box-mapa .content-mapa svg');
    const box_mapa_largura = box_mapa.offsetWidth - 50;
    const box_mapa_altura = box_mapa.offsetHeight;
    console.log('Largura (offsetWidth):', box_mapa_largura);
    console.log('Largura (offsetHeight):', box_mapa_altura);
    box_mapa_svg.style.height = box_mapa_altura +'px';
    const width = box_mapa_largura;  // Largura da tela
    const height = box_mapa_altura; 

    const projection = d3.geoMercator();
    const path = d3.geoPath().projection(projection);

    const estados = [
      <?php
      ?>
      { name: "<?php echo $nome_estado;?>", sigla: "<?php echo $uf;?>" },
      <?php
      
      ?>
    ];

    // Lista de cidades
    const cidades = [
      <?php
      // Pegando as categorias que nos casos são as cidades
      $terms = get_terms(array(
        'taxonomy' => 'cidades', // Altere para a taxonomia que você deseja
        'hide_empty' => false, // Define se termos vazios (sem posts) devem ser incluídos
      ));
      // Loop dos termos
      foreach ($terms as $term) {
        $id = $term->term_id;
        $cidade = $term->name;
      ?>
      { name: "<?php echo $cidade;?>", link: "<?php echo get_term_link($id);?>" },
      <?php
      }
      ?>
    ];

    async function obterCoordenadas(cidade) {
      const url = `https://nominatim.openstreetmap.org/search?q=${cidade}&format=json&addressdetails=1&limit=1`;
      const response = await fetch(url);
      const data = await response.json();
      if (data && data[0]) {
        return [parseFloat(data[0].lon), parseFloat(data[0].lat)];
      }
      return null;
    }

    async function carregarMapa() {
      const geojson = await d3.json('https://raw.githubusercontent.com/codeforamerica/click_that_hood/master/public/data/brazil-states.geojson');

      // Filtra os estados selecionados
      const estadosSelecionados = geojson.features.filter(d =>
        estados.some(e => e.sigla === d.properties.sigla)
      );

      const bounds = d3.geoBounds({ type: "FeatureCollection", features: estadosSelecionados });
      const center = d3.geoCentroid({ type: "FeatureCollection", features: estadosSelecionados });

      projection
        .center(center)
        .fitSize([width, height], { type: "FeatureCollection", features: estadosSelecionados });

      // Adiciona os estados ao mapa
      svg.selectAll(".state")
        .data(estadosSelecionados)
        .enter().append("path")
        .attr("class", "state")
        .attr("d", path)
        .on("mouseover", function(event, d) {
          d3.select(this).classed("highlight", true);
        })
        .on("mouseout", function() {
          d3.select(this).classed("highlight", false);
        });

      // Adiciona as siglas dos estados
      estadosSelecionados.forEach(state => {
        const centroide = path.centroid(state);
        svg.append("text")
          .attr("class", "state-label")
          .attr("x", centroide[0])
          .attr("y", centroide[1])
          .attr("text-anchor", "middle")
          .text(state.properties.sigla);
      });

      // Adiciona marcadores para as cidades
      for (const cidade of cidades) {
        const coordenadas = await obterCoordenadas(cidade.name);
        if (coordenadas) {
          const [x, y] = projection(coordenadas);

          // Adiciona marcadores clicáveis
          svg.append("a")
            .attr("xlink:href", cidade.link)
            .attr("target", "_blank")
            .append("circle")
            .attr("class", "marker")
            .attr("cx", x)
            .attr("cy", y)
            .attr("r", 8)
            .on("mouseover", function(event) {
              const tooltip = d3.select("body").append("div")
                .attr("class", "tooltip")
                .style("left", (event.pageX + 5) + "px")
                .style("top", (event.pageY - 28) + "px")
                .text(cidade.name);
            })
            .on("mouseout", function() {
              d3.select(".tooltip").remove();
            });

          // Adiciona o nome das cidades
          svg.append("text")
            .attr("class", "city-label")
            .attr("x", x + 10) // Ajuste horizontal
            .attr("y", y + 5) // Ajuste vertical
            .text(cidade.name);
        }
      }
    }
    carregarMapa();
  </script>
<!-- Swiper JS (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".swiper", {
        direction: "vertical", // Movimento vertical
        slidesPerView: 3, // Exibir 3 slides ao mesmo tempo
        spaceBetween: 10, // Espaço entre slides
        slidesPerGroup: 3, // Avança 3 slides por vez
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        speed: 500, // Velocidade da transição
        mousewheel: true, // Ativa o scroll do mouse
                    // Configurações responsivas
                    breakpoints: {
                780: {
                    slidesPerView: 3, // Em telas maiores, exibe 3 slides
                    slidesPerGroup: 3, // Avança 3 slides de uma vez
                },
                0: {
                    slidesPerView: 1, // Em telas menores, exibe 1 slide
                    slidesPerGroup: 1, // Avança 1 slide de uma vez
                }
            }
    });
</script>