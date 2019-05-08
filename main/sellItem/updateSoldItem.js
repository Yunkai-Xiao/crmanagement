function updateSoldItem(){
    
    var date = new Date();
    var temp_date = date.getTime();
    
    //verify payment is empty
    if(document.getElementById("payment_amount").value != "" && document.getElementById("total").value != ""){
    
        var tds = document.getElementById("targettbody").getElementsByTagName("td");
        console.log(tds.length);
        var type = "";
        var gender = "";
        var color = "";
        var brand = "";
        var piece = "";
        var status_d_r = "";
        var size = "";
        var price = "";
        var gst = "";
        var pst = "";
        var barcode = "";
        var discount = "";
        var sale_price = "";
        var temp_count = 0;
		var count = 0;
        var count0 = 0;
        var count1 = 0;
        var count2 = 0;
		
        for(var i = 0; i < tds.length;i++){

            //document.getElementById("test").innerHTML = trs.length;
            if (i%14 == 0){
                type = makeitclean(tds.item(i).innerHTML);
            }
            if (i%14 == 1){
                gender = makeitclean(tds.item(i).innerHTML);
            }
            if (i%14 == 2){
                color = makeitclean(tds.item(i).innerHTML);
            }
            if (i%14 == 3){
                brand = makeitclean(tds.item(i).innerHTML);
            }
            if (i%14 == 4){
                piece = makeitclean(tds.item(i).innerHTML);
            }
            if (i%14 == 5){
                status_d_r = makeitclean(tds.item(i).innerHTML);
            }
            if (i%14 == 6){
                size = makeitclean(tds.item(i).innerHTML);
            }
            if (i%14 == 7){
                price = makeitclean(tds.item(i).innerHTML);
            }
            if (i%14 == 8){
//                var temp = "gst" + count;
//                if(document.getElementById(temp) !== null){
//                    gst = document.getElementById(temp).value;
                    count = count + 1;
//                }
                //gst = tds.item(i).children.value;
                gst = document.getElementById("targetss").rows[count].cells[8].childNodes[0].value;
                //document.getElementById("test").value = gst;
                
            }
            if (i%14 == 9){
//                var temp0 = "pst" + count0;
//                if(document.getElementById(temp0) !== null){
//                    pst = document.getElementById(temp0).value;
                    count0 = count0 + 1;
//                }
                //pst = tds.item(i).children.value;
                pst = document.getElementById("targetss").rows[count0].cells[9].childNodes[0].value;
                
            }
            if (i%14 == 10){
//                var temp1 = "barcodeInput" + count1;
//                if(document.getElementById(temp1) !== null){
//                    barcode = document.getElementById(temp1).value;
                    count1 = count1 + 1;
//                }
                //barcode = tds.item(i).children.value;
                barcode = document.getElementById("targetss").rows[count1].cells[10].childNodes[0].value;
                
            }
            if (i%14 == 12){
//                var temp2 = "target" + count2;
//                if(document.getElementById(temp2) !== null){
//                    sale_price = document.getElementById(temp2).value;
                    count2 = count2 + 1;
//                }
                //sale_price = tds.item(i).children.value;
                sale_price = document.getElementById("targetss").rows[count2].cells[12].childNodes[0].value;
                
            }

			temp_count = temp_count + 1;
			
            if (type!="" && gender!="" && color!="" && brand!="" && piece!="" && status_d_r!="" && size!="" && price!="" && gst!="" && pst!="" && barcode!="" && sale_price != 0){

                tempBarcode = findAccountId(barcode); //generate the account id
                //document.getElementById("test").value = tempBarcode;
                calculateOwning(tempBarcode, sale_price, barcode);
                //document.getElementById("test").value = tempBarcode;
                

                console.log(i);
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var answera = this.responseText;
                        document.getElementById("test").value = answera;
    //					var answers = answera.split("|");
    //					var type=answers[0];
    //					var gender=answers[1];
    //					var color=answers[2];
    //					var brand = answers[3];
    //                    var piece = answers[4];
    //					var dr = answers[5];
    //					var size = answers[6];
    //					var price = answers[7];
    //                    
    //                    if(gst == ""){
    //                        answers[8] = 1;
    //                    }
    //                    var gst = answers[8];
    //                    var pst = answers[9];
    //					var barcode = answers[10];
    //					sendData(type, gender, color, brand, piece, dr, size, price, gst, pst, barcode);
                        
                    }
                };
                xmlhttp.open("GET", "updateSoldItem.php?type="+type+"&gender="+gender+"&color="+color+"&brand="+brand+"&piece="+piece+"&status_d_r="+status_d_r+"&size="+size+"&price="+price+"&gst="+gst+"&pst="+pst+"&barcode="+barcode+"&sale_price="+sale_price+"&account_id="+tempBarcode + "&pseudoParam=" + temp_date,false);
                xmlhttp.send();
                type="";
                gender="";
                color="";
                brand="";
                piece= "";
                status_d_r= "";
                size= "";
                price= "";
                gst= "";
                pst= "";
                barcode= "";
                sale_price="";
                

            }//end if
        }//end for loop
		
		
        var temp_invoice_record = document.getElementById("invoice_record").value;
		var temp_subtotal = document.getElementById("subtotal").value;
		var temp_gst = document.getElementById("gst").value;
		var temp_pst = document.getElementById("pst").value;
		var temp_total = document.getElementById("total").value;
		var temp_payment_method = document.getElementById("payment_method").value;
		
