function applyCoupon(){
    
    var e = document.getElementById("coupon_method");
    var value = e.options[e.selectedIndex].value;
    var text = e.options[e.selectedIndex].text;
    var coupon_amount = document.getElementById("coupon").value;
    
    if(value == 1){ //amount coupon
        var temp = 0;
        var tempprice;
        var count = 0;
        /////////////below for loop is to find how many products////////////// limit to 50 products
        for(var i = 0; i < 100; i++){

            if(document.getElementById("target" + i) === null){
                //tempprice = 0;
            }else{
                //tempprice = document.getElementById("target" + i).value;
                count = count + 1;
            }
            //temp =  parseFloat(temp) + parseFloat(tempprice);
        }//end for loop
        
       
        coupon_amount = coupon_amount / count;
        /////////////below for loop is to equally make each price reduce same amount of money////////////// limit to 50 products
        for(var i = 0; i < 100; i++){

            if(document.getElementById("target" + i) === null){
                //tempprice = 0;
            }else{
                $temp = document.getElementById("target" + i).value - coupon_amount.toFixed(2);
                document.getElementById("target" + i).value = $temp.toFixed(2);
                
            }
        }//end for loop
        
        //temp = temp.toFixed(2);
        //document.getElementById("subtotal").value = temp;
    }else if(value == 2){ //precentage coupon
        /////////////below for loop is to make each price reduce same amount of precentage of discount////////////// limit to 100 products
        for(var i = 0; i < 100; i++){

            if(document.getElementById("target" + i) === null){
                //tempprice = 0;
            }else{
                //tempprice = document.getElementById("target" + i).value;
                $temp = document.getElementById("target" + i).value * coupon_amount;
                document.getElementById("target" + i).value = $temp.toFixed(2);
            }
            //temp =  parseFloat(temp) + parseFloat(tempprice);
        }//end for loop
    }
    
}