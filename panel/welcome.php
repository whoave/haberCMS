<?php
require("../deep/gir.php");
session_start();
session_regenerate_id(true);

if(isset($_SESSION['admin']) && $_SESSION['admin']==md5($_SERVER['HTTP_USER_AGENT'] . "x" . $_SERVER['REMOTE_ADDR'])){
    session_regenerate_id(true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HABER PANEL</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="panel.css">
    <link href="../css/all.css" rel="stylesheet"> <!--faicons -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/2.0.1/normalize.css">
<link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<!-- include libraries(jQuery, bootstrap) -->
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">

</head>
<body>
    <div class="small-container vertical-center">




  <div class="tabbed">
    <input type="radio" name="tabs" id="tab-nav-1" checked>
    <label for="tab-nav-1">Genel <i class="fas fa-house-damage"></i></label>
    <input type="radio" name="tabs" id="tab-nav-2">
    <label for="tab-nav-2">Kategoriler <i class="fas fa-boxes"></i></label>
    <input type="radio" name="tabs" id="tab-nav-3">
    <label for="tab-nav-3">Menüler <i class="fas fa-ellipsis-v"></i></label>
    <input type="radio" name="tabs" id="tab-nav-4">
    <label for="tab-nav-4">Haberler <i class="fas fa-newspaper"></i></label>
    <input type="radio" name="tabs" id="tab-nav-5">
    <label for="tab-nav-5">Reklamlar <i class="fas fa-ad"></i></label>
    <input type="radio" name="tabs" id="tab-nav-6">
    <label for="tab-nav-6">Diğer <i class="fas fa-user-cog"></i></label>
    <input type="radio" name="tabs" id="tab-nav-7">
    <label for="tab-nav-7">Foto Yükle <i class="fas fa-upload"></i></label>
    <div class="tabs">
        <!-- Anasayfa ayarları -->
      <div>
          <?php
          $sql="select * from site_bilgisi"; 
          $cek = $gir->query($sql); 
          while($cekilen = $cek->fetch_assoc()) {
            $site_adi = $cekilen['site_adi'];
            $site_aciklamasi = $cekilen['site_aciklamasi'];
            $site_keyword = $cekilen['site_keyword'];
            $site_logo = $cekilen['site_logo'];
            $slider_kategorisi = $cekilen['slider_kategorisi'];
            $sol_slider_kategorisi = $cekilen['sol_slider_kategorisi'];
            $ichaber_kategorisi = $cekilen['ichaber_kategorisi'];
            $slider_adet = $cekilen['slider_adet'];
            $sol_slider_adet = $cekilen['sol_slider_adet'];
            $son_slider_kategorisi=$cekilen['son_slider_kategorisi'];
            $son_slider_adet=$cekilen['son_slider_adet'];
            $yatay_haberler_kategorisi=$cekilen['yatay_haberler_kategorisi'];
            $yatay_haberler_adet = $cekilen['yatay_haberler_adet'];
                //sosyal
            $facebook = $cekilen['facebook'];
            $twitter = $cekilen['twitter'];
            $youtube = $cekilen['youtube'];
            $instagram = $cekilen['instagram'];
          }
          ?>
          <form action="islemler.php" method="post">
            Site Adı:
            <input type="text" name="site_adi" value="<?php echo $site_adi;?>">
            Site Açıklaması:
            <textarea name="site_aciklamasi" id="" rows="2"><?php echo $site_aciklamasi; ?></textarea>
            Site Keyword:
            <input type="text" name="site_keyword" value="<?php echo $site_keyword; ?>">
            Site Logosu URL (https:// yada http:// ile başlatın):
            <input type="text" name="site_logo" value="<?php echo $site_logo; ?>">
<hr>
            Giriş Sol Haber Listesi Kategorisi:
            <select name="sol_slider_kategorisi">
                <?php 
                $sql="select * from site_kategori"; 
                $cek = $gir->query($sql); 
                while($cekilen = $cek->fetch_assoc()) {
                ?>
                <option value="<?php echo $cekilen['id']; ?>" <?php if($cekilen['id']==$sol_slider_kategorisi){echo "selected";} ?> ><?php echo $cekilen['kategori_adi']; ?></option>
                 <?php } ?>
            </select>
            Kaç Slide Gösterilsin?:
            <input type="number" name="sol_slider_adet" value="<?php echo $sol_slider_adet; ?>">
<hr>
            Giriş Sağ Haber Slider Kategorisi:
            <select name="slider_kategorisi">
            <?php 
                $sql="select * from site_kategori"; 
                $cek = $gir->query($sql); 
                while($cekilen = $cek->fetch_assoc()) {
                ?>
                <option value="<?php echo $cekilen['id']; ?>" <?php if($cekilen['id']==$slider_kategorisi){echo "selected";} ?> ><?php echo $cekilen['kategori_adi']; ?></option>
                 <?php } ?>
            </select>
            Kaç Slide Gösterilsin?:
            <input type="number" name="slider_adet" value="<?php echo $slider_adet; ?>">
<hr>
            Gündem Kutucuk Haberler Kategorisi:
            <select name="ichaber_kategorisi">
            <?php 
                $sql="select * from site_kategori"; 
                $cek = $gir->query($sql); 
                while($cekilen = $cek->fetch_assoc()) {
                ?>
                <option value="<?php echo $cekilen['id']; ?>" <?php if($cekilen['id']==$ichaber_kategorisi){echo "selected";} ?> ><?php echo $cekilen['kategori_adi']; ?></option>
                 <?php } ?>
            </select>
            <b>Bu kategori sabit 15 adet göstermektedir. Kodlardan değiştirilebilir.</b>
<hr>
            Son Büyük Slider Kategorisi:
            <select name="son_slider_kategorisi">
            <?php 
                $sql="select * from site_kategori"; 
                $cek = $gir->query($sql); 
                while($cekilen = $cek->fetch_assoc()) {
                ?>
                <option value="<?php echo $cekilen['id']; ?>" <?php if($cekilen['id']==$son_slider_kategorisi){echo "selected";} ?> ><?php echo $cekilen['kategori_adi']; ?></option>
                 <?php } ?>
            </select>
            Kaç Slide Gösterilsin?:
            <input type="number" name="son_slider_adet" value="<?php echo $son_slider_adet; ?>">
<hr>
            En Alt Yatay Haber Listesi Kategorisi:
            <select name="yatay_haberler_kategorisi">
            <?php 
                $sql="select * from site_kategori"; 
                $cek = $gir->query($sql); 
                while($cekilen = $cek->fetch_assoc()) {
                ?>
                <option value="<?php echo $cekilen['id']; ?>" <?php if($cekilen['id']==$yatay_haberler_kategorisi){echo "selected";} ?> ><?php echo $cekilen['kategori_adi']; ?></option>
                 <?php } ?>
            </select>
            Kaç Slide Gösterilsin?:
            <input type="number" name="yatay_haberler_adet" value="<?php echo $yatay_haberler_adet; ?>">

            <input value="GÜNCELLE" type="submit" name="guncelleAnasayfa">
          </form>
      </div>
        <!-- Anasayfa ayarları son -->
        <!-- Kategori ayarları -->
      <div>
        <div class="flex-row">
            <div class="flex-large">
                <form action="islemler.php" method="post">
                <h2>Kategori ekle</h2>
                Kategori Adı:
                <input type="text" name="katAdi">
                <input type="submit" name="katEkle">
                <h2>Kategori Düzenle</h2>
                Kategori:
                <select name="duzenlenecek_kat">
                    <?php 
                    $sql="select * from site_kategori"; 
                    $cek = $gir->query($sql); 
                    while($cekilen = $cek->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $cekilen['id']; ?>"><?php echo $cekilen['kategori_adi']; ?></option>
                    <?php } ?>
                </select>
                Yeni Adı:
                <input type="text" name="yeniKat_adi">
                <input type="submit" name="katDuzenle">
              
            </div>
            <div class="flex-large kats">
                <h2>Kategoriler</h2>
                <table>
                <tbody>
                <?php 
                $sql="select * from site_kategori"; 
                $cek = $gir->query($sql); 
                while($cekilen = $cek->fetch_assoc()) {
                ?>
                    <tr>
                    <td><b>ID:</b> <?php echo $cekilen['id']; ?></td>
                    <td><?php echo $cekilen['kategori_adi']; ?> <input type="hidden" name="silinecekKat" value="<?php echo $cekilen['id']; ?>"></td>
                    <td><input type="submit" name="silKat" value="Sil"></td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>
                </form>
            </div>
        </div>
      </div>
      <!-- Kategori ayarları son -->
      <!-- Menü ayarları -->
      <div>
          <small>*** belli bir menü sayısını aşmanız, menü barda kaymaya yol açabilir.</small>
          <div class="flex-row">
            <div class="flex-large">
                <form action="islemler.php" method="post">
                <h2>Menü ekle</h2>
                Menü Adı:
                <input type="text" name="menuAdi">
                Bağlı Kategori:
                <select name="menuBagKat">
                <?php 
                    $sql="select * from site_kategori"; 
                    $cek = $gir->query($sql); 
                    while($cekilen = $cek->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $cekilen['id']; ?>"><?php echo $cekilen['kategori_adi']; ?></option>
                    <?php } ?>
                </select>
                Yan İkon (fa icons adı,örn: globe-europe):
                <input type="text" name="menuIcon">

                <input type="submit" name="menuEkle" value="Menü Ekle">
                <h2>Menü Yönlendir</h2>
                Menü:
                <select name="yonlendirilecekMenu">
                <?php 
                    $sql="select * from site_menu"; 
                    $cek = $gir->query($sql); 
                    while($cekilen = $cek->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $cekilen['id']; ?>"><?php echo $cekilen['menu_adi']; ?></option>
                    <?php } ?>
                </select>
                Yeni Kategorisi:
                <select name="yonlenecekKat">
                <?php 
                    $sql="select * from site_kategori"; 
                    $cek = $gir->query($sql); 
                    while($cekilen = $cek->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $cekilen['id']; ?>"><?php echo $cekilen['kategori_adi']; ?></option>
                    <?php } ?>
                </select><br>
                <input type="submit" name="menuYonlendir" value="Yönlendir">
              
            </div>
            <div class="flex-large">
                <h2>Menüler</h2>
                <table>
                <tbody>
                <?php 
                $sql="select * from site_menu"; 
                $cek = $gir->query($sql); 
                while($cekilen = $cek->fetch_assoc()) {
                    $sql = "select * from site_kategori where id=".$cekilen['bagli_kategori']." ";
                    $hizliCek = mysqli_fetch_assoc(mysqli_query($gir,$sql));
                    $bagliKatAdi = $hizliCek['kategori_adi'];
                ?>
                    <tr>
                    <td><b>ID:</b> <?php echo $cekilen['id']; ?></td>
                    <td><i class="fas fa-<?php echo $cekilen['ikon']; ?>"></i>&nbsp;<?php echo $cekilen['menu_adi']; ?> <i class="fas fa-link"></i> <?php echo $bagliKatAdi; ?>(<b><small>kat.</small></b>)<input type="hidden" name="silinecekMenu" value="<?php echo $cekilen['id']; ?>"></td>
                    <td><input type="submit" name="silMenu" value="Sil"></td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>
                </form>
            </div>
        </div>
      </div>
      <!-- Menü ayarları son -->
      <!-- Haber ayarları -->
      <div>
      <h2>Haber Ekle</h2>
      <form action="islemler.php" method="post">
          Haber Başlığı:
          <input type="text" name="haberBaslik">
          Haber Kapak Resmi URL:
          <input type="text" name="haberGorsel">
          <textarea name="haberIcerik" id="summernote"></textarea>
          Etiketler (Virgülle Ayırın)
          <input type="text" name="haberEtiket">
          Kategori:
          <select name="haberKategorisi">
                <?php 
                    $sql="select * from site_kategori"; 
                    $cek = $gir->query($sql); 
                    while($cekilen = $cek->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $cekilen['id']; ?>"><?php echo $cekilen['kategori_adi']; ?></option>
                    <?php } ?>
                </select><br>
            <input type="submit" name="haberEkle" value="Haber Ekle">
            <h2>Haber Sil</h2>
            Silinecek Haber ID:
            <input type="number" name="silinecekHaber">
            <input type="submit" name="haberSil" value="Sil">
            <h2>Haber Düzenle</h2>
            Düzenlenecek Haber ID:
            <input type="number" id="haberEditID" value="">
            <input type="button"  value="Düzenle" onclick="haberDuzenle()">
      </form>
      </div>
      <!-- Haber ayarları son -->
      <!-- Reklam Ayarları -->
      <div>
        <form action="islemler.php" method="post">
        <small>*** HTML kodları ekleyebilirsiniz.(adsense vs.) Ancak reklam alanlarının boyutlarını aşarsanız tasarımda kaymalara yol açabilirsiniz.</small>
          <?php
          //reklam
            $sqlA = "select * from site_reklam WHERE id=1";
            $hizliCekAd = mysqli_fetch_assoc(mysqli_query($gir,$sqlA));
            $reklamKod1 = $hizliCekAd['reklam_kodu'];    
            //reklam
            $sqlA = "select * from site_reklam WHERE id=2";
            $hizliCekAd = mysqli_fetch_assoc(mysqli_query($gir,$sqlA));
            $reklamKod2 = $hizliCekAd['reklam_kodu'];    
            //reklam
            $sqlA = "select * from site_reklam WHERE id=3";
            $hizliCekAd = mysqli_fetch_assoc(mysqli_query($gir,$sqlA));
            $reklamKod3 = $hizliCekAd['reklam_kodu'];    
          ?>
          <h2>Reklam Alanı #1 (Anasayfa 980x120)</h2>
          <textarea name="rek1" id="" cols="5" rows="5"><?php echo $reklamKod1; ?></textarea>
          <h2>Reklam Alanı #2 (Anasayfa 585x200)</h2>
          <textarea name="rek2" id="" cols="5" rows="5"><?php echo $reklamKod2; ?></textarea>
          <h2>Reklam Alanı #3 (Haber İçi 250x600)</h2>
          <textarea name="rek3" id="" cols="5" rows="5"><?php echo $reklamKod3; ?></textarea><br>
          <input type="submit" value="Değiştir" name="reklamDegis">
          </form>
      </div>
      <!-- Reklam Ayarları Son -->
      <!-- Diğer ayarlar -->
      <div>
          <h2>Çıkış</h2>
          <a href="cikis.php">Çıkış Yap <i class="fas fa-door-open"></i></a>
          <h2>Sosyal Medya</h2>
          <small>** https:// yada http:// ile başlayın.</small>
          <form action="islemler.php" method="post">
            Facebook
            <input type="text" name="facebook" value="<?php echo $facebook;?>">
            Instagram
            <input type="text" name="instagram" value="<?php echo $instagram;?>">
            Twitter
            <input type="text" name="twitter" value="<?php echo $twitter;?>">
            Youtube
            <input type="text" name="youtube" value="<?php echo $youtube;?>">
            <input type="submit" name="sosyalGuncelle" value="Hesapları Güncelle">
          </form>
          <h2>Belgeler</h2>
          <form action="islemler.php" method="post">
            <?php 
                $sqlR = "select * from site_resmi WHERE id=1";
                $hizliCekResmi = mysqli_fetch_assoc(mysqli_query($gir,$sqlR));
                $k_sozlesme = $hizliCekResmi['k_sozlesme'];
                $hakkimizda = $hizliCekResmi['hakkimizda'];
                $iletisim = $hizliCekResmi['iletisim'];
                $reklam = $hizliCekResmi['reklam'];
                $yasal = $hizliCekResmi['yasal'];
            ?>
            <b>Kullanım Sözleşmesi:</b>
            <textarea id="summernote2" name="k_sozlesme" ><?php echo $k_sozlesme;?></textarea>
            <b>Hakkımızda:</b>
            <textarea id="summernote3" name="hakkimizda" ><?php echo $hakkimizda;?></textarea>
            <b>İletişim:</b>
            <textarea id="summernote4" name="iletisim" ><?php echo $iletisim;?></textarea>
            <b>Reklam:</b>
            <textarea id="summernote5" name="reklam" ><?php echo $reklam;?></textarea>
            <b>Yasal:</b>
            <textarea id="summernote6" name="yasal" ><?php echo $yasal;?></textarea>
            <input type="submit" value="Resmi Sayfaları Güncelle" name="yasalGuncelle">
          </form>        
      </div>
      <!-- Diğer ayarlar son -->
      <!-- Foto yükle -->
      <div>
      <small>*** bu özellik yazılarınızda ve yazı kapak fotoğraflarınızda kullanacağınız görselleri hızlıca sunucunuza yüklemek için tasarlanmıştır. bu sayede ftp ile uğraşmak zorunda kalmazsınız.</small><br><br>
      <form class="vertical-center" action="upload.php" method="post" enctype="multipart/form-data" target="_blank">
   
    Yüklenecek Görseli Seçin: &nbsp;
     <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Görseli Yükle" name="gorselYolla">
</form>
      </div>
      <!-- Foto yükle son -->
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.6/prefixfree.min.js"></script>
<script>
        $(document).ready(function() {
        $('#summernote').summernote(
            {
                height:300,
            }
        );
        $('#summernote2').summernote(
            {
                height:300,
            }
        );
        $('#summernote3').summernote(
            {
                height:300,
            }
        );
        $('#summernote4').summernote(
            {
                height:300,
            }
        );
        $('#summernote5').summernote(
            {
                height:300,
            }
        );
        $('#summernote6').summernote(
            {
                height:300,
            }
        );
        haberDuzenle = function(){
            window.location.href = "haber_edit.php?haber="+document.getElementById("haberEditID").value;
        }
        });
    </script>
</body>
</html>





    </div>

</body>
</html>

            <?php }else{
                $_SESSION['admin']=false;
                header('location: index.php');
            } ?>