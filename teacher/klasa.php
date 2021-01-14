<?php
require 'php/db.php';
	session_start();

	$user = $_SESSION['email'];
	$result = $mysqli->query("SELECT `emri_mesues` from mesues Where email = '$user'");
        if ($result->num_rows == 1) {
                while($row = $result->fetch_assoc()) {
                        $emer_mbiemer = $row['emri_mesues'];
                }
        }

?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
				<link rel="stylesheet" type="text/css" href="css/klasa.css">
        <?php include './css/css.html'; ?>
			</head>
<body>
  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title">
					<h3 style="margin: 20px 10px;">Mirsevini ne Portal, <?php echo $emer_mbiemer; ?></h3>
					<div class="navbar">
            
