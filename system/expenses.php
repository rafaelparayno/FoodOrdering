<?php
include('./Templates/Header.php');
include('./Templates/Navigation.php');
?>
<main>

    <div class="top_navigation">
        <ul class="top_nav_item">

        </ul>
        <div class="logout_button">
            <a href="./logout.php">Logout</a>
        </div>

    </div>
    <h1>Expenses</h1>
    <div class="content" style="margin-bottom: 20px;">
        <div class="input-expense">
            <div class="form-group-inline">

                <input placeholder="Expense Name" type="text" name="productName" id="productName" />
                <input placeholder="Expense Cost" type="text" name="productName" id="productName" />
                <button class="btn">Add Expense</button>
                <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
            </div>


        </div>

        <div>
            <div class="expense-table">
                <div class="expense-table-header">
                    Expense
                </div>
                <div class="expense-table-content">
                    <!-- <div class="expense-data">
                        <button class="btn ">
                            Delete
                        </button>

                        <span class="expense-name">
                            Ice
                        </span>

                        <span class="expense-cost ">
                            5.00
                        </span>
                    </div> -->

                    <!-- <div class="expense-data">
                        <button class="btn ">
                            Delete
                        </button>

                        <span class="expense-name ">
                            Ice
                        </span>

                        <span class="expense-cost ">
                            5.00
                        </span>
                    </div> -->


                </div>
            </div>
        </div>
    </div>

    <div class="content">


        <table id="table_id">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div>

</main>


<?php

include('./Templates/Footer.php');
?>