<?php
include_once("php/db.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
	$update_field='';
	if(isset($input['emri_nxenes'])) {
		$update_field.= "emri_nxenes='".$input['emri_nxenes']."'";
	} else if(isset($input['vendlindje'])) {
		$update_field.= "vendlindje='".$input['vendlindje']."'";
	}

	if($update_field && $input['id_nxenes']) {
		$sql_query = "UPDATE nxenes SET $update_field WHERE id_nxenes='" . $input['id_nxenes'] . "'";
		mysqli_query($mysqli, $sql_query) or die("database error:". mysqli_error($conn));
	}
}
