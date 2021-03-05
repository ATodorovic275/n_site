<?php

session_start();

$id = $_POST['id'];
$kolicina = 1;
// var_dump($_SESSION);
// echo empty($_SESSION['cart']);

if (empty($_SESSION['cart'])) {
    //prvi element 
    // echo 'Ubacivanje prvog clana';

    $_SESSION['cart'] = array(0 => array('id' => $id, 'kolicina' => $kolicina));
} else {
    $status = false;
    foreach ($_SESSION['cart'] as $key => $el) {
        // var_dump($el['id']);
        // $addNew = array('id' => 2, 'kolicina' => 1);
        // var_dump($addNew['id']);
        if ($el['id'] === $id) {
            // echo "IF ";

            // echo 'Ima';
            // $el['kolicina'] += 1;

            // var_dump($_SESSION['cart'][$key]['kolicina']);
            // var_dump($el);
            $_SESSION['cart'][$key]['kolicina'] += 1;
            // array_push($_SESSION['cart'], $el);
            $status = true;
            break;
        }
        //  else {
        //     echo "ELSE ";

        //     //novi sa kol 1

        // }
    }
    if ($status) {
        $status = false;
    } else {
        $addNew2 = array('id' => $id, 'kolicina' => $kolicina);
        array_push($_SESSION['cart'], $addNew2);
    }
}


echo json_encode($_SESSION['cart']);
// session_destroy();
