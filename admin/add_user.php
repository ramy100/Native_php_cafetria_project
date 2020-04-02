<?php
if (isset($_GET["errors"]))
    $errors = explode(";", $_GET["errors"]);

$mysqli = new mysqli("localhost", "root", "", "my_cafeteria");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product Page</title>
    <style>
        html,
        body {
            height: 100%;
            background-image: url("../files/images/background.jpg");
        }
    </style>
    <?php include '../partials/style_files.php'; ?>
</head>
<?php include '../partials/admin_partial.php'; ?>

<body>
    <div class="container h-100 d-flex justify-content-center">
        <div class="jumbotron my-auto">
            <form class="col" action="admin_controller.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="FirstName">User</label>
                    <input type="text" id="user_name" name="user_name" class="form-control">
                    <small class="form-text text-muted">Only letters and white space allowed</small>
                    <?php if (isset($_GET["errors"])) if (in_array("user_name", $errors)) { ?>
                        <small style="color: red">Invalid User Name</small>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="LastName">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                    <?php if (isset($_GET["errors"])) if (in_array("email", $errors)) { ?>
                        <small style="color: red">Invalid Email</small>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="LastName">password</label>
                    <input type="password" id="password" name="password" class="form-control">
                    <small class="form-text text-muted">atleast 6 characters</small>
                    <?php if (isset($_GET["errors"])) if (in_array("password", $errors)) { ?>
                        <small style="color: red">Invalid password</small>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="LastName">room_number</label>
                    <input type="number" id="room_number" name="room_number" class="form-control">
                    <small class="form-text text-muted">only numbers</small>
                    <?php if (isset($_GET["errors"])) if (in_array("room_number", $errors)) { ?>
                        <small style="color: red">Invalid Room</small>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="LastName">ext</label>
                    <input type="number" id="ext" name="ext" class="form-control">
                    <small class="form-text text-muted">only numbers</small>
                    <?php if (isset($_GET["errors"])) if (in_array("ext", $errors)) { ?>
                        <small style="color: red">Invalid Ext</small>
                    <?php } ?>
                </div>
                <div class="form-group" style="margin-top:15px;">
                    <label for="image">Product Pic</label>
                    <br>
                    <input type="file" name="image" id="image">
                    <small class="form-text text-muted">Will set to an anonymous image if not chosen</small>
                    <?php if (isset($_GET["errors"])) if (in_array("image", $errors)) { ?>
                        <small style="color: red">invalid image extension</small>
                    <?php } ?>
                </div>
                <button name="add_user" type="submit" class="btn btn-primary">Add product</button>
            </form>
        </div>
    </div>
</body>


</html>