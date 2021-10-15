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

                <input placeholder="Expense Name" type="text" name="expensename" id="expensename" />
                <input placeholder="Expense Cost" type="number" name="expensecost" id="expensecost" />
                <button id="addExpense" onclick="addExpense()" class="btn">Add Expense</button>
                <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
            </div>


        </div>

        <div>
            <div class="expense-table">
                <div class="expense-table-header">
                    Expense
                </div>
                <div id="expense-content" class="expense-table-content">



                </div>
                <div class="expense-footer">
                    <button onclick="processExpense()" class="btn-save-expense">Save</button>
                </div>
            </div>
        </div>
    </div>



</main>


<?php

include('./Templates/Footer.php');
?>