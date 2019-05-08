function findCustomer(str) {
    
    var date = new Date();
    var temp_date = date.getTime();
    
    if (str.length == 0) { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Customer_info").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "find.php?q=" + str + "&pseudoParam=" + temp_date, true);
        xmlhttp.send();
    }
}