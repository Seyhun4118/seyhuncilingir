<?php 
include 'header.php';
include 'topbar.php';
include 'sidebar.php';
include 'controller/seo.php';
$yorumedit=$db->prepare("SELECT * from yorum where yorum_id=:yorum_id");
$yorumedit->execute(array(
	'yorum_id' => $_GET['yorum_id']
));
$yorumwrite=$yorumedit->fetch(PDO::FETCH_ASSOC);

$yorum_cins = $yorumwrite['yorum_cins'];
$yorum_konu = $yorumwrite['yorum_konu'];
if ($yorum_cins==1) {

	$sayfasor=$db->prepare("SELECT * from sayfalar where sayfa_id=:sayfa_id");
	$sayfasor->execute(array(
		'sayfa_id' => $yorum_konu
	));
	$sayfacek=$sayfasor->fetch(PDO::FETCH_ASSOC);

	$link = $settingsprint['ayar_siteurl'].seo('sayfa-'.$sayfacek["sayfa_baslik"]).'-'.$sayfacek["sayfa_id"];
	$Adi = 'Sayfa Yorumu';

} elseif ($yorum_cins==2) {

	$hizmetsor=$db->prepare("SELECT * from hizmetler where hizmet_id=:hizmet_id");
	$hizmetsor->execute(array(
		'hizmet_id' => $yorum_konu
	));
	$hizmetcek=$hizmetsor->fetch(PDO::FETCH_ASSOC);

	$link = $settingsprint['ayar_siteurl'].seo('hizmet-'.$hizmetcek["hizmet_baslik"]).'-'.$hizmetcek["hizmet_id"];
	$Adi = 'Hizmet Yorumu';

} elseif ($yorum_cins==3) {

	$projeedit=$db->prepare("SELECT * from projeler where proje_id=:proje_id");
	$projeedit->execute(array(
		'proje_id' => $yorum_konu
	));
	$projewrite=$projeedit->fetch(PDO::FETCH_ASSOC);

	$link = $settingsprint['ayar_siteurl'].seo('bolge-'.$projewrite["proje_baslik"]).'-'.$projewrite["proje_id"];
	$Adi = 'Bölge Yorumu';

} elseif ($yorum_cins==4) {

	$urunedit=$db->prepare("SELECT * from urunler where urun_id=:urun_id");
	$urunedit->execute(array(
		'urun_id' => $yorum_konu
	));
	$urunwrite=$urunedit->fetch(PDO::FETCH_ASSOC);

	$link = $settingsprint['ayar_siteurl'].seo('urunler-'.$urunwrite['urun_baslik']).'-'.$urunwrite['urun_id'];
	$Adi = 'Ürün Yorumu';

} elseif ($yorum_cins==5) {

	$blogedit=$db->prepare("SELECT * from blog where blog_id=:blog_id");
	$blogedit->execute(array(
		'blog_id' => $yorum_konu
	));
	$blogwrite=$blogedit->fetch(PDO::FETCH_ASSOC);

	$link = $settingsprint['ayar_siteurl'].seo('blog-'.$blogwrite["blog_baslik"]).'-'.$blogwrite["blog_id"];
	$Adi = 'Blog Yorumu';

}
?>
<!-- ============================================================== -->
<!-- 						Content Start	 						-->
<!-- ============================================================== -->
<section class="main-content container">
    <div class="page-header">
        <h2>Yorum İşlemleri</h2>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-heading card-default">
                    <div class="pull-right mt-10">
                        <a href="index.php" class="btn btn-warning btn-icon"><i class="fa fa-reply"></i>Geri Dön</a>
                    </div>
                    Yorum Düzenle
                </div>
                <div class="card-block">

                    <form method="POST" action="controller/function.php" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group">
                            <input type="hidden" name="yorum_id" value="<?php echo $yorumwrite['yorum_id']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Yorum İsim</label>
                            <input type="text" name="yorum_isim" value="<?php echo $yorumwrite['yorum_isim']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Yorum Tarih</label>
                            <input type="text" name="yorum_tarih" value="<?php echo $yorumwrite['yorum_tarih']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Yorum Mail</label>
                            <input type="text" name="yorum_mail" value="<?php echo $yorumwrite['yorum_mail']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Yorum İçerik</label>
                            <textarea style="height: 100px;" class="editor" name="yorum_mesaj"><?php echo $yorumwrite['yorum_mesaj']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Yorum Konu</label>
                            <input type="text" value="<?php echo $Adi; ?>" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Yorum Konu Linki</label>
                            <a style="padding-top: 10px" target="_blank" href="<?php echo $link; ?>" readonly class="form-control"><i class="fa fa-link"></i> Konuya Git</a>
                        </div>
                        <div class="form-group">
                            <label>Onay Durumu</label>
                            <select name="yorum_durum" class="form-control m-b">
                                <?php if ($yorumwrite['yorum_durum']==1) { ?>
                                <option value="1">Onaylı</option>
                                <option value="0">Onay Bekliyor</option>
                                <?php
								} else {?>
                                <option value="0">Onay Bekliyor</option>
                                <option value="1">Onayla</option>
                                <?php }?>
                            </select>
                            <small class="text-muted">Onaylanmayan yorumlar konuda görünmez.</small>
                        </div>
                        <button style="cursor: pointer;" type="submit" name="yorumicerikduzenle" class="btn btn-success btn-icon"><i class="fa fa-floppy-o "></i>Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
