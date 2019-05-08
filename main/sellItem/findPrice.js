function findPrice(){
    
    findSubtotal();
    findGst();
    findPst();
    findTotal();
    
}

function findSubtotal(){
    var temp = 0;
    var tempprice;
    /////////////find subtotal price////////////// limit to 50 products
    for(var i = 0; i < 50; i++){
        
        if(document.getElementById("target" + i) === null){
            tempprice = 0;
        }else{
            tempprice = document.getElementById("target" + i).value; 
        }
        
        temp =  parseFloat(temp) + parseFloat(tempprice);
    }
    temp = temp.toFixed(2);
    document.getElementById("subtotal").value = temp;
    
}

function findGst(){
    var gst = 0.05;
    var tempgst = 0;
    var temp = 0;
    
    /////////////find gst pst////////////// limit to 50 products
    for(var i = 0; i < 50; i++){
        
        if(document.getElementById("gst" + i) === null){
            tempgst = 0;
        }else if(document.getElementById("gst" + i) != null && document.getElementById("gst" + i).value == 1){
            tempgst = document.getElementById("target" + i).value * gst; 
        }
        
        temp =  parseFloat(temp) + parseFloat(tempgst);
    }
    temp = temp.toFixed(2);
    document.getElementById("gst").value = temp;
    
}

function findPst(){
    var pst = 0.06;
    var temppst = 0;
    var temp = 0;
    
    /////////////find gst pst////////////// limit to 50 products
    for(var i = 0; i < 50; i++){
        
        if(document.getElementById("pst" + i) === null || document.getElementById("pst" + i).value == 0){
            temppst = 0;
        }else if(document.getElementById("pst" + i) != null && document.getElementById("pst" + i).value == 1){
            temppst = document.getElementById("target" + i).value * pst; 
        }
        
        temp =  parseFloat(temp) + parseFloat(temppst);
    }
    temp = temp.toFixed(2);
    document.getElementById("pst").value = temp;
    
}

function findTotal(){
    var total = 0;
    
    var subtotal = document.getElementById("subtotal").value;
    var gst = document.getElementById("gst").value;
    var pst = document.getElementById("pst").value;
    total = parseFloat(subtotal) + parseFloat(gst) + parseFloat(pst);
    total = total.toFixed(2);
    document.getElementById("total").value = total;
    
}

function updateSale(){
    
}