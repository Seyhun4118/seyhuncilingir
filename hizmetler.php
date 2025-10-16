<?php require 'include/header.php';
$metakey = $db->prepare("SELECT * from meta where meta_id=2");
$metakey->execute(array(0));
$metakeyprint = $metakey->fetch(PDO::FETCH_ASSOC);
$meta = [
    'title' => $metakeyprint['meta_title'],
    'keywords' => $metakeyprint['meta_keyword'],
    'description' => $metakeyprint['meta_descr']
];
require 'include/menu.php'; ?>
<div class="body-overlay"></div>
<main>
    <section class="page__title-area pt-145 pb-150 p-relative page__title-overlay"
        data-background="trex/<?=$settingsprint['ayar_title2']?>" style="margin-top:-40px;">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper">
                        <h3 class="page__title"><?php echo $widgetprint['widget_bhizmet']; ?></h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?=$settingsprint['ayar_siteurl']?>">Anasayfa</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <section class="services__area pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <?php
                $hizmetarticle = $db->prepare("SELECT * from hizmetler order by hizmet_id DESC");
                $hizmetarticle->execute(array(0));
                while ($hizmetarticleprint = $hizmetarticle->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4">
                    <div class="services__item-6 transition-3 p-relative mb-30 white-bg">
                        <div class="services__thumb-6 w-img fix p-relative">
                            <a
                                href="<?= seo('hizmet-' . $hizmetarticleprint["hizmet_baslik"]) . '-' . $hizmetarticleprint["hizmet_id"] ?>">
                                <img src="trex/<?php echo $hizmetarticleprint['hizmet_resim']; ?>"
                                    alt="<?php echo $hizmetarticleprint['hizmet_baslik'] ?>">
                            </a>
                            <div class="services__icon-6">
                                <img src="trex/<?php echo $hizmetarticleprint['hizmet_icon']; ?>"
                                    alt="<?php echo $hizmetarticleprint['hizmet_baslik'] ?>">
                            </div>
                        </div>
                        <div class="services__content-6">
                            <h3 class="services__title-6">
                                <a
                                    href="<?= seo('hizmet-' . $hizmetarticleprint["hizmet_baslik"]) . '-' . $hizmetarticleprint["hizmet_id"] ?>"><?php echo $hizmetarticleprint['hizmet_baslik'] ?></a>
                            </h3>
                            <p><?php echo mb_substr(strip_tags($hizmetarticleprint['hizmet_icerik']), 0, 117, "UTF-8") ?>..
                            </p>
                            <a href="<?= seo('hizmet-' . $hizmetarticleprint["hizmet_baslik"]) . '-' . $hizmetarticleprint["hizmet_id"] ?>"
                                class="link-btn-3">
                                Devamını Oku
                                <i class="far fa-arrow-right"></i>
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php include 'include/footer.php'; ?>