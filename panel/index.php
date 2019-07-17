<?php
error_reporting(0);
require("../deep/gir.php");
session_start();
session_regenerate_id(true);
if($_SESSION['admin']==md5($_SERVER['HTTP_USER_AGENT'] . "x" . $_SERVER['REMOTE_ADDR'])){
    session_regenerate_id(true);
    header('location: welcome.php');
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
</head>
<body>
    <div class="small-container vertical-center">
        <form action="index.php" method="post">
            Admin ID:
            <input name="ad_id" type="text" placeholder="ID">
            Admin Şifre:
            <input name="ad_pass" type="password" placeholder="Şifre">
            <input type="submit" name="girisyap" value="Giriş Yap">
        </form>
    </div>
</body>
</html>

<?php 
    if(isset($_POST['girisyap'])){
        $user = htmlspecialchars(mysqli_real_escape_string($gir,$_POST['ad_id']), ENT_QUOTES);
        $pass = htmlspecialchars(md5(mysqli_real_escape_string($gir,$_POST['ad_pass'])), ENT_QUOTES);
        $sorgu = "SELECT * FROM site_yonetim WHERE user = '".$user."' AND pass = '".$pass."'" ;
        $cevap = mysqli_query($gir,$sorgu);
        if (mysqli_num_rows($cevap) == 1) {
            $_SESSION['admin']=md5($_SERVER['HTTP_USER_AGENT'] . "x" . $_SERVER['REMOTE_ADDR']);
            header("location: welcome.php");
        } else {
            $_SESSION['admin']=false;
            header("location: index.php");
        }
    }
?>