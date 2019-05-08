function storeCreditUsing(id, payment_amount){
    
    
    var date = new Date();
    var temp_date = date.getTime();
    
     if (payment_method == "" || payment_amount == "") { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("test").value = this.responseText;
            }
        };
        xmlhttp.open("GET", "storeCreditUsing.php?id=" + id + "&payment_amount=" + payment_amount  + "&pseudoParam=" + temp_date, true);
        xmlhttp.send();
    }
    
}