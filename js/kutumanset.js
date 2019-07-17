var bilinen = 0;
var maxItem = $('.haberKutusu').length;
for (let index = 5; index < maxItem; index++) {
    $('.haberKutusu').eq(index).hide();
}


$( "#sonraki" ).click(function() {
    if($('.haberKutusu').last().is(":hidden")==true ){
        var dev = 0;
        var sira = 0;
    
        $(".haberKutusu:visible").each(
            function(index){
                if(sira == 0){
                    let kalan = index+bilinen;
                    $('.haberKutusu').eq(index+bilinen).hide();
                    sira++;
                }
                if(index > dev){
                    dev = index;
                }
            }
        );
        bilinen++;
        $('.haberKutusu').eq(dev+bilinen).show();
        
    }
  
});
