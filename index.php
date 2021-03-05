<?php

include "connection.php";

$idKorisnika = 2; //sesija korisnik

$ankete_query = "SELECT * FROM anketa where aktivna = 1"; //WHERE aktivna = 1
$statment = $conn->query($ankete_query);
$anketa = $statment->fetch();
// var_dump($ankete);



// var_dump($odgovori);

$daLiJeGlasao_query = "SELECT users.username FROM `odgovor_user` INNER JOIN users ON odgovor_user.user_id = users.id INNER JOIN odgovor ON odgovor_user.odgovor_id = odgovor.id INNER JOIN anketa ON odgovor.anketa_id = anketa.id WHERE users.id = $idKorisnika AND anketa.id = $anketa->id";
$statment = $conn->query($daLiJeGlasao_query);
$daLiJeGlasao = $statment->fetch();
// var_dump($daLiJeGlasao);

if (!$daLiJeGlasao) {
    $odgovori_query = "SELECT odgovor.odgovor FROM `odgovor` INNER JOIN anketa ON odgovor.anketa_id = anketa.id where anketa.id = $anketa->id";
    $statment = $conn->query($odgovori_query);
    $odgovori = $statment->fetchAll();

    echo '<h2>' . $anketa->pitanje . '</h2>';
    foreach ($odgovori as $odgovor) {
        echo '<p>' . $odgovor->odgovor . '</p>';
    }
} else {
    // echo $daLiJeGlasao->username . " je glasao...";
    // REZULTATI ANKETE

    $rezultatiAnkete_query = "SELECT anketa.pitanje, odgovor.odgovor, COUNT(odgovor) as glasovi FROM odgovor_user INNER JOIN odgovor on odgovor_user.odgovor_id = odgovor.id INNER JOIN anketa ON odgovor.anketa_id = anketa.id WHERE anketa.id = $anketa->id GROUP BY odgovor";
    $statment = $conn->query($rezultatiAnkete_query);
    $rezultatiAnkete = $statment->fetchAll();
    // var_dump($rezultatiAnkete);

    echo '<h2>' . $anketa->pitanje . '</h2>';
    foreach ($rezultatiAnkete as $rezultat) {
        echo '<p>' . $rezultat->odgovor . '</p>';
        echo '<p>' . $rezultat->glasovi . '</p>';
    }
}
