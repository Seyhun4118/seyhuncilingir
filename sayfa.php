<?php require 'include/header.php';
$sayfasor = $db->prepare("SELECT * from sayfalar where sayfa_id=:sayfa_id");
$sayfasor->execute(array(
    'sayfa_id' => $_GET['sayfa_id']
));
$sayfacek = $sayfasor->fetch(PDO::FETCH_ASSOC);
$meta = [
    'title' => $sayfacek['sayfa_title'],
    'keywords' => $sayfacek['sayfa_keyword'],
    'description' => $sayfacek['sayfa_descr']
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
                        <h3 class="page__title"><?php echo $sayfacek['sayfa_baslik']; ?></h3>
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

    <!-- blog area start -->
    <section class="blog__area pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="blog__details-wrapper">
                        <article class="postbox__item postbox__item-single format-image mb-50 transition-3">
                            <div class="postbox__content postbox__content-single">
                                <h3 class="postbox__title">
                                    <?php echo $sayfacek['sayfa_baslik']; ?>
                                </h3>
                                <div class="postbox__text postbox__text-single mb-35">
                                    <p>
                                        <?php echo $sayfacek['sayfa_icerik']; ?>
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
                                <h3 class="sidebar__widget-title">Diğer Sayfalar</h3>
                            </div>
                            <div class="sidebar__widget-content">
                                <div class="sidebar__category">
                                    <ul>
                                        <?php
                                $sayfasors = $db->prepare("SELECT * from sayfalar where sayfa_menu=1");
                                $sayfasors->execute(array(0));
                                while ($sayfaceks = $sayfasors->fetch(PDO::FETCH_ASSOC)) {    ?>
                                        <li>
                                            <a
                                                href="<?= seo('sayfa-' . $sayfaceks["sayfa_baslik"]) . '-' . $sayfaceks["sayfa_id"] ?>">
                                                <?php echo $sayfaceks['sayfa_baslik']; ?>
                                            </a>
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
    </section>
    <?php include 'include/footer.php'; ?>