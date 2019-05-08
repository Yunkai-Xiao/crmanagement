function findOwning(str) {
    if (str.length == 0) { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $tempprice = this.responseText;
                
                $tempprice = parseFloat($tempprice);
                if(document.getElementById("total").value != ""){
                    if(document.getElementById("total").value <= $tempprice){
                        document.getElementById("store_credit_amount").value = document.getElementById("total").value;
                    }else{
                        document.getElementById("store_credit_amount").value = $tempprice;
                    }
                }
                
            }
        };
        xmlhttp.open("GET", "findOwning.php?q=" + str, true);
        xmlhttp.send();
    }
}