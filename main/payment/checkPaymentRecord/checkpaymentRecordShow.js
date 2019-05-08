function checkPaymentRecordShow(str) {
    
    var date = new Date();
    var temp_date = date.getTime();
    
    if (str.length == 0) { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("targettbody").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "checkPaymentRecord.php?q=" + str + "&pseudoParam=" + temp_date, false);
        xmlhttp.send();
    }
    getPaymentInfo(str);
}


function getPaymentInfo(str) {
    
    var date = new Date();
    var temp_date = date.getTime();
    
    if (str.length == 0) { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("payment_info").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getPaymentInfo.php?q=" + str + "&pseudoParam=" + temp_date, false);
        xmlhttp.send();
    }
}