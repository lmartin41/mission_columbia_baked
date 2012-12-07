$(document).ready(function(){
	oTable = $("#userResults").dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": global.base_url + "/users/dataTables.json",
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