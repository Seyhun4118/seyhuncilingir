<?php 
include 'header.php';
include 'topbar.php';
include 'sidebar.php';
$inovance=$db->prepare("SELECT * from siparis where siparis_id=:siparis_id");
$inovance->execute(array(
	'siparis_id' => $_GET['siparis_id']
));
$inovanceprint=$inovance->fetch(PDO::FETCH_ASSOC);

$product=$db->prepare("SELECT * from urunler where urun_id=:urun_id");
$product->execute(array(
	'urun_id' => $inovanceprint['siparis_urun']
));
$productprint=$product->fetch(PDO::FETCH_ASSOC);
$urunicerik=mb_substr(strip_tags($productprint['urun_aciklama']), 0, 80, 'UTF-8')."...";
?>		
<!-- ============================================================== -->
<!-- 						Content Start	 						-->
<!-- ============================================================== -->
<section class="main-content container">
	<div class="page-header">
		<h2>Sipariş Detay</h2>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-block">
					<div class="row">
						<div class="col-md-6">
							<h4>Sipariş No : <small>#00<?php echo $inovanceprint['siparis_id']; ?></small></h4>
						</div>
						<div class="col-md-6">
							<div class="text-right">
								<a href="controller/function.php?siparissil=ok&siparis_id=<?php echo $inovanceprint['siparis_id']; ?>" title="Sil" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Siparişi Sil </a>
								<?php if ($inovanceprint['siparis_durum']=='1') { ?>
									<a href="controller/function.php?siparisonay=ok&siparis_id=<?php echo $inovanceprint['siparis_id']; ?>" title="Tamamla" class="btn btn-success btn-sm"><i class="fa fa-check"></i>Siparişi Tamamla</a>
								<?php } else {} ?>
							</div>

						</div>
					</div>
				</div>
				<div class="card-block">
					<div class="row margin-b-40">
						<div class="col-sm-6">
							<h6>#Sipariş Durumu : <?php if ($inovanceprint['siparis_durum']=='1') { ?>
								<b style="color: green;">Yeni Sipariş</b>
							<?php } else {?>
								<b style="color: #ffb822;">Tamamlanmış Sipariş</b>
							<?php } ?>
						</h6>

						<address>
							<strong>Müşteri Bilgileri : </strong><br>
							<?php echo "Ad soyad : ".$inovanceprint['siparis_ad']; ?><br>
							<?php echo "Tel: ".$inovanceprint['siparis_tel']; ?><br>
							<?php echo "Mail: ".$inovanceprint['siparis_mail']; ?><br>
							<?php echo "Ödeme Metodu: ".$inovanceprint['siparis_odeme']; ?><br>
							<?php echo "İl: ".$inovanceprint['siparis_il']; ?><br>
							<?php echo "İlçe: ".$inovanceprint['siparis_ilce']; ?><br>
							<?php echo "Adres: ".$inovanceprint['siparis_adres']; ?><br>
						</address>
					</div>

				</div>

				<div class="table-responsive margin-b-40">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Ürün Bilgileri</th>
								<th>Fiyat</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div><strong><?php echo $productprint['urun_baslik']; ?></strong></div>
									<small><?php echo $urunicerik; ?>
								</small>
							</td>
							<td><i class="fa fa-try"></i><?php echo $productprint['urun_fiyat']; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class='col-md-8'>
					<?php 
					$tutar=$productprint['urun_fiyat'];
					$oran='18';
					$kdv = $tutar * ($oran / 100);
					$ytutar = $tutar - $kdv;
					$fark = $productprint['urun_fiyat']-$ytutar;
					?>
				</div>
				<div class="col-md-4 col-md-offset-2">
					<table class="table table-striped text-right">
						<tbody>
							<tr>
								<td><strong>Ara Toplam :</strong></td>
								<td><i class="fa fa-try"></i><?php echo $ytutar; ?></td>
							</tr>
							<tr>
								<td><strong>KDV :</strong></td>
								<td>(%18)  <i class="fa fa-try"></i><?php echo $fark; ?></td>
							</tr>
							<tr>
								<td><strong>TOPLAM :</strong></td>
								<td><i class="fa fa-try"></i><?php echo $productprint['urun_fiyat']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 text-right">
					<div>
						<button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> Yazdır</button>  
						<?php if ($inovanceprint['siparis_durum']=='1') { ?>          
							<a href="yeni-siparisler.php" class="btn btn-warning btn-icon"><i class="fa fa-reply"></i>Geri Dön</a>   
						<?php } else { ?>
							<a href="tamamlanan-siparisler.php" class="btn btn-warning btn-icon"><i class="fa fa-reply"></i>Geri Dön</a>
						<?php } ?>       
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
</div>

<?php include 'footer.php'; ?>
