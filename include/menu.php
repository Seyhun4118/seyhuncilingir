<meta name="description" content="<?php echo $meta['description'] ?>" />
<meta name="keywords" content="<?php echo $meta['keywords'] ?>" />
<title><?php echo $meta['title'] ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="trex/<?php echo $settingsprint['ayar_fav']; ?>">
<style>
:root {
    --renk: <?php echo $settingsprint['ayar_mobil'];
    ?>
}
</style>
<style>
:root {
    --renk2: <?php echo $settingsprint['ayar_title3'];
    ?>
}
</style>
<link rel="stylesheet" href="assets/css/preloader.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/meanmenu.css">
<link rel="stylesheet" href="assets/css/animate.min.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/swiper-bundle.css">
<link rel="stylesheet" href="assets/css/backToTop.css">
<link rel="stylesheet" href="assets/css/magnific-popup.css">
<link rel="stylesheet" href="assets/css/nice-select.css">
<link rel="stylesheet" href="assets/css/fontAwesome5Pro.css">
<link rel="stylesheet" href="assets/css/flaticon.css">
<link rel="stylesheet" href="assets/css/default.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.5.6/sweetalert2.min.css">

<link rel="stylesheet" href="assets/js/masterslider/style/masterslider.css" />
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->

    <!-- Add your site or application content here -->

    <!-- pre loader area start -->
    <?php if ($settingsprint['ayar_renk'] == 1) { ?>
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
                <div class="object" id="object_five"></div>
            </div>
        </div>
    </div>
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <?php } ?>
    <header>
        <div class="header__area">
            <div class="header__top-4 header__padding-4 d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-8 col-xl-9 col-lg-10">
                            <div class="header__info-4">
                                <ul>
                                    <li>
                                        <div class="header__info-item d-flex align-items-start">
                                            <div class="header__info-icon mr-10">
                                                <i class="flaticon-telephone"></i>
                                            </div>
                                            <div class="header__info-content">
                                                <h4 class="text-rubik">Telefon</h4>
                                                <a href="tel:+1-(555)-4517-0890"><?=$settingsprint['ayar_tel']?></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="header__info-item d-flex align-items-start">
                                            <div class="header__info-icon mr-10">
                                                <i class="flaticon-mail-inbox-app"></i>
                                            </div>
                                            <div class="header__info-content">
                                                <h4 class="text-rubik">Email</h4>
                                                <a href="mailto:info@exmaple.com"><?=$settingsprint['ayar_mail']?></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-3 col-lg-2">
                            <div class="header__social-4 d-none d-xl-flex justify-content-end">
                                <ul>
                                    <?php
                                        $socialfo = $db->prepare("SELECT * from sosyal");
                                        $socialfo->execute();
                                        while ($socialprint = $socialfo->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <li>
                                        <a target="_blank" href="<?php echo $socialprint['sosyal_link']; ?>">
                                            <i class="<?php echo $socialprint['sosyal_icon']; ?>"></i>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="header-sticky" class="header__bottom-4 header__sticky header__sticky-3">
                <div class="container">
                    <div class="header__bottom-wrapper-4 black-bg-2 p-relative z-index-1">
                        <div class="row align-items-center">
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6">
                                <div class="logo">
                                    <a href="<?php echo $settingsprint['ayar_siteurl']; ?>">
                                        <img style="max-width: 100%;"
                                            src="trex/<?php echo $settingsprint['ayar_logo']; ?>"
                                            alt="<?php echo $settingsprint['ayar_firmaadi']; ?>">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8 col-sm-8 col-6">
                                <div class="header__bottom-right-4 d-flex justify-content-end align-items-center">
                                    <div class="main-menu main-menu-4 mr-40">
                                        <nav id="mobile-menu">
                                            <ul>
                                                <?php
                                                $menulist = $db->prepare("SELECT * from omenu where omenu_ust=0 order by omenu_sira ASC");
                                                $menulist->execute();
                                                foreach ($menulist as $row) {
                                                    $ust       = $row['omenu_id'];
                                                    $ustdurum  = $row['omenu_durum'];
                                                    $menuliste = $db->prepare("SELECT * from omenu where omenu_ust=$ust order by omenu_sira ASC");
                                                    $menuliste->execute(); ?>
                                                <?php if ($ustdurum <= 0) { ?>
                                                <li>
                                                    <a href="<?php echo $row['omenu_link']; ?>">
                                                        <?php echo $row['omenu_ad']; ?>
                                                    </a>
                                                    <?php } else { ?>
                                                <li class="dropdown">
                                                    <a href="<?php echo $row['omenu_link']; ?>">
                                                        <?php echo $row['omenu_ad']; ?>
                                                        <i class="fal fa-plus"></i>
                                                    </a>
                                                    <?php } ?>
                                                    <?php if ($ustdurum <= 0) { } else {  ?>
                                                    <ul class="submenu">
                                                        <?php } foreach ($menuliste as $key) { ?>
                                                        <li>
                                                            <a href="<?php echo $key['omenu_link']; ?>">
                                                                <?php echo $key['omenu_ad']; ?>
                                                            </a>
                                                        </li>
                                                        <?php }
                                                    if ($ustdurum <= 0) {
                                                    } else { ?>
                                                    </ul>
                                                    <?php } ?>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="header__action header__action-4">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="offcanvas-toggle-btn">
                                                    <i class="flaticon-menu"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="header__btn-4 ml-40 d-none d-sm-block d-lg-none d-xxl-block">
                                        <a href="randevu-al">Randevu Al</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
                <button class="offcanvas__close-btn offcanvas__close-btn-3" id="offcanvas__close-btn">
                    <i class="fal fa-times"></i>
                </button>
            </div>
            <div class="offcanvas__content">
                <div class="mobile-menu mobile-menu-3 fix text-rubik-a" style="margin-top:100px;"></div>
                <a href="rendevu-al" class="d-btn-bus" style="margin-top:50px;">Randevu Al</a>
                <div class="offcanvas__map d-none d-xl-block mb-15 mt-15">
                    <?=$settingsprint['ayar_harita']?>
                </div>
                <div class="offcanvas__contact offcanvas__contact-3 mt-30 mb-20">
                    <h4 class="text-saira">İletişim Bilgilerimiz</h4>

                    <ul>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <?=$settingsprint['ayar_adres']?> -
                                <?=$settingsprint['ayar_il']?>/<?=$settingsprint['ayar_ilce']?>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="far fa-phone"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="mailto:support@gmail.com"><?=$settingsprint['ayar_tel']?></a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="tel:+012-345-6789"><?=$settingsprint['ayar_mail']?></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="offcanvas__social offcanvas__social-3">
                    <ul>
                        <?php
                        $socialfo = $db->prepare("SELECT * from sosyal");
                        $socialfo->execute();
                        while ($socialprint = $socialfo->fetch(PDO::FETCH_ASSOC)) { ?>
                        <li>
                            <a target="_blank" href="<?php echo $socialprint['sosyal_link']; ?>">
                                <i class="<?php echo $socialprint['sosyal_icon']; ?>"></i>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>