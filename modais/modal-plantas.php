<div id="plantas" class="modal white no-radius single-window" popover>
<div class="modal-content no-padding">
    <div class="row no-gap mobile-row">
        <div class="col s12 m12 l3 side-infos">
            <div class="side-box">
                <div class="logo-box" style="background-color:<?php echo $cor; ?>;">
                    <img class="logo" src="<?php echo $logo;?>" alt="Logo do empreendimento <?php echo $titulo;?>">
                </div>
                <div class="window-close">
                    <button tabindex="0" class="waves-effect btn-flat" popovertarget="plantas" style="background-color:<?= htmlspecialchars($cor); ?>;">
                        <i class="fa-solid fa-bars white-text"></i><span class="white-text">&nbsp;Menu principal</span>
                    </button>
                </div>
        <div class="content">
            <h5 class="center-align">
                Plantas
            </h5>
            <div class="tabs-container galeria-captives">
                <div class="tab active" data-target="#carousel-plantas" data-slide="0"><button class="btn transparent"><span class="marker" style="background-color:<?php echo $cor; ?>;"></span>O empreendimento</button></div>
                    <?php
                    $c = 0;
                    foreach($grupo_plantas as $entrada_planta){
                    $c++;
                    if(isset($entrada_planta['campo_texto_botao_plantas'])){
                    $texto_botao = $entrada_planta['campo_texto_botao_plantas'];	
                    }

                    ?>
                    <div class="tab" data-target="#carousel-plantas" data-slide="<?php echo $c;?>"><button class="btn transparent"><span class="marker" style="background-color:<?php echo $cor; ?>;"></span><?php echo $texto_botao;?></button></div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="footer-infos">

            </div>
        </div>
    </div>
    <!-- Parte das plantas -->
    <div class="col s12 m12 l9">
        <div class="owl-carousel owl-theme" id="carousel-plantas">
            <div class="item white">
                <div class="container">
                    <div class="custom-container">
                        <div class="mt-6 left-align">
                            <h4 class="grey-text">
                                Implantação
                            </h4>
                        </div>
                    </div>
                    <img src="<?php echo $implantacao;?>" data-magnify-src="<?php echo $implantacao;?>" alt="Imagem da implantação do empreendimento" class="responsive-img zoom">
                    <div class="custom-container">
                        <ul class="lista-carac">
                            <?php
                            $cont = 0;
                            if(!empty($grupo_especs)){
                            foreach($grupo_especs as $espec => $key){
                                $galeriaEspc = $key['galeria_especificacao'];
                                $espec = $key['campo_texto_espec'];
                            $cont++;
                            ?>
                                <li>
                                    <!-- <span class="number"><?php echo $cont;?></span><?php echo $espec;?> -->


                                    <button class="btn waves-effect waves-light transparent" popovertarget="modal_<?php echo $cont;?>"><span class="number"><?php echo $cont;?></span>&nbsp;&nbsp;<?php echo $espec;?></button>

                                    <div id="modal_<?php echo $cont;?>" class="modal white no-radius single-window" popover>
                                        <div class="modal-content no-padding">
                                            <div class="carousel carousel-slider center" id="gal">
                                                <div class="carousel-fixed-item center">
                                                    <button class="btn waves-effect carousel-nav carousel-prev">
                                                        <i class="material-icons">chevron_left</i>
                                                    </button>
                                                    <button class="btn waves-effect carousel-nav carousel-next" >
                                                        <i class="material-icons">chevron_right</i>
                                                    </button>
                                                    
                                                </div>
                                            <?php
                                            foreach($galeriaEspc as $imagem_src){
                                            ?>
                                                
                                                    <div class="carousel-item white-text" href="">
                                                        <img height="100%" width="100%" class="responsive-img" src="<?php echo $imagem_src;?>" alt="" style="width:100%;height:100%;">
                                                    </div>
                                                
                                            <?php
                                            }
                                            ?>
                                            </div>
                                            <button tabindex="0" class="btn waves-effect closeBtn" popovertarget="modal_<?php echo $cont;?>">Fechar</button>
                                        </div>
                                        
                                    </div>
                                
                                
                                </li>
                            <?php
                            }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="custom-container">
                        <div class="divider"></div>
                    </div>
                    <div class="custom-container">
                        <div class="campo-texto-legal left-align">
                            <?php
                                echo $texto_legal_implantacao;
                            ?>
                        </div>
                    </div>
                </div>   
            </div>

                <?php
                foreach($grupo_plantas as $planta){
                $chamada = '';
                $metragem = '';
                $imagem_planta = '';
                if(!empty($planta['campo_chamada'])){
                $chamada = $planta['campo_chamada'];	
                }
                if(!empty($planta['campo_metragem'])){
                $metragem = $planta['campo_metragem'];	
                }
                if(!empty($planta['campo_imagem_planta'])){
                $imagem_planta = $planta['campo_imagem_planta'];	
                }

                ?>
        <div class="item">
            <div class="custom-container">
                <div class="row box-planta">
                    <div class="col s12 m12 l12">
                        <img class="zoom responsive-img" src="<?php echo $imagem_planta;?>" data-magnify-src="<?php echo $imagem_planta;?>" alt="Imagem da planta do empreendimento">
                    </div>
                <div class="col s12 m12 l12 custom-padding">
                    <h5 class="grey-text darkeen-text-1">
                        <strong>
                            <?php echo $chamada;?> 
                        </strong>                                        
                    </h5>
                    <h3 class="">
                        <strong class="yellow-text">
                            <?php echo $metragem;?>
                        </strong>                    
                    </h3>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
</div>
</div>
</div>
</div>
</div>
</div>