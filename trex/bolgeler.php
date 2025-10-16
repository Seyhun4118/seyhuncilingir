<?php 
include 'header.php';
include 'topbar.php';
include 'sidebar.php';
$projesor=$db->prepare("SELECT * from projeler order by proje_id DESC");
$projesor->execute(array(0));
?>
<!-- ============================================================== -->
<!-- 						Content Start	 						-->
<!-- ============================================================== -->
<section class="main-content container">
    <div class="page-header">
        <h2>Bölge İşlemleri</h2>
    </div>
    <div class="row">
        <!-- İLETİŞİM MESAJLARI -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading card-default">
                    <div class="pull-right mt-10">
                        <a href="bolge-ekle.php" class="btn btn-primary btn-icon"><i class="fa fa-plus"></i> Bölge Ekle</a>
                    </div>
                    <div class="pull-right mt-10" style="margin-right: 10px;">
                        <a href="bolge-kategoriler.php" class="btn btn-danger btn-icon"><i class="fa fa-list"></i>Üst Bölge Yönetimi</a>
                    </div>
                    Bölgeler
                </div>
                <div class="card-block">
                    <table id="datatable1" class="table table-striped dt-responsive nowrap table-hover">
                        <thead>
                            <tr>
                                <th class="text-left">
                                    <strong>Bölge id</strong>
                                </th>
                                <th class="text-left">
                                    <strong>Bölge Resim</strong>
                                </th>
                                <th class="text-left">
                                    <strong>Bölge Adı</strong>
                                </th>
                                <th class="text-left">
                                    <strong>Üst Bölge Adı</strong>
                                </th>
                                <th class="text-left">
                                    <strong>Bölge İçerik</strong>
                                </th>
                                <th class="text-left">
                                    <strong>Resim Ayarları</strong>
                                </th>
                                <th class="text-center">
                                    <strong>İşlemler</strong>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
							while ($projecek=$projesor->fetch(PDO::FETCH_ASSOC)) {
                                $kategoriedit=$db->prepare("SELECT * from kategorilerp where kategori_id=:kategori_id");
                                $kategoriedit->execute(array(
                                    'kategori_id' => $projecek['proje_kategori']
                                ));
                                $kategoriwrite=$kategoriedit->fetch(PDO::FETCH_ASSOC);

								$projeicerik=mb_substr(strip_tags($projecek['proje_icerik']), 0, 40, 'UTF-8')."...";
								?>
                            <tr>
                                <td>#<?php echo $projecek['proje_id']; ?></td>
                                <td><img style="max-height: 40px;max-width: 40px;" src="<?php echo $projecek['proje_resim']; ?>"></td>
                                <td><?php echo $projecek['proje_baslik']; ?></td>
                                <td><?php echo $kategoriwrite['kategori_ad']; ?></td>
                                <td><?php echo $projeicerik; ?></td>
                                <td class="text-center">
                                    <a href="bolge-resim-duzenle.php?bolge_id=<?php echo $projecek['proje_id']; ?>" class="btn btn-primary btn-icon"><i class="icon-picture"></i> Resim Ayarları</a>
                                </td>
                                <td class="text-center">
                                    <a href="bolge-duzenle.php?proje_id=<?php echo $projecek['proje_id']; ?>" title="Düzenle" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="controller/function.php?bolgesil=ok&bolge_id=<?php echo $projecek['proje_id']; ?>" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
