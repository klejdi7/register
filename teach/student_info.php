<?php
require 'php/con.php';
include_once("db_connect.php");
require 'php/student_grades.php';

include("header.php");

session_start();
if(isset($_SESSION['username']) == !true) {
	header("location: ../index.php");

}

$user = $_SESSION['email'];
$result = $conn->query("SELECT `emri_mesues` from mesues Where email = '$user'");
			if ($result->num_rows == 1) {
							while($row = $result->fetch_assoc()) {
											$emer_mbiemer = $row['emri_mesues'];
							}
			}
?>

<title>Mirsevini ne Portal | <?php echo $emer_mbiemer; ?></title>
</head>
<?php include('container.php');?>
<div class="container home">
	<style>
	table {
 	font-size: 19px;
	}
	</style>
	<table class="table">

	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
				<?php foreach($array1 as $subjec): $sno = 1;?>

	      <th scope="col"> <?php echo $subjec[2] ?></th>
			<?php endforeach ?>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <th scope="row">1</th>
					<td scope="col">1</td>
				<td scope="col">-</td>
	    </tr>

	  </tbody>
	</table>
	<?php
	print_r($array1);
	?>
