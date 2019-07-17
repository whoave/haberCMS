<?php

$gir = mysqli_connect("localhost","root","","haber");
$gir->set_charset("utf8");
// BAG TEST
if (mysqli_connect_errno())
  {
  echo "Bağlantı Hatası (1): " . mysqli_connect_error();
  }
?>