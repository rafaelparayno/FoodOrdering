<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    const cartItem = [];
    let cartKey = 0;

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
                $('.cart').append(`<div id="cart_${cartKey}" class="cart-item">
                    <div class="productname">${obj['productname']}</div>
                    <span class="cart_quantity">Quantity : x 1 </span>
                    <span class="cart_price">Total Price : ${totalPrice}</span>
                    <button onClick="clickEditProduct(this.id)" id="${cartKey}" style='display:block;width:100%'>EDIT</button>
                </div>`)

                cartItem.push({
                    key: cartKey,
                    itemid: obj['p_id'],
                    productname: obj['productname'],
                    origPrice: obj['price'],
                    totalPrice: totalPrice,
                });
                cartKey++;

                $('#subTotalId').empty();
                $('#subTotalId').append(getSubTotal());
            }
        });
    }


    $(document).ready(function() {
        $('#table_id').DataTable();
    });

    $(document).ready(function() {
        $('.select2_example').select2();
    });

    $('.numbers').keyup(function() {
        this.value =
            this.value.replace(/[^0-9\.]/g, '');
    });





    const modal = document.getElementById("myModal");

    // Get the button that opens the modal
    const btn = document.getElementById("btnOpenModal");


    // Get the <span> element that closes the modal
    const span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    function clickEditProduct(id) {
        modal.style.display = "block";

        document.getElementById("btnAddQtyCart").value = id;

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
                    $('#listproducts').append(`<div id="${val.p_id}" onClick="addToCart(this.id)" class="item_product">
                        ${val.productname}</div>`)
                }
            }
        });
    }

    function addQuantity() {
        let qty = $('#productQty').val();
        let valuebtn = document.getElementById("btnAddQtyCart").value;

        let tryss = cartItem.find((product) => product.key === Number(valuebtn));

        let totalPrice = tryss.origPrice * qty;


        let cartQty = $('#cart_' + valuebtn + ' ' + '.cart_quantity');
        let cartPrice = $('#cart_' + valuebtn + ' ' + '.cart_price');

        cartQty.empty();
        cartPrice.empty();
        cartQty.append(`<span class="cart_quantity">Quantity : x ${qty} </span>`)
        cartQty.append(`<span class="cart_quantity"> total Price : ${totalPrice}</span>`)
        modal.style.display = "none";

        cartItem[valuebtn].totalPrice = totalPrice;

        $('#subTotalId').empty();
        $('#subTotalId').append(getSubTotal());
    }

    function getSubTotal() {
        let subTotal = cartItem.reduce((currentTotal, item) => {
            return item.totalPrice + currentTotal
        }, 0)

        return subTotal;
    }
</script>
<script src="../../js/main.js"></script>
</body>

</html>