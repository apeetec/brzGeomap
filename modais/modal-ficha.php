<div id="ficha" class="modal white no-radius single-window" popover>
  <div class="modal-content no-padding">
    <div class="row no-gap mobile-row">
        <div class="col s12 m12 l3 white side-infos">
            <div class="side-box">
                <div class="logo-box" style="background-color:<?php echo $cor; ?>;">
                    <img class="logo" src="<?php echo $logo;?>" alt="Logo do empreendimento <?php echo $titulo;?>">
                </div>
                <div class="window-close">
                    <button tabindex="0" class="waves-effect btn-flat" popovertarget="ficha" style="background-color:<?= htmlspecialchars($cor); ?>;">
                        <i class="fa-solid fa-bars white-text"></i><span class="white-text">&nbsp;Menu principal</span>
                    </button>
                </div>
                <div class="content">
                    <h5 class="center-align">
						Ficha técnica
					</h5>
                    <div class="tabs-container galeria-captives">         
                        <div class="tab active" data-target="#carousel-ficha" data-slide="0"><button class="btn transparent"><span class="marker" style="background-color:<?php echo $cor; ?>;"></span>O empreendimento</button></div>
						<div class="tab" data-target="#carousel-ficha" data-slide="1"><button class="btn transparent"><span class="marker" style="background-color:<?php echo $cor; ?>;"></span>Torres e aptos</button></div>
                        <div class="tab" data-target="#carousel-ficha" data-slide="2"><button class="btn transparent"><span class="marker" style="background-color:<?php echo $cor; ?>;"></span>Estacionamento</button></div>
                    </div>
                </div>
                <div class="footer-infos">

                </div>
            </div>
        </div>
        <!-- Ficha -->
        <div class="col s12 m12 l9">
            <div class="owl-carousel owl-theme" id="carousel-ficha">
                <div class="item grey darken-1 overflowY">
                    <div class="mt-6">
                        <h3 class="yellow-text center-align">
                            <strong>
                                INFORMAÇÕES IMPORTANTES 
                            </strong>
                            <br>
                            SOBRE O EMPREENDIMENTO
                        </h5>
                    </div>
                    <div class="row line no-gap mt-6">
                        <div class="col s12 m12 l6">
                            <div class="container">
                                <h5 class="sub-title yellow right-align">
                                    ITENS DE LAZER E CONVENIÊNCIA
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="custom-container">
                        <ul class="box-lazer">
                            <?php
                                foreach($grupo_lazer as $lazer){	
                                    $tag_img = '';
                    
                                    $texto_lazer = '';
                                    if (isset($lazer['campo_icone_item_de_lazer']) && !empty($lazer['campo_icone_item_de_lazer'])) {
                                        $icone_lazer = htmlspecialchars($lazer['campo_icone_item_de_lazer'], ENT_QUOTES, 'UTF-8');
                                        $tag_img = '<img src="' . $icone_lazer . '" alt="ícone de lazer">';
                                    }
                                    if (isset($lazer['campo_texto_item_de_lazer']) && !empty($lazer['campo_texto_item_de_lazer'])) {
                                        $texto_lazer = htmlspecialchars($lazer['campo_texto_item_de_lazer'], ENT_QUOTES, 'UTF-8');
                                    }
                            ?>
                            <li>
                                <figure>
                                <?php
                                    echo $tag_img;
                                ?>
                                </figure>
                                <div class="text white-text left-align">
                                    <?php
                                        echo $texto_lazer;
                                    ?>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="item grey darken-1">
                    <div class="row custom no-gap">
                        <div class="col s12 m4 l4">
                            <?php
                                $imagem_torres = get_post_meta( $post_id, 'campo_imagem_lateral_torres', true);                   
                            ?>
                            <img class="custom side-image" src="<?php echo $imagem_torres; ?>" alt="Imagem da lateral da parte de torres">
                        </div>
                        <div class="col s12 m8 l8 mt-6">
                            <div class="box-title-mobile mt-6">
                                <h5 class="yellow sub-title left-align">
                                    Torres e apartamentos
                                </h5>
                            </div>
                            <div class="white-text custom-container left-align mt-6">
                                <?php
                                    $texto_torres = get_post_meta( $post_id, 'campo_texto_torres_apartamentos', true); 
                                    echo $texto_torres;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item grey darken-1 overflowY">
                    <div class="row line no-gap">
                        <div class="col s12 m12 l12 banner-top">
                            <?php
                                $imagem_estacionamento = get_post_meta( $post_id, 'campo_imagem_do_topo_estacionamento', true);   
                            ?>
                            <img src="<?php echo $imagem_estacionamento; ?>" alt="Imagem do topo de estacionamento" class="">
                        </div>
                        <div class="col s12 m12 l8">
                            <h5 class="sub-title yellow left-align no-margin">
                                Estacionamento
                            </h5>
                        </div>
                        <div class="col s12 m12 l12 white-text custom-container left-align">
                            <br>
                            <?php
                                $texto_estacionamento = get_post_meta( $post_id, 'campo_texto_estacionamento', true); 
                                echo $texto_estacionamento;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
  </div>
</div>