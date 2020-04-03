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
            <h1 class="text-danger text-center">Add New Category</h1>
            <form class="col" action="admin_controller.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Name">Category Name</label>
                    <input type="text" id="category_name" name="category_name" class="form-control">
                    <small class="form-text text-muted">Only letters and white space allowed</small>
                    <?php if (isset($_GET["errors"])) if (in_array("category_name", $errors)) { ?>
                        <small style="color: red">invalid Category Name</small>
                    <?php } ?>
                </div>
                <button name="add_category" type="submit" class="btn btn-primary">Add category</button>
            </form>
        </div>
    </div>
</body>


</html>