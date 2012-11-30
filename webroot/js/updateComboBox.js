function updateComboBox()
{
    var resourceData = new Array("Resource Name", "Resource Type", "Description", "Inventory", "Resource Status", "Street Address", "City", "State", "Zip");
    var clientData = new Array("First Name", "Last Name", "Sex", "DOB", "Age", "Address", "Apt #", "City", "State", "Zip", "Phone", "Regular Job",
        "Food Stamps", "Veterans Pension", "Part Time Job", "Social Security", "Annuity Check", "Child Support", "SSI Or Disability", "Unemployment", 
        "When Next Check", "Pregnant", "Disabled", "Handicapped", "Stove", "Refrigerator", "Cell", "Cable", "Internet", "Accepted Christ", "Dedicated Christ", 
        "Model Of Car", "How Did You Hear About Us?", "How Long Do You Need?");
    var selectField = document.getElementById('field_name');
    var selectReference = document.getElementById("table_reference");
    selectField.options.length = 0;
    
    var data = clientData;
    if (selectReference.options[selectReference.selectedIndex].text == "Resources") data = resourceData;
    
    for(var i = 0; i < data.length; i++ ) {
        var option = document.createElement("option");
        option.text = data[i];
        option.value = data[i];
        selectField.appendChild(option);
    }
}

