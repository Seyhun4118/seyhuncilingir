<?php 
include 'header.php';
include 'topbar.php';
include 'sidebar.php';
$randevusor=$db->prepare("SELECT * from teklif");
$randevusor->execute(array(0));
?>
<!-- ============================================================== -->
<!-- 						Content Start	 						-->
<!-- ============================================================== -->
<section class="main-content container">
    <div class="page-header">
        <h2>Randevu İşlemleri</h2>
    </div>
    <div class="row">
        <!-- İLETİŞİM MESAJLARI -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">
                    Gelen Randevu Talepleri
                </div>
                <div class="card-block">
                    <table id="datatable1" class="table table-striped dt-responsive nowrap table-hover">
                        <thead>
                            <tr>
                                <th class="text-left">
                                    <strong>Oluşturulma Tarihi</strong>
                                </th>
                                <th class="text-left">
                                    <strong>Ad Soyad</strong>
                                </th>
                                <th class="text-left">
                                    <strong>Telefon</strong>
                                </th>
                                <th class="text-left">
                                    <strong>Randevu Tarihi</strong>
                                </th>
                                <th class="text-left">
                                    <strong>Not</strong>
                                </th>
                                <th class="text-left">
                                    <strong>Adres</strong>
                                </th>
                                <th class="text-center">
                                    <strong>İşlemler</strong>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
							while ($randevuprint=$randevusor->fetch(PDO::FETCH_ASSOC)) {
								?>
                            <tr>
                                <td><?php echo $randevuprint['tarih']; ?></td>
                                <td><?php echo $randevuprint['teklif_adsoyad']; ?></td>
                                <td><?php echo $randevuprint['teklif_tel']; ?></td>
                                <td><?php echo $randevuprint['teklif_tarih']; ?></td>
                                <td><?php echo $randevuprint['teklif_not']; ?></td>
                                <td><?php echo $randevuprint['teklif_adres']; ?></td>
                                <td class="text-center">
                                    <a href="randevu-detay.php?randevu_id=<?php echo $randevuprint['id']; ?>" title="Göster" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="controller/function.php?randevusil=ok&randevu_id=<?php echo $randevuprint['id']; ?>" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- İLETİŞİM MESAJLARI -->
    </div>
    <?php include 'footer.php'; ?>
