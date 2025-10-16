<?php require 'include/header.php';
$metakey = $db->prepare("SELECT * from meta where meta_id=6");
$metakey->execute(array(0));
$metakeyprint = $metakey->fetch(PDO::FETCH_ASSOC);
$meta         = [
    'title'       => $metakeyprint['meta_title'],
    'keywords'    => $metakeyprint['meta_keyword'],
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
                        <h3 class="page__title"><?php echo htmlspecialchars($widgetprint['widget_breferans']); ?></h3>
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
            <div class="row justify-content-center">
                <div class="offcanvas__img mb-20">
                    <div class="row gx-2">
                        <?php
                        $picsor = $db->prepare("SELECT * from resimgaleri order by resim_id DESC");
                        $picsor->execute(array(0));
                        foreach ($picsor as $pic) {
                        ?>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="offcanvas__single-img w-img mb-10">
                                <a class="popup-img" href="trex/<?php echo $pic['resim_link'] ?>">
                                    <img src="trex/<?php echo $pic['resim_link'] ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'include/footer.php'; ?>