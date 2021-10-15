<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    let cartItem = [];
    let cashReceive = 0;
    let cartKey = 0;
    let finishTransaction = 0;
    let invoice_id = 0;

    const modal = document.getElementById("myModal");
    const modal2 = document.getElementById("myModal2");

    // Get the button that opens the modal
    const btn = document.getElementById("btnOpenModal");


    // Get the <span> element that closes the modal
    const span = document.getElementsByClassName("close")[0];
    const btnProcess = document.getElementById('processTransaction');
    const btnprintRec = document.getElementById('printReceipt');
    const btnNewTrans = document.getElementById('newTrans');

    function addToCart(id) {
        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                productid: id,
            },
            success: function(data) {
                let obj = jQuery.parseJSON(data);
                let totalPrice = 1 * obj['price'];

                cartItem.push({
                    key: cartKey,
                    itemid: obj['p_id'],
                    productname: obj['productname'],
                    origPrice: obj['price'],
                    totalPrice: totalPrice,
                    qty: 1,
                });


                $('.cart').empty();
                $('.cart').append(cartItem.map((item) => {
                    return `<div id="cart_${item["key"]}" class="cart-item">
                     <div class="productname">${item['productname']}</div>
                     <span class="cart_quantity">Quantity : x ${item['qty']} </span>
                     <span class="cart_price">Total Price : ${item["totalPrice"]}</span>
                     <button onClick="clickEditProduct(this.id)" id="${item["key"]}" style='display:block;width:100%'>EDIT</button>
                 </div>`
                }))


                cartKey++;
                $('#subTotalId').empty();
                $('#subTotalId').append(getSubTotal());

                processTransaction.disabled = false;
            }
        });
    }


    $(document).ready(function() {
        $('#table_id').DataTable();
        $('#table2').DataTable();
    });

    $(document).ready(function() {
        $('.select2_example').select2();
    });

    $('.numbers').keyup(function() {
        this.value =
            this.value.replace(/[^0-9\.]/g, '');
    });





    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    function clickEditProduct(id) {
        modal.style.display = "block";

        document.getElementById("btnAddQtyCart").value = id;
        document.getElementById("btnRemoveCart").value = id;

    }


    function openCustomMoney() {
        modal2.style.display = "block";

    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function closeModal() {
        modal.style.display = "none";
    }

    function closeModal2() {
        modal2.style.display = "none";
    }

    function buttonCategoryButtonClick(id) {
        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                categoryid: id,
            },
            success: function(data) {
                $('#listproducts').empty();

                var obj = jQuery.parseJSON(data);

                for (var key in obj) {
                    var val = obj[key];
                    $('#listproducts').append(`
                    <button id="${val.p_id}" onClick="addToCart(this.id)" class="item_product">
                        ${val.productname}</button>`)
                }
            }
        });
    }

    function addQuantity() {
        let qty = $('#productQty').val();
        let valuebtn = document.getElementById("btnAddQtyCart").value;

        let tryss = cartItem.find((product) => product.key === Number(valuebtn));

        let totalPrice = tryss.origPrice * qty;

        cartItem[valuebtn].totalPrice = totalPrice;
        cartItem[valuebtn].qty = qty;


        $('.cart').empty();
        $('.cart').append(cartItem.map((item) => {
            return `<div id="cart_${item["key"]}" class="cart-item">
                     <div class="productname">${item['productname']}</div>
                     <span class="cart_quantity">Quantity : x ${item['qty']} </span>
                     <span class="cart_price">Total Price : ${item["totalPrice"]}</span>
                     <button onClick="clickEditProduct(this.id)" id="${item["key"]}" style='display:block;width:100%'>EDIT</button>
                 </div>`
        }))

        modal.style.display = "none";

        $('#subTotalId').empty();
        $('#subTotalId').append(getSubTotal());
    }

    function getSubTotal() {
        let subTotal = cartItem.reduce((currentTotal, item) => {
            return item.totalPrice + currentTotal
        }, 0)

        return subTotal;
    }

    function removeItemCart() {
        let valuebtn = document.getElementById("btnRemoveCart").value;

        let newCart = cartItem.filter((item) => item.key !== Number(valuebtn));

        cartItem = [...newCart];


        $('.cart').empty();
        $('.cart').append(cartItem.map((item) => {
            return `<div id="cart_${item["key"]}" class="cart-item">
                     <div class="productname">${item['productname']}</div>
                     <span class="cart_quantity">Quantity : x ${item['qty']} </span>
                     <span class="cart_price">Total Price : ${item["totalPrice"]}</span>
                     <button onClick="clickEditProduct(this.id)" id="${item["key"]}" style='display:block;width:100%'>EDIT</button>
                 </div>`
        }))

        $('#subTotalId').empty();
        $('#subTotalId').append(getSubTotal());

        modal.style.display = "none";
        console.log(cartItem.length);

        if (cartItem.length === 0) {
            btnProcess.disabled = true;
        }

    }

    function removeAllItem() {


        cartItem = [];


        $('.cart').empty();
        $('.cart').append(cartItem.map((item) => {
            return `<div id="cart_${item["key"]}" class="cart-item">
                     <div class="productname">${item['productname']}</div>
                     <span class="cart_quantity">Quantity : x ${item['qty']} </span>
                     <span class="cart_price">Total Price : ${item["totalPrice"]}</span>
                     <button onClick="clickEditProduct(this.id)" id="${item["key"]}" style='display:block;width:100%'>EDIT</button>
                 </div>`
        }))

        $('#subTotalId').empty();
        $('#subTotalId').append(getSubTotal());

        btnProcess.disabled = true;

    }

    function enterCustomMoney() {
        let customMoney = $('#cashCustom').val();
        modal2.style.display = "none";

        $('#cashReceiveId').empty();
        $('#cashReceiveId').append('₱ ' + customMoney);
    }

    function addCashReceive(value) {
        cashReceive += value;
        $('#cashReceiveId').empty();
        $('#cashReceiveId').append('₱ ' + cashReceive);
    }

    function clearMoney() {
        cashReceive = 0;
        $('#cashReceiveId').empty();
        $('#cashReceiveId').append('₱ ' + cashReceive);
    }

    function newTransaction() {
        $('#subTotalId').empty();
        $('#subTotalId').append(getSubTotal());
        $("#listproducts .item_product").removeAttr("disabled");
        $(".scrollmenu button").removeAttr("disabled");



        cartItem = [];


        $('.cart').empty();
        $('.cart').append(cartItem.map((item) => {
            return `<div id="cart_${item["key"]}" class="cart-item">
                     <div class="productname">${item['productname']}</div>
                     <span class="cart_quantity">Quantity : x ${item['qty']} </span>
                     <span class="cart_price">Total Price : ${item["totalPrice"]}</span>
                     <button onClick="clickEditProduct(this.id)" id="${item["key"]}" style='display:block;width:100%'>EDIT</button>
                 </div>`
        }))

        $('#subTotalId').empty();
        $('#subTotalId').append(getSubTotal());

        btnprintRec.disabled = true;
        btnNewTrans.disabled = true;

        cashReceive = 0;
        changed = 0;
        $('#cashReceiveId').empty();
        $('#cashReceiveId').append('₱ ' + cashReceive);
        $('#cashChangedid').empty();
        $('#cashChangedid').append('₱ ' + changed);
        cartKey = 0;
    }

    function process() {
        if (cashReceive >= getSubTotal()) {
            let sale = getSubTotal();
            let changed = cashReceive - sale;
            $.ajax({
                type: "post",
                url: "ajax.php",
                data: {
                    datasProces: {
                        sales: sale,
                        insideCart: cartItem,
                    }
                },
                success: function(data) {
                    alert("Succesfully Finish Transaction");
                    btnprintRec.disabled = false;
                    btnProcess.disabled = true;
                    $('#cashChangedid').empty();
                    $('#cashChangedid').append('₱ ' + changed);
                    btnNewTrans.disabled = false;

                    $("#listproducts .item_product").attr("disabled", true);
                    $(".scrollmenu button").attr("disabled", true);

                    invoice_id = data;

                }
            });

        } else {
            alert("not Enough Money");
        }
    }

    function printReceipt() {

        window.open('receipt.php?id=' + invoice_id);
        window.open('OrderRep.php?id=' + invoice_id);

    }
</script>
<script src="../../js/main.js"></script>
</body>

</html>