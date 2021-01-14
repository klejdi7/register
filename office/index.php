<?php
        $connect = new mysqli("localhost","root","","regjistri");
        if(!$connect) {
                die("Connection Failed:" . $connect->connect_error);
        }
        session_start();
        $user = $_SESSION['email'];
        $result = $connect->query("select emer_mbiemer from staff where email = '$user'");
        if ($result->num_rows == 1) {
                while($row = $result->fetch_assoc()) {
                        $emer_mbiemer = $row['emer_mbiemer'];
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
					<span>Mirsevini ne Portal, <?php echo $emer_mbiemer; ?></span>
					<div class="logout">
						<a href="/logout.php">Logout</a>
					</div>
					<div class="navbar-1">
						<a href="./">Klasat</a>
						<a href="./planet.html">Plani Mesimore</a>
						<a href="./teachers.php">Mesuesit</a>
					</div>
					<div class="navbar-1">
						<a href="./add_class.php">Shto Klase</a>
						<a href="./remove_class.php">Hiq Klase</a>
					</div>
					<table class="tbl-navigator">
						<tr>
							<th>Viti I</th>
							<?php
								$result1 = $connect->query("select Klasa,id_klasa from klasat where Klasa like '%1-%' order by id_klasa asc");
								if ($result1->num_rows > 0) {
									while($row1 = $result1->fetch_assoc()) {
										$id_klasa1 = $row1['id_klasa'];
										$Klasa1 = $row1['Klasa'];

										echo "<td><a href='./show_class.php?class=$id_klasa1'>$Klasa1</a></td>\n";
									}
								}
							?>
						</tr>
						<tr>
							<th>Viti II</th>
							<?php
								$result2 = $connect->query("select Klasa,id_klasa from klasat where Klasa like '%2-%' order by id_klasa asc");
								if ($result2->num_rows > 0) {
									while($row2 = $result2->fetch_assoc()) {
										$id_klasa2 = $row2['id_klasa'];
										$Klasa2 = $row2['Klasa'];

										echo "<td><a href='./show_class.php?class=$id_klasa2'>$Klasa2</a></td>\n";
									}
								}
							?>
						</tr>
						<tr>
							<th>Viti III</th>
							<?php
								$result3 = $connect->query("select Klasa,id_klasa from klasat where Klasa like '%3-%' order by id_klasa asc");
								if ($result3->num_rows > 0) {
									while($row3 = $result3->fetch_assoc()) {
										$id_klasa3 = $row3['id_klasa'];
										$Klasa3 = $row3['Klasa'];

										echo "<td><a href='./show_class.php?class=$id_klasa3'>$Klasa3</a></td>\n";
									}
								}
							?>
						</tr>
						<tr>
							<th>Viti IV</th>
							<?php
								$result4 = $connect->query("select Klasa,id_klasa from klasat where Klasa like '%4-%' order by id_klasa asc");
								if ($result4->num_rows > 0) {
									while($row4 = $result4->fetch_assoc()) {
										$id_klasa4 = $row4['id_klasa'];
										$Klasa4 = $row4['Klasa'];

										echo "<td><a href='./show_class.php?class=$id_klasa4'>$Klasa4</a></td>\n";
									}
								}
							?>
						</tr>
					</table>
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
<?php
	$connect->close();
?>
