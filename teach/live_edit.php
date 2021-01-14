<?php
include_once("db_connect.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
	$update_field='';
	if(isset($input['n1'])) {
		$update_field.= "n1='".$input['n1']."'";
	}
	else if(isset($input['n2'])) {
		$update_field.= "n2='".$input['n2']."'";
	}

	else if(isset($input['n3'])) {
		$update_field.= "n3='".$input['n3']."'";
	}
	else if(isset($input['n4'])) {
			$update_field.= "n4='".$input['n4']."'";
		}
		else if(isset($input['n5'])) {
				$update_field.= "n5='".$input['n5']."'";
			}
			else if(isset($input['n6'])) {
					$update_field.= "n6='".$input['n6']."'";
				}
				else if(isset($input['n7'])) {
						$update_field.= "n7='".$input['n7']."'";
					}
					else if(isset($input['n8'])) {
							$update_field.= "n8='".$input['n8']."'";
						}
						else if(isset($input['n9'])) {
								$update_field.= "n9='".$input['n9']."'";
							}
							else if(isset($input['n10'])) {
									$update_field.= "n10='".$input['n10']."'";
								}

	if($update_field && $input['id_nxenes']) {
		$sql_query = "UPDATE notat SET $update_field WHERE id_nxenes='" . $input['id_nxenes'] . "'";
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
	}
}
