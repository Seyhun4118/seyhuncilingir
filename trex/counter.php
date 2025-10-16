<?php 
include 'header.php';
include 'topbar.php';
include 'sidebar.php';
$counter=$db->prepare("SELECT * from counter");
$counter->execute(array(0));

?>
<!-- ============================================================== -->
<!-- 						Content Start	 						-->
<!-- ============================================================== -->
<section class="main-content container">
    <div class="page-header">
        <h2>Conter İşlemleri</h2>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-heading card-default">
                    Conter Düzenle
                </div>
                <div class="card-block">
                    <?php while ($counterprint=$counter->fetch(PDO::FETCH_ASSOC)) { ?>
                    <!-- AYAR  -->
                    <form method="POST" action="controller/function.php" class="form-horizontal">
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" name="counter_id" value="<?php echo $counterprint['counter_id']; ?>" class="form-control">
                                <div class="col-md-4">
                                    <label>Conter Adı</label>
                                    <input type="text" name="counter_isim" value="<?php echo $counterprint['counter_isim']; ?>" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>Conter Sayı</label>
                                    <input type="text" name="counter_rakam" value="<?php echo $counterprint['counter_rakam']; ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Conter icon <small>İconları <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">BURADAN</a> görebilirsiniz.</small></label>
                                    <input type="text" name="counter_icon" value="<?php echo $counterprint['counter_icon']; ?>" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>İşlemler</label><br />
                                    <button style="cursor: pointer;" type="submit" name="counterduzenle" class="btn btn-success btn-icon"><i class="fa fa-floppy-o "></i>Güncelle</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--#AYAR  -->
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
