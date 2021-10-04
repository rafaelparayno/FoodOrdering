<?php
include('./Templates/Header.php');
include('./Templates/Navigation.php');
include('./functions.php');

$itemlists = $items->getData();


if (isset($_POST['submitItem'])) {


    $name = $_POST['itemname'];
    $unit = $_POST['unitmeasure'];


    $items->addItemList($name, $unit);


    echo "<script>window.location='/FoodOrdering/system/inventory.php';</script>";
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
                <a href="./inventory.php" class="topnav-link">Inventory</a>
            </li>

            <li class="nav-item">

            </li>
        </ul>
        <div class="logout_button">
            <a href="./logout.php">Logout</a>
        </div>

    </div>
    <h1>Inventory</h1>
    <div class="content">

        <div class="Actions_button">
            <button id="btnOpenModal" class="btn btn-md btn-success mr-2">New Item</button>
        </div>
        <table id="table_id">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Unit Measurement</th>
                    <th>Stocks</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php array_map(function ($itemss) { ?>
                    <tr>
                        <td><?= $itemss['i_id'] ?></td>
                        <td><?= $itemss['itemname'] ?></td>
                        <td><?= $itemss['unit'] ?></td>
                        <td><?= $itemss['stock'] ?></td>
                        <td>

                            <a href="editCategory.php?id=<?= $itemss['i_id'] ?>">edit</a>
                            <a href="deleteCategory.php?id=<?= $itemss['i_id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }, $itemlists) ?>

            </tbody>
        </table>
    </div>
</main>

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Add Item Inventory</h2>
        </div>
        <div class="modal-body">
            <form method="POST">
                <div class="form-group">
                    <label for="itemname">Item Name: </label>
                    <input type="text" name="itemname" id="itemname" />

                    <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                </div>
                <div class="form-group">
                    <label for="unitmeasure">Unit Measurement: </label>
                    <select name="unitmeasure" id="unitmeasure">
                        <option value="kg">Kg</option>
                        <option value="Liters">Liters</option>
                        <option value="Piece">per piece</option>
                        <option value="box">per Box</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button name="submitItem" type="submit">Save</button>
                </div>
            </form>
        </div>

    </div>

</div>

<?php

include('./Templates/Footer.php');
?>