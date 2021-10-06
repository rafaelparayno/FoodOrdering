<?php

require('./Database/DBController.php');
require('./Database/User.php');
require('./Database/Category.php');
require('./Database/Item.php');
require('./Database/Product.php');
require('./Database/Invoice.php');
require('./Database/SalesProduct.php');

$db = new DBController();

$users =  new User($db);
$category =  new Category($db);
$items = new Item($db);
$products = new Product($db);
$invoices = new Invoice($db);
$salesProduct = new SalesProduct($db);

if (isset($_POST['categoryid'])) {
    $catid = $_POST['categoryid'];

    $results = $products->getDatabyCatid($catid);

    echo json_encode($results);
}

if (isset($_POST['productid'])) {
    $pid = $_POST['productid'];

    $results = $products->getDatabyId($pid);

    echo json_encode($results);
}

if (isset($_POST['datasProces'])) {
    $datas = $_POST['datasProces'];
    $newdatas = json_encode($datas);

    $items = json_decode($newdatas, true);


    $results = $invoices->addinvoice($items['sales']);

    $newdatas2 = json_encode($items['insideCart']);

    $items2 = json_decode($newdatas2, true);
    $sql = "";
    foreach ($items2 as $item) {

        $sql .= "INSERT INTO sales_product (p_id,sales_qtry,subTotal,invoice_id) 
        VALUES ({$item['itemid']},{$item['qty']},{$item['totalPrice']},$results); ";
    }

    $salesProduct->multipleInsertData($sql);

    echo json_encode($results);
}
