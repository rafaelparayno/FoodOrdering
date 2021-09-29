<?php
include('./Templates/Header.php');
include('./Templates/Navigation.php');
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
                <a class="topnav-link">Items</a>
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
                <!-- <tr>
                <td>data-1a</td>
                <td>data-1b</td>
                <td>data-1c</td>
            </tr>
            <tr>
                <td>data-2a</td>
                <td>data-2b</td>
                <td>data-2c</td>
            </tr>
            <tr>
                <td>data-3a</td>
                <td>data-3b</td>
                <td>data-3c</td>
            </tr>
            <tr>
                <td>data-4a</td>
                <td>data-4b</td>
                <td>data-4c</td>
            </tr> -->

            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Modal Header</h2>
            </div>
            <div class="modal-body">
                <p>Some text in the Modal Body</p>
                <p>Some other text...</p>
            </div>
            <div class="modal-footer">
                <h3>Modal Footer</h3>
            </div>
        </div>

    </div>
</main>

<?php

include('./Templates/Footer.php');
?>