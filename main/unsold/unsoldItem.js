function unsoldItem(str) {
    
    var date = new Date();
    var temp_date = date.getTime();
    
    document.getElementById("unsoldItem").value = "00";
    if (str.length == 0) { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("targettbody").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "unsold.php?q=" + str + "&pseudoParam=" + temp_date, false);
        xmlhttp.send();
    }
}