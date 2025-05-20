<div id="diferenciais" class="modal white no-radius single-window" popover>
  <div class="modal-content no-padding">
    <div class="row no-gap mobile-row">
        <div class="col s12 m12 l3 side-infos">
            <div class="side-box">
                <div class="logo-box" style="background-color:<?php echo $cor; ?>;">
                    <img class="logo" src="<?php echo $logo;?>" alt="Logo do empreendimento <?php echo $titulo;?>">
                </div>
                <div class="window-close">
                    <button tabindex="0" class="waves-effect btn-flat" popovertarget="diferenciais" style="background-color:<?= htmlspecialchars($cor); ?>;">
                        <i class="fa-solid fa-bars white-text"></i><span class="white-text">&nbsp;Menu principal</span>
                    </button>
                </div>
                <div class="content">
                    <h5 class="center-align">
                        Diferenciais
					</h5>
                    <div class="tabs-container">
                        <div class="tab active" data-target="#carousel-diferenciais" data-slide="0">
                            <button class="btn transparent">
                                <span class="marker" style="background-color:<?= htmlspecialchars($cor); ?>;"></span>O empreendimento
                            </button>
                        </div>
                        <div class="tab" data-target="#carousel-diferenciais" data-slide="1">
                            <button class="btn transparent">
                                <span class="marker" style="background-color:<?= htmlspecialchars($cor); ?>;"></span>Conforto
                            </button>
                        </div>                        
                    </div>
                </div>
                <div class="footer-infos">

                </div>
            </div>
        </div>
        <!-- Carousel dos diferenciais -->
         <div class="col s12 m12 l9 grey darken-1">
            <div class="owl-carousel owl-theme" id="carousel-diferenciais">
                <div class="item">
                    <div class="box-diferenciais">
                        <div class="box-title custom-container">
                            <h5 class="center-align title">
                                Confira tudo o que <br> o empreendimento tem
                            </h5>
                        </div>
                        <div class="lista-empreendimentos-textos">
                            <?php foreach ($diferenciais as $diferencial): ?>
                                <?php 
                                    $titulo_diferencial = $diferencial['campo_titulo_diferencial_empreendimento'] ?? '';
                                    $texto = $diferencial['campo_texto_difercial_empreendimento'] ?? '';
                                    $icone_diferencial = $diferencial['campo_icone_diferencial_empreendimento'] ?? '';
                                ?>
                                <div class="box">
                                    <img src="<?= htmlspecialchars($icone_diferencial); ?>" alt="">
                                    <span class="title"><?php echo $titulo_diferencial; ?></span>
                                    <p class="white-text"><?php echo $texto;?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="custom-container">
                        <div class="divider"></div>
                    </div>
                    <div class="box-diferenciais-lazer">
                        <div class="custom-container">
                            <ul class="flex-icons">
                                <?php foreach ($diferenciais_lazer as $diferencial_lazer): ?>
                                    <?php 
                                        $titulo_diferencial_lazer = $diferencial_lazer['campo_titulo_Lazer_empreendimento'] ?? '';
                                        $texto_lazer = $diferencial_lazer['campo_texto_Lazer_empreendimento'] ?? '';
                                        $icone_diferencial_lazer = $diferencial_lazer['campo_icone_Lazer_empreendimento'] ?? '';
                                    ?>
                                    <li>
                                        <img src="<?= htmlspecialchars($icone_diferencial_lazer); ?>" alt="">
                                        <span><?php echo $titulo_diferencial_lazer; ?></span>
                                        <p><?php echo $texto_lazer; ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="row line no-gap">
                        <div class="col s12 m12 l4">
                            <img src="<?= htmlspecialchars($diferenciais_lazer_imagem_lateral); ?>" alt="Imagem lateral da área de diferencial">
                        </div>
                        <div class="col s12 m12 l8 box-infos">
                            <h5 class="main-title left-align">
                                <span class="yellow-text">O conforto</span><br>
                                <span class="yellow-text">e o espaço que</span><br>
                                <span class="white-text">toda a família <br>precisa</span>
                            </h5>
                            <ul class="list-confort">
                                <?php 
                                if(!empty($confortos)):
                                foreach ($confortos as $conforto):
                                ?>
                                    <?php 
                                        $texto_conforto = $conforto['campo_texto_conforto_empreendimento'] ?? '';
                                        $icone_conforto = $conforto['campo_icone_conforto_empreendimento'] ?? '';
                                    ?>
                                    <li class="flex">
                                        <img src="<?= htmlspecialchars($icone_conforto); ?>" alt="ícone da área de conforto">
                                        <div><?php echo $texto_conforto; ?></div>
                                    </li>
                                <?php				
                                endforeach; 
                                endif
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>








            </div>
         </div>
    </div>
  </div>
</div>