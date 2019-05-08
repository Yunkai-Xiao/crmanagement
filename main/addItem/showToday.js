function showToday(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    var duemm = mm;
    var dueyyyy = yyyy;
    
    //this year
    if(dd<10) {
        dd = '0'+dd;
    } 

    if(mm<10) {
        mm = '0'+mm;
    } 
    
    //next year
    if(mm == 10){
       duemm = 1;
       dueyyyy = dueyyyy + 1;
    }else if(mm ==11){
       duemm = 2;
       dueyyyy = dueyyyy + 1;
    }else if(mm ==12){
       duemm = 3;
       dueyyyy = dueyyyy + 1;
    }else{
        duemm = parseInt(mm) + 3;
    }
    
    if(duemm<10) {
        duemm = '0'+ duemm;
    } 
        

    today = mm + '/' + dd + '/' + yyyy;
    dueday = duemm + '/' + dd + '/' + dueyyyy;
    document.getElementById("consign_date").innerHTML=today;
    document.getElementById("due_date").innerHTML=dueday;
}

