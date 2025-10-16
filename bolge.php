<?php require 'include/header.php';
$projesor = $db->prepare("SELECT * from projeler where proje_id=:proje_id");
$projesor->execute(array(
    'proje_id' => $_GET['proje_id']
));
$projecek = $projesor->fetch(PDO::FETCH_ASSOC);

$kategoriedit = $db->prepare("SELECT * from kategorilerp where kategori_id=:kategori_id");
$kategoriedit->execute(array(
    'kategori_id' => $projecek['proje_kategori']
));
$kategoriwrite = $kategoriedit->fetch(PDO::FETCH_ASSOC);

$meta = [
    'title' => $projecek['proje_title'],
    'keywords' => $projecek['proje_keyword'],
    'description' => $projecek['proje_descr']
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
                        <h3 class="page__title"><?php echo $projecek['proje_baslik']; ?></h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?=$settingsprint['ayar_siteurl']?>">Anasayfa</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a
                                        href="<?=$settingsprint['ayar_siteurl']?>bolgeler"><?php echo $widgetprint['widget_bproje']; ?></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a
                                        href="<?=$settingsprint['ayar_siteurl']?><?=seo('bolgeler-'.$kategoriwrite['kategori_ad'].'-'.$kategoriwrite['kategori_id'])?>"><?php echo $kategoriwrite['kategori_ad']; ?></a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- blog area start -->
    <section class="blog__area pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="blog__details-wrapper">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $urunresimsor = $db->prepare("SELECT * from resimp where resim_urun=:resim_urun");
                                $urunresimsor->execute(
                                    array(
                                        'resim_urun' => $projecek['proje_id']
                                    )
                                );
                                $firstSlider = 0;
                                foreach ($urunresimsor as $urunresimcek) { ?>
                                <div class="carousel-item <?php if ($firstSlider==1) { ?> active <?php } ?>">
                                    <img src="trex/<?php echo $urunresimcek['resim_link'] ?>" class="d-block w-100"
                                        alt="<?php echo $projecek['proje_baslik']; ?> - <?php echo $urunresimcek['resim_id'] ?>">
                                </div>
                                <?php $firstSlider++; } ?>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <article class="postbox__item postbox__item-single format-image mb-50 transition-3">
                            <div class="postbox__content postbox__content-single">
                                <h3 class="postbox__title">
                                    <?php echo $projecek['proje_baslik']; ?>
                                </h3>
                                <div class="postbox__text postbox__text-single mb-35">
                                    <p>
                                        <?php echo $projecek['proje_icerik']; ?>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="sidebar__wrapper-2">
                        <div class="sidebar__widget mb-40">
                            <div class="sidebar__widget-top mb-30">
                                <h3 class="sidebar__widget-title">Ana Bölgeler</h3>
                            </div>
                            <div class="sidebar__widget-content">
                                <div class="sidebar__category">
                                    <ul>
                                        <?php
                                        $kategorisor = $db->prepare("SELECT * from kategorilerp order by kategori_sira ASC");
                                        $kategorisor->execute(array(0));
                                        while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <li><a
                                                href="<?= seo('bolgeler-' . $kategoricek["kategori_ad"]) . '-' . $kategoricek["kategori_id"] ?>"><?php echo $kategoricek['kategori_ad']; ?></a>
                                        </li>
                                        <?php } ?>
                                        <li><a href="bolgeler">Tüm Ana Bölgeler</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'include/footer.php'; ?>