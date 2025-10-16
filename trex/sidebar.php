<?php 
$link = $_SERVER['REQUEST_URI'];
?>
<div class="main-sidebar-nav default-navigation">
    <div class="nano">
        <div class="nano-content sidebar-nav">
            <ul class="metisMenu nav flex-column" id="menu">
                <div class="card-block border-bottom text-center nav-profile">
                    <img alt="profile" class="rounded-circle margin-b-10 circle-border " src="<?php echo $userprint['kullanici_resim']; ?>" width="80">
                    <p class="lead margin-b-0 toggle-none"><small>sayın<br> </small><?php echo $userprint['kullanici_adsoyad'] ?></p>
                    <p class="text-muted mv-0 toggle-none">Hoşgeldin</p>
                </div>
                <li class="nav-heading">
                    <b>Menü</b>
                </li>
                <li class="nav-item <?php if (strstr($link, "index.php")) { echo "active";} ?>"><a class="nav-link" href="index.php"><i class="icon-home"></i> <span class="toggle-none">Panel Anasayfa </a></li>

                <li class="nav-item"><a class="nav-link" target="_blank" href="<?php echo $settingsprint['ayar_siteurl']; ?>"><i class="icon-link"></i> <span class="toggle-none">Siteye Git </a></li>


                <li class="nav-item <?php if (strstr($link, "hesap")) { echo "active";} ?><?php if (strstr($link, "urun")) { echo "active";} ?><?php if (strstr($link, "referans")) { echo "active";} ?><?php if (strstr($link, "marka")) { echo "active";} ?><?php if (strstr($link, "yorum")) { echo "active";} ?><?php if (strstr($link, "bilgi")) { echo "active";} ?><?php if (strstr($link, "sosyal")) { echo "active";} ?><?php if (strstr($link, "proje")) { echo "active";} ?><?php if (strstr($link, "sss")) { echo "active";} ?><?php if (strstr($link, "sayfa")) { echo "active";} ?><?php if (strstr($link, "hizmet")) { echo "active";} ?><?php if (strstr($link, "html")) { echo "active";} ?><?php if (strstr($link, "bolge")) { echo "active";} ?><?php if (strstr($link, "blog")) { echo "active";} ?>">
                    <a class="nav-link" href="" aria-expanded="true"><i class="icon-list"></i>
                        <span class="toggle-none">
                            İçerik Yönetimi
                            <span style="float: right;" class="fa fa-angle-down"></span>
                        </span>
                    </a>
                    <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="true">
                        <li class="nav-item"><a class="nav-link" href="sayfalar.php">Sayfa Yönetimi</a></li>
                        <li class="nav-item"><a class="nav-link" href="hizmetler.php">Hizmet Yönetimi</a></li>
                        <li class="nav-item"><a class="nav-link" href="bolgeler.php">Bölge Yönetimi</a></li>
                        <li class="nav-item"><a class="nav-link" href="blog.php">Blog Yönetimi</a></li>
                        <li class="nav-item"><a class="nav-link" href="referanslar.php">Referans Yönetimi</a></li>
                        <li class="nav-item"><a class="nav-link" href="html-alan.php">Ana Sayfa HTML Alan</a></li>
                        <li class="nav-item"><a class="nav-link" href="sss.php">Sık Sorulan Sorular</a></li>
                        <li class="nav-item"><a class="nav-link" href="bilgiler.php">Bilgi Yönetimi</a></li>
                        <li class="nav-item"><a class="nav-link" href="hesaplarim.php">Banka Hesap Yönetimi</a></li>
                        <li class="nav-item"><a class="nav-link" href="sosyal-medya.php">Sosyal Medya Yönetimi</a></li>
                        <li class="nav-item"><a class="nav-link" href="yorumlar.php">Yorum Yönetimi</a></li>
                    </ul>
                </li>
                <li class="nav-item <?php if (strstr($link, "slayt")) { echo "active";} ?><?php if (strstr($link, "video")) { echo "active";} ?><?php if (strstr($link, "resim")) { echo "active";} ?>">
                    <a class="nav-link" href="" aria-expanded="true">
                        <i class="icon-film"></i>
                        <span class="toggle-none">Medya Yönetimi
                            <span style="float: right;" class="fa fa-angle-down"></span>
                        </span>
                    </a>
                    <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="true">
                        <li class="nav-item"><a class="nav-link" href="resim-galerisi.php">Resim Galerisi</a></li>
                        <li class="nav-item"><a class="nav-link" href="video-galerisi.php">Video Galerisi</a></li>
                        <li class="nav-item"><a class="nav-link" href="slayt.php">Slayt Yönetimi</a></li>
                    </ul>
                </li>
                <li class="nav-item <?php if (strstr($link, "menu")) { echo "active";} ?><?php if (strstr($link, "link")) { echo "active";} ?>">
                    <a class="nav-link" href="" aria-expanded="true"><i class="icon-list"></i> <span class="toggle-none">Menü Yönetimi<span style="float: right;" class="fa fa-angle-down"></span></span></a>
                    <ul class="nav-second-level nav flex-column sub-menu" aria-expanded="true">
                        <li class="nav-item"><a class="nav-link" href="menu.php">Üst Menü Yönetimi</a></li>
                        <li class="nav-item"><a class="nav-link" href="alt-menu.php">Alt Menü</a></li>
                    </ul>
                </li>
                <li class="nav-item <?php if (strstr($link, "randevu")) { echo "active";} ?>">
                    <a class="nav-link" href="randevu.php">
                        <i class="icon-paper-plane"></i>
                        <span style="color: red;" class="toggle-none">Randevu Talepleri</span>
                    </a>
                </li>
                <li class="nav-item <?php if (strstr($link, "modul")) { echo "active";} ?>">
                    <a class="nav-link" href="modul.php">
                        <i class="icon-puzzle"></i>
                        <span class="toggle-none">Modül Yönetimi</span>
                    </a>
                </li>
                <li class="nav-item <?php if (strstr($link, "kolay")) { echo "active";} ?>">
                    <a class="nav-link" href="kolay-iletisim.php">
                        <i class="fa fa-whatsapp"></i>
                        <span class="toggle-none">İletişim Butonları</span>
                    </a>
                </li>
                <li class="nav-item <?php if (strstr($link, "google")) { echo "active";} ?>">
                    <a class="nav-link" href="api-ayarlari.php">
                        <i class="fa fa-cogs"></i>
                        <span class="toggle-none">Api Yönetimi</span>
                    </a>
                </li>

                <li class="nav-item <?php if (strstr($link, "seo")) { echo "active";} ?>">
                    <a class="nav-link" href="seo.php">
                        <i class="icon-rocket"></i>
                        <span class="toggle-none">Seo Yönetimi</span>
                    </a>
                </li>
                <li class="nav-item <?php if (strstr($link, "counter")) { echo "active";} ?>">
                    <a class="nav-link" href="counter.php">
                        <i class="fa fa-sort-numeric-asc"></i>
                        <span class="toggle-none">Counter Yönetimi</span>
                    </a>
                </li>

                <li class="nav-item <?php if (strstr($link, "genel-ayar")) { echo "active";} ?>">
                    <a class="nav-link" href="genel-ayarlar.php">
                        <i class="icon-wrench"></i>
                        <span class="toggle-none">Site Ayarları</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
