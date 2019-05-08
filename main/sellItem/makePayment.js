function makePayment($payment_method, $payment_amount){
    
     if ($payment_method == "" || $payment_amount == "") { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("test").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "makePayment.php?payment_method="+$payment_method+"&payment_amount="+$payment_amount, true);
        xmlhttp.send();
    }
    
}