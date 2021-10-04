<?php

include('./functions.php');

$id = $_GET['id'];

$categoryList = $category->deleteCategory($id);


echo "<script>window.location='/FoodOrdering/system/categories.php';</script>";
