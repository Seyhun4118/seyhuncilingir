<?php require 'include/header.php';
$meta = [
    'title'       => $settingsprint['ayar_title'],
    'keywords'    => $settingsprint['ayar_keywords'],
    'description' => $settingsprint['ayar_description']
];
require 'include/menu.php'; 
require 'include/slayt.php'; 
?>
<div class="body-overlay"></div>
<main>
    <?php if ($widgetprint['widget_bilgi'] == 1) { ?>
    <section class="features__area features__mt--65 p-relative z-index-1">
        <div class="container">
            <div class="row gx-0 justify-content-center jus">
                <?php
                $bilgisol = $db->prepare("SELECT * from bilgi");
                $bilgisol->execute(array(0));
                foreach ($bilgisol as $sol) {
                ?>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features__item-6 features__border-6 grey-bg-3 d-flex align-items-start transition-3">
                        <div class="features__icon-6 mr-15">
                            <img src="trex/<?php echo $sol['resim']; ?>" alt="<?php echo $sol['bilgi_baslik']; ?>" />
                        </div>
                        <div class="features__content-6">
                            <h3 class="features__title-6">
                                <?php echo $sol['bilgi_baslik']; ?>
                            </h3>
                            <p style="min-height:100px !important;">
                                <?php echo $sol['bilgi_aciklama']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } if ($widgetprint['widget_counter'] == 1) { ?>
    <section class="about__area pt-60 pb-20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="about__wrapper-6">
                        <p><?php echo $widgetprint['widget_html']; ?></p>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 order-first order-lg-last">
                    <div class="about__thumb-6 m-img ml-30">
                        <img style="border-radius:10px;" src="trex/<?php echo $settingsprint['ayar_resimcounter']; ?>"
                            alt="<?php echo $settingsprint['ayar_firmaadi']; ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } if ($widgetprint['widget_hizmet'] == 1) { ?>
    <section class="services__area pt-20 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6">
                    <div class="section__title-wrapper-8 mb-40">
                        <h3 class="section__title-8"><?=$widgetprint['widget_bhizmet']?></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                $hizmetarticle = $db->prepare("SELECT * from hizmetler where hizmet_vitrin=1 order by hizmet_id DESC");
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
    <?php } if ($widgetprint['widget_proje'] == 1) { ?>
    <section class="category__area pt-20 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6">
                    <div class="section__title-wrapper-8 mb-40">
                        <h3 class="section__title-8"><?=$widgetprint['widget_bproje']?></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center row-cols-1 row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2">
                <?php
                $kategorisor = $db->prepare("SELECT * from kategorilerp order by kategori_sira ASC");
                $kategorisor->execute(array(0));
                foreach ($kategorisor as $kategoricek) {
                ?>
                <div class="col">
                    <div class="category__item-2 white-bg mb-30">
                        <div class="category__thumb-2 w-img fix">
                            <a
                                href="<?= seo('bolgeler-' . $kategoricek["kategori_ad"]) . '-' . $kategoricek["kategori_id"] ?>">
                                <img src="trex/<?php echo $kategoricek['resim']; ?>"
                                    alt="<?php echo $kategoricek['kategori_ad']; ?>">
                            </a>
                        </div>
                        <div class="category__content-2 d-flex justify-content-between align-items-center">
                            <h3 class="category__title category__title-2">
                                <a
                                    href="<?= seo('bolgeler-' . $kategoricek["kategori_ad"]) . '-' . $kategoricek["kategori_id"] ?>"><?php echo $kategoricek['kategori_ad']; ?></a>
                            </h3>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } if ($widgetprint['widget_galeri'] == 1 || $widgetprint['widget_yorum'] == 1) { ?>
    <section class="testimonial__area mb-100">
        <div class="testimonial__top-5 pt-100 <?php if ($widgetprint['widget_yorum'] == 1) { ?> pb-320 mb-50 <?php } else {echo"pb-80";} ?> "
            data-background="trex/<?php echo $settingsprint['ayar_title1']; ?>">
            <div class="container">
                <?php  if ($widgetprint['widget_galeri'] == 1) { ?>
                <div class="row">
                    <?php
                    $counter = $db->prepare("SELECT * from counter");
                    $counter->execute(array(0));
                    foreach ($counter as $value) {
                    ?>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="counter__item text-center mb-30">
                            <div class="counter__icon counter__icon-8">
                                <i class="<?= $value['counter_icon'] ?>"></i>
                            </div>
                            <div class="counter__content counter__content-6 counter__content-7">
                                <h5><span class="counter"><?= $value['counter_rakam'] ?></span>k+</h5>
                                <p><?= $value['counter_isim'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php  if ($widgetprint['widget_yorum'] == 1) { ?>
        <div class="testimonial__bottom-5">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="testimonial__slider-4 testimonial__slider-5 owl-carousel">
                            <?php
                            $yorum = $db->prepare("SELECT * from yorumlar order by yorum_id");
                            $yorum->execute();
                            foreach ($yorum as $valuey) {
                            ?>
                            <div class="testimonial__item-4 testimonial__item-5 p-relative white-bg">
                                <img class="testimonial-shape-5" src="assets/img/testimonial/5/testimonial-shape.png"
                                    alt="">
                                <div class="testimonial__info-4 d-flex align-items-center mb-25">
                                    <div class="testimonial__avater-4 mr-15">
                                        <img class="testimonial-img-4" src="trex/<?php echo $valuey['yorum_resim']; ?>"
                                            alt="">
                                    </div>
                                    <div class="testimonial__avater-info-4">
                                        <h4><?php echo $valuey['yorum_isim']; ?></h4>
                                        <span><?php echo $valuey['yorum_link']; ?></span>
                                    </div>
                                </div>
                                <div class="testimonial__text-4 mb-25">
                                    <p><?php echo $valuey['yorum_icerik']; ?></p>
                                </div>
                                <div class="testimonial__footer d-flex align-items-center justify-content-between">
                                    <div class="testimonial__rating testimonial__rating-3">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="testimonial__quote-icon-5">
                                        <img src="assets/img/testimonial/5/testimonial-quote.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
    <?php } if ($widgetprint['widget_blog'] == 1) { ?>
    <section class="blog__area pt-0 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6">
                    <div class="section__title-wrapper-8 mb-40">
                        <h3 class="section__title-8"><?=$widgetprint['widget_bblog']?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $blog = $db->prepare("SELECT * from blog order by blog_id DESC LIMIT 3");
                $blog->execute();
                foreach ($blog as $blogcek) {
                    $kategoriedit=$db->prepare("SELECT * from kategorilerb where kategori_id=:kategori_id");
                    $kategoriedit->execute(array(
                        'kategori_id' => $blogcek['blog_kategori']
                    ));
                    $kategoriwrite=$kategoriedit->fetch(PDO::FETCH_ASSOC);
                    $aylar = array(
                        1=>"Ocak",
                        2=>"Şubat",
                        3=>"Mart",
                        4=>"Nisan",
                        5=>"Mayıs",
                        6=>"Haziran",
                        7=>"Temmuz",
                        8=>"Ağustos",
                        9=>"Eylül",
                        10=>"Ekim",
                        11=>"Kasım",
                        12=>"Aralık"
                        );
                        $Gun= substr($blogcek['blog_tarih'],8,2);
                        $Ay= (int) substr($blogcek['blog_tarih'],5,2);
                        $Yil= substr($blogcek['blog_tarih'],0,4);  
                ?>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                    <div class="blog__item-7 blog__item-8 transition-3 fix mb-30">
                        <div class="blog__thumb-7 fix w-img">
                            <a href="<?= seo('blog-' . $blogcek["blog_baslik"]) . '-' . $blogcek["blog_id"] ?>">
                                <img src="trex/<?php echo $blogcek['blog_resim']; ?>"
                                    alt="<?php echo $blogcek['blog_baslik']; ?>">
                            </a>
                        </div>
                        <div class="blog__content-7 blog__content-8 p-relative">
                            <div class="blog-date blog-date-2">
                                <h4><?=$Gun?></h4>
                                <h5><?=$aylar[$Ay]?> <?=$Yil?></h5>
                            </div>
                            <div class="blog__meta-3 blog__meta-7 blog__meta-8 text-end mb-30">
                                <span><a
                                        href="<?= seo('blog-kategor-' . $kategoriwrite["kategori_ad"]) . '-' . $kategoriwrite["kategori_id"] ?>"><i
                                            class="fal fa-folder-open"></i>
                                        <?=$kategoriwrite['kategori_ad']?></a></span>
                            </div>
                            <h3 class="blog__title-7 blog__title-8">
                                <a href="<?= seo('blog-' . $blogcek["blog_baslik"]) . '-' . $blogcek["blog_id"] ?>">
                                    <?php
                                $karakter = strlen($blogcek['blog_baslik']);
                                if ($karakter > 20) {
                                    echo mb_substr($blogcek['blog_baslik'], 0, 20, 'UTF-8') . '...';
                                } else {
                                    echo $blogcek['blog_baslik'];
                                }
                                ?>
                                </a>
                            </h3>
                            <p><?php echo substr(strip_tags($blogcek['blog_detay']), 0, 120) . '...'; ?></p>
                            <a href="<?= seo('blog-' . $blogcek["blog_baslik"]) . '-' . $blogcek["blog_id"] ?>"
                                class="link-btn-2">
                                Devamını Oku
                                <i class="far fa-long-arrow-right"></i>
                                <i class="far fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php include 'include/footer.php'; ?>