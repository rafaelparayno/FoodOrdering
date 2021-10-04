<?php

require('./Database/DBController.php');
require('./Database/User.php');
require('./Database/Category.php');
require('./Database/Item.php');

$db = new DBController();

$users =  new User($db);
$category =  new Category($db);
$items = new Item($db);
