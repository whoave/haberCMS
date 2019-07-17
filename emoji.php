<?php
session_start();
require 'deep/gir.php';
if($_GET['emoji'] && $_GET['haber'] && is_numeric($_GET['haber'])){
    $gelenEmoji = htmlspecialchars( $_GET['emoji'], ENT_QUOTES);
    $gelenHaber = htmlspecialchars( $_GET['haber'], ENT_QUOTES);
    if($_SESSION["haber".$gelenHaber] != 3){
        $_SESSION['haber'.$gelenHaber] = 3;
        $sql = "select * from site_icerik where id=".$gelenHaber." ";
        $hizliCek = mysqli_fetch_assoc(mysqli_query($gir,$sql));
        $begen = $hizliCek['begen'];
        $begenme = $hizliCek['begenme'];
        $gul = $hizliCek['gul'];
        $kizgin = $hizliCek['kizgin'];
        $saskin = $hizliCek['saskin'];
           switch ($gelenEmoji) {
               case 'begen':
                $begen++;
                $sql = "UPDATE site_icerik SET begen=".$begen." WHERE id=".$gelenHaber."";
                $gir->query($sql);
                header('location: haber.php?haber='.$gelenHaber);
                   break;
               case 'begenme':
                $begenme++;
                $sql = "UPDATE site_icerik SET begenme=".$begenme." WHERE id=".$gelenHaber."";
                $gir->query($sql);
                header('location: haber.php?haber='.$gelenHaber);
                   break;
                case 'gul':
                $gul++;
                $sql = "UPDATE site_icerik SET gul=".$gul." WHERE id=".$gelenHaber."";
                $gir->query($sql);
                header('location: haber.php?haber='.$gelenHaber);
                   break;
                case 'kizgin':
                $kizgin++;
                $sql = "UPDATE site_icerik SET kizgin=".$kizgin." WHERE id=".$gelenHaber."";
                $gir->query($sql);
                header('location: haber.php?haber='.$gelenHaber);
                   break;
                case 'saskin':
                $saskin++;
                $sql = "UPDATE site_icerik SET saskin=".$saskin." WHERE id=".$gelenHaber."";
                $gir->query($sql);
                header('location: haber.php?haber='.$gelenHaber);
                   break;
               default:
                   # code...
                   break;
           } 
    }else{
        header('location: haber.php?haber='.$gelenHaber);
    }
}else{
    header('location: index.php');
}

?>