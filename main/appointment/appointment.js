//verify last_name & first_name to register item for consigner

 function getBarcodeId() {

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

     xmlhttp.open("GET", "getBarcode.php?first_name="+first_name+"&last_name="+last_name+"", true);

     xmlhttp.send();

 }