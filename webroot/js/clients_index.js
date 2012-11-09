$(document).ready(function(){
	oTable = $("#clientsResults").dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"bAutoWidth": true,
		"aoColumns": [
		              	{"bSortable": true, "bSearchable": true},
		              	{"bSortable": true, "bSearchable": true, },
		              	{"bSortable": false, "bSearchable": false}
		             ],
		"aaSorting": [[1, 'asc']]
	});
	
	//fixes weird issue with datatables not drawing search correctly
	$('#clientsResults_filter').css('text-align', 'left');
});