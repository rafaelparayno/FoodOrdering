<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
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
                    $('#listproducts').append(`<div class="item_product">
                        ${val.productname}</div>`)
                }
            }
        });
    }
</script>
<script src="../../js/main.js"></script>
</body>

</html>