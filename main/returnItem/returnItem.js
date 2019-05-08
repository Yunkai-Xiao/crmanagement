function returnItem(str) {
    
    var date = new Date();
    var temp_date = date.getTime();
    
    if (str.length == 0) { 
        document.getElementById("Customer_info").value = "00";
        return;
    } else if(str.length == 14){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $temp = this.responseText;
                if($temp == 1){
                   alert("Item has been returned");
                }else if($temp == 2){
                   alert("Item has been Donated");
                }else{
                   document.getElementById("Customer_info").innerHTML = this.responseText;
                }
                
                var input = document.getElementById("barcode");
                input.focus();
                input.select();
            }
        };
    xmlhttp.open("GET", "return.php?q=" + str + "&pseudoParam=" + temp_date, true);
    xmlhttp.send();
    }
}