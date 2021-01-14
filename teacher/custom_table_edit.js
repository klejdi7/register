$(document).ready(function(){
	$('#data_table').Tabledit({
		deleteButton: false,
		editButton: false,
		columns: {
		  identifier: [0, 'id_nxenes'],
		  editable: [[1, 'emri_nxenes'], [2, 'vendlindje']]
		},
		hideIdentifier: true,
		url: 'live_edit.php'
	});
});
