<?php
	$connect = new mysqli("localhost","root","","regjistri");
	if(!$connect) {
		die("Connection failed:" . $connect->connect_error);
	}
	session_start();
	$user = $_SESSION['email'];

	$klasa = $_POST['klasa'];
	if($klasa) {
		$resultinput = $connect->query("delete from klasat where ID = '$klasa'");
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
					<span>Hiq Klase</span>
					<div class="logout">
						<a href="/logout.php">Logout</a>
					</div>
					<div class="navbar-1">
						<a href="./">Klasat</a>
						<a href="./planet.html">Plani Mesimore</a>
						<a href="./teachers.php">Mesuesit</a>
					</div>
					<form class="form-selector-container" action="./remove_class.php" method="post">
						<div class="selector-container">
							<p>Klasa:</p>
							<select class="selector" name="klasa">
								<?php
									$result = $connect->query("select email from staff where email = '$user'");
									if($result->num_rows == 1) {
										$result1 = $connect->query("select Klasa,ID from klasat order by ID asc");
										if($result1->num_rows > 0) {
											while($row = $result1->fetch_assoc()) {
												$Klasa = $row['Klasa'];
												$ID = $row['ID'];

												echo "<option value='$ID'>$Klasa</option>\n";
											}
										}
									}
								?>
							</select>
							<br />
						</div>
						<input type="submit" class="login100-form-btn-red" value="Hiq klasen">
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
