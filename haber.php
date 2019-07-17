<?php require 'deep/gir.php'; session_start();?>
<?php 

// SİTE BİLGİLERİ MYSQL
$sql="select * from site_bilgisi"; 
$cek = $gir->query($sql); 
while($cekilen = $cek->fetch_assoc()) {
    $site_adi = $cekilen['site_adi'];
    $site_aciklamasi = $cekilen['site_aciklamasi'];
    $site_keyword = $cekilen['site_keyword'];
    $site_logo = $cekilen['site_logo'];
       //sosyal
   $facebook = $cekilen['facebook'];
   $twitter = $cekilen['twitter'];
   $youtube = $cekilen['youtube'];
   $instagram = $cekilen['instagram'];
}
$haber = htmlspecialchars( $_GET['haber'], ENT_QUOTES);

//haber baslik
$sql = "select * from site_icerik where id=".$haber." ";
$hizliCek = mysqli_fetch_assoc(mysqli_query($gir,$sql));
if(!$hizliCek){
  header('location: index.php');
}
$haber_baslik = strip_tags($hizliCek['icerik_baslik']);
$haber_tarih = $hizliCek['icerik_tarih'];
$haber_okunma = $hizliCek['okunma'];
$haber_kategori = $hizliCek['icerik_kategori'];
$haber_etiket = $hizliCek['icerik_etiket'];

$sql2 = "select * from site_kategori where id=$haber_kategori ";
$hizliCekKat = mysqli_fetch_assoc(mysqli_query($gir,$sql2));
$katUzun = $hizliCekKat['kategori_adi'];
//sayaç
if(!isset($_SESSION["haber".$haber])){
  $yeniOkunma = $haber_okunma+1;
  $sql = "UPDATE site_icerik SET okunma=".$yeniOkunma." WHERE id=".$haber."";
  $gir->query($sql);
  $_SESSION["haber".$haber] = 1;
} 


//reklam
$sqlA = "select * from site_reklam WHERE id=3";
$hizliCekAd = mysqli_fetch_assoc(mysqli_query($gir,$sqlA));
$reklamKod3 = $hizliCekAd['reklam_kodu'];    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $site_aciklamasi; ?>" />
    <meta name="title" content="<?php echo  $site_adi; ?> " />
    <meta name="author" content="<?php echo  $site_adi; ?>" />
    <meta name="owner" content="<?php echo  $site_adi; ?>" />
    <meta name="keywords" content="<?php echo  $site_keyword; ?>" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/kategori.css">
    <link rel="stylesheet" href="css/haber.css">
    <link href="css/all.css" rel="stylesheet"> <!--faicons -->
    <!-- Slider için -->
    <link rel="stylesheet" href="css/slider.css">
    <!-- Slider için son -->
    <title><?php echo  $site_adi." - ".$haber_baslik;?></title>
</head>
<body>

<!-- Başlık&Logo -->
<div class="vertical-center logobar">
    <a href="index.php"><img id="logo" src="<?php echo $site_logo; ?>" alt="<?php echo $site_adi.' logo'; ?>"></a>
</div>
<!-- Başlık&Logo Son -->
<!-- Sayfa Başlangıcı -->
<div class="container">
<!-- üst Menü -->
<div class="small-container">
<div class="vertical-center ustmenu">
    <div class="vertical-center ortalar">
    <?php
    // menü başlıkları çek
    $sql="select * from site_menu"; 
    $cek = $gir->query($sql); 
    while($cekilen = $cek->fetch_assoc()) {
    ?>
    <a class="vertical-center" href="kategori.php?kategori=<?php echo $cekilen['bagli_kategori']; ?>"><i class="fas fa-<?php echo $cekilen['ikon']; ?>">&nbsp;</i> <?php echo $cekilen['menu_adi']; ?></a>
    <?php
    }
    ?>
     <a class="vertical-center" id="menuAcar" style="cursor:pointer;" onclick="normalMenu()"><i class="fas fa-ellipsis-h"></i>&nbsp;Menü </a>
     <a class="vertical-center" id="tumKat" style="cursor:pointer;" onclick="gizliMenu()"><i class="fas fa-align-justify"></i>&nbsp;Tümü </a>
     </div>
</div>

<div class="vertical-center gizliMenu" id="gizliMenu">
<?php
    // Tüm kategoriler
    $sql="select * from site_kategori"; 
    $cek = $gir->query($sql); 
    while($cekilen = $cek->fetch_assoc()) {
    ?>
       <a href="kategori.php?kategori=<?php echo $cekilen['id']; ?>"><span><?php echo $cekilen['kategori_adi']; ?></span></a>
       
    <?php } ?>
</div>
</div>
<!-- üst menü son -->
<div style="margin-bottom:11px;"></div>

        <!-- CUBUK -->
<div class="katCubuk"><span></span><h4><?php echo $haber_baslik; ?></h4></div>
        <!-- CUBUK SON -->



        <!-- HABER İÇERİK -->
