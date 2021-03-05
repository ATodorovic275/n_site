<?php

session_start();
header("Content-Type:appication/json");

$id = $_POST['id'];
$kolicina = 1;

if (empty($_SESSION['cart'])) {
    //prvi element 
    // echo 'Ubacivanje prvog clana';

    $_SESSION['cart'] = array(0 => array('id' => $id, 'kolicina' => $kolicina));
} else {
    $status = false;
    foreach ($_SESSION['cart'] as $key => $el) {
        if ($el['id'] === $id) {
            // echo "IF ";

            $_SESSION['cart'][$key]['kolicina'] += 1;

            $status = true;
            break;
        }
    }
    if ($status) {
        $status = false;
    } else {
        $addNew2 = array('id' => $id, 'kolicina' => $kolicina);
        array_push($_SESSION['cart'], $addNew2);
    }
}




$nizSaObjektima = $_SESSION['cart'];
// var_dump($nizSaObjektima);
$func = function ($product) {
    // var_dump($product);
    return $product['id'];
};
$nizIds = array_map($func, $nizSaObjektima);
// var_dump($nizIds);
$stringIds = implode(',', $nizIds);
var_dump($stringIds);

// echo json_encode($_SESSION['cart']);
// session_destroy();
