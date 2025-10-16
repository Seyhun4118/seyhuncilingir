<?php
require 'include/header.php';
$kategori = htmlspecialchars(trim($_GET['kategori_id']));
if (!empty($kategori)) {
    $kategoriedit = $db->prepare("SELECT * from kategorilerb where kategori_id=:kategori_id");
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
    $metakey = $db->prepare("SELECT * from meta where meta_id=4");
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
    $sorgu = $db->prepare("SELECT * from blog where blog_kategori=$kategori");
} else {
    $sorgu = $db->prepare("SELECT * from blog");
}
$sorgu->execute();
$toplam_icerik = $sorgu->rowCount();

$toplam_sayfa = ceil($toplam_icerik / $sayfada);

// eğer sayfa girilmemişse 1 varsayalım.
$sayfa = isset($_GET['sayfa'])
    ? (int) $_GET['sayfa']
    : 1;

// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
if ($sayfa < 1) {
    $sayfa = 1;
}

// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
if ($sayfa > $toplam_sayfa) {
    $sayfa = $toplam_sayfa;
}

$limit = ($sayfa - 1) * $sayfada;

if (!empty($kategori)) {
    $blog = $db->prepare("SELECT * from blog where blog_kategori=$kategori order by blog_id DESC Limit $limit,$sayfada");
    $blog->execute(array(
        'bloglimit' => "$limit,$sayfada"
    ));
} else {
    $blog = $db->prepare("SELECT * from blog order by blog_id DESC Limit $limit,$sayfada");
    $blog->execute(array(
        'bloglimit' => "$limit,$sayfada"
    ));
} ?>
<div class="body-overlay"></div>
<main>
    <section class="page__title-area pt-145 pb-150 p-relative page__title-overlay"
        data-background="trex/<?=$settingsprint['ayar_title2']?>" style="margin-top:-40px;">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper">
                        <h3 class="page__title">
                            <?php if (!empty($kategori)) {
                            echo $kategoriwrite['kategori_ad'];
                        } else {
                            echo $widgetprint['widget_bblog'];
                        } ?>
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?=$settingsprint['ayar_siteurl']?>">Anasayfa</a>
                                </li>
                                <?php if (!empty($kategori)) { ?>
                                <li class="breadcrumb-item">
                                    <a
                                        href="<?=$settingsprint['ayar_siteurl']?>blog"><?php echo $widgetprint['widget_bblog']; ?></a>
                                </li>
                                <?php  }  ?>
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
                    <div class="row">
                        <?php 
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
                        <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12">
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
                                        <a
                                            href="<?= seo('blog-' . $blogcek["blog_baslik"]) . '-' . $blogcek["blog_id"] ?>">
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
                    <div class="basic-pagination">
                        <nav>
                            <ul>
                                <?php $gosterilecekbuton = 3; // gösterilecek sayfa.
                                
                                if ($toplam_sayfa > 1) {
                                if ($sayfa > 1) { ?>
                                <li>
                                    <a href="?sayfa=<?php echo $sayfa-1; ?>"><i class="far fa-angle-left"></i></a>
                                </li>
                                <?php }
                                for ($i= $sayfa - $gosterilecekbuton; $i < $sayfa + $gosterilecekbuton +1; $i++) {
                                    if ($i > 0 and $i <= $toplam_sayfa) {
                                    if ($i == $sayfa) { ?>
                                <li>
                                    <a class="active" href="?sayfa=<?php echo $i ?>"><?php echo $i ?> <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <?php } else { ?>
                                <li>
                                    <a href="?sayfa=<?php echo $i ?>"><?php echo $i ?> <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <?php }  }  } if ($sayfa != $toplam_sayfa) { ?>
                                <li>
                                    <a href="?sayfa=<?php echo $sayfa+1; ?>"><i class="far fa-angle-right"></i></a>
                                </li>
                                <?php } } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="sidebar__wrapper-2">
                        <div class="sidebar__widget mb-40">
                            <div class="sidebar__widget-top mb-30">
                                <h3 class="sidebar__widget-title">Kategoriler</h3>
                            </div>
                            <div class="sidebar__widget-content">
                                <div class="sidebar__category">
                                    <ul>
                                        <?php
                                $kategorisor = $db->prepare("SELECT * from kategorilerb order by kategori_sira ASC");
                                $kategorisor->execute(array(0));
                                while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <li><a
                                                href="<?= seo('konu-kategori-' . $kategoricek["kategori_ad"]) . '-' . $kategoricek["kategori_id"] ?>"><?php echo $kategoricek['kategori_ad']; ?></a>
                                        </li>
                                        <?php } ?>
                                        <li><a href="blog">Tüm Kategoriler</a></li>
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