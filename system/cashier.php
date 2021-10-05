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
        <button onclick="removeAllItem()">Remove Item Cart</button>
        Sub Total :<span id="subTotalId">0</span>
    </div>

    <div class="money">
        <div onclick="addCashReceive(20)" class="money-item">20</div>
        <div onclick="addCashReceive(50)" class="money-item">50</div>
        <div onclick="addCashReceive(100)" class="money-item">100</div>
        <div onclick="addCashReceive(200)" class="money-item">200</div>

    </div>
    <div class="money">
        <div onclick="addCashReceive(500)" class="money-item">500</div>
        <div onclick="addCashReceive(1000)" class="money-item">1000</div>
        <div onclick="openCustomMoney()" class="money-item">Custom</div>
        <div onclick="clearMoney()" class="money-item">Clear</div>
    </div>
    <div class="billing">
        <div class="cashReceive">
            Cash Receive
            <span id="cashReceiveId" class="cashReceive">₱ 0</span>
        </div>
        <div class="Change">
            Changed:
            <span id="cashChangedid" class="cashChanged">₱ 0</span>
        </div>
    </div>
    <div>
        <button id="processTransaction" onclick="process()" disabled>Process</button>
        <button id="printReceipt" onclick="" disabled>Print Receipt</button>
        <button id="newTrans" onclick="newTransaction()" disabled>New Transaction</button>
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
                <input type="number" min="1" class="numbers" name="productQty" id="productQty" />
            </div>
            <div class="modal-footer">
                <button id="btnAddQtyCart" onclick="addQuantity()" name="addQtyItem" type="function">Add</button>
                <button id="btnRemoveCart" onclick="removeItemCart()" name="removeItem" type="function">Remove</button>
            </div>
        </div>
    </div>
</div>


<div id="myModal2" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close" onclick="closeModal2()" class="">&times;</span>
            <h2>Custom Cash Receive</h2>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="cashCustom">Cash Receive: </label>

                <input type="number" class="numbers" name="cashCustom" id="cashCustom" />
            </div>
            <div class="modal-footer">
                <button onclick="enterCustomMoney()" id="btnCustomMoney" name="submitCustom" type="function">Enter</button>

            </div>
        </div>
    </div>
</div>


<?php

include('./Templates/Footer.php');
?>