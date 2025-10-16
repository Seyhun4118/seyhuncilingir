<?php if ($widgetprint['widget_welcome1'] == 1) { ?>

<section class="brand__area pb-90 pt-20">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="brand__slider-4 owl-carousel">
                    <?php
                        $refsor = $db->prepare("SELECT * from referanslar order by referans_id ASC");
                        $refsor->execute(array(0));
                        foreach ($refsor as $refcek) {
                        ?>
                    <div class="brand__item-4 text-center">
                        <a target="_blank" href="<?php echo $refcek['referans_link']; ?>">
                            <img src="trex/<?php echo $refcek['referans_resim1']; ?>"
                                alt="<?php echo $refcek['referans_kategori']; ?> / <?php echo $refcek['referans_adi']; ?>">
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
</main>

<footer>
    <div class="footer__area black-bg-9">
        <div class="footer__top">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-7 col-sm-7">
                        <div class="footer__widget footer__info-padding footer__mr-40 red-bg">
                            <div class="footer__logo mb-40" style="text-align: center;">
                                <a href="<?php echo $settingsprint['ayar_siteurl']; ?>">
                                    <img src="trex/<?php echo $settingsprint['ayar_flogo']; ?>"
                                        alt="<?php echo $settingsprint['ayar_firmaadi']; ?>">
                                </a>
                            </div>
                            <div class="footer__widget-content">
                                <div class="footer__info">
                                    <p><?php echo nl2br($settingsprint['ayar_firmahakkinda']); ?></p>
                                    <div class="footer__social footer__social-4">
                                        <ul>
                                            <?php foreach ($socialf as $key => $value) { ?>
                                            <li>
                                                <a href="<?=$value['sosyal_link']?>"><i
                                                        class="fab <?=$value['sosyal_icon']?>"></i></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <div class="footer__widget footer__widget-padding footer__ml--20">
                            <div class="footer__widget-top">
                                <h3 class="footer__widget-title">Menüler</h3>
                            </div>
                            <div class="footer__widget-content">
                                <div class="footer__link">
                                    <ul class="row">
                                        <?php $footermenu = $db->prepare("SELECT * from fmenu order by fmenu_sira");
                                            $footermenu->execute();
                                            foreach ($footermenu as $footermenuprint) {
                                            ?>
                                        <li class="col-md-4">
                                            <a
                                                href="<?php echo $footermenuprint['fmenu_link'] ?>"><?php echo $footermenuprint['fmenu_ad']; ?></a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="footer__bottom-wrapper footer-bottom-bg-2">
                    <div class="row justify-content-center align-items-center">
                        <?php if ($widgetprint['widget_welcome'] == 1) { ?>
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                            <div class="footer__copyright footer__line footer__copyright-4">
                                <p><?php echo $widgetprint['widget_bwelcome']; ?></p>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">
                            <div
                                class="footer__call footer__call-6 d-flex align-items-center pl-15 footer__line footer__line-2">
                                <div class="footer__call-icon mr-20">
                                    <i class="flaticon-call-center"></i>
                                </div>
                                <div class="footer__call-content">
                                    <p>Bize Hemen Ulaşın</p>
                                    <h5 style="color:#fff;"><?=$settingsprint['ayar_tel']?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-5 col-md-8">
                            <div class="footer__contact pl-90">
                                <h3>İletişim Bilgileri</h3>
                                <ul>
                                    <li>
                                        <p>Adres <span>:</span></p>
                                        <?=$settingsprint['ayar_adres']?> <br>
                                        <?=$settingsprint['ayar_ilce']?> / <?=$settingsprint['ayar_il']?>
                                    </li>
                                    <li>
                                        <p>Email <span>:</span></p>
                                        <?=$settingsprint['ayar_mail']?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php echo $motorprint['motor_analitik']; ?>
<?php echo $motorprint['motor_metrika']; ?>
<?php echo $settingsprint['ayar_kod']; ?>
<!-- JS here -->
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendor/waypoints.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/meanmenu.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/magnific-popup.min.js"></script>
<script src="assets/js/parallax.min.js"></script>
<script src="assets/js/backToTop.js"></script>
<script src="assets/js/nice-select.min.js"></script>
<script src="assets/js/counterup.min.js"></script>
<script src="assets/js/ajax-form.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="//cdn.jsdelivr.net/sweetalert2/6.5.6/sweetalert2.min.js"></script>
<script src="assets/js/masterslider/masterslider.min.js"></script>

<script type="text/javascript">
(function($) {
    "use strict";
    var slider = new MasterSlider();
    // adds Arrows navigation control to the slider.
    slider.control('arrows');
    slider.control('bullets');

    slider.setup('masterslider', {
        width: 1600, // slider standard width
        height: 650, // slider standard height
        space: 0,
        speed: 35,
        layout: 'fullwidth',
        loop: true,
        preload: 0,
        autoplay: false,
        view: "parallaxMask"
    });
})(jQuery);
</script>
<?php if (@$_GET['status'] == 'ok') { ?>
<script>
$(document).ready(function() {
    swal({
        title: "TAMAMLANDI!",
        text: "İşlem Başarılı Bir Şekilde Tamamlandı.",
        type: "success",
        select: false,
        timer: '5000',
    });
});
</script>
<?php
            $sayfaURL = "http";
            if (isset($_SERVER["HTTPS"])) {
                if ($_SERVER["HTTPS"] == "on") {
                    $sayfaURL .= "s";
                }
            }
            $hesapa = $db->prepare("SELECT * from smenu where smenu_id=11");
            $hesapa->execute(array(0));
            $hesapprinta = $hesapa->fetch(PDO::FETCH_ASSOC);

            $sayfaURL .= "://";
            $sayfaURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
            ?>
<meta http-equiv="refresh" content="5; URL=<?php echo substr($sayfaURL, 0, -10); ?>">
<?php
        } elseif (@$_GET['status'] == 'no') { ?>
<script>
$(document).ready(function() {
    swal({
        title: "HATA!",
        text: "İşlem sırasında bir hata oluştu.",
        type: "error",
        timer: '5000'
    });
});
</script>
<?php
            $sayfaURL = "http";
            if (isset($_SERVER["HTTPS"])) {
                if ($_SERVER["HTTPS"] == "on") {
                    $sayfaURL .= "s";
                }
            }
            $sayfaURL .= "://";
            $sayfaURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; ?>
<meta http-equiv="refresh" content="5; URL=<?php echo substr($sayfaURL, 0, -10); ?>">
<?php } elseif (@$_GET['demo'] == 'ok') { ?>
<script>
$(document).ready(function() {
    swal({
        title: "OoPs!",
        text: "Demo modda bu işleme izin verilmiyor.",
        type: "warning",
        timer: '6000'
    });
});
</script>
<?php
            $sayfaURL = "http";
            if (isset($_SERVER["HTTPS"])) {
                if ($_SERVER["HTTPS"] == "on") {
                    $sayfaURL .= "s";
                }
            }
            $sayfaURL .= "://";
            $sayfaURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; ?>
<meta http-equiv="refresh" content="6; URL=<?php echo substr($sayfaURL, 0, -8); ?>">
<?php } elseif (@$_GET['yorum'] == 'ok') { ?>
<script>
$(document).ready(function() {
    swal({
        title: "YORUM KAYDEDİLDİ!",
        text: "Yorumunuz onay sonrası yayınlanacaktır.",
        type: "success",
        timer: '6000'
    });
});
</script>
<?php
            $sayfaURL = "http";
            if (isset($_SERVER["HTTPS"])) {
                if ($_SERVER["HTTPS"] == "on") {
                    $sayfaURL .= "s";
                }
            }
            $sayfaURL .= "://";
            $sayfaURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; ?>
<meta http-equiv="refresh" content="6; URL=<?php echo substr($sayfaURL, 0, -9); ?>">
<?php } ?>
</body>

</html>









<div class="loc_copyright_wrapper text-center"
    style="position: fixed; bottom:0; width:100%;padding: 0; margin: 0;border: none; z-index:99;">
    <div class="row" style="height: 100%;">
        <?php if ($whatsappprint['whats_durum'] == 1) { ?>
        <a class="col-md-6 col-xs-6" target="_blank" href="<?php echo $whatsappprint['whats_cdestek']; ?>"
            style="font-size: 16px; font-weight: 600;color:#fff !important;padding: 0;">
            <div class="col text-center"
                style="background: #<?php echo $whatsappprint['whats_skype']; ?>;padding: 12px; ">
                <?php echo $whatsappprint['whats_tel']; ?>
            </div>
        </a>
        <?php }
                if ($whatsappprint['whats_tiklaaradurum'] == 1) { ?>
        <a class="col-md-6 col-xs-6" target="_blank" href="<?php echo $whatsappprint['whats_skypedurum']; ?>"
            style="font-size: 16px; font-weight: 600;color:#fff !important;padding: 0;">
            <div class="col text-center"
                style="background: #<?php echo $whatsappprint['whats_mail']; ?>;padding: 12px; ">
                <?php echo $whatsappprint['whats_tiklaara']; ?>
            </div>
        </a>
        <?php } ?>
    </div>
</div>

<?php
$whatsapp=$db->prepare("SELECT * from whatsapp where whats_id=0");
$whatsapp->execute(array(0));
$whatsappprint=$whatsapp->fetch(PDO::FETCH_ASSOC);
?>
<?php if ($whatsappprint['whats_durum']==1 || $whatsappprint['whats_tiklaaradurum']==1) {  ?>
<div style='position: fixed; bottom: 0; left: 8px; z-index: 3;'>
    <?php if ($whatsappprint['whats_durum']==1) {  ?>
    <a href="<?=$whatsappprint['whats_cdestek']?>">
        <div class="tel-fixed" style="background: #<?=$whatsappprint['whats_skype']?>;">
            <?=$whatsappprint['whats_tel']?>
        </div>
    </a>
    <?php } if ($whatsappprint['whats_tiklaaradurum']==1) {  ?>
    <a href="<?=$whatsappprint['whats_skypedurum']?>">
        <div class="wp-fixed" style="background: #<?=$whatsappprint['whats_mail']?>;">
            <?=$whatsappprint['whats_tiklaara']?>
        </div>
    </a>
    <?php } ?>
</div>
<?php } ?>