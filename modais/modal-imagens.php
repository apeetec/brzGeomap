
<div id="imagens" class="modal white no-radius single-window" popover>
  <div class="modal-content no-padding">
    <div class="row no-gap mobile-row">
        <div class="col s12 m12 l3 side-infos">
            <div class="side-box">
                <div class="logo-box" style="background-color:<?php echo $cor; ?>;">
                    <img class="logo" src="<?php echo $logo;?>" alt="Logo do empreendimento <?php echo $titulo;?>">
                </div>
                <div class="window-close">
                    <button tabindex="0" class="waves-effect btn-flat" popovertarget="imagens" style="background-color:<?= htmlspecialchars($cor); ?>;">
                        <i class="fa-solid fa-bars white-text"></i><span class="white-text">&nbsp;Menu principal</span>
                    </button>
                </div>
                <div class="content">
                    <!-- <h5 class="center-align">
						Imagens
					</h5> -->
                    <div class="tabs-container galeria-captives">
                        <div class="galeria">
                            <?php
                                $cont = -1; // Inicializa $cont com 0
                                if(!empty($galeria)){
                                    $src_imagem = '';
                                foreach ($galeria as $foto) {  
                                    $cont++; // Incrementa $cont
                                    if(!empty($foto['campo_foto'])){
                                        $src_imagem = $foto['campo_foto'];
                                    }
                                    
                            ?>
                                <div class="item">
                                    <div class="tab" data-target="#carousel-imagens" data-slide="<?php echo $cont; ?>">
										<img class="foto" src="<?php echo $src_imagem; ?>" alt="Imagem da galeria">
									</div>
                                </div>
                            <?php
                                }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="footer-infos">

                </div>
            </div>
        </div>
        <div class="col s12 m12 l9">
            <div class="owl-carousel owl-theme" id="carousel-imagens">
                <?php
                    if(!empty($galeria)){
                        $src_imagem = '';
                    foreach($galeria as $foto){	
                        $texto_imagens = '';	
                        if(!empty($foto['campo_foto'])){
                            $src_imagem = $foto['campo_foto'];
                        }													
                ?>
                    <div class="item">
                    
                            <a data-fslightbox="gallery" class="gallery" href="<?php echo $src_imagem; ?>"></a>
                            <img class="foto" src="<?php echo $src_imagem; ?>" alt="Imagem da galeria">
                            <div class="box-infos-legal">
                                <?php
                                    if(!empty($foto['campo_texto'])){
                                        $texto_imagens = $foto['campo_texto'];
                                        echo $texto_imagens;
                                    }
                                ?>
                            </div>
                    
                        
                    </div>
                <?php
                    }
                    }
                ?>
            </div>
        </div>
    </div>
  </div>
</div>