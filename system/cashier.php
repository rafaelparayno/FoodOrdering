<?php
include('./Templates/Header.php');
include('./functions.php');


$categoryList = $category->getData();
$itemlists = $items->getData();
$productList = $products->getData();

?>

<nav>
    <div class="scrollmenu">

        <?php array_map(function ($cat) { ?>
            <button id="<?= $cat['c_id'] ?>" onclick="buttonCategoryButtonClick(this.id)"><?= $cat['categoryname'] ?></button>
        <?php }, $categoryList) ?>

    </div>
</nav>

<div class="products">
    <div id="listproducts" class="list_products">

    </div>
</div>

<div class="details">

    <div class="cart">

    </div>
    <div class="subtotal">
        <button>Remove Item Cart</button>
        Sub Total :<span id="subTotalId">0</span>
    </div>

    <div class="money">
        <div class="money-item">20</div>
        <div class="money-item">50</div>
        <div class="money-item">100</div>
        <div class="money-item">200</div>

    </div>
    <div class="money">
        <div class="money-item">500</div>
        <div class="money-item">1000</div>
        <div class="money-item">Custom</div>
        <div class="money-item">Clear</div>
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
        <button>New Transaction</button>
    </div>
</div>


<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close" onclick="closeModal()" class="">&times;</span>
            <h2>Edit Cart Item</h2>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="productQty">Quantity: </label>
                <input type="hidden" id="priceHidden" value="">
                <input type="number" class="numbers" name="productQty" id="productQty" />


            </div>

            <div class="modal-footer">
                <button id="btnAddQtyCart" onclick="addQuantity()" name="submitCategory" type="function">Add</button>
                <button name="" type="function">Remove</button>
            </div>

        </div>

    </div>

</div>
<?php

include('./Templates/Footer.php');
?>