<div class="flex-row">
	<div class="anaIcerik">
    <?php $sql="select * from site_icerik where id=".$haber." "; 
    $cek = $gir->query($sql); 
    while($cekilen = $cek->fetch_assoc()) { ?>
    <!-- görsel -->
    <img id="baslikGorsel" src="<?php echo $cekilen['icerik_resim'];?>" alt="<?php echo $haber_baslik;?>">
    <!-- ilk span -->
    <span class="Bilgi">&nbsp;<i class="fas fa-calendar-day"></i> <?php echo $haber_tarih; ?> <i class="fas fa-thumbtack"></i> <?php echo $katUzun; ?> <i id="goruntulenme"><?php echo $haber_okunma; ?> <i class="far fa-eye"></i>&nbsp;</i></span><br>
    <!-- içerik -->
    <div class="icerikAlani">
      <?php echo $cekilen['icerik_icerik']; ?>
    </div>
    <br>
    <!-- etiketler -->
    <span class="Bilgi" style="display:block;">&nbsp;<i class="fas fa-tag"></i>&nbsp;<?php echo $cekilen['icerik_etiket'];?></span>
   
    <div class="vertical-center emojibar">
    <!-- like,dislike,smile,angry,suprized -->
      <a title="Beğen" href="emoji.php?haber=<?php echo $haber; ?>&emoji=begen" class="emojiKutusu"><div>
        <span class="skor"><?php echo $cekilen['begen']; ?></span>
        <i class="fas fa-heart emoji"></i>
      </div></a>
      <a title="Beğenme" href="emoji.php?haber=<?php echo $haber; ?>&emoji=begenme" class="emojiKutusu"><div>
        <span class="skor"><?php echo $cekilen['begenme']; ?></span>
        <i class="fas fa-heart-broken emoji"></i>
      </div></a>
      <a title="Gül" href="emoji.php?haber=<?php echo $haber; ?>&emoji=gul" class="emojiKutusu"><div>
        <span class="skor"><?php echo $cekilen['gul']; ?></span>
        <i class="fas fa-grin-squint-tears emoji"></i>
      </div></a>
      <a title="Kız" href="emoji.php?haber=<?php echo $haber; ?>&emoji=kizgin" class="emojiKutusu"><div>
        <span class="skor"><?php echo $cekilen['kizgin']; ?></span>
        <i class="fas fa-angry emoji"></i>
      </div></a>
      <a title="Şaşır" href="emoji.php?haber=<?php echo $haber; ?>&emoji=saskin" class="emojiKutusu"><div>
        <span class="skor"><?php echo $cekilen['saskin']; ?></span>
        <i class="fas fa-flushed emoji"></i>
      </div></a>
    </div>
  </div>
  <?php } ?>


      <!-- SIDEBAR -->
	<div class="flex-small sidebar">
    <?php echo $reklamKod3; ?>
  </div>
      <!-- SIDEBAR SON -->
</div>
        <!-- HABER İÇERİK SON  -->


        <h2 class="cubukluBaslik">Benzer Haberler</h2>

<!-- benzer haberler -->
<div class="flex-row">
	<div class="flex-large ichaberler" style="margin-bottom:15px;">
        <?php   
        $ornekler[0]="";
        $ornekler[1]="";
        $ornekler[2]="";
        $ornekler = explode(",",mysqli_real_escape_string($gir,$haber_etiket));
        if(!isset($ornekler[0])){
          $ornekler[0]="";
        }
        if(!isset($ornekler[1])){
          $ornekler[1]="";
        }
        if(!isset($ornekler[2])){
          $ornekler[2]="";
        }
        $sql="select * from site_icerik WHERE icerik_etiket like '%$ornekler[0]%' or icerik_etiket like '%$ornekler[1]%' or icerik_etiket like  '%$ornekler[2]%'  order by id desc LIMIT 5"; 
        $cek = $gir->query($sql); 
        while($cekilen = $cek->fetch_assoc()) {?>
        <a href="haber.php?haber=<?php echo $cekilen['id'];?>"><div class='ichaber vertical-center'>
            <img height="150" src="<?php echo $cekilen['icerik_resim']; ?>" alt="<?php echo $cekilen['icerik_baslik']; ?>">
            <h3 class="ichabermetin"><?php  
            $stringA = strip_tags($cekilen['icerik_baslik']);
            $stringA = substr($stringA, 0, 35);
            $stringA = substr($stringA, 0, strrpos($stringA, ' ')) . " ...";
            echo $stringA; ?></h3>
        </div></a>
        <?php } ?>
    </div>
</div>
<!-- benzer haberler son -->
<div style="margin-bottom:11px;"></div>




</div>
<!-- Sayfa Sonu -->
<div style="clear:both;"></div>
<br>
<!-- FOOTER -->
<footer >
    <div class="vertical-center">
        <img width="300" src="<?php echo $site_logo; ?>" alt="<?php echo $site_adi.' logo'; ?>">
    </div>
    <h1 class="bilgiler vertical-center">
    <a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-square"></i></a>&nbsp;
    <a href="<?php echo $twitter; ?>"><i class="fab fa-twitter-square"></i></a>&nbsp;
    <a href="<?php echo $youtube; ?>"><i class="fab fa-youtube-square"></i></a>&nbsp;
    <a href="<?php echo $instagram; ?>"><i class="fab fa-instagram"></i></a>
    </h1>
    <ul class="vertical-center">
        <a href="belge/sozlesme.php"><li>Kullanım Sözleşmesi</li></a>
        <a href="belge/hakkimizda.php"><li>Hakkımızda</li></a>
        <a href="belge/iletisim.php"><li>İletişim</li></a>
        <a href="belge/reklam.php"><li>Reklam</li></a>
        <a href="belge/yasal.php"><li>Yasal</li></a>
    </ul>
    <h2 class="vertical-center"><i class="fas fa-copyright"></i>2019</h2>
</footer>
<!-- FOOTER SON -->
<!-- Javascriptler -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
     normalMenu = function(){
        $('.ustmenu a, a#tumKat ~ *').toggle("fast");
        if($('#menuAcar').is(":visible")){
            $('#menuAcar').show("fast");

        }else{
            $('#menuAcar').toggle("fast");
        }
        $('#tumKat').toggle("fast");
    }
    gizliMenu = function(){
        $('#gizliMenu').toggle("fast");
    }
</script>
<!-- Javascriptler son -->
</body>
</html>