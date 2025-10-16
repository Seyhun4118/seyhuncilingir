<div class="master-slider ms-skin-default" id="masterslider">
    <?php
    $slider = $db->prepare("SELECT * from slayt order by slayt_sira ASC");
    $slider->execute(array(0));
    while ($rowslayt = $slider->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="ms-slide slide-1" data-delay="9">
        <img src="js/masterslider/blank.gif" data-src="trex/<?php echo $rowslayt['slayt_resim']; ?>" alt="" />
        <h3 class="ms-layer section__title-4 section__title-4-white text-popins d-none d-md-block"
            style="left: 230px;top: 245px;color: <?=$rowslayt['slayt_renk']?> !important;" data-type="text"
            data-delay="2000" data-ease="easeOutExpo" data-duration="1230" data-effect="scale(1.5,1.6)">
            <?=$rowslayt['slayt_baslik']?>
        </h3>
        <?php if(!empty($rowslayt['slayt_aciklama'])) { ?>
        <h3 class="ms-layer  d-none d-md-block"
            style="left: 230px; top: 330px;color: <?=$rowslayt['slayt_renk']?> !important;" data-type="text"
            data-effect="top(45)" data-duration="2000" data-delay="2500" data-ease="easeOutExpo">
            <?=$rowslayt['slayt_aciklama']?> </h3>
        <?php } if ($rowslayt['slayt_butonad']) { ?>
        <a href="<?=$rowslayt['slayt_butonlink']?>" class="ms-layer d-btn-bus mr-30 d-none d-md-block"
            style="left: 230px; top: 420px;height: auto;" data-type="text" data-delay="3000" data-ease="easeOutExpo"
            data-duration="1200" data-effect="scale(1.5,1.6)"> <?=$rowslayt['slayt_butonad']?> </a>
        <?php } ?>
    </div>
    <?php } ?>
</div>