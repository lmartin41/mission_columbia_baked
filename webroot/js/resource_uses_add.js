$(document).ready( function(){
    $('#organization').change(function(){
        if( $('#organization').val() != '')
        {
            if( $('#organization > option:first-child').val() == '')
            {
                $('#organization > option:first-child').remove();
            }
        }

        $.ajax({
            url: global.base_url + '/organizations/resources/' + $('#organization').val() + '.json' ,
            dataType: 'json',
            success: updateResourceComboBox
        });
    });
	
    function updateResourceComboBox(data)
    {
        var select = $('#ResourceUsResourceId');
        select.empty();
        if( data.length > 0 )
        {
            for(var i = 0; i < data.length; i++ )
            {
                select.append('<option value="' + data[i]['id'] + '">' + data[i]['resource_name'] + '</option>');
            }
            select.removeAttr('disabled');
        }
        else
        {
            select.attr('disabled', 'disabled');
        }
    }
});