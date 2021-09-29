<?php

require('./system/Database/DBController.php');
require('./system/Database/User.php');


$db = new DBController();


// print_r($personalData->getData());
$users =  new User($db);


/* Set the mail sender. */
// $mail->smtpConnect($config);
