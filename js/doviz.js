

$(document).ready(function(){
    const dolar = document.getElementById("dolar");
    const euro = document.getElementById("euro");
    const sterlin = document.getElementById("sterlin");
    const d_k = "https://api.ratesapi.io/api/latest?base=USD";
    const eu_k = "https://api.ratesapi.io/api/latest?base=EUR";
    const gb_k = "https://api.ratesapi.io/api/latest?base=GBP";
    //A1
    $.ajax
    ({	
   url: d_k,
   success	:function(donen_veriA)
   {
    var dataA = donen_veriA;
    dolar.innerHTML=dataA.rates.TRY.toFixed(2);
 }
     });
     //A2
     $.ajax
     ({	
    url: eu_k,
    success	:function(donen_veriB)
    {
     var dataB = donen_veriB;
     euro.innerHTML=dataB.rates.TRY.toFixed(2);
   }
      });
      //A3
      $.ajax
      ({	
     url: gb_k,
     success	:function(donen_veriC)
     {
      var dataC = donen_veriC;
      sterlin.innerHTML=dataC.rates.TRY.toFixed(2);   }
       });
   });
