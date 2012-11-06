function updateAge(clientOrRelative) {
    var corStr = "Client";
    if (clientOrRelative == "Relative") corStr = "ClientRelation";
    
    if (document.getElementById(corStr.concat("DOBYear")).value === '') return;
    var inc = 0;
    var today = new Date();
    var year = today.getFullYear();
        
    if (parseInt(document.getElementById(corStr.concat("DOBMonth")).selectedIndex, 10) <= parseInt(today.getMonth(), 10) + 1) {
        if (parseInt(document.getElementById(corStr.concat("DOBDay")).value, 10) <= parseInt(today.getDate(), 10)) {
            inc++;
        }
    }
        
    document.getElementById(corStr.concat("Age")).value = inc + year - parseInt(document.getElementById(corStr.concat("DOBYear")).value, 10);   
}
    
function updateDOB(clientOrRelative) {
    var corStr = "Client";
    if (clientOrRelative == "Relative") corStr = "ClientRelation";
    
    var today = new Date();
    var year = today.getFullYear();
    document.getElementById(corStr.concat("DOBDay")).selectedIndex = 1;
    document.getElementById(corStr.concat("DOBMonth")).selectedIndex = 1;
    document.getElementById(corStr.concat("DOBYear")).selectedIndex = parseInt(document.getElementById(corStr.concat("Age")).value, 10) + 1;  
}

