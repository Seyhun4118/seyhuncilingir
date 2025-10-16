<?php require 'include/header.php';
$metakey = $db->prepare("SELECT * from meta where meta_id=9");
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
                        <h3 class="page__title">Randevu</h3>
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
    <section class="contact__area grey-bg-13 pt-120 pb-120 mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="contact__form contact__form-2 white-bg">
                        <h3 class="contact-form-title">Randevu Formu</h3>
                        <form action="trex/controller/function.php" method="post">
                            <div class="row">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="contact__input contact__input-2 mb-30">
                                        <input type="text" name="adsoyad" required placeholder="Ad Soyad">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="contact__input contact__input-2 mb-30">
                                        <input type="text" name="telefon" required placeholder="Telefon">
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                    <div class="contact__input contact__input-2 mb-30">
                                        <input type="datetime-local" required name="tarih">
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="contact__input contact__input-2 mb-30">
                                        <textarea required name="not"
                                            placeholder="Randevu alacağınız hizmet için detayları iletiniz...."></textarea>
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="contact__input contact__input-2 mb-30">
                                        <textarea name="adres" required placeholder="Açık Adresiniz."></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact__form-btn-2">
                                        <button type="submit" name="teklifver">
                                            <span class="d-flex align-items-center">Gönder <i
                                                    class="flaticon-paper-plane"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'include/footer.php'; ?>