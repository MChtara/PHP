<?php
include '../Controller/filmC.php';
$filmC = new filmC();
$filmC->deleteFilm($_GET["id_film"]);
header('Location:list_film.php');
