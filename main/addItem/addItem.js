 //JavaScript Document


 function createTable() {
     
     if(document.getElementById("number").value == ""){
        alert("Please Enter Number(数量)");
     }else if(document.getElementById("account_id").value == ""){
        alert("Please Enter Account ID(账号)");      
     }else{
         document.getElementById("first_name").setAttribute("readonly", "readonly");
         document.getElementById("last_name").setAttribute("readonly", "readonly");
         document.getElementById("account_id").setAttribute("readonly", "readonly");


         var count = document.getElementById("number").value;
         var type = document.getElementById("type").value;
         var gender1 = document.getElementById("gender1").value;
         var color1 = document.getElementById("color1").value;
         var brand1 = document.getElementById("brand1").value;
         var status1 = document.getElementById("status1").value;
         var size1 = document.getElementById("size1").value;
         var price1 = document.getElementById("price1").value;

         var account_id = document.getElementById("account_id").value;
         var max_item_id;
         //getMaxItemId();
         var tds = document.getElementById("targettbody").getElementsByTagName("td");

         //this part is for print
         if(document.getElementById("first_name").value != "" && document.getElementById("last_name").value != ""){
             var fname = document.getElementById("first_name").value;
             var lname = document.getElementById("last_name").value;
             var name = "        " + fname + " " + lname;
             var phone = document.getElementById("phone").value;
             verifyName(name, account_id, phone);
         }else{
             var name = " ";
             verifyName(name, account_id, phone);
         }
         showToday();


         if(tds.length == 0){ //when click create table the first tds.length is 0, second time click create table the number is doubled.
             //create table when table content == empty
             for(var i = 0; i < count; i++){
                 var type_td = document.createElement("td");
                 type_td.contentEditable = true;
                 var gender_td = document.createElement("td");
                 gender_td.contentEditable = true;
                 var color_td = document.createElement("td");
                 color_td.contentEditable = true;
                 var brand_td = document.createElement("td");
                 brand_td.contentEditable = true;
                 var piece_td = document.createElement("td");
                 piece_td.contentEditable = true;
                 var status_d_r_td = document.createElement("td");
                 status_d_r_td.contentEditable = true;
                 var ratio_td = document.createElement("td");
                 ratio_td.contentEditable = true;
                 var size_td = document.createElement("td");
                 size_td.contentEditable = true;
                 var price_td = document.createElement("td");
                 price_td.contentEditable = true;
                 var total_same_amount_td = document.createElement("td");
                 total_same_amount_td.contentEditable = true;
                 var gst_td = document.createElement("td");
                 gst_td.contentEditable = true;
                 gst_td.setAttribute("class", "gst_checkbox");
                 var pst_td = document.createElement("td");
                 pst_td.contentEditable = true;
                 pst_td.setAttribute("class", "pst_checkbox");
                 var barcode = document.createElement("td");
                 barcode.contentEditable = true;

                 //create tr node
                 var trnode = document.createElement("tr");

                 //Add node into tr
                 trnode.appendChild(type_td);
                 trnode.appendChild(gender_td);
                 trnode.appendChild(color_td);
                 trnode.appendChild(brand_td);
                 trnode.appendChild(piece_td);
                 trnode.appendChild(status_d_r_td);
                 trnode.appendChild(ratio_td);
                 trnode.appendChild(size_td);
                 trnode.appendChild(price_td);
                 trnode.appendChild(total_same_amount_td);
                 trnode.appendChild(gst_td);
                 trnode.appendChild(pst_td);
                 trnode.appendChild(barcode);

                 //Add text into td 
                 var typetext = document.createTextNode(type);
                 type_td.appendChild(typetext);
                 var gsttext = document.createTextNode("1");
                 gst_td.appendChild(gsttext);
                 var psttext = document.createTextNode("0");
                 pst_td.appendChild(psttext);

                 var gendertext = document.createTextNode(gender1);
                 gender_td.appendChild(gendertext);

                 var colortext = document.createTextNode(color1);
                 color_td.appendChild(colortext);

                 var brandtext = document.createTextNode(brand1);
                 brand_td.appendChild(brandtext);

                 var statustext = document.createTextNode(status1);
                 status_d_r_td.appendChild(statustext);
                 
                 var ratiotext = document.createTextNode("0.4");
                 ratio_td.appendChild(ratiotext);

                 var sizetext = document.createTextNode(size1);
                 size_td.appendChild(sizetext);

                 var total_same_amount_text = document.createTextNode("1");
                 total_same_amount_td.appendChild(total_same_amount_text);
                 
                 var pricetext = document.createTextNode(price1);
                 price_td.appendChild(pricetext);
                 //Add text into td

                 //barcode
                 max_item_id = document.getElementById("max_item_id").value //get max barcode id
                 max_item_id = parseInt(max_item_id) + i;
                 var barcodetext = document.createTextNode(max_item_id);
                 barcode.appendChild(barcodetext);
                 //reset temo_int to increase

                 //Add into table body 
                 document.getElementById("targettbody").appendChild(trnode);
            }//end first for loop
             document.getElementById("max_item_id").value = max_item_id;// set input max_item_id to new max_item_id
         }else if(tds.length != 0){ //end first else
             for(var i = 1; i <= count; i++){ //the barcode need to add one more
                 var type_td = document.createElement("td");
                 type_td.contentEditable = true;
                 var gender_td = document.createElement("td");
                 gender_td.contentEditable = true;
                 var color_td = document.createElement("td");
                 color_td.contentEditable = true;
                 var brand_td = document.createElement("td");
                 brand_td.contentEditable = true;
                 var piece_td = document.createElement("td");
                 piece_td.contentEditable = true;
                 var status_d_r_td = document.createElement("td");
                 status_d_r_td.contentEditable = true;
                 var ratio_td = document.createElement("td");
                 ratio_td.contentEditable = true;
                 var size_td = document.createElement("td");
                 size_td.contentEditable = true;
                 var price_td = document.createElement("td");
                 price_td.contentEditable = true;
                 var total_same_amount_td = document.createElement("td");
                 total_same_amount_td.contentEditable = true;
                 var gst_td = document.createElement("td");
                 gst_td.contentEditable = true;
                 gst_td.setAttribute("class", "gst_checkbox");
                 var pst_td = document.createElement("td");
                 pst_td.contentEditable = true;
                 pst_td.setAttribute("class", "pst_checkbox");
                 var barcode = document.createElement("td");
                 barcode.contentEditable = true;

                 //create tr node
                 var trnode = document.createElement("tr");

                 //Add node into tr
                 trnode.appendChild(type_td);
                 trnode.appendChild(gender_td);
                 trnode.appendChild(color_td);
                 trnode.appendChild(brand_td);
                 trnode.appendChild(piece_td);
                 trnode.appendChild(status_d_r_td);
                 trnode.appendChild(ratio_td);
                 trnode.appendChild(size_td);
                 trnode.appendChild(price_td);
                 trnode.appendChild(total_same_amount_td);
                 trnode.appendChild(gst_td);
                 trnode.appendChild(pst_td);
                 trnode.appendChild(barcode);

                 //Add text into td 
                 var typetext = document.createTextNode(type);
                 type_td.appendChild(typetext);
                 var gsttext = document.createTextNode("1");
                 gst_td.appendChild(gsttext);
                 var psttext = document.createTextNode("0");
                 pst_td.appendChild(psttext);

                 var gendertext = document.createTextNode(gender1);
                 gender_td.appendChild(gendertext);

                 var colortext = document.createTextNode(color1);
                 color_td.appendChild(colortext);

                 var brandtext = document.createTextNode(brand1);
                 brand_td.appendChild(brandtext);

                 var statustext = document.createTextNode(status1);
                 status_d_r_td.appendChild(statustext);
                 
                 var ratiotext = document.createTextNode("0.4");
                 ratio_td.appendChild(ratiotext);

                 var sizetext = document.createTextNode(size1);
                 size_td.appendChild(sizetext);

                 var pricetext = document.createTextNode(price1);
                 price_td.appendChild(pricetext);
                 
                 var total_same_amount_text = document.createTextNode("1");
                 total_same_amount_td.appendChild(total_same_amount_text);
                 //Add text into td

                 //barcode
                 max_item_id = document.getElementById("max_item_id").value;
                 max_item_id = parseInt(max_item_id) + i;
                 var barcodetext = document.createTextNode(max_item_id);
                 barcode.appendChild(barcodetext);
                 //reset temo_int to increase

                 //Add into table body 
                 document.getElementById("targettbody").appendChild(trnode);
            }//end second for loop
             document.getElementById("max_item_id").value = max_item_id;// set input max_item_id to new max_item_id
         }
     }//end first if
     
     
 }//end function


