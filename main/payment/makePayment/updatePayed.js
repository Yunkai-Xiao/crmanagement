function updatePayed(){
    alert("Owning has payed");
    
    var date = new Date();
    var temp_date = date.getTime();
    
    
    var tds = document.getElementById("targettbody").getElementsByTagName("td");
	console.log(tds.length);
     
	var barcode = "";
	
	for(var i = 0; i < tds.length;i++){
		
        if (i%9 == 8){
			barcode = makeitclean(tds.item(i).innerHTML);
		}
        
		if (barcode!=""){
			console.log(i);
			var xmlhttp = new XMLHttpRequest();
			
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("memo").value = this.responseText;
//                    if(answera == 1){
//                        alert("Clear Browser History");
//                    }else{
//                         document.getElementById("test").value = answera;
//                    
//                        var answers = answera.split("|");
//
//                        var type=answers[0];
//                        var gender=answers[1];
//                        var color=answers[2];
//                        var brand = answers[3];
//                        var piece = answers[4];
//                        var status = answers[5];
//                        var size = answers[6];
//                        var price = answers[7];
//
//                        var barcode = answers[8];
//
//                        var description = brand + "  " + piece;
//
//                        sendData(type, gender, color, description, price, size, status, barcode);  
//                    }
					
                    
				}//enf if
			};//end function
			xmlhttp.open("GET", "updatePayed.php?barcode=" + barcode + "&pseudoParam=" + temp_date,true);
			xmlhttp.send();
			barcode="";
            
		}//end if
	}//end for loop
     //location.reload();
    
    $temp_owning = document.getElementById("owning").value;
    
    if($temp_owning != 0){
       makePayed();
    }
    
    
}

function makePayed() {
    
    var account_id = document.getElementById("account_id").value;
    var first_name = document.getElementById("first_name").value;
    var last_name = document.getElementById("last_name").value;
    var owning = document.getElementById("owning").value;
    var memo = document.getElementById("memo").value;
    
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("memo").value = this.responseText;
                document.getElementById("owning").value = 0;
                document.getElementById("show_name").innerHTML = first_name + "  " + last_name;
                document.getElementById("show_account_id").innerHTML = account_id;
                document.getElementById("total_amount").innerHTML = owning;
            }
        };
        xmlhttp.open("GET", "updatePayed_makePayed.php?account_id="+account_id+"&first_name="+first_name+"&last_name="+last_name+"&owning="+owning+"&memo"+memo, false);
        xmlhttp.send();
}


 function makeitclean(word) {
     var result = word;
     result.trim();
     result.replace("<br>", "");
     return result;
 }