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
	
	make_rows_into_links();
	
	function make_rows_into_links()
	{
		$('#clientsResults tbody tr').on('click', function(event){
			var id = $(this).attr('id');
			location.href = global.base_url + "/clients/view/" + id.substr(id.indexOf('_') + 1);
		});
		
		$('#clientsResults tbody tr').css('cursor', 'pointer');
	}
});