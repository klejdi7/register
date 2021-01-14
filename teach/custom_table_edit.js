$(document).ready(function(){
	$('#data_table').Tabledit({
		deleteButton: false,
		editButton: false,
		columns: {
		  identifier: [0, 'id_nxenes'],
		  editable: [[2, 'n1'], [3, 'n2'], [4, 'n3'], [5, 'n4'], [6, 'n5'], [7, 'n6'], [8, 'n7'], [9, 'n8'], [10, 'n9'], [11, 'n10']]
		},
		hideIdentifier: true,
		url: 'live_edit.php'
	});
});
