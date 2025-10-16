<?php 
include 'header.php';
include 'topbar.php';
include 'sidebar.php';
$urunedit=$db->prepare("SELECT * from urunler where urun_id=:urun_id");
$urunedit->execute(array(
	'urun_id' => $_GET['urun_id']
));
$urunwrite=$urunedit->fetch(PDO::FETCH_ASSOC);

?>		
<!-- ============================================================== -->
<!-- 						Content Start	 						-->
<!-- ============================================================== -->
<section class="main-content container">
	<div class="page-header">
		<h2>Ürün İşlemleri</h2>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-heading card-default">
					<div class="pull-right mt-10">
						<a href="urunler.php" class="btn btn-warning btn-icon"><i class="fa fa-reply"></i>Geri Dön</a>
					</div>
					Ürün Düzenle
				</div>
				<div class="card-block">

					<form method="POST" action="controller/function.php" class="form-horizontal">
						<div class="form-group">
							<input type="hidden" name="urun_id" value="<?php echo $urunwrite['urun_id']; ?>">
						</div>
						<div class="form-group">
							<label>Ürün Başlık</label>
							<input type="text" name="urun_baslik" value="<?php echo $urunwrite['urun_baslik']; ?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<select name="urun_kategori" class="form-control m-b">
								<?php 
								$kategoriedit=$db->prepare("SELECT * from kategoriler where kategori_id=:kategori_id");
								$kategoriedit->execute(array(
									'kategori_id' => $urunwrite['urun_kategori']
								));
								$kategoriwrite=$kategoriedit->fetch(PDO::FETCH_ASSOC);
								?>
								<option value="<?php echo $kategoriwrite['kategori_id'] ?>"><?php echo $kategoriwrite['kategori_ad'] ?></option>
								<?php 
								$kategorisor=$db->prepare("SELECT * from kategoriler");
								$kategorisor->execute(array(0));
								while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {
									?>
									<option value="<?php echo $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Ürün Fiyat</label>
							<div class="input-group col-md-4">
								<span class="input-group-addon"><i class="fa fa-try"></i></span>
								<input type="text" name="urun_fiyat" value="<?php echo $urunwrite['urun_fiyat']; ?>" class="form-control">
							</div>     	
						</div>
						<div class="form-group">
							<label>Ürün Eski Fiyat</label>
							<div class="input-group col-md-4">
								<span class="input-group-addon"><i class="fa fa-try"></i></span>
								<input type="text" name="urun_efiyat" value="<?php echo $urunwrite['urun_efiyat']; ?>" class="form-control">
							</div>     	
						</div>						
						<div class="form-group">
							<label>Kısa Açıklama</label>
							<textarea rows="5" style="height: 150px;" name="urun_kisaaciklama"><?php echo $urunwrite['urun_kisaaciklama']; ?></textarea>
						</div>					
						<div class="form-group">
							<label>Açıklama</label>
							<textarea class="summernote" name="urun_aciklama"><?php echo $urunwrite['urun_aciklama']; ?></textarea>
						</div>
						<div class="form-group">
							<label>Vitrinde Göster</label>
							<select name="urun_vitrin" class="form-control m-b">
								<?php if ($urunwrite['urun_vitrin']==1) { ?>
									<option value="1">Göster</option>
									<option value="0">Gizle</option>
									<?php
								} else {?>
									<option value="0">Gizle</option>
									<option value="1">Göster</option>
								<?php }?>
							</select>
							<small class="text-muted">Ürünler ana sayfada gösterilecektir</small>
						</div>
						<hr>
						<div class="">
							<b style="color: red;">*SEO Meta Ayarları</b>
							<p class="text-muted">Google başta olmak üzere tüm arama motorları sizi buraya girdiğiniz bilgiler doğrultusunda üst sıralara taşıyacaktır.</p>
						</div>
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="urun_title" value="<?php echo $urunwrite['urun_title']; ?>" class="form-control form-control-rounded">
						</div>

						<div class="form-group">
							<label>Description</label>
							<input name="urun_descr" type="text" value="<?php echo $urunwrite['urun_descr']; ?>" class="form-control form-control-rounded">
						</div>

						<div class="form-group">
							<label>Keywords</label>
							<input type="text" name="urun_keyword" value="<?php echo $urunwrite['urun_keyword']; ?>" class="form-control form-control-rounded">
							<small class="text-muted">Örnek : <code>elma, armut, muz, karpuz</code></small>
						</div>
						<button style="cursor: pointer;" type="submit" name="urunduzenle" class="btn btn-success btn-icon"><i class="fa fa-floppy-o "></i>Güncelle</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php include 'footer.php'; ?>
