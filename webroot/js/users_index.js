$(document).ready(function(){
	//get extra parameters
	var org_id = $('#org_id').html();
	var show_all = $('#show_all').html();
	
	oTable = $("#usersResults").dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": global.base_url + "/users/dataTables.json",
		"fnServerParams": function ( aoData ) {
            aoData.push( { "name": "org_id", "value": org_id } );
            aoData.push( { "name": "show_all", "value": show_all } );
        },
		"aoColumns": [
		              	{"bSortable": true, "bSearchable": true},
		              	{"bSortable": true, "bSearchable": false},
		              	{"bSortable": true, "bSearchable": true}
		             ],
		"aaSorting": [[0, 'asc']]
	}).fnSetFilteringDelay(1000);
	
	$('#usersResults').on('click', 'tbody tr', function(event){
		var id = $(this).attr('id');
		location.href = global.base_url + "/users/view/" + id.substr(id.indexOf('_') + 1);
	});
});