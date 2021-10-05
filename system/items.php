<?php
include('./Templates/Header.php');
include('./Templates/Navigation.php');

include('./functions.php');

$categoryList = $category->getData();
$itemlists = $items->getData();
$productList = $products->getData();

if (isset($_POST['submitProduct'])) {

    $name = $_POST['productName'];
    $cat = $_POST['category'];
    $price = $_POST['price'];


    $products->addproducts($name, $cat, $price);



    echo "<script>window.location='/FoodOrdering/system/items.php';</script>";
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
                <a href="inventory.php" class="topnav-link">Inventory</a>
            </li>

            <li class="nav-item">

            </li>
        </ul>
        <div class="logout_button">
            <a href="./logout.php">Logout</a>
        </div>

    </div>
    <h1>Products</h1>
    <div class="content">

        <div class="Actions_button">
            <button id="btnOpenModal" class="btn btn-md btn-success mr-2">Add Product</button>
        </div>
        <table id="table_id">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php array_map(function ($prod) { ?>
                    <tr>
                        <td><?= $prod['p_id'] ?></td>
                        <td><?= $prod['productname'] ?></td>
                        <td><?= $prod['categoryname'] ?></td>
                        <td><?= $prod['price'] ?></td>
                        <td>

                            <a href="editCategory.php?id=<?= $prod['p_id'] ?>">edit</a>
                            <a href="deleteCategory.php?id=<?= $prod['p_id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }, $productList) ?>

            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>New Product</h2>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="productName">Item Name: </label>
                        <input type="text" name="productName" id="productName" />

                        <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                    </div>
                    <div class="form-group">
                        <label for="category">Category </label>
                        <select class="select2_example selectex" name="category" id="category">
                            <?php array_map(function ($cat) { ?>

                                <option value="<?= $cat['c_id'] ?>"><?= $cat['categoryname'] ?></option>
                            <?php }, $categoryList) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price: </label>
                        <input class="numbers" value="" type="text" name="price" id="price" />

                        <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                    </div>

                    <div class="form-group">
                        <label for="itemInventory">Item Inventory </label>
                        <select class="select2_example selectex" name="itemInventory" id="itemInventory" multiple="multiple">

                            <?php array_map(function ($itemss) { ?>

                                <option value="<?= $itemss['i_id'] ?>"><?= $itemss['itemname'] ?></option>
                            <?php }, $itemlists) ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button name="submitProduct" type="submit">Save</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</main>

<?php

include('./Templates/Footer.php');
?>