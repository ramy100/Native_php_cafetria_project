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
  <script src="../files/bootstrap/js/popper.js"></script>
  <script src="../files/jquery/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../files/bootstrap/css/bootstrap.css">
  <script src="../files/bootstrap/js/bootstrap.min.js"></script>
</head>
<?php include '../partials/admin_partial.php'; ?>

<body>
  <div class="container h-100 d-flex justify-content-center">
    <div class="jumbotron my-auto">
      <form class="col" action="admin_controller.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="FirstName">Product</label>
          <input type="text" id="product_name" name="product_name" class="form-control">
          <small class="form-text text-muted">Only letters and white space allowed</small>
          <?php if (isset($_GET["errors"])) if (in_array("product_name", $errors)) { ?>
            <small style="color: red">invalid Product Name</small>
          <?php } ?>
        </div>
        <div class="form-group">
          <label for="LastName">Price</label>
          <input type="number" id="Price" name="price" class="form-control">
          <?php if (isset($_GET["errors"])) if (in_array("price", $errors)) { ?>
            <small style="color: red">invalid Price</small>
          <?php } ?>
        </div>
        <div class="form-group">
          <select class="custom-select" name="category">
            <option selected>Select a Category</option>
            <?php $sql = "SELECT * FROM `product_category`";
            $result = $mysqli->query($sql);
            while ($row = $result->fetch_assoc()) {    ?>
              <option value=<?php echo ($row['id']) ?>><?php echo ($row['category_name']) ?></option>
            <?php } ?>
          </select>
          <a href="add_category.php">Add Category</a>
          <?php if (isset($_GET["errors"])) if (in_array("category", $errors)) { ?>
            <small style="color: red">Category is required</small>
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
        <button name="add_product" type="submit" class="btn btn-primary">Add product</button>
      </form>
    </div>
  </div>
</body>


</html>