<?php require 'include/header.php';
$metakey = $db->prepare("SELECT * from meta where meta_id=5");
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
                        <h3 class="page__title">Sık Sorulan Sorular</h3>
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
                <div class="col-md-8 faq__accordion faq__accordion-3 faq__accordion-border">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <?php
                            $ssssor = $db->prepare("SELECT * from sss order by sss_sira ASC");
                            $ssssor->execute();
                            $fistSS = 0;
                            foreach ($ssssor as $ssscek) {
                            ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne<?php echo $ssscek['sss_id']; ?>">
                                <button class="accordion-button <?php if ($fistSS!=0) { ?> collapsed <?php } ?>"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne<?php echo $ssscek['sss_id']; ?>"
                                    aria-expanded="false"
                                    aria-controls="flush-collapseOne<?php echo $ssscek['sss_id']; ?>">
                                    <?php echo $ssscek['sss_soru']; ?>
                                </button>
                            </h2>
                            <div id="flush-collapseOne<?php echo $ssscek['sss_id']; ?>"
                                class="accordion-collapse collapse <?php if ($fistSS==0) { ?> show <?php } ?>"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <p>
                                        <?php echo $ssscek['sss_cevap']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php $fistSS++; } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'include/footer.php'; ?>