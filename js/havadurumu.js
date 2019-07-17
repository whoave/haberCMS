// ALTERNATİF
/* var request = new XMLHttpRequest();
const havaSehir = document.getElementById("havaSehir");
const sicaklik = document.getElementById("sicaklik");
const nem = document.getElementById("nem");

// KORDİNATLAR
const enlem=39.92077;
const boylam=32.85411;
const kaynak = "https://fcc-weather-api.glitch.me/api/current?lat="+enlem+"&lon="+boylam;

request.open('GET',kaynak,true);
request.onload = function () {
    var data = JSON.parse(this.response);
    havaSehir.innerHTML=data.name;
    sicaklik.innerHTML=data.main.temp;
    nem.innerHTML="%"+data.main.humidity;
    document.getElementById("havaIcon").src=data.weather[0].icon;
}
request.send();
*/

$(document).ready(function(){
    const havaSehir = document.getElementById("havaSehir");
    const sicaklik = document.getElementById("sicaklik");
    const nem = document.getElementById("nem");
    // kordinatları ilinize göre düzenleyin.
    const enlem=39.92077;
    const boylam=32.85411;
    const kaynak = "https://fcc-weather-api.glitch.me/api/current?lat="+enlem+"&lon="+boylam;
    
    $.ajax
    ({	
   url: kaynak,
   success	:function(donen_veri2)
   {
    var data = donen_veri2;
    havaSehir.innerHTML=data.name;
    sicaklik.innerHTML=data.main.temp;
    nem.innerHTML="%"+data.main.humidity;
    document.getElementById("havaIcon").src=data.weather[0].icon;
    }
     });
   });