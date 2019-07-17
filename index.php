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
    //reklamlar
    $sqlA = "select * from site_reklam WHERE id=1";
    $hizliCekAd = mysqli_fetch_assoc(mysqli_query($gir,$sqlA));
    $reklamKod1 = $hizliCekAd['reklam_kodu'];   
    $sqlA = "select * from site_reklam WHERE id=2";
    $hizliCekAd = mysqli_fetch_assoc(mysqli_query($gir,$sqlA));
    $reklamKod2 = $hizliCekAd['reklam_kodu'];
    
    //kategori headingler
    $sqlQ = "select * from site_kategori WHERE id='$sol_slider_kategorisi'";
    $hizliCekQ = mysqli_fetch_assoc(mysqli_query($gir,$sqlQ));
    $katAdQ1 = $hizliCekQ['kategori_adi'];#     
    $sqlQ = "select * from site_kategori WHERE id='$slider_kategorisi'";
    $hizliCekQ = mysqli_fetch_assoc(mysqli_query($gir,$sqlQ));
    $katAdQ2 = $hizliCekQ['kategori_adi'];#
    $sqlQ = "select * from site_kategori WHERE id='$ichaber_kategorisi'";
    $hizliCekQ = mysqli_fetch_assoc(mysqli_query($gir,$sqlQ));
    $katAdQ3 = $hizliCekQ['kategori_adi'];#      
    $sqlQ = "select * from site_kategori WHERE id='$yatay_haberler_kategorisi'";
    $hizliCekQ = mysqli_fetch_assoc(mysqli_query($gir,$sqlQ));
    $katAdQ4 = $hizliCekQ['kategori_adi'];# 
}
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
    <link href="css/all.css" rel="stylesheet"> <!--faicons -->
    <!-- Slider için -->
    <link rel="stylesheet" href="css/slider.css">
    <!-- Slider için son -->
    <title><?php echo  $site_adi; ?> - Anasayfa</title>
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
<h2 class="cubukluBaslik"><?php echo $katAdQ1." & ".$katAdQ2; ?> </h2>
<!-- Slider -->

<div class="flex-row">
    <!-- Sol slider -->
    <div class="flex-large solslider"> 
            <table>
                <?php    
                $sql="select * from site_icerik WHERE icerik_kategori=".$sol_slider_kategorisi." order by id desc LIMIT ".$sol_slider_adet." "; 
                $cek = $gir->query($sql); 
                while($cekilen = $cek->fetch_assoc()) { ?>
               
                <tr  class="no-border">
                <td> <a href="haber.php?haber=<?php echo $cekilen['id']; ?>"><img src="<?php echo $cekilen['icerik_resim']; ?>" alt="<?php echo $cekilen['icerik_baslik']; ?>"></a></td>
                    <td>
                    <a href="haber.php?haber=<?php echo $cekilen['id']; ?>"><h5>
                    <?php 
                      $stringB = strip_tags($cekilen['icerik_baslik']);
                      $stringB = substr($stringB, 0, 170);
                      $stringB = substr($stringB, 0, strrpos($stringB, ' ')) . "...";
                      print strip_tags($stringB); 
                    ?>
                    </h5>
                    <p>
                    <?php
                        $string =strip_tags($cekilen['icerik_icerik']);
                        $string = substr($string, 0, 140);
                        $string = substr($string, 0, strrpos($string, ' ')) . " ...";
                        echo $string;
                    ?>
                    </p></a>
                    </td>
                </tr>
                <?php } ?>
            </table>
    </div>
    <!-- sol slider son -->
    <!-- sağ slider -->
    <div class="flex-large">
        <section class="cd-slider">
    <ul>
    <?php
    $sql="select * from site_icerik WHERE icerik_kategori=".$slider_kategorisi." order by id desc LIMIT ".$slider_adet." "; 
    $cek = $gir->query($sql); 
    while($cekilen = $cek->fetch_assoc()) {
    ?>
        <li>
        <a href="haber.php?haber=<?php echo $cekilen['id']; ?>"><div class="content" style="background-image:url(<?php echo $cekilen['icerik_resim']; ?>)">
            <blockquote class="slidersQuote">
            <p><?php 
            $string = strip_tags($cekilen['icerik_icerik']);
            $string = substr($string, 0, 140);
            $string = substr($string, 0, strrpos($string, ' ')) . " ...";
            echo $string;
            ?></p>
            <span><h5 style='color:#FF7F11;'>
            <?php 
            echo strip_tags($cekilen['icerik_baslik']);
            ?>
            </h5></span>
            </blockquote>
        </div></a>
        </li>
    <?php } ?>
    </ul>
    <nav>
        <div><a class="prev" href="#"></a></div>
        <div><a class="next" href="#"></a></div>
    </nav>
        </section>
    </div>
    <!-- sağ slider son -->


</div>
<!-- Slider son -->
<br>
<!-- REKLAM -->
<div class="vertical-center reklamAlani">
        <?php echo $reklamKod1; ?>
</div>
<!-- REKLAM SON -->
<h2 class="cubukluBaslik"><?php echo $katAdQ3; ?></h2>
<!-- ANA İÇ HABERLER -->
<div class="flex-row">
	<div class="flex-large ichaberler">
        <?php    
        $sql="select * from site_icerik WHERE icerik_kategori=".$ichaber_kategorisi." order by id desc LIMIT 15 "; 
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
        <?php    
        $sql="select * from site_icerik WHERE icerik_kategori=".$ichaber_kategorisi." order by id desc LIMIT 15 "; 
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
        <?php    
        $sql="select * from site_icerik WHERE icerik_kategori=".$ichaber_kategorisi." order by id desc LIMIT 15 "; 
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
        <?php    
        $sql="select * from site_icerik WHERE icerik_kategori=".$ichaber_kategorisi." order by id desc LIMIT 3 "; 
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
<!-- ana iç haberler son -->
<!-- WIDGETLER -->
<div class="flex-row">
<!-- HAVADURUMU -->
<div class="flex-small havadurumu">
        <div id="cerceve">
            <img id="havaIcon" src="" alt="havaDurumuIcon">
            <h1 id="havaSehir" class="vertical-center"></h1>
        </div>
        <div class="havaBilgileri">
            <span class="vertical-center">SICAKLIK</span>
            <h1 class="vertical-center" id="sicaklik">0</h1>
        </div>
        <div class="havaBilgileri">
            <span class="vertical-center">NEM</span>
            <h3 class="vertical-center" id="nem">0</h3>
        </div>  
