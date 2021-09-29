<?php
include('./Templates/Header.php');
include('./Templates/Navigation.php');
?>
<main>

    <div class="top_navigation">
        <ul class="top_nav_item">
            <!-- <li class="nav-item">
                <a class="nav-link">asdad</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">asdad</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">asdad</a>
            </li> -->
        </ul>
        <div class="logout_button">
            <a href="./logout.php">Logout</a>
        </div>

    </div>
    <h1>Users</h1>
    <div class="content">

        <div class="Actions_button">
            <button data-toggle="modal" data-target="#addUserStudent" class="btn btn-md btn-success mr-2">Add User</button>
        </div>
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

</main>

<?php

include('./Templates/Footer.php');
?>