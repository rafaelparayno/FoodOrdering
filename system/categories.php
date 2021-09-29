<?php
include('./Templates/Header.php');
include('./Templates/Navigation.php');
include('./functions.php');

$categoryList = $category->getData();


if (isset($_POST['submitCategory'])) {

    $name = $_POST['categoryname'];

    $category->addCategory($name);


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
                <a href="#" class="topnav-link">Items</a>
            </li>

            <li class="nav-item">

            </li>
        </ul>
        <div class="logout_button">
            <a href="./logout.php">Logout</a>
        </div>

    </div>
    <h1>Categories</h1>
    <div class="content">

        <div class="Actions_button">
            <button id="btnOpenModal" class="btn btn-md btn-success mr-2">Add Category</button>
        </div>
        <table id="table_id">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                </tr>
            </thead>
            <tbody>
                <?php array_map(function ($categories) { ?>
                    <tr>
                        <td><?= $categories['c_id'] ?></td>
                        <td><?= $categories['categoryname'] ?></td>
                        <td>

                            edit
                        </td>
                    </tr>
                <?php }, $categoryList) ?>

            </tbody>
        </table>
    </div>
</main>

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Add Category</h2>
        </div>
        <div class="modal-body">
            <form method="post">
                <div class="form-group">
                    <label for="categoryname">Category Name: </label>
                    <input type="text" name="categoryname" id="categoryname" />

                    <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                </div>

                <div class="modal-footer">
                    <button name="submitCategory" type="submit">Save</button>
                </div>
            </form>
        </div>

    </div>

</div>

<?php

include('./Templates/Footer.php');
?>