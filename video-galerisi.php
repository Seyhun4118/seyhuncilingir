<?php require 'include/header.php';
$metakey = $db->prepare("SELECT * from meta where meta_id=7");
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
                        <h3 class="page__title"><?php echo htmlspecialchars($widgetprint['widget_usatinal']); ?></h3>
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
                <?php
                $vidsor = $db->prepare("SELECT * from videogaleri order by video_id DESC");
                $vidsor->execute(array(0));
                while ($vidprint = $vidsor->fetch(PDO::FETCH_ASSOC)) { ?>
                <!--Start single product item-->
                <div class="col-md-6 col-sm-6 col-xs-12 mb-60">
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/<?php echo $vidprint['video_link']; ?>?controls=0"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <!--End single product item-->
                <?php } ?>
            </div>
        </div>
    </section>
    <?php include 'include/footer.php'; ?>