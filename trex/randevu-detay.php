<?php 
include 'header.php';
include 'topbar.php';
include 'sidebar.php';
$randevuedit=$db->prepare("SELECT * from teklif where id=:randevu_id");
$randevuedit->execute(array(
	'randevu_id' => $_GET['randevu_id']
));
$randevuwrite=$randevuedit->fetch(PDO::FETCH_ASSOC);

?>
<!-- ============================================================== -->
<!-- 						Content Start	 						-->
<!-- ============================================================== -->
<section class="main-content container">
    <div class="page-header">
        <h2>Randevu Detayları</h2>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-heading card-default">
                    <div class="pull-right mt-10">
                        <button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> Yazdır</button>
                        <a href="randevu.php" class="btn btn-warning btn-icon"><i class="fa fa-reply"></i>Geri Dön</a>
                    </div>
                    Randevu Talebi
                </div>
                <div class="card-block">

                    <form method="POST" action="controller/function.php" class="form-horizontal">
                        <div class="form-group">
                            <label>Oluşturulma Tarihi</label>
                            <input type="text" value="<?php echo $randevuwrite['tarih']; ?>" readonly="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Ad Soyad</label>
                            <input type="text" readonly="readonly" value="<?php echo $randevuwrite['teklif_adsoyad']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Telefon</label>
                            <input type="text" readonly="readonly" value="<?php echo $randevuwrite['teklif_tel']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Randevu Tarihi</label>
                            <input type="text" readonly="readonly" value="<?php echo $randevuwrite['teklif_tarih']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Adres</label>
                            <textarea style="height: 60px;" class="form-control" readonly="" rows="5"><?php echo htmlspecialchars($randevuwrite['teklif_adres']); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Not</label>
                            <textarea style="height: 60px;" class="form-control" readonly="" rows="5"><?php echo htmlspecialchars($randevuwrite['teklif_not']); ?></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
