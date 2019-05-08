function getInfo(input) {
    
    var date = new Date();
    var temp_date = date.getTime();
    
    if( input == 13){
    var str = document.getElementById("barcode").value;
    
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){
                
                var responseA = this.responseText;
                
                
                
                var responseB = responseA.split("|");
                
                //Split the responseTxt
                var Type = responseB[0];
                var Gender = responseB[1];
                var Color = responseB[2];
                var Brand = responseB[3];
                var Piece = responseB[4];
                var dr = responseB[5];
                var Size = responseB[6];
                var Price = responseB[7];
                var Gst = responseB[8];
                var Pst = responseB[9];
                var Barcode = responseB[10];
                var sold = responseB[11];
                
                var exist = false;
                var itemcount = 0;
				var tds = document.getElementById("targettbody").getElementsByTagName("td");
				for (var i = 0 ; i < tds.length; i++){
					if (i%14 == 10){
						if (tds[i].children[0].value===Barcode){
							itemcount+=1;
						}
					}
				}
                
                if (itemcount >= sold){
                    exist = true;
                }
                
                console.log(itemcount);
                
                if(responseA == 1){
                   alert("Item has been returned");
                }else if(responseA == 2){
                   alert("Item has been Donated");
                }else if(responseA == 3){
                   alert("Item Sold Out");
                }else if (responseA == "Error"){}
				 else if (exist == true){
					 document.getElementById("barcode").value="";
					 alert("The item is existed");
				 }else if(str.length == 14 && exist == false){
                     counter = document.getElementById("counter").value;
                     document.getElementById("counter").value = parseInt(counter) + 1;
                     createNode(Type, Gender, Color, Brand, Piece, dr, Size, Price, Gst, Pst, Barcode, counter);
                 }
                 
                
                
                
            }
        };
        xmlhttp.open("GET","find.php?q=" + str  + "&pseudoParam=" + temp_date, false);
        xmlhttp.send();
}
}


