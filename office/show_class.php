<?php
	$connect = new mysqli("localhost","root","","regjistri");
	if(!$connect) {
		die("Connection failed:" . $connect->connect_error);
	}
	session_start();
	$user = $_SESSION['email'];
	$class = $_GET['class'];
	$result2 = $connect->query("select email from staff where email = '$user'");
	if($result2->num_rows == 1) {
		$result3 = $connect->query("select Klasa from klasat where id_klasa = '$class'");
		if($result3->num_rows == 1) {
			while ($row1 = $result3->fetch_assoc()) {
				$Klasa = $row1['Klasa'];
			}
		}
	}
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="/css/util.css">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100-1">
				<div class="login100-form-title">
					<span>Klasa <?php echo $Klasa; ?></span>
					<div class="logout">
						<a href="/logout.php">Logout</a>
					</div>
					<div class="navbar-1">
						<a href="./">Klasat</a>
						<a href="./planet.html">Plani Mesimore</a>
						<a href="./teachers.php">Mesuesit</a>
					</div>
					<div>
					<?php
						$result = $connect->query("select email from staff where email = '$user'");
						if($result->num_rows == 1) {
							$result1 = $connect->query("select id_nxenes,emri_nxenes from nxenes where id_klase = '$class' order by emri_nxenes asc");
							if($result1->num_rows > 0) {
								echo "<table class='tbl-navigator'><tr><th>Emer Mbiemer</th><th>Veprime</th></tr>";
								while($row = $result1->fetch_assoc()) {
									$id_nxenes = $row['id_nxenes'];
									$emri_nxenes = $row['emri_nxenes'];

									echo "<tr>\n<td>$emri_nxenes</td>\n<td><a href='./deftesa.php?id=$id_nxenes'>Deftesa Prinder</a><a href='./remove_student.php?id=$id_nxenes' class='rm_btn'>Hiq nxenes</a></td>\n</tr>";
								}
								echo "</table>";
							}
						}
					?>	
				</div>
			</div>
		</div>
	</div>
	
	<script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="/vendor/bootstrap/js/popper.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="/vendor/select2/select2.min.js"></script>
        <script src="/vendor/tilt/tilt.jquery.min.js"></script>
        <script >
                $('.js-tilt').tilt({
                        scale: 1.1
                })
        </script>
        <script src="/js/main.js"></script>
</body>
</html>
