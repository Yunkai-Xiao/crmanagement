function calculateOwning(id, payment_amount, barcode){
    
     if (payment_method == "" || payment_amount == "") { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("test").value = this.responseText;
            }
        };
        xmlhttp.open("GET", "calculateOwning.php?id=" + id + "&payment_amount=" + payment_amount + "&barcode=" + barcode, false);
        xmlhttp.send();
    }
    
}