<?php

require('./Database/DBController.php');
require('./Database/User.php');
require('./Database/Category.php');


$db = new DBController();

$users =  new User($db);
$category =  new Category($db);
