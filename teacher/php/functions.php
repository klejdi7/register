<?php
      function mesues_lende(){
        require 'db.php';
        $id = $_SESSION['userid'];
        $result = $mysqli->query("SELECT * FROM mesues_lende WHERE id_mesues='$id'");
        $user = $result->fetch_assoc();
        $id_lende = $user['id_lende'];

        $lende = $mysqli->query("SELECT * from lende WHERE id_lende='$id_lende'");
        $echo_lende = $lende->fetch_assoc();

        echo $echo_lende['emri_lende'];
      }
 ?>

 <?php
 function msl(){
   require 'db.php';
   $id = $_SESSION['userid'];

   $sql = "SELECT * from lende WHERE id_lende='$id_lende'";
   $new = $mysqli->query($sql);

   if ($new->num_rows > 0) {
       // output data of each row
       while($row = $new->fetch_assoc()) {
           echo $row['emri_lende'];
       }
   }


}
 ?>

 <?php
      function vleresim_kujdestari(){
        $dsn = 'mysql:host=localhost;dbname=regjistri';
        $username = 'root';
        $password = '';

        try{
        		// connect to mysql
        		$pdo = new PDO($dsn,$username,$password);
        		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
        		echo 'Not Connected '.$ex->getMessage();
        }
         // Get the subject info
        $id = $_SESSION['userid'];
        $results = $pdo->prepare("SELECT * FROM mesues_lende WHERE id_mesues=?");
        $results->execute([$id]);
        $user = $results->fetch(PDO::FETCH_ASSOC);
        $id_lende = $user['id_lende'];
        // --------------------------------------------
        // Get the pupil info

        include('./owning.php');
        // $pupil = $pdo->prepare("SELECT id_nxenes FROM nxenes WHERE id_nxenes='$nxid'");
        // $pupil->execute();
        // $nx = $pupil->fetch(PDO::FETCH_ASSOC);
        // $id_nxenes = $nx['id_nxenes'];
        // echo $id_nxenes;
        // --------------------------------------------
        // Echo the grades
        $grades = $pdo->prepare("SELECT * FROM notat WHERE id_nxenes='$nxid'");
        $grades->execute();
        $grade = $grades->fetch(PDO::FETCH_ASSOC);
        $notax = $grade['note'];
        echo $notax;
        // ---------------------------------------------
      }
  ?>
