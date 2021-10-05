<?php

require('./Database/DBController.php');
require('./Database/User.php');
require('./Database/Category.php');
require('./Database/Item.php');
require('./Database/Product.php');

$db = new DBController();

$users =  new User($db);
$category =  new Category($db);
$items = new Item($db);
$products = new Product($db);

if (isset($_POST['categoryid'])) {
    $catid = $_POST['categoryid'];

    $results = $products->getDatabyCatid($catid);

    echo json_encode($results);
}
