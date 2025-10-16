<?php 
include 'header.php';
include 'topbar.php';
include 'sidebar.php';
$whatsapp=$db->prepare("SELECT * from whatsapp where whats_id=0");
$whatsapp->execute(array(0));
$whatsappprint=$whatsapp->fetch(PDO::FETCH_ASSOC);
?>
<!-- ============================================================== -->
<!-- 						Content Start	 						-->
<!-- ============================================================== -->
<section class="main-content container">
    <div class="page-header">
        <h2>Kolay İletişim İşlemleri</h2>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-heading card-default">
                    Kolay İletişim Düzenle
                </div>
                <div class="card-block">
                    <!-- AYAR  -->
                    <form method="POST" action="controller/function.php" class="form-horizontal">
                        <div class="form-group">
                            <div class="row">

                                <input type="hidden" name="whats_id" value="0" class="form-control">
                                <input type="hidden" name="whats_cdestekdurum" value="<?php echo $whatsappprint['whats_cdestekdurum']; ?>">
                                <input type="hidden" name="whats_maildurum" value="<?php echo $whatsappprint['whats_maildurum']; ?>">
                                <input type="hidden" name="whats_sssdurum" value="<?php echo $whatsappprint['whats_sssdurum']; ?>">
                                <input type="hidden" name="whats_iletisimdurum" value="<?php echo $whatsappprint['whats_iletisimdurum']; ?>">

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Buton Yazı:</label>
                                            <input type="text" name="whats_tel" value="<?php echo htmlspecialchars($whatsappprint['whats_tel']); ?>" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Buton Link:</label>
                                            <input type="text" name="whats_cdestek" value="<?php echo $whatsappprint['whats_cdestek']; ?>" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Buton Renk:</label>
                                            <input type="text" name="whats_skype" value="<?php echo $whatsappprint['whats_skype']; ?>" class="jscolor form-control form-control-rounded">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Buton Durum</label>
                                            <select name="whats_durum" class="form-control m-b">
                                                <?php if ($whatsappprint['whats_durum']==1) { ?>
                                                <option value="1">Aktif</option>
                                                <option value="0">Pasif</option>
                                                <?php } else { ?>
                                                <option value="0">Pasif</option>
                                                <option value="1">Aktif</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 60px;">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Buton Yazı:</label> <small>(Başında 0 'Sıfır' olmadan giriniz.)</small>
                                            <input type="text" name="whats_tiklaara" value="<?php echo htmlspecialchars($whatsappprint['whats_tiklaara']); ?>" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Buton Link:</label> <small>(Başında 0 'Sıfır' olmadan giriniz.)</small>
                                            <input type="text" name="whats_skypedurum" value="<?php echo $whatsappprint['whats_skypedurum']; ?>" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Buton Renk:</label> <small>(Başında 0 'Sıfır' olmadan giriniz.)</small>
                                            <input type="text" name="whats_mail" value="<?php echo $whatsappprint['whats_mail']; ?>" class="jscolor form-control form-control-rounded">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Modül Durum</label>
                                            <select name="whats_tiklaaradurum" class="form-control m-b">
                                                <?php if ($whatsappprint['whats_tiklaaradurum']==1) { ?>
                                                <option value="1">Aktif</option>
                                                <option value="0">Pasif</option>
                                                <?php } else {?>
                                                <option value="0">Pasif</option>
                                                <option value="1">Aktif</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button style="cursor: pointer;" type="submit" name="whatsappduzenle" class="btn btn-success btn-icon"><i class="fa fa-floppy-o "></i>Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
