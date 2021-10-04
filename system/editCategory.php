<?php
include('./Templates/Header.php');
include('./Templates/Navigation.php');
include('./functions.php');

$id = $_GET['id'];

$categoryList = $category->getDatabyId($id);


if (isset($_POST['submitCategory'])) {

    $name = $_POST['categoryname'];

    $category->editCategory($id, $name);


    echo "<script>window.location='/FoodOrdering/system/categories.php';</script>";
}

?>
<main>

    <div class="top_navigation">
        <ul class="top_nav_item">
            <li class="nav-item">
                <a href="./items.php" class="topnav-link">Products</a>
            </li>
            <li class="nav-item">
                <a href="./categories.php" class="topnav-link">Categories</a>
            </li>
            <li class="nav-item">
                <a href="./Inventory.php" class="topnav-link">Inventory</a>
            </li>

            <li class="nav-item">

            </li>
        </ul>
        <div class="logout_button">
            <a href="./logout.php">Logout</a>
        </div>

    </div>
    <h1>Edit Categories</h1>
    <div class="content">
        <form method="post">
            <div class="form-group">
                <label for="categoryname">Category Name: </label>
                <input type="hidden" name="cid" value="<?= $categoryList['c_id'] ?>" />
                <input type="text" name="categoryname" id="categoryname" value="<?= $categoryList['categoryname'] ?>" />

                <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
            </div>

            <div class="modal-footer">
                <button name="submitCategory" type="submit">Save</button>
            </div>
        </form>
    </div>
</main>

<?php

include('./Templates/Footer.php');
?>