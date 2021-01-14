<?php
require 'php/db.php';
require 'php/functions.php';
if (isset($_POST['vlereso']) && $_POST['idnx'] != "" && $_POST['nota'] != ""){
require 'php/grade.php';

}

	session_start();

	if(isset($_SESSION['username']) == !true) {
		header("location: ../index.php");

	}

	$user = $_SESSION['email'];
	$result = $mysqli->query("SELECT `emri_mesues` from mesues Where email = '$user'");
        if ($result->num_rows == 1) {
                while($row = $result->fetch_assoc()) {
                        $emer_mbiemer = $row['emri_mesues'];
                }
        }

  function klasa_kujdestare(){
    require 'php/db.php';
      $user = $_SESSION['email'];
    	$result = $mysqli->query("SELECT `kujdestari` from mesues Where email = '$user'");
            if ($result->num_rows == 1) {
                    while($row = $result->fetch_assoc()) {
                            echo $kujdestari = $row['kujdestari'];
                    }
            }
             }
?>
<?php

$dsn = 'mysql:host=localhost;dbname=regjistri';
$username = 'root';
$password = '';

try{
		// connect to mysql
		$con = new PDO($dsn,$username,$password);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
		echo 'Not Connected '.$ex->getMessage();
}
$stmt = $con->prepare("SELECT id_nxenes, emri_nxenes FROM `nxenes` LIMIT 20")or die(mysql_error()) ;
$stmt->execute();
$nxenes = $stmt->fetchAll();

			?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Klasa Kujdestare | <?php echo $emer_mbiemer; ?></title>
	<script type="text/javascript" src="dist/jquery.tabledit.js"></script>
<script type="text/javascript" src="custom_table_edit.js"></script>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<!-- Page level plugin CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

	<link href="css/pure.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/pop-up.css">
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Navigation</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Klasa</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
           <!-- require 'php/klasat.php';  -->
          <h6 class="dropdown-header">Klasat:  </h6>
          <!-- if ($result->num_rows == 0) { -->
           <a class="dropdown-item" href="../manage/shto_klase.php">- - -</a>
          <!--<a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a> -->

           <!-- if ($result->num_rows > 0) {?> -->
             <!-- foreach($klase as $klasa):    -->
         <!-- endforeach -->
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="owning.php">
          <i class="fas fa-users-class"></i>
          <span>Klasa Kujdestare</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mungesa.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Mungesa</span></a>
      </li>
    </ul>


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Klasa Kujdestare / <?php klasa_kujdestare(); ?></li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Klasa Kujdestare </div>
						<!-- <select name="lenda">
									<option value</option>
								</select> -->
          <div class="card-body">
            <div class="table-responsive">
							<h3> Veprime: </h3><button class="button-success pure-button"  value="Vlereso" style="margin: 0px 0px 10px 0px; background:  #66ff66
;">Vlereso</button><button class="button-success pure-button" value="Vlereso" style="margin: 0px 0px 10px 0px; background:  blue; margin-left: 15px;">Modifiko</button>
<div class="form-popup" id="myForm">

  <form method="post" class="form-container">
    <h1>Vlereso Nxenes</h1>

    <label for="idnx"><b>ID e nxenesit</b></label>
    <input type="text" placeholder="Jep nr ID e nxenesit" name="idnx" required>

    <label for="Lenda"><b>Lenda</b></label>
		<select name="lenda">
			<option value="C++">C++</option>
</select>

<label for="nota"><b>Vleresimi</b></label>
<input type="text" placeholder="Vleresimi per nxenesin" name="nota" required>

    <button type="submit" class="btn" name="vlereso">Vlereso</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Mbyll</button>
  </form>
</div>
<table class="table table-striped" width="100%" cellspacing="0">
	<thead>
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
		</tr>
	</tfoot>
	<tbody>
		<?php
$sql_query = "SELECT * FROM notat LIMIT 15";
$resultset = mysqli_query($mysqli, $sql_query) or die("database error:". mysqli_error($mysqli));
while( $nxs = mysqli_fetch_assoc($resultset) ) {
?>
<tr id="<?php echo $nxs['id_nxenes']; ?> ">
<td> <?php echo $nxs['id_nxenes']; ?> </td>
	<td> <?php echo $nxs['emri_nxenes'] ?> </td>
			 <!-- <td><input type="text" name="n1" id="grading"></td> -->
			 <td style="cursor: pointer;"> <?php echo $nxs['note'] ?> </td>
			<td><input type="text" name="n2" id="grading"></td>
			<td><input type="text" name="n3" id="grading"></td>
			<td><input type="text" name="n4" id="grading"></td>
			<td><input type="text" name="n5" id="grading"></td>
			<td><input type="text" name="n6" id="grading"></td>
			<td><input type="text" name="n7" id="grading"></td>
			<td><input type="text" name="n8" id="grading"></td>
			<td><input type="text" name="n9" id="grading"></td>
			<td><input type="text" name="n10"id="grading"></td>
			 <td></td>
			<td></td>
			<th></td>
			<th></td>

		</tr>
	</tbody>
<?php } ?>
</table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->


      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Regjistri Informatizuar 2020</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