</div>
<!-- HAVADURUMU SON -->
<!-- DÖVİZ -->
<div class="flex-small doviz">
        <div id="cerceveDoviz">
            <i class="fa fa-money-bill-alt"></i> 
            <h1 class="vertical-center">Döviz</h1>
        </div>
        <div class="dovizBilgileri">
            <span class="vertical-center">DOLAR</span>
            <h3 class="vertical-center" id="dolar">0</h3>
        </div>  
        <div class="dovizBilgileri">
            <span class="vertical-center">EURO</span>
            <h3 class="vertical-center" id="euro">0</h3>
        </div>  
        <div class="dovizBilgileri">
            <span class="vertical-center">STERLİN</span>
            <h3 class="vertical-center" id="sterlin">0</h3>
        </div>  
</div>
<!-- DÖVİZ SON -->
</div>
<!-- widget son -->

<!-- SON SLİDER -->
<div class="sliderson">
<div class="slider">
  <div class="slide_viewer">
    <div class="slide_group">
    <?php    
        $sql="select * from site_icerik WHERE icerik_kategori=".$son_slider_kategorisi." order by id desc LIMIT ".$son_slider_adet." "; 
        $cek = $gir->query($sql); 
        while($cekilen = $cek->fetch_assoc()) {?>

      <a href="haber.php?haber=<?php echo $cekilen['id']; ?>"><div class="slide" style="background:url('<?php echo $cekilen['icerik_resim']; ?>'); background-repeat: no-repeat;background-size:100% 100%;">
          <h1><?php  
          $stringA = strip_tags($cekilen['icerik_baslik']);
            $stringA = substr($stringA, 0, 65);
            echo $stringA; ?></h1>
          <span><?php 
           $string = strip_tags($cekilen['icerik_icerik']);
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

        <!-- Sonblok Açılış -->
<div class="flex-row">
    <!-- EZAN WIDGET -->
	<div class="flex-large ezanvakti">
            <div class="ezanBaslik vertical-center">
                <div id="ezanLogo"><h5>Ezan Vakitleri</h5><br>
                <img id="ezanResim" src="img/ezan.svg" width="50"><br>
                <b class="vertical-center ilnamaz">ANKARA</b></div>
            </div>
            <div class="vakitler">
                <ul>
                    <li><i class="vertical-center cerceveli">SABAH</i><i id="sabah" class="vertical-center">0</i> </li>
                    <li><i class="vertical-center cerceveli">ÖĞLE</i><i id="ogle" class="vertical-center">0</i> </li>
                    <li><i class="vertical-center cerceveli">İKİNDİ</i><i id="ikindi" class="vertical-center">0</i> </li>
                    <li><i class="vertical-center cerceveli">AKŞAM</i><i id="aksam" class="vertical-center">0</i> </li>
                    <li><i class="vertical-center cerceveli">YATSI</i><i id="yatsi" class="vertical-center">0</i> </li>
                </ul>
            </div>
    </div>
    <!-- EZAN WIDGET -->
    <!-- REKLAM -->
	<div class="flex-large reklamAlani">
            <?php echo $reklamKod2; ?>
    </div>
    <!-- REKLAM SON -->
</div>
        <!-- Sonblok Kapanış -->
<h2 class="cubukluBaslik"><?php echo $katAdQ4; ?></h2>
            <!-- SON MANŞET -->
            <div class="kutuManset">
            <?php    
                $sql="select * from site_icerik WHERE icerik_kategori=".$yatay_haberler_kategorisi." order by id desc LIMIT ".$yatay_haberler_adet." "; 
                $cek = $gir->query($sql); 
                while($cekilen = $cek->fetch_assoc()) {?>
                <a href="haber.php?haber=<?php echo $cekilen['id']; ?>"><div class="haberKutusu">
                    <img src="<?php echo $cekilen['icerik_resim'];?>" alt="">
                    <h3><?php 
                    $string = strip_tags($cekilen['icerik_baslik']);
                    $string = substr($string, 0, 50);
                    $string = substr($string, 0, strrpos($string, ' ')) . " ...";
                    echo $string; ?></h3>
                </div></a>
            <?php } ?>
            <div style="clear:both;"></div>
            <div id="sonraki"><i class="fas fa-angle-double-right"> <b>Dahası</b></i><img width="30" id="ucgen" src="img/ucgen.png" alt=""></div>
            </div>
            <!-- SON MANŞET SON -->
</div>
<!-- Sayfa Sonu -->
<div style="clear:both;"></div>
<br>
<!-- FOOTER -->
<footer >
    <div class="vertical-center">
        <a href="index.php"><img width="300" src="<?php echo $site_logo; ?>" alt="<?php echo $site_adi.' logo'; ?>"></a>
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
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/ezan.js"></script>
<script type="text/javascript" src="js/kutumanset.js"></script>
<script type="text/javascript" src="js/havadurumu.js"></script>
<script type="text/javascript" src="js/doviz.js"></script>
<!-- Javascriptler son -->
</body>
</html>