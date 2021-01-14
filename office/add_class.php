<?php
	$connect = new mysqli("localhost","root","","regjistri");
	if(!$connect){
		die("Connection failed:" . $connect->connect_error);
	}
	session_start();
	$user = $_SESSION['email'];
	
	$viti = $_POST['viti'];
	$sez = $_POST['sez'];
	$dega = $_POST['dega'];
	$id_klasa = $viti . $sez;
	$klasa = $viti . "-" . $sez;
	if($viti and $sez and $dega) {
		$resultinput = $connect->query("insert into klasat(ID, Klasa, Dega, id_klasa) VALUES (NULL, '$klasa', '$dega', '$id_klasa')");
		if($resultinput) {
			$Response = "<font color=#00FF00>U krye!!</font>";
		} else {
			$Response = "<font color=#FF0000>Nuk u krye!</font>";
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
					<span>Shto Klase</span>
					<div class="logout">
						<a href="/logout.php">Logout</a>
					</div>
					<div class="navbar-1">
						<a href="./">Klasat</a>
						<a href="./planet.html">Plani Mesimore</a>
						<a href="./teachers.php">Mesuesit</a>
					</div>
					<form class="form-selector-container" action="./add_class.php" method="post">
						<div class="selector-container">
							<p>Klasa:</p>
							<select name="viti"class="selector">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
							<p>-</p>
							<input type="number" name="sez" min="1" value="1">
						</div>
						<div class="selector-container">
							<p>Dega:</p>
							<select name="dega" class="selector">
								<?php
									$result = $connect->query("select email from staff where email = '$user'");
									if($result->num_rows == 1){
										$result1 = $connect->query("select * from dega order by id_dega desc");
										if($result1->num_rows > 0) {
											while($row = $result1->fetch_assoc()) {
												$id_dega = $row['id_dega'];
												$emri_dega = $row['emri_dega'];

												echo "<option value='$id_dega'>$emri_dega</option>\n";
											}
										}
									}
								?>
							</select>
						</div>
						<input type="submit" value="Shto klasen" class="login100-form-btn">
						<p><?php echo $Response; ?></p>
					</form>
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