function getMaxItemId(){
    
    var date = new Date();
    var temp_date = date.getTime();
    
    var account_id = document.getElementById("account_id").value;
    
    xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var temp = this.responseText;
                document.getElementById("max_item_id").value = temp;
        }
    };
    xmlhttp.open("GET","getMaxItemId.php?account_id="+account_id + "&pseudoParam=" + temp_date,true);
    xmlhttp.send();
    
}

//verify last_name & first_name to register item for consigner
 function getBarcodeId() {
     
     getMaxItemId();
     
     getPhone();
     
     getInvoiceRecord();
     
     var date = new Date();
     var temp_date = date.getTime();
     
     
     var first_name = document.getElementById("first_name").value;
     var last_name = document.getElementById("last_name").value;
     
     var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             var answera = this.responseText;
             if (answera != "Error") {
                 document.getElementById("account_id").value = answera;
             } else {
                 document.getElementById("account_id").value = 0;
             }
             //console.log("amount");
             //console.log(answerb[1]);
             //document.getElementById("amount"+name).innerHTML = finalamount;
         }
     };
     xmlhttp.open("GET", "getBarcode.php?first_name=" + first_name + "&last_name=" + last_name + "&pseudoParam=" + temp_date, true);
     xmlhttp.send();
 }

//verify ID
 function getName() {
     //find max item id
     getMaxItemId();
     
     getPhone();
     
     getInvoiceRecord();
     
     var date = new Date();
     var temp_date = date.getTime();
     
     var account_id = document.getElementById("account_id").value;
     
     document.getElementById("first_name").value = "";
     document.getElementById("last_name").value = "";
     var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             var answera = this.responseText;
             var answers = answera.split("|");
             if (answera != "Error") {
                 document.getElementById("first_name").value = answers[0];
                 document.getElementById("last_name").value = answers[1];
             }else{
                 document.getElementById("first_name").value = "";
                 document.getElementById("last_name").value = "";
             }
             //console.log("amount");
             //console.log(answerb[1]);
             //document.getElementById("amount"+name).innerHTML = finalamount;
         }
     };
     xmlhttp.open("GET", "getName.php?account_id=" + account_id + "&pseudoParam=" + temp_date, true);
     xmlhttp.send();
 }