//		var temp_type = ["clo", "jean"];
//		var temp_barcode = ["00000010000001", "00000010000002"];
//		var temp_sale_price = ["99.99", "88.88"];
		
///////////////////////////
		var tds = document.getElementById("targettbody").getElementsByTagName("td");
    
		console.log(tds.length);

		var length = tds.length / 14;
		var x = 1;
		var temp_type = [];
		var temp_barcode = [];
		var temp_sale_price = [];
		console.log(length);

		if(length > 0){
			for(var i = 0; i < length; i++){
				console.log(length);
				var a = 0;
				var b = 10;
				var c = 12;
				console.log(document.getElementById("targettbody").rows[0].cells[10].childNodes[0].value);
					temp_type.push(document.getElementById("targettbody").rows[i].cells[a].innerHTML);
					temp_barcode.push( document.getElementById("targettbody").rows[i].cells[b].childNodes[0].value);
					temp_sale_price.push(document.getElementById("targettbody").rows[i].cells[c].childNodes[0].value);


				//x = x + 1;// x bug in table there are doubl <tr></tr> check Add Item Record Show.php

		   }//end for loop

		} //end if   
		
///////////////////////////		
		
		for (var i = 0; i < length; i++){
			console.log(temp_barcode[i]);
		}
		
       
        webprint.printRaw(getEscSample(temp_type, temp_barcode, temp_sale_price, temp_invoice_record, temp_subtotal, temp_gst, temp_pst, temp_total, temp_payment_method, 2)+"\n\n\n\n" + gs_cut + "\r", $('#printerlist').val());
        //webprint.cut();
        updateTradeRecord();
        alert("Sold Success");
    }else{
        alert("Please Enter Payment Method & Amount");
    }
    
    
    
}//end function

function updateTradeRecord(){
    var date = new Date();
    var temp_date = date.getTime();
    //using store credit calculation
    
    
    var subtotal = document.getElementById("subtotal").value;
    var gst = document.getElementById("gst").value;
    var pst = document.getElementById("pst").value;
    var total = document.getElementById("total").value;
    var e = document.getElementById("coupon_method");
    var coupon_method = e.options[e.selectedIndex].value;
    var coupon = document.getElementById("coupon").value;
    var customer_account_id = document.getElementById("customer_account_id").value;
    var store_credit_amount = document.getElementById("store_credit_amount").value;
    var a = document.getElementById("payment_method");
    var payment_method = a.options[a.selectedIndex].value;
    var payment_amount = document.getElementById("payment_amount").value;
    
    
    storeCreditUsing(customer_account_id, store_credit_amount);
    
    if(subtotal!="" && gst!="" && pst!="" && total!="" && payment_method!="" && payment_amount!=""){
        if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("test").value = this.responseText;
            }
        };
        xmlhttp.open("GET", "updateTradeRecord.php?subtotal="+subtotal+"&gst="+gst+"&pst="+pst+"&total="+total+"&coupon_method="+coupon_method+"&coupon="+coupon+"&customer_account_id="+customer_account_id+"&store_credit_amount="+store_credit_amount+"&payment_method="+payment_method+"&payment_amount="+payment_amount+ "&pseudoParam=" + temp_date,true);
        xmlhttp.send();
    
        document.getElementById("subtotal").value = "";
        document.getElementById("gst").value = "";
        document.getElementById("pst").value = "";
        document.getElementById("total").value = "";
        document.getElementById("coupon").value = "";
        document.getElementById("customer_account_id").value = "";
        document.getElementById("store_credit_amount").value = "";
        document.getElementById("payment_amount").value = "";
    }else{//end first if
        alert("Please click check out and then choose payment method");
    }
}


function findAccountId(barcode){
    var accountid;
    if(barcode[0] != 0){
       return accountid = barcode[0]+barcode[1]+barcode[2]+barcode[3]+barcode[4]+barcode[5]+barcode[6];
    }else if(barcode[1] != 0){
       return accountid = barcode[1]+barcode[2]+barcode[3]+barcode[4]+barcode[5]+barcode[6];
    }else if(barcode[2] != 0){
       return accountid = barcode[2]+barcode[3]+barcode[4]+barcode[5]+barcode[6];
    }else if(barcode[3] != 0){
       return accountid = barcode[3]+barcode[4]+barcode[5]+barcode[6];
    }else if(barcode[4] != 0){
       return accountid = barcode[4]+barcode[5]+barcode[6];
    }else if(barcode[5] != 0){
       return accountid = barcode[5]+barcode[6];
    }else{
       return accountid = barcode[6];
    }
}


function makeitclean(word){
	var result = word;
	result.trim();
	result.replace("<br>","");
	return result;
}



/////////////////example//////////////////////////
//<!DOCTYPE html>
//<html>
//<head>
//<style>
//table, td {
//    border: 1px solid black;
//}
//</style>
//</head>
//<body>
//
//<p>Click the button to alert the innerHTML of the first tr element (index 0) in the table.</p>
//
//<table id="myTable">
//  <tr>
//    <td><input type="text" value="hhh"/></td>
//    <td>Row1 cell2</td>
//  </tr>
//  <tr>
//    <td>Row2 cell1</td>
//    <td>Row2 cell2</td>
//  </tr>
//  <tr>
//    <td>Row3 cell1</td>
//    <td>Row3 cell2</td>
//  </tr>
//</table>
//<br> 
//
//<button onclick="myFunction()">Try it</button>
//
//<script>
//function myFunction() {
//    alert(document.getElementById("myTable").rows[0].cells[0].getElementsByTagName("input")[0].value);
//}
//</script>
//
//</body>
//</html>

