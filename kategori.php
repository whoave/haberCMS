<?php require 'deep/gir.php'; ?>
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
$kategori = htmlspecialchars( $_GET['kategori'], ENT_QUOTES);
if($kategori == ""){
    header('location: index.php');
  }
if (isset($_GET['s'])) {
    $sayfa = htmlspecialchars( $_GET['s'], ENT_QUOTES);
} else {
    $sayfa = 1;
}
// sayfalama
$sayfa_basina_icerik = 20;
$sayfalama = ($sayfa-1)*$sayfa_basina_icerik;
$toplamIcerik_sql = "select Count(*) FROM site_icerik WHERE icerik_kategori=".$kategori." ";
$toplamIcerik = mysqli_query($gir,$toplamIcerik_sql);
$toplamDonut = mysqli_fetch_array($toplamIcerik)[0];
$toplamSayfa = ceil($toplamDonut/$sayfa_basina_icerik); 

// kat ad
$sql = "select * from site_kategori where id=".$kategori." ";
$hizliCek = mysqli_fetch_assoc(mysqli_query($gir,$sql));
$kategori_adi = $hizliCek['kategori_adi'];
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
    <link href="css/all.css" rel="stylesheet"> <!--faicons -->
    <!-- Slider için -->
    <link rel="stylesheet" href="css/slider.css">
    <!-- Slider için son -->
    <title><?php echo  $site_adi." - ".$kategori_adi;?></title>
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
<!-- SON SLİDER -->
<div class="sliderson">
<div class="slider">
  <div class="slide_viewer">
    <div class="slide_group">
    <?php    
        $sql="select * from site_icerik WHERE icerik_kategori=".$kategori." order by id desc LIMIT 10 "; 
        $cek = $gir->query($sql); 
        while($cekilen = $cek->fetch_assoc()) {?>

      <a href="haber.php?haber=<?php echo $cekilen['id']; ?>"><div class="slide" style="background:url('<?php echo $cekilen['icerik_resim']; ?>'); background-repeat: no-repeat;background-size:100% 100%;">
          <h1><?php  
          $stringA =  strip_tags($cekilen['icerik_baslik']);
            $stringA = substr($stringA, 0, 65);
            echo $stringA; ?></h1>
          <span><?php  
          $string =  strip_tags($cekilen['icerik_icerik']);
            $string = substr($string, 0, 140);
            $string = substr($string, 0, strrpos($string, ' ')) . " ...";
            echo $string; ?></span>
      </div></a>
   
     <?php } ?>
    </div>
  </div>
</div><!-- SON // .slider -->

<div class="slide_buttons">
</div>

<div class="directional_nav">
  <div class="previous_btn" title="Önceki">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
      <g>
        <g>
          <path fill="#fff" d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
			c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z"/>
          <path fill="#fff" d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0	c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564	c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z"/>
        </g>
      </g>
    </svg>
  </div>
  <div class="next_btn" title="Sonraki">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
      <g>
        <g>
          <path fill="#fff" d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5	c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288	c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z"/>
          <path fill="#fff" d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035 L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z"/>
        </g>
      </g>
    </svg>
  </div>
</div>
        </div> 
        <!-- SONSLİDER SON -->

        <!-- CUBUK -->
<div class="katCubuk"><span></span><h4><?php echo $kategori_adi; ?></h4></div>
        <!-- CUBUK SON -->

<!-- ANA İÇ HABERLER -->
<div class="flex-row">
	<div class="flex-large ichaberler" style="margin-bottom:15px;">
        <?php    
        $sql="select * from site_icerik WHERE icerik_kategori=".$kategori." order by id desc LIMIT $sayfalama, $sayfa_basina_icerik "; 
        $cek = $gir->query($sql); 
        while($cekilen = $cek->fetch_assoc()) {?>
        <a href="haber.php?haber=<?php echo $cekilen['id'];?>"><div class='ichaber vertical-center'>
            <img height="150" src="<?php echo $cekilen['icerik_resim']; ?>" alt="<?php echo  strip_tags($cekilen['icerik_baslik']); ?>">
            <h3 class="ichabermetin"><?php  $stringA =  strip_tags($cekilen['icerik_baslik']);
            $stringA = substr($stringA, 0, 35);
            $stringA = substr($stringA, 0, strrpos($stringA, ' ')) . " ...";
            echo $stringA; ?></h3>
        </div></a>
        <?php } ?>
    </div>
</div>
<!-- ana iç haberler son -->
<div style="margin-bottom:11px;"></div>

<!-- SAYFALAMA -->
<div class="vertical-center" style="margin-bottom:11px;">
<ul class="sayfalama">
    <li><a href="?kategori=<?php echo $kategori; ?>&s=1"><i class="fas fa-fast-backward"></i> İlk</a></li>
    <li class="<?php if($sayfa <= 1){ echo 'bitti'; } ?>">
        <a href="<?php if($sayfa <= 1){ echo '#'; } else { echo "?kategori=$kategori&s=".($sayfa - 1); } ?>"> <i class="fas fa-step-backward"></i> Önceki</a>
    </li>
    <li class="<?php if($sayfa >= $toplamSayfa){ echo 'bitti'; } ?>">
        <a href="<?php if($sayfa >= $toplamSayfa){ echo '#'; } else { echo "?kategori=$kategori&s=".($sayfa + 1); } ?>">Sonraki <i class="fas fa-step-forward"></i></a>
    </li>
    <li><a href="?kategori=<?php echo $kategori; ?>&s=<?php echo $toplamSayfa; ?>">Son <i class="fas fa-fast-forward"></i></a></li>
</ul>
</div>
<!-- SAYFALAMA SON -->


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
<script type="text/javascript" src="js/kutumanset.js"></script>

<script type="text/javascript" src="js/kategori.js"></script>

<!-- Javascriptler son -->
</body>
</html>