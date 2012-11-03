function updateAge() {
        if (document.getElementById("ClientDOBYear").value === '') return;
        var inc = 0;
        var today = new Date();
        var year = today.getFullYear();
        
        if (parseInt(document.getElementById("ClientDOBMonth").selectedIndex, 10) <= parseInt(today.getMonth(), 10) + 1) {
            if (parseInt(document.getElementById("ClientDOBDay").value, 10) <= parseInt(today.getDate(), 10)) {
                inc++;
            }
        }
        
        document.getElementById("ClientAge").value = inc + year - parseInt(document.getElementById("ClientDOBYear").value, 10);   
    }
    
    function updateDOB() {
        var today = new Date();
        var year = today.getFullYear();
        document.getElementById("ClientDOBDay").selectedIndex = 1;
        document.getElementById("ClientDOBMonth").selectedIndex = 1;
        document.getElementById("ClientDOBYear").selectedIndex = parseInt(document.getElementById("ClientAge").value, 10) + 1;  
    }

