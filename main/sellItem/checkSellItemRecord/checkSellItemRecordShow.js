function checkSellItemRecordShow(str) {
    
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
        xmlhttp.open("GET", "checkSellItemRecord.php?q=" + str + "&pseudoParam=" + temp_date, false);
        xmlhttp.send();
    }
    
    showTradeRecord(str);
}

function showTradeRecord(str) {
    
    var date = new Date();
    var temp_date = date.getTime();
    
    if (str.length == 0) { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("trade_record").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "showTradeRecord.php?q=" + str + "&pseudoParam=" + temp_date, false);
        xmlhttp.send();
    }
}