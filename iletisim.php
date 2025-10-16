<?php require 'include/header.php';
$metakey = $db->prepare("SELECT * from meta where meta_id=8");
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
                        <h3 class="page__title">İletişim</h3>
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
    <section class="contact__area grey-bg-13 pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="contact__form contact__form-2 white-bg">
                        <h3 class="contact-form-title">İletişim Formu</h3>
                        <form action="trex/controller/function.php" method="post">
                            <div class="row">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="contact__input contact__input-2 mb-30">
                                        <input type="text" placeholder="Adınız Soyadınız" name="mesaj_ad" required="">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="contact__input contact__input-2 mb-30">
                                        <input type="email" placeholder="E-Posta Adresiniz" name="mesaj_mail"
                                            required="">
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="contact__input contact__input-2 mb-30">
                                        <textarea name="mesaj_icerik" placeholder="Mesajınız..." required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact__form-btn-2">
                                        <button name="iletisimform" type="submit">
                                            <span class="d-flex align-items-center">Gönder <i
                                                    class="flaticon-paper-plane"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="contact__info white-bg">
                        <h3>İletişim Bilgileri</h3>
                        <ul class="mb-20">
                            <li class="d-flex">
                                <div class="contact__info-icon mr-20">
                                    <img src="assets/img/icon/email.png" alt="">
                                </div>
                                <div class="contact__info-text">
                                    <p>Email</p>
                                    <h5>
                                        <?php echo $settingsprint['ayar_mail']; ?>
                                    </h5>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="contact__info-icon mr-20">
                                    <img src="assets/img/icon/call.png" alt="">
                                </div>
                                <div class="contact__info-text">
                                    <p>Telefon</p>
                                    <h5>
                                        <?php echo $settingsprint['ayar_tel']; ?>
                                    </h5>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="contact__info-icon mr-20">
                                    <img src="assets/img/icon/location.png" alt="">
                                </div>
                                <div class="contact__info-text">
                                    <p>Adres</p>
                                    <h5>
                                        <?php echo $settingsprint['ayar_adres']; ?>
                                        <?php echo $settingsprint['ayar_ilce']; ?> /
                                        <?php echo $settingsprint['ayar_il']; ?>
                                    </h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="contact__map">
        <div class="container-fluid p-0 mb-60">
            <div class="row gx-0">
                <div class="col-xxl-12">
                    <div class="contact__map-wrapper p-relative">
                        <?php echo $settingsprint['ayar_harita']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'include/footer.php'; ?>