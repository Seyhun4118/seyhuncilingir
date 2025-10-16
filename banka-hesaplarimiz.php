<?php require 'include/header.php';
$metakey = $db->prepare("SELECT * from meta where meta_id=10");
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
                        <h3 class="page__title">Banka Hesaplarımız</h3>
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
                        $hesapsor = $db->prepare("SELECT * from hesap");
                        $hesapsor->execute();
                        $fistSS = 0;
                        foreach ($hesapsor as $hesapcek) {
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne<?php echo $ssscek['hesap_id']; ?>">
                                <button class="accordion-button <?php if ($fistSS!=0) { ?> collapsed <?php } ?>"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne<?php echo $ssscek['hesap_id']; ?>"
                                    aria-expanded="false"
                                    aria-controls="flush-collapseOne<?php echo $ssscek['hesap_id']; ?>">
                                    <?php echo $hesapcek['hesap_banka']; ?>
                                </button>
                            </h2>
                            <div id="flush-collapseOne<?php echo $ssscek['hesap_id']; ?>"
                                class="accordion-collapse collapse <?php if ($fistSS==0) { ?> show <?php } ?>"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <ul class="contact-info-list">
                                        <li>
                                            <div class="text-holder">
                                                <h5><strong><?php echo $hesapcek['hesap_banka']; ?></strong></h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="text-holder">
                                                <h5><strong>Ünvan:</strong> <?php echo $hesapcek['hesap_isim']; ?></h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="text-holder">
                                                <h5><strong>Şube/Şube No:</strong>
                                                    <?php echo $hesapcek['hesap_sube']; ?></h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="text-holder">
                                                <h5><strong>Hesap No:</strong> <?php echo $hesapcek['hesap_no']; ?></h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="text-holder">
                                                <h5><strong>İban:</strong> <?php echo $hesapcek['hesap_iban']; ?></h5>
                                            </div>
                                        </li>
                                    </ul>
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