<?php 
include 'header.php';
include 'topbar.php';
include 'sidebar.php';
$sosyaledit=$db->prepare("SELECT * from sosyal where sosyal_id=:sosyal_id");
$sosyaledit->execute(array(
	'sosyal_id' => $_GET['sosyal_id']
));
$sosyalwrite=$sosyaledit->fetch(PDO::FETCH_ASSOC);

?>
<!-- ============================================================== -->
<!-- 						Content Start	 						-->
<!-- ============================================================== -->
<section class="main-content container">
    <div class="page-header">
        <h2>Sosyal Medya İşlemleri</h2>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-heading card-default">
                    <div class="pull-right mt-10">
                        <a href="sosyal-medya.php" class="btn btn-warning btn-icon"><i class="fa fa-reply"></i>Geri Dön</a>
                    </div>
                    Sosyal Medya Düzenle
                </div>
                <div class="card-block">

                    <form method="POST" action="controller/function.php" class="form-horizontal">
                        <div class="form-group">
                            <input type="hidden" name="sosyal_id" value="<?php echo $sosyalwrite['sosyal_id']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Sosyal Link</label>
                            <input type="text" name="sosyal_link" value="<?php echo $sosyalwrite['sosyal_link']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Sosyal İcon <small>İconları <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">BURADAN</a> görebilirsiniz.</small></label>
                            <input type="text" name="sosyal_icon" value="<?php echo $sosyalwrite['sosyal_icon']; ?>" class="form-control">
                        </div>
                        <button style="cursor: pointer;" type="submit" name="sosyalduzenle" class="btn btn-success btn-icon"><i class="fa fa-floppy-o "></i>Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
