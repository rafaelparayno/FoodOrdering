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
