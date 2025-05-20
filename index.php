<?php 
    get_header();
    $imagem_excelencia = get_post_meta( 92, 'imagem_excelencia', true);
    $titulo_excelencia = get_post_meta( 92, 'titulo_excelencia', true);
    $texto_excelencia = get_post_meta( 92, 'texto_excelencia', true);
    $logo = get_post_meta( 92, 'logo_brz', true);
    $grupo_metragens = get_post_meta( 92, 'grupo_brz_numero', true);
    $titulos_sonhos = get_post_meta( 92, 'titulo_sonhos', true);
    $texto_sonhos = get_post_meta( 92, 'texto_sonhos', true);
    $titulos_praticas = get_post_meta( 92, 'titulo_praticas', true);
    $texto_praticas = get_post_meta( 92, 'texto_praticas', true);

    $imagem_trajetoria = get_post_meta( 92, 'imagem_trajetoria', true);
    $titulo_trajetoria = get_post_meta( 92, 'titulo_trajetoria', true);
    $texto_trajetoria = get_post_meta( 92, 'texto_trajetoria', true);
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
            <svg></svg>
        </section>
        <section class="footer">

        </section>
        <!-- Botão para abrir a página institucional -->
        <div class="flex-buttons-floating">
            <!-- <a class="grey darken-1 custom-btn modal-trigger" href="#institucional"><span class="yellow"></span></a> -->
            <button class="btn waves-effect grey darken-1 custom-btn waves-light" popovertarget="institucional"><span class="yellow"></span>Institucional</button>
        </div>
    </article>
<!-- Modal da página institucional -->
    <div id="institucional" class="modal no-radius" popover>
        <!-- Botões de voltar e avançar -->
        <div class="floating-next-prev">
            <button id="next"><i class="fa-solid fa-chevron-right"></i></button>
            <button id="prev"><i class="fa-solid fa-chevron-left"></i></button>
        </div>
        <div class="modal-content">

            <div class="owl-carousel owl-theme">
                <!-- Excelência -->
                <div class="item white scroll-y">
                    <?php
                        $dirbase = get_template_directory();
                        require_once $dirbase . '/template-parts/excelencia.php';
                    ?>
                </div>
                <!-- Números -->
                <div class="item">
                    <?php
                        $dirbase = get_template_directory();
                        require_once $dirbase . '/template-parts/numeros.php';
                    ?>
                </div>
                <!-- Iniciativa -->
                <div class="item overflowY grey darken-3">
                    <?php
                        $dirbase = get_template_directory();
                        require_once $dirbase . '/template-parts/iniciativas.php';
                    ?>
                </div>
                <!-- Qualidade -->
                <div class="item">
                    <?php
                        $dirbase = get_template_directory();
                        require_once $dirbase . '/template-parts/qualidade.php';
                    ?>
                </div>
            </div>


        </div>
            <button tabindex="0" class="waves-effect btn-flat close-modal" popovertarget="institucional"><i class="fas fa-undo-alt"></i></button>
    </div>


<?php get_footer(); ?>
<script>
    const svg = d3.select("svg");
    const box_mapa = document.querySelector('.box-mapa');
    const box_mapa_svg = document.querySelector('.box-mapa svg');
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
      // Pegando as categorias que nos casos são as cidades
      $terms = get_terms(array(
        'taxonomy' => 'estados', // Altere para a taxonomia que você deseja
        'hide_empty' => false, // Define se termos vazios (sem posts) devem ser incluídos
      ));
      // Loop dos termos
      foreach ($terms as $term) {
        $id = $term->term_id;
        $estado = $term->name;
        $uf = get_term_meta( $id, 'uf', true);
      ?>
      { name: "<?php echo $estado;?>", sigla: "<?php echo $uf;?>" },
      <?php
      }
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

    // async function obterCoordenadas(cidade) {
    //   const url = `https://nominatim.openstreetmap.org/search?q=${cidade}&format=json&addressdetails=1&limit=1`;
    //   const response = await fetch(url);
    //   const data = await response.json();
    //   if (data && data[0]) {
    //     return [parseFloat(data[0].lon), parseFloat(data[0].lat)];
    //   }
    //   return null;
    // }

  async function obterCoordenadas(cidade) {
  const cidadeComEstado = `${cidade}, Brazil`; // Adiciona contexto
  const url = `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(cidadeComEstado)}&format=json&addressdetails=1&limit=1`;
  const response = await fetch(url);
  const data = await response.json();
  if (data && data[0]) {
    return [parseFloat(data[0].lon), parseFloat(data[0].lat)];
  }
  console.warn(`Coordenadas não encontradas para: ${cidadeComEstado}`);
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

