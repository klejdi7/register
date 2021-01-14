<?php
	$connect = new mysqli("localhost","root","","regjistri");
	if(!$connect) {
		die("Connection Failed:" . $connect->connect_error);
	}
	session_start();
	$user = $_SESSION['email'];
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
					<span>Mesuesit</span>
					<div class="logout">
						<a href="/logout.php">Logout</a>
					</div>
					<div class="navbar-1">
						<a href="./">Klasat</a>
						<a href="./planet.html">Planet Mesimore</a>
						<a href="./teachers.php">Mesuesit</a>
					</div>
					<form class="form-input-100" action="./teachers.php" method="post">
						<input class="input100" type="text" name="emer" placeholder="Emer">
						<br />
						<input class="input100" type="text" name="mbiemer" placeholder="Mbiemer">
						<br />
						<input class="login100-form-btn" type="submit" value="Kerko">
						<br />
						<a href="./add_teacher.php" class="login100-form-btn">Shto Mesues</a>
					</form>
					<?php
						$emer = $_POST['emer'];
						$mbiemer = $_POST['mbiemer'];
						$emer_mbiemer = $emer . " " . $mbiemer;
						$result = $connect->query("select email from staff where email = '$user'");
						if($result->num_rows == 1) {
							if ($emer and $mbiemer) {
								$result1 = $connect->query("select id_mesues,emer_mbiemer from staff where emer_mbiemer = '$emer_mbiemer' and kujdestari != '0'");
							} else if (!$emer and !$mbiemer) {
								$result1 = $connect->query("select id_mesues,emer_mbiemer from staff where kujdestari != '0'");
							}
							if($result1->num_rows > 0){
								echo "<table class='tbl-navigator'><tr><th>Emer Mbiemer</th><th>Veprime</th></tr>";
								while($row = $result1->fetch_assoc()) {
									$id_mesues = $row['id_mesues'];
									$emer_mbiemer = $row['emer_mbiemer'];


									echo "<tr><td>$emer_mbiemer</td>\n<td><a href='./show_teacher.php?id=$id_mesues'>Shfleto</a><a href='./remove_teacher.php?id=$id_mesues' class='rm_btn'>Hiq Mesues</a></td></tr>";
								}
								echo "</table>";
							} else if ($emer and $mbiemer and $result1->num_rows == 0){
								echo "<p class='no-match'>Kerkimi nuk pati rezultate</p>";
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
