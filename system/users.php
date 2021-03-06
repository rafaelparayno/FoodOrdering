<?php
include('./Templates/Header.php');
include('./Templates/Navigation.php');
include('./functions.php');


$userList = $users->getData();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['saveUserAdmin'])) {
        $username = $_POST['usernamein'];
        $passwordStud = $_POST['passwordin'];
        $firstname = $_POST['firstnamein'];
        $lastname = $_POST['lastnamein'];
        $role = $_POST['role'];

        $users->addToUsers(
            $firstname,
            $lastname,
            $username,
            $role,
            $passwordStud
        );
    }
}

?>
<main>

    <div class="top_navigation">
        <ul class="top_nav_item">

        </ul>
        <div class="logout_button">
            <a href="./logout.php">Logout</a>
        </div>

    </div>
    <h1>Users</h1>
    <div class="content">

        <div class="Actions_button">
            <button id="btnOpenModal" class="btn btn-md btn-success mr-2">Add User</button>
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
                <?php array_map(function ($usr) { ?>
                    <tr>
                        <td><?= $usr['u_id'] ?></td>
                        <td><?= $usr['firstname'] ?></td>
                        <td><?= $usr['lastname'] ?></td>
                        <td><?php echo $usr['role'] == 0   ? "Cahier"  : "Admin" ?></td>
                        <td class="actions-buttons">

                            <a class="editBtn" href="#">edit</a>
                            <a class="delBtn" href="#">Delete</a>
                        </td>
                    </tr>
                <?php }, $userList) ?>

            </tbody>
        </table>
    </div>

</main>


<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Add Category</h2>
        </div>
        <div class="modal-body">
            <form method="POST">
                <div class="form-group">
                    <label for="firstnamein">Firstname: </label>
                    <input type="text" name="firstnamein" id="firstnamein" />

                    <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                </div>
                <div class="form-group">
                    <label for="lastnamein">Lastname: </label>
                    <input type="text" name="lastnamein" id="lastnamein" />

                    <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                </div>
                <div class="form-group">
                    <label for="usernamein">Username: </label>
                    <input type="text" name="usernamein" id="usernamein" />

                    <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                </div>
                <div class="form-group">
                    <label for="passwordin">Password: </label>
                    <input type="password" name="passwordin" id="passwordin" />

                    <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                </div>

                <div class="form-group">
                    <label for="role">Item Inventory </label>
                    <select class="select2_example selectex" name="role" id="role">
                        <option value="0">Cashier</option>
                        <option value="1">Admin</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button name="saveUserAdmin" type="submit">Save</button>
                </div>
            </form>
        </div>

    </div>

</div>

<?php

include('./Templates/Footer.php');
?>