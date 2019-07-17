 // ALTERNATİF
 /*
   var request = new XMLHttpRequest();
   const sabah = document.getElementById("sabah");
   const ogle = document.getElementById("ogle");
   const ikindi = document.getElementById("ikindi");
   const aksam = document.getElementById("aksam");
   const yatsi = document.getElementById("yatsi");

  const ezanVakti = "https://ezanvakti.herokuapp.com/vakitler?ilce=9206";

   request.open('GET',ezanVakti,true);
   request.onload = function () {
       var dataE = JSON.parse(this.response);
       document.getElementById("ezanResim").src=dataE[0].AyinSekliURL;
       sabah.innerHTML = dataE[0].Imsak;
       ogle.innerHTML = dataE[0].Ogle;
       ikindi.innerHTML = dataE[0].Ikindi;
       aksam.innerHTML = dataE[0].Aksam;
       yatsi.innerHTML = dataE[0].Yatsi;
   }
   request.send();
*/

   $(document).ready(function(){
    const sabah = document.getElementById("sabah");
    const ogle = document.getElementById("ogle");
    const ikindi = document.getElementById("ikindi");
    const aksam = document.getElementById("aksam");
    const yatsi = document.getElementById("yatsi");
    const ezanVakti = "https://ezanvakti.herokuapp.com/vakitler?ilce=9206";
    $.ajax
    ({	
   url:ezanVakti,
   success	:function(donen_veri3)
   {
    var dataE = donen_veri3;
       document.getElementById("ezanResim").src=dataE[0].AyinSekliURL;
       sabah.innerHTML = dataE[0].Imsak;
       ogle.innerHTML = dataE[0].Ogle;
       ikindi.innerHTML = dataE[0].Ikindi;
       aksam.innerHTML = dataE[0].Aksam;
       yatsi.innerHTML = dataE[0].Yatsi;
    }
     });
   });
