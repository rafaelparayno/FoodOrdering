<?php
include('./Templates/Header.php');
include('./functions.php');


$categoryList = $category->getData();
$itemlists = $items->getData();
$productList = $products->getData();

?>
<nav>
    <div class="scrollmenu">
        <!-- <button id="" onclick="buttonCategoryButtonClick(this.id)" >Home</button> -->
        <?php array_map(function ($cat) { ?>
            <button id="<?= $cat['c_id'] ?>" onclick="buttonCategoryButtonClick(this.id)"><?= $cat['categoryname'] ?></button>
        <?php }, $categoryList) ?>

        <!-- <a href="#work">Logout</a> -->
    </div>
</nav>
<div class="products">
    <div id="listproducts" class="list_products">
        <!-- <div class="item_product">
            NASA GORENG
        </div>
        <div class="item_product">
            NASA GORENG
        </div>
        <div class="item_product">
            NASA GORENG
        </div>
        <div class="item_product">
            NASA GORENG
        </div>
        <div class="item_product">
            NASA GORENG
        </div>
        <div class="item_product">
            NASA GORENG
        </div>
        <div class="item_product">
            NASA GORENG
        </div>
        <div class="item_product">
            NASA GORENG
        </div> -->
    </div>
</div>

<div class="details">
    <div class="cart">
        <div class="cart-item">
            <div class="productname">Nasa Goreng</div>
            <span>Price : 90</span>
        </div>
    </div>
    <div class="subtotal">
        <button>Remove Item Cart</button>
        Sub Total : 105
    </div>

    <div class="money">
        <div class="money-item">20</div>
        <div class="money-item">20</div>
        <div class="money-item">20</div>
        <div class="money-item">20</div>

    </div>
    <div class="money">
        <div class="money-item">20</div>
        <div class="money-item">20</div>
        <div class="money-item">20</div>
        <div class="money-item">20</div>
    </div>
    <div class="billing">
        <div class="cashReceive">
            Cash Receive
            P0
        </div>
        <div class="Change">
            Change
            P0
        </div>
    </div>
    <div>
        <button>Process</button>
        <button>Print Receipt</button>

    </div>
</div>



<?php

include('./Templates/Footer.php');
?>