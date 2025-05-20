<div id="localizacao" class="modal white no-radius single-window" popover>
  <div class="modal-content no-padding">
    <div class="row no-gap mobile-row">
        <div class="col s12 m12 l3 side-infos">
            <div class="side-box">
                <div class="logo-box" style="background-color:<?php echo $cor; ?>;">
                    <img class="logo" src="<?php echo $logo;?>" alt="Logo do empreendimento <?php echo $titulo;?>">
                </div>
                <div class="window-close">
                    <button tabindex="0" class="waves-effect btn-flat" popovertarget="localizacao" style="background-color:<?= htmlspecialchars($cor); ?>;">
                        <i class="fa-solid fa-bars white-text"></i><span class="white-text">&nbsp;Menu principal</span>
                    </button>
                </div>
                <div class="content">
                    <h5 class="center-align">
						Localização
					</h5>
                    <div class="tabs-container">
                        <?php 
                            if(!empty($mapa_aerea)){
                        ?>
                        <div class="tab active" data-target="#mapa" data-slide="0"><button class="btn transparent"><span class="custom-marker" style="background-color:<?php echo $cor; ?>;"></span>Foto aérea</button></div>
                        <?php 
                           }
                        ?>
                        
                        <?php 
                            if(!empty($mapa_google)){
                        ?>
                            <div class="tab" data-target="#mapa" data-slide="1"><button class="btn transparent"><span class="custom-marker" style="background-color:<?php echo $cor; ?>;"></span>Mapa satélite</button></div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
                <div class="footer-infos">

                </div>
            </div>
        </div>
        <div class="col s12 m12 l9">
            <div class="owl-carousel owl-theme" id="mapa">
                <?php 
                    if(!empty($mapa_aerea)){
                 ?>
                    <div class="item">
                        <img class="mapa" src="<?php echo $mapa_aerea;?>" alt="Vista áerea do mapa">
                    </div>
                    <?php 
                    }
                ?>
                <?php 
                    if(!empty($mapa_google)){
                ?>
                    <div class="item">
                        <?php echo $mapa_google;?>
                    </div>
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
  </div>
</div>