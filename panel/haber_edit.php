<?php
require("../deep/gir.php");
session_start();

if(isset($_SESSION['admin']) && $_SESSION['admin']==md5($_SERVER['HTTP_USER_AGENT'] . "x" . $_SERVER['REMOTE_ADDR'])){
    if(isset($_GET['haber']) && is_numeric($_GET['haber'])){
        $haber = htmlspecialchars(strip_tags($_GET['haber']));
        $sql="select * from site_icerik WHERE id='$haber'"; 
        $cek = $gir->query($sql); 
        while($cekilen = $cek->fetch_assoc()) {
          $baslik = $cekilen['icerik_baslik'];
          $icerik = $cekilen['icerik_icerik'];
          $tarih = $cekilen['icerik_tarih'];
          $etiket = $cekilen['icerik_etiket'];
          $resim = $cekilen['icerik_resim'];
          $kategori = $cekilen['icerik_kategori'];
        }
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
    <label for="tab-nav-1">Haber Düzenle <i class="fas fa-edit"></i></label>
    <input type="radio" name="tabs" id="tab-nav-2">
    <label for="tab-nav-2">Foto Yükle <i class="fas fa-upload"></i></label>
    <div class="tabs">
      <!-- Haber ayarları -->
      <div>
      <h2>Haber Düzenle</h2>
      <form action="islemler.php" method="post">
      <input type="hidden" name="haberID" value="<?php echo $haber; ?>">

          Haber Başlığı:
          <input type="text" name="haberBaslik" value="<?php echo $baslik; ?>">
          Haber Kapak Resmi URL:
          <input type="text" name="haberGorsel" value="<?php echo $resim; ?>">
          <textarea name="haberIcerik" id="summernote"><?php echo $icerik; ?></textarea>
          Etiketler (Virgülle Ayırın)
          <input type="text" name="haberEtiket" value="<?php echo $etiket; ?>">
          Kategori:
          <select name="haberKategorisi">
                <?php 
                    $sql="select * from site_kategori"; 
                    $cek = $gir->query($sql); 
                    while($cekilen = $cek->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $cekilen['id']; ?>" <?php if($cekilen['id'] == $kategori) echo 'selected';?> > <?php echo $cekilen['kategori_adi']; ?></option>
                    <?php } ?>
                </select><br>
          <input type="submit" name="haberDuzenle" value="Haberi Düzenle">
 
      </form>
      </div>
      <!-- Haber ayarları son -->
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
        });
    </script>
</body>
</html>





    </div>

</body>
</html>

            <?php 
                    
    }else{          
        header('location: index.php');   
     }
            }else{
                $_SESSION['admin']=false;
                header('location: index.php');
            } ?>