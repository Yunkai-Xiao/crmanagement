function checkAddItemRecordShow(str) {
    
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
        xmlhttp.open("GET", "checkAddItemRecord.php?q=" + str + "&pseudoParam=" + temp_date, false);
        xmlhttp.send();
    }
    
    document.getElementById("invoice_record_number").innerHTML = str;
    showRegisterTime(str);
    showName(str);
    showAccountId(str);
}


function showRegisterTime(str){
    var date = new Date();
    var temp_date = date.getTime();
    
    if (str.length == 0) { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $register_time = this.responseText;
                document.getElementById("consign_date").innerHTML = $register_time;
                
                document.getElementById("due_date").innerHTML = "After Three Months of Consign Date";
            }
        };
        xmlhttp.open("GET", "showRegisterTime.php?q=" + str + "&pseudoParam=" + temp_date, false);
        xmlhttp.send();
    }
}

function showName(str){
    var date = new Date();
    var temp_date = date.getTime();
    
    if (str.length == 0) { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("show_name").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "showName.php?q=" + str + "&pseudoParam=" + temp_date, false);
        xmlhttp.send();
    }
}

function showAccountId(str){
    var date = new Date();
    var temp_date = date.getTime();
    
    if (str.length == 0) { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("show_account_id").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "showAccountId.php?q=" + str + "&pseudoParam=" + temp_date, false);
        xmlhttp.send();
    }
}

function makeitclean(word) {
     var result = word;
     result.trim();
     result.replace("<br>", "");
     return result;
 }

function printTag(){
     
     
	var tds = document.getElementById("targettbody").getElementsByTagName("td");
    
    console.log(tds.length);
    
    var length = tds.length / 11;
    var x = 1;
    console.log(length);
    
    if(length > 0){
        for(var i = 1; i <= length; i++){
            console.log(i);
            var y = 0;
            
                var type = document.getElementById("targetss").rows[x].cells[y].innerHTML;
                var gender = document.getElementById("targetss").rows[x].cells[y+1].innerHTML;
                var color = document.getElementById("targetss").rows[x].cells[y+2].innerHTML;
                var brand = document.getElementById("targetss").rows[x].cells[y+3].innerHTML;
                var piece = document.getElementById("targetss").rows[x].cells[y+4].innerHTML;
                var status = document.getElementById("targetss").rows[x].cells[y+5].innerHTML;
                var ratio = document.getElementById("targetss").rows[x].cells[y+6].innerHTML;
                var size = document.getElementById("targetss").rows[x].cells[y+7].innerHTML;
                var price = document.getElementById("targetss").rows[x].cells[y+8].innerHTML;
                var total_same_amount = document.getElementById("targetss").rows[x].cells[y+9].innerHTML;
                var max_item_id = document.getElementById("targetss").rows[x].cells[y+10].innerHTML;

                var description = brand + "  " + piece;
            
            x = x + 2;// x bug in table there are doubl <tr></tr> check Add Item Record Show.php
            
                sendData(type, gender, color, description, price, size, status, max_item_id);
	   }//end for loop
       
    } //end if   
    //alert(document.getElementById("targetss").rows[3].cells[1].innerHTML);
	
     //location.reload();
	
}
