<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ha-Ber için Upload</title>
    <link href="../css/main.css" rel="stylesheet"> <!--faicons -->
    <style>
    a{text-decoration:none !important;}
    button{margin-top:10px;}
    </style>
</head>
<body>
    <div class="container">
<?php
session_start();
session_regenerate_id(true);

if($_SESSION['admin']==md5($_SERVER['HTTP_USER_AGENT'] . "x" . $_SERVER['REMOTE_ADDR'])){
    session_regenerate_id(true);

###########################################################
    //resim upload
$target_dir = "../gorsel/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Görsel mi değil mi kontrol et.
if(isset($_POST["gorselYolla"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}else{
    header('location: index.php');
}
// Daha önce yüklenmiş mi kontrol et.
if (file_exists($target_file)) {
    echo "Yüklenmedi, dosya zaten var.";
    ?>
        <input type="text" id="urlsi" value="<?php echo basename( $_FILES["fileToUpload"]["name"]); ?>">
         <button id="kopyButon" onclick="kopyala()" class="accent-button">Tıkla URL Kopyalansın</button>
        <img class="responsive-image" src="../gorsel/<?php echo basename( $_FILES["fileToUpload"]["name"]); ?>">
     <?php
    $uploadOk = 0;
}
// Görsel boyutunu kontrol et
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Yüklenmedi, görsel çok büyük.";
    $uploadOk = 0;
}
// Dosya uzantısı kontrol et
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Yüklenmedi, sadece JPG, JPEG, PNG & GIF tipleri desteklenir.";
    $uploadOk = 0;
}
// Herhangi bir problem olup olmadığını kontrol et, problem yoksa görseli upload et
if ($uploadOk == 0) {

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Dosya (". basename( $_FILES["fileToUpload"]["name"]). ") yüklendi.";
        ?>
         <input type="text" id="urlsi" value="<?php echo basename( $_FILES["fileToUpload"]["name"]); ?>">
         <button id="kopyButon" onclick="kopyala()" class="accent-button" >Tıkla URL Kopyalansın</button>
        <img class="responsive-image" src="../gorsel/<?php echo basename( $_FILES["fileToUpload"]["name"]); ?>">
        <?php
    } else {
        echo "Yüklenmedi, problem oluştu.";
    }
}

// resim upload son
}else{
    header('location: index.php');
}
?>
<script type="text/javascript">
function seciliMi(input){
   var startPos = input.selectionStart;
   var endPos = input.selectionEnd;
   var doc = document.selection;

   if(doc && doc.createRange().text.length != 0){
      return true;
   }else if (!doc && input.value.substring(startPos,endPos).length != 0){
      return true;
   }
   return false;
}
function kopyala() {

    var dosya = document.getElementById("urlsi").value;
    var pathArray = window.location.pathname.split('/');
    var yapi ="";
  for (let index = 0; index < pathArray.length-2; index++) {
      yapi += pathArray[index]+"/";
  }
  var copyText =  document.location.origin + yapi + "gorsel/" + dosya;
  if(!seciliMi(document.getElementById('urlsi'))){
    document.getElementById("urlsi").value = copyText;

   }
  var secBurayi = document.getElementById("urlsi");
  secBurayi.select();
  document.execCommand("copy");
  var secBurayi = document.getElementById("kopyButon").innerHTML="Kopyalandı!";

}
</script>
</body>
</html>
