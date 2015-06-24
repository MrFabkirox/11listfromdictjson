<?php
// Un système très simple (et un peu idiot) pour proposer une liste de mots.
// normalement, on utiliserait une base de données.



if (! isset($_REQUEST['debut'])) exit(0) ;

$debut=$_REQUEST['debut'];

error_log("RECHERCHE " . $debut);

if (strlen($debut) < 2) {
  exit(0);
}

$lignes= file("liste.txt");

$rep= array();
foreach ($lignes as $mot) {
  $mot=trim($mot);
  $len= strlen($debut);
  if (substr($mot, 0, $len) === $debut) {
    $rep[]= $mot;
  }
}

header('content-type: application/json; charset=utf-8');
echo json_encode($rep);

