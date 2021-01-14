<?php
include_once("db_connect.php");
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
<?php
?>
<title>Mirsevini ne Portal | <?php echo $emer_mbiemer; ?></title>
<script type="text/javascript" src="dist/jquery.tabledit.js"></script>
<?php include('container.php');?>
<div class="container home">
	<h2></h2>
	<table id="data_table" class="table table-striped pure-table ">
		<thead>
			<tr>

				<tr>
					<th>Id Nxenes</th>
					<th>Emri</th>
					<th>N1</th>
					<th>N2</th>
					<th>N3</th>
					<th>N4</th>
					<th>N5</th>
					<th>N6</th>
					<th>N7</th>
					<th>N8</th>
					<th>N9</th>
					<th>N10</th>
					<th>Note Provimi</th>
					<th>Note Projekt</th>
					<th>Mungesa</th>
					<th>Mungesa Total</th>
					<th> Opsione </th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Id Nxenes</th>
					<th>Emri</th>
					<th>N1</th>
					<th>N2</th>
					<th>N3</th>
					<th>N4</th>
					<th>N5</th>
					<th>N6</th>
					<th>N7</th>
					<th>N8</th>
					<th>N9</th>
					<th>N10</th>
					<th>Note Provimi</th>
					<th>Note Projekt</th>
					<th>Mungesa</th>
					<th>Mungesa Total</th>
					<th> Opsione </th>

				</tr>
			</tfoot>
		<tbody>
			<?php
			$sql_query = "SELECT * FROM notat LIMIT 10";
			$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
			while( $developer = mysqli_fetch_assoc($resultset) ) {
			?>
			<tr id="<?php echo $developer['id_nxenes']; ?> ">
										<td> <?php echo $developer['id_nxenes']; ?> </td>
										<td> <?php echo $developer['emri_nxenes'] ?> </td>
													<!-- <td><input type="text" name="n1" id="grading"></td> -->
								     <td><?php echo $developer['n1'] ?> </td>
										 <td><?php echo $developer['n2'] ?> </td>
										 <td><?php echo $developer['n3'] ?> </td>
										 <td><?php echo $developer['n4'] ?> </td>
										 <td><?php echo $developer['n5'] ?> </td>
										 <td><?php echo $developer['n6'] ?> </td>
										 <td><?php echo $developer['n7'] ?> </td>
										 <td><?php echo $developer['n8'] ?> </td>
										 <td><?php echo $developer['n9'] ?> </td>
										 <td><?php echo $developer['n10'] ?> </td>
										 <td> </td>
										 <td> </td>
										 <td> </td>
										 <td> </td>
										 <td> <a class="btn btn-primary" name="option" href="http://localhost/regjistri/nxenes/<?php echo $developer['id_nxenes']?>"> <i class="fas fa-info-circle fa-1x"></i> <input type='hidden' name='selectedName' value="<?php echo $developer['id_nxenes'] ?> "> </a></td>

												</tr>
			<?php } ?>
		</tbody>
    </table>
	<!-- <div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/create-live-editable-table-with-jquery-php-and-mysql/">Back to Tutorial</a>
	</div> -->
</div>
<script type="text/javascript" src="custom_table_edit.js"></script>

<?php include('footer.php');?>
