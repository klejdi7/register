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
$stmt = $con->prepare("SELECT * FROM mes_kla");
$stmt->execute();
$klase = $stmt->fetchAll();

// foreach($klase['emri_mesues'] == $_SESSION['emri_mesues']){
// echo $klase['id_klase'];
// }
?>

<?php
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'regjistri';
  $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

  $sql = "SELECT * from mes_kla";
$result = $mysqli->query($sql);

// if ($result->num_rows == 0) {
//         echo "Fff";
//     }

?>
