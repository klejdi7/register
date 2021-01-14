<?php

$array1 = array(
  // "id_lende", "lenda"
);


$student_id = $_GET['id_nxenes'];

$sqli = "SELECT * FROM nxenes WHERE id_nxenes = '$student_id'";
$stmt = $pdo->prepare($sqli);
$stmt->execute();
$nxenes = $stmt->fetch(PDO::FETCH_ASSOC);
$id_klase = $nxenes['id_klase'];
$viti = $nxenes['viti'];

$sqli = "SELECT klasa, id_dega FROM klase WHERE klasa = '$id_klase'";
$stmt = $pdo->prepare($sqli);
$stmt->execute();
$kl = $stmt->fetch(PDO::FETCH_ASSOC);
$kl_deg = $kl['id_dega'];

$stmt = $pdo->prepare("SELECT DISTINCT id_lende FROM lende_dege WHERE id_dege = '$kl_deg' AND viti = '$viti'");
$stmt->execute();
$subject_id = $stmt->fetchAll();


$stmt = $pdo->prepare('SELECT * FROM lende');
$stmt->execute();
$sub = $stmt->fetchAll();


$stmt = $pdo->prepare('SELECT * FROM grades');
$stmt->execute();
$grades = $stmt->fetchAll();

foreach($subject_id as $row){
  foreach($sub as $subject){
  if($subject['id_lende'] == $row['id_lende']){
    // $array1 = array_merge($array1, array_map('trim', explode(",", $subject['emri_lende'])));
    // $array1 = array(
    //   "id_lende" => $row['id_lende'],
    //   "lenda" => $subject['emri_lende']
    // );
    // $array1['id_lende'] = $row['id_lende'];
    // $array1['lenda'] = $subject['emri_lende'];
    array_push($array1 , $subject['emri_lende']);



    // $v=array("id_lende" => $row['id_lende'],"lenda" => $subject['emri_lende']);
  // array_merge($array1 ,$v);
}}}

// $stmt = $pdo->prepare("SELECT * FROM notat AS n INNER JOIN lende AS l ON n.id_lende = l.id_lende WHERE n.id_nxenes = '$student_id';");
// $stmt->execute();
// $su = $stmt->fetchAll();

// $nots = $conn->query("SELECT * FROM notat AS n INNER JOIN lende AS l ON n.id_lende = l.id_lende WHERE n.id_nxenes = '$student_id';");

// foreach($subject_id as $sub_id)
// foreach($sub as $subject)
// {
//   if($subject['id_lende'] == $sub_id['id_lende']){
//   echo $subject['id_lende'];
//   echo $subject['emri_lende'];
// }
// }

?>