//phone
function getPhone(){
    
    var date = new Date();
    var temp_date = date.getTime();
    
    var account_id = document.getElementById("account_id").value;
    
    xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var temp = this.responseText;
                document.getElementById("phone").value = temp;
        }
    };
    xmlhttp.open("GET","getPhone.php?account_id="+account_id + "&pseudoParam=" + temp_date,true);
    xmlhttp.send();
    
}

//invoice record
function getInvoiceRecord(){
    
    var date = new Date();
    var temp_date = date.getTime();
    
    var account_id = document.getElementById("account_id").value;
    
    xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var temp = this.responseText;
                document.getElementById("invoice_record").value = temp;
                document.getElementById("invoice_record_number").innerHTML = temp;
        }
    };
    xmlhttp.open("GET","getInvoiceRecord.php?account_id="+account_id + "&pseudoParam=" + temp_date,true);
    xmlhttp.send();
    
}


 function makeitclean(word) {
     var result = word;
     result.trim();
     result.replace("<br>", "");
     return result;
 }

function makeNull(field){
    if (field == ""){
        return null;
    }
    else{
        return field;
    }
}

 function Update(){
     
    var date = new Date();
    var temp_date = date.getTime();
    
     
	var tds = document.getElementById("targettbody").getElementsByTagName("td");
    
    console.log(tds.length);
     
	var count = document.getElementById("invoice_record").value;
	var type = "";
	var gender = "";
	var color = "";
	var brand = "";
	var piece = "";
	var status = "";
    var ratio = "";
	var size = "";
	var price = "";
    var total_same_amount = "";
    var gst = "";
    var pst = "";
	var max_item_id = "";
    var account_id = document.getElementById("account_id").value;
	for(var i = 0; i < tds.length;i++){
		
		if (i%13 == 0){
			type = makeitclean(tds.item(i).innerHTML);
		}
		if (i%13 == 1){
			gender = makeitclean(tds.item(i).innerHTML);
		}
		if (i%13 == 2){
			color = makeitclean(tds.item(i).innerHTML);
		}
		if (i%13 == 3){
			brand = makeitclean(tds.item(i).innerHTML);
		}
		if (i%13 == 4){
			piece = makeitclean(tds.item(i).innerHTML);
		}
		if (i%13 == 5){
			status = makeitclean(tds.item(i).innerHTML);
		}
        if (i%13 == 6){
			ratio = makeitclean(tds.item(i).innerHTML);
		}
		if (i%13 == 7){
			size = makeitclean(tds.item(i).innerHTML);
		}
		if (i%13 == 8){
			price = makeitclean(tds.item(i).innerHTML);
		}
        if (i%13 == 9){
			total_same_amount = makeitclean(tds.item(i).innerHTML);
		}
        if (i%13 == 10){
			gst = makeitclean(tds.item(i).innerHTML);
		}
        if (i%13 == 11){
			pst = makeitclean(tds.item(i).innerHTML);
		}
		if (i%13 == 12){
			max_item_id = makeitclean(tds.item(i).innerHTML);
		}
        
		if (type!="" && gender!="" && color!="" && brand!="" && status!=""  && ratio!="" && size!="" && price!="" && total_same_amount!="" && gst!="" && pst!="" && max_item_id!=""){
			
            
			var xmlhttp = new XMLHttpRequest();
            
            
			
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
                    
                    var answera = this.responseText;
                    document.getElementById("test").value = answera;
                    if(answera != "fail"){
                        
                        if(answera == 1){
                            alert("Clear Browser History");
                        }else{
                            

                            var answers = answera.split("|");

                            var type=answers[0];
                            var gender=answers[1];
                            var color=answers[2];
                            var brand = answers[3];
                            var piece = answers[4];
                            var status = answers[5];
                            var size = answers[6];
                            var price = answers[7];

                            var barcode = answers[8];

                            var description = brand + "  " + piece;

                             
                        } 

                    }
                    
                    sendData(type, gender, color, description, price, size, status, barcode); 
					
                    
				}//end if
			};//end function
			xmlhttp.open("GET", "update.php?count="+count+"&account_id="+account_id+"&type="+type+"&gender="+gender+"&color="+color+"&brand="+brand+"&piece="+piece+"&status="+status+"&ratio="+ratio+"&size="+size+"&price="+price+"&total_same_amount="+total_same_amount+"&gst="+gst+"&pst="+pst+"&max_item_id="+max_item_id + "&pseudoParam=" + temp_date, false);
			xmlhttp.send();
            
			type="";
			gender="";
			color="";
			brand="";
			piece= "";
			status= "";
            ratio= "";
			size= "";
			price= "";
            total_same_amount= "";
            gst= "";
            pst= "";
			max_item_id= "";
            
            
		}//end if
	}//end for loop
     location.reload();
	
}

