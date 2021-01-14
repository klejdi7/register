 <?php
	$email = $mysqli->escape_string($_POST['email']);
  $password = $mysqli->escape_string($_POST['pass']);
  $query = "SELECT * FROM mesues WHERE email='$email' AND password='$password'";
  $results = mysqli_query($mysqli, $query);

			if (mysqli_num_rows($results) == 1) {
$user = $results->fetch_assoc();
				$_SESSION['email'] = $email;
        $_SESSION['username'] = $user['emri_mesues'];
        $_SESSION['kujdestari'] = $user['kujdestari'];
        $_SESSION['userid'] = $user['id_mesues'];
         header("location: teacher/index.php");
       	}
			else {
				echo "Wrong email/password combination";
			}

?>
