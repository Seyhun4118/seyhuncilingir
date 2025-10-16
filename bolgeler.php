<?php require 'include/header.php';
$kategori = htmlspecialchars(trim($_GET['kategori_id']));
if (!empty($kategori)) {
    $kategoriedit = $db->prepare("SELECT * from kategorilerp where kategori_id=:kategori_id");
    $kategoriedit->execute(array(
        'kategori_id' => $kategori
    ));
    $kategoriwrite = $kategoriedit->fetch(PDO::FETCH_ASSOC);
    $meta = [
        'title' => $kategoriwrite['kategori_title'],
        'keywords' => $kategoriwrite['kategori_keyword'],
        'description' => $kategoriwrite['kategori_descr']
    ];
} else {
    $metakey = $db->prepare("SELECT * from meta where meta_id=3");
    $metakey->execute(array(0));
    $metakeyprint = $metakey->fetch(PDO::FETCH_ASSOC);
    $meta = [
        'title' => $metakeyprint['meta_title'],
        'keywords' => $metakeyprint['meta_keyword'],
        'description' => $metakeyprint['meta_descr']
    ];
}
require 'include/menu.php';
$sayfada = 6; // sayfada gösterilecek içerik miktarını belirtiyoruz.
if (!empty($kategori)) {
    $sorgu = $db->prepare("SELECT * from projeler where proje_kategori=:KatID");
    $sorgu->execute(array(
        "KatID" => $kategori
    ));
    $toplam_icerik = $sorgu->rowCount();
} else {
    $kategorisor = $db->prepare("SELECT * from kategorilerp order by kategori_sira ASC");
    $kategorisor->execute(array(0));
    $toplam_icerik = 0;
}
$toplam_sayfa = ceil($toplam_icerik / $sayfada);
$sayfa = isset($_GET['sayfa'])
    ? (int) $_GET['sayfa']
    : 1;
if ($sayfa < 1) {
    $sayfa = 1;
}
if ($sayfa > $toplam_sayfa) {
    $sayfa = $toplam_sayfa;
}
$limit = ($sayfa - 1) * $sayfada;

$projesor = $db->prepare("SELECT * from projeler where proje_kategori=:KatID Limit $limit,$sayfada");
$projesor->execute(array(
    "KatID" => $kategori
));
?>
<div class="body-overlay"></div>
<main>
    <section class="page__title-area pt-145 pb-150 p-relative page__title-overlay"
        data-background="trex/<?=$settingsprint['ayar_title2']?>" style="margin-top:-40px;">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper">
                        <?php if (!empty($kategoriwrite['kategori_ad'])) { ?>
                        <h3 class="page__title"> <?php echo $kategoriwrite['kategori_ad']; ?></h3>
                        <?php } else { ?>
                        <h3 class="page__title"><?php echo $widgetprint['widget_bproje']; ?></h3>
                        <?php }  ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?=$settingsprint['ayar_siteurl']?>">Anasayfa</a>
                                </li>
                                <?php if (!empty($kategoriwrite['kategori_ad'])) { ?>
                                <li class="breadcrumb-item">
                                    <a
                                        href="<?=$settingsprint['ayar_siteurl']?>bolgeler"><?php echo $widgetprint['widget_bproje']; ?></a>
                                </li>
                                <?php } ?>
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
            <div class="row justify-content-center row-cols-1 row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2">
                <?php
                if (!empty($kategori)) {
                    foreach ($projesor as $projearticleprint) { ?>
                <div class="col">
                    <div class="category__item-2 white-bg mb-30">
                        <div class="category__thumb-2 w-img fix">
                            <a
                                href="<?= seo('bolge-' . $projearticleprint["proje_baslik"]) . '-' . $projearticleprint["proje_id"] ?>">
                                <img src="trex/<?php echo $projearticleprint['proje_resim']; ?>"
                                    alt="<?php echo $projearticleprint['proje_baslik']; ?>">
                            </a>
                        </div>
                        <div class="category__content-2 d-flex justify-content-between align-items-center">
                            <h3 class="category__title category__title-2">
                                <a
                                    href="<?= seo('bolge-' . $projearticleprint["proje_baslik"]) . '-' . $projearticleprint["proje_id"] ?>"><?php echo $projearticleprint['proje_baslik']; ?></a>
                            </h3>
                        </div>
                    </div>
                </div>
                <?php }  } else {
                    foreach ($kategorisor as $kategoricek) {  ?>
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
                <?php }  } ?>
            </div>
        </div>
    </section>
    <?php include 'include/footer.php'; ?>