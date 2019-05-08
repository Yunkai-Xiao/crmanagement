function paymentMethod(){
    var x = document.getElementById("payment_method").value;
    if((x == 1) || (x == 2) || (x == 3) || (x == 5)){
        document.getElementById("payment_method_notice").innerHTML = "";
       document.getElementById("payment_amount").value = (document.getElementById("total").value - document.getElementById("store_credit_amount").value).toFixed(2);
       document.getElementById("change").innerHTML = "";
    }else if(x == 4){
        document.getElementById("payment_method_notice").innerHTML = "Please Enter Cash Amount:$";
    }
}

function cashMethod(){
    var x = document.getElementById("payment_method").value;
    
    if((x == 4)){
        var amount = document.getElementById("payment_amount").value;
        
        document.getElementById("change").innerHTML = "Change:" + ( amount - (document.getElementById("total").value - document.getElementById("store_credit_amount").value)).toFixed(2) + " (1.01 or 1.02 = 1.00) (1.03 or 1.04 = 1.05) (1.06 or 1.07 = 1.05) (1.08 or 1.09 = 1.10)";
    }
}
