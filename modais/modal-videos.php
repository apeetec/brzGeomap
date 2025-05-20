<div id="videos" class="modal white no-radius single-window" popover>
  <div class="modal-content no-padding">
    <div class="row no-gap mobile-row">
        <div class="col s12 m12 l3 white side-infos">
            <div class="side-box">
                <div class="logo-box" style="background-color:<?php echo $cor; ?>;">
                    <img class="logo" src="<?php echo $logo;?>" alt="Logo do empreendimento <?php echo $titulo;?>">
                </div>
                <div class="window-close">
                    <button tabindex="0" class="waves-effect btn-flat" popovertarget="videos" style="background-color:<?= htmlspecialchars($cor); ?>;">
                        <i class="fa-solid fa-bars white-text"></i><span class="white-text">&nbsp;Menu principal</span>
                    </button>
                </div>
                <div class="content">
                    <h5 class="center-align">
						Vídeos
					</h5>
                    <div class="tabs-container galeria-captives">
                        <?php
                            $cont = -1;
                            $cont2 = 0;
                            if(!empty($vídeos)){
                            foreach($vídeos as $campos_video){	
                                $cont++;
                                $cont2++;
                                if(isset($campos_video['campo_captive_video'])){
                                    $captive_video = $campos_video['campo_captive_video'];	
                                }
                                if(isset($campos_video['campo_botao_video'])){
                                    $botao_video = $campos_video['campo_botao_video'];	
                                }
                        ?>
                            <div class="tab" data-target="#carousel-videos" data-slide="<?php echo $cont;?>">
                                    <!-- <img src="<?php echo $captive_video;?>" alt="Captive do vídeo"> -->
                                    <button class="btn transparent"><span class="marker" style="background-color:<?php echo $cor; ?>;"></span><?php echo $botao_video;?></button>
                            </div>
                        <?php
                            }
                            }
                        ?>	





                    </div>
                </div>
                <div class="footer-infos">

                </div>
            </div>
        </div>
        <div class="col s12 m12 l9">
            <div class="owl-carousel owl-theme" id="carousel-videos">
                <?php
                if(!empty($vídeos)){
                    foreach($vídeos as $campos_video){	
                        if(isset($campos_video['campo_captive_video'])){
                            $captive_video = $campos_video['campo_captive_video'];	
                        }
                        if(isset($campos_video['campo_botao_video'])){
                            $botao_video = $campos_video['campo_botao_video'];	
                        }
                        if(isset($campos_video['campo_video'])){
                            $video = $campos_video['campo_video'];	
                        }
                ?>
                    <div class="item">
                        <?php 
                            $tag_video =  do_shortcode('[video src="'.$video.'" width="1920" height="1080"]');
                            echo $tag_video;
                        ?>
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