function createNode(type, gender, color, brand, piece, dr, size, price, gst, pst, barcode, counter) {
    //create td node
    var typetd = document.createElement("td");
    var gendertd = document.createElement("td");
    var colortd = document.createElement("td");
    var brandtd = document.createElement("td");
    var piecetd = document.createElement("td");
    var drtd = document.createElement("td");
    var sizetd = document.createElement("td");
    var pricetd = document.createElement("td");
    var gsttd = document.createElement("td");
    var psttd = document.createElement("td");
    var barcodetd = document.createElement("td");
    
    var discounttd = document.createElement("td");
    
    var salepricetd = document.createElement("td");
    
    var deletetd = document.createElement("td");
    
    var trnode = document.createElement("tr");
    trnode.setAttribute("id", "tabletr"+counter)
    //Add node into tr
    trnode.appendChild(typetd);
    trnode.appendChild(gendertd);
    trnode.appendChild(colortd);
    trnode.appendChild(brandtd);
    trnode.appendChild(piecetd);
    trnode.appendChild(drtd);
    trnode.appendChild(sizetd);
    trnode.appendChild(pricetd);
    trnode.appendChild(gsttd);
    trnode.appendChild(psttd);
    trnode.appendChild(barcodetd);
    
    trnode.appendChild(discounttd);
    
    trnode.appendChild(salepricetd);
    
    trnode.appendChild(deletetd);
    
    //Add text into td (normal info select from db)
    var typetext = document.createTextNode(type);
    typetd.appendChild(typetext);
    
    var gendertext = document.createTextNode(gender);
    gendertd.appendChild(gendertext);
    
    var colortext = document.createTextNode(color);
    colortd.appendChild(colortext);
    
    var brandtext = document.createTextNode(brand);
    brandtd.appendChild(brandtext);
    
    var piecetext = document.createTextNode(piece);
    piecetd.appendChild(piecetext);
    
    var drtext = document.createTextNode(dr);
    drtd.appendChild(drtext);
    
    var sizetext = document.createTextNode(size);
    sizetd.appendChild(sizetext);
    
    var pricetext = document.createTextNode(price);
    pricetd.appendChild(pricetext);
    
    var gstinput = document.createElement("input");
    gstinput.setAttribute("value", gst);
    gstinput.setAttribute("readonly", "readonly");
    gstinput.setAttribute("id", "gst"+counter);
    gsttd.appendChild(gstinput);
    
    var pstinput = document.createElement("input");
    pstinput.setAttribute("value", pst);
    pstinput.setAttribute("readonly", "readonly");
    pstinput.setAttribute("id", "pst"+counter);
    psttd.appendChild(pstinput);
    
    
    //barcode box
    var barcodeInput = document.createElement("input");
    barcodeInput.setAttribute("id", "barcodeInput"+counter);
    barcodeInput.setAttribute("value", barcode);
    barcodeInput.setAttribute("readonly", "readonly");
    barcodetd.appendChild(barcodeInput);
    
    //discount select box
    var discountselect = document.createElement("select");
    discountselect.setAttribute("id", "mySelect"+counter);
    //select event
    //discountselect.setAttribute("onchange", "mySaleFunction"+counter+"(this.value,"+price+")");
	discountselect.setAttribute("onchange", "mySaleFunction(this.value,"+price+",this)");
    discounttd.appendChild(discountselect);
    
    
    //sale price
    var salepriceInput = document.createElement("input");
    salepriceInput.setAttribute("id", "target"+counter);
    salepriceInput.setAttribute("value", price)
    salepricetd.appendChild(salepriceInput);
    
    //delete button
    var deleteButton = document.createElement("button");
    deleteButton.setAttribute("value", "Clear");
    //deleteButton.setAttribute("onClick", "myDeleteFunction"+counter+"(this.value)");
	deleteButton.setAttribute("onClick", "myDeleteFunction(this)");
    var deleteText = document.createTextNode("Clear");
    deleteButton.appendChild(deleteText);
    deletetd.appendChild(deleteButton);
   
   //Add into table body 
    document.getElementById("targettbody").appendChild(trnode);
    
    //give select "mySelect" add some option
    var discountoption1 = document.createElement("option");
    discountoption1.setAttribute("value", "1");
    var discountoption1text = document.createTextNode("no discount");
    discountoption1.appendChild(discountoption1text);
    discountselect.appendChild(discountoption1);
    
    var discountoption2 = document.createElement("option");
    discountoption2.setAttribute("value", "0.9");
    var discountoption2text = document.createTextNode("10%");
    discountoption2.appendChild(discountoption2text);
    discountselect.appendChild(discountoption2);
    
    var discountoption3 = document.createElement("option");
    discountoption3.setAttribute("value", "0.8");
    var discountoption3text = document.createTextNode("20%");
    discountoption3.appendChild(discountoption3text);
    discountselect.appendChild(discountoption3);
    
    var discountoption4 = document.createElement("option");
    discountoption4.setAttribute("value", "0.7");
    var discountoption4text = document.createTextNode("30%");
    discountoption4.appendChild(discountoption4text);
    discountselect.appendChild(discountoption4);
    
    var discountoption5 = document.createElement("option");
    discountoption5.setAttribute("value", "0.6");
    var discountoption5text = document.createTextNode("40%");
    discountoption5.appendChild(discountoption5text);
    discountselect.appendChild(discountoption5);
    
    var discountoption6 = document.createElement("option");
    discountoption6.setAttribute("value", "0.5");
    var discountoption6text = document.createTextNode("50%");
    discountoption6.appendChild(discountoption6text);
    discountselect.appendChild(discountoption6);
    
    var discountoption7 = document.createElement("option");
    discountoption7.setAttribute("value", "0.4");
    var discountoption7text = document.createTextNode("60%");
    discountoption7.appendChild(discountoption7text);
    discountselect.appendChild(discountoption7);
    
    var discountoption8 = document.createElement("option");
    discountoption8.setAttribute("value", "0.3");
    var discountoption8text = document.createTextNode("70%");
    discountoption8.appendChild(discountoption8text);
    discountselect.appendChild(discountoption8);
    
    
    //Set the search box value null
    document.getElementById("barcode").value = "";
	document.getElementById("amount").value++;
}