function tax_checkbox(){
    
     var gst_checkbox = document.getElementById("gst_checkbox");
     var pst_checkbox = document.getElementById("pst_checkbox");
     
     //appendchild checkbox
     var checkboxGST = document.createElement("input");
     var checkboxPST = document.createElement("input");
     checkboxGST.type = "checkbox";
     checkboxPST.type = "checkbox";
     checkboxGST.value = "All GST";
     checkboxPST.value = "All PST";
     checkboxGST.id = "checkboxGST";
     checkboxPST.id = "checkboxPST";
     checkboxGST.checked =true;
     gst_checkbox.appendChild(checkboxGST);
     pst_checkbox.appendChild(checkboxPST);
    
     checkboxGST.onchange = updateColumn1;
     checkboxPST.onchange = updateColumn2;
     
}

function updateColumn1(){
     var tds = document.getElementById("targetss").getElementsByTagName("td");
    for (var i = 0;i<tds.length;i++){
        if (i%13 == 10){
            if (document.getElementById("checkboxGST").checked == true){
                tds.item(i).innerHTML = "1";
            }
            else if (document.getElementById("checkboxGST").checked == false){
                tds.item(i).innerHTML = "0";
            }
        }
    }
}
function updateColumn2(){
     var tds = document.getElementById("targetss").getElementsByTagName("td");
    for (var i = 0;i<tds.length;i++){
        if (i%13 == 11){
            if (document.getElementById("checkboxPST").checked == true){
                tds.item(i).innerHTML = "1";
            }
            else if (document.getElementById("checkboxPST").checked == false){
                tds.item(i).innerHTML = "0";
            }
        }
    }
}

function verifyName(name, id, phone){
    
    document.getElementById("show_name").innerHTML = name;
    document.getElementById("show_account_id").innerHTML = id;
    document.getElementById("show_phone").innerHTML = phone;
    
}
