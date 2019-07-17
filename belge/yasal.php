<?php require '../deep/gir.php'; session_start();?>
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
$sqlR = "select * from site_resmi WHERE id=1";
$hizliCekResmi = mysqli_fetch_assoc(mysqli_query($gir,$sqlR));
$yasal = $hizliCekResmi['yasal'];
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
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/kategori.css">
    <link rel="stylesheet" href="../css/haber.css">
    <link href="../css/all.css" rel="stylesheet"> <!--faicons -->

    <title><?php echo  $site_adi." - Yasal";?></title>
</head>
<body>

<!-- Başlık&Logo -->
<div class="vertical-center logobar">
    <a href="../index.php"><img id="logo" src="<?php echo $site_logo; ?>" alt="<?php echo $site_adi.' logo'; ?>"></a>
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
    <a class="vertical-center" href="../kategori.php?kategori=<?php echo $cekilen['bagli_kategori']; ?>"><i class="fas fa-<?php echo $cekilen['ikon']; ?>">&nbsp;</i> <?php echo $cekilen['menu_adi']; ?></a>
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
       <a href="../kategori.php?kategori=<?php echo $cekilen['id']; ?>"><span><?php echo $cekilen['kategori_adi']; ?></span></a>
       
    <?php } ?>
</div>
</div>
<!-- üst menü son -->
<div style="margin-bottom:11px;"></div>

        <!-- CUBUK -->
<div class="katCubuk"><span></span><h4>Yasal Notlar</h4></div>
        <!-- CUBUK SON -->

        <!-- HABER İÇERİK -->
<div class="medium-container vertical-center">
	<div class="anaIcerik">
    <!-- görsel -->
    <img id="baslikGorsel" src="../img/yasal.jpg" alt="<?php echo $site_adi.' Yasal Notlar'; ?>">
    <!-- ilk span -->
    <!-- içerik -->
    <div class="icerikAlani">
      <?php echo $yasal; ?>
    </div>
    <br>
    <!-- etiketler -->
    <span class="Bilgi" style="display:block;">&nbsp;<i class="fas fa-tag"></i>&nbsp;<?php echo $site_adi;?>, yasal, yasal notlar, bilgilendirme, resmi notlar, resmi</span>
   
   
  </div>

</div>
        <!-- HABER İÇERİK SON  -->


        <h2 class="cubukluBaslik">Bu Haberlere Bakmak İsteyebilirsin</h2>

<!-- benzer haberler -->
<div class="flex-row">
	<div class="flex-large ichaberler" style="margin-bottom:15px;">
        <?php   
        $sql="SELECT * FROM site_icerik ORDER BY rand() LIMIT 5"; 
        $cek = $gir->query($sql); 
        while($cekilen = $cek->fetch_assoc()) {?>
        <a href="../haber.php?haber=<?php echo $cekilen['id'];?>"><div class='ichaber vertical-center'>
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
        <a href="sozlesme.php"><li>Kullanım Sözleşmesi</li></a>
        <a href="hakkimizda.php"><li>Hakkımızda</li></a>
        <a href="iletisim.php"><li>İletişim</li></a>
        <a href="reklam.php"><li>Reklam</li></a>
        <a href="yasal.php"><li>Yasal</li></a>
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