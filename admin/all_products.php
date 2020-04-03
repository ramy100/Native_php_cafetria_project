<?php require '../models/product.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List products Page</title>
  <style>
    html,
    body {
      height: 100%;
      background-image: url("../files/images/background.jpg");
    }
  </style>
  <?php include '../partials/style_files.php'; ?>
</head>

<body>
  <?php include '../partials/admin_partial.php'; ?>
  <div class="container h-100 d-flex justify-content-center">
    <div class="jumbotron my-auto">
      <h1 class="text-danger text-center">All products</h1>
      <?php $result = Product::get_products();
      if ($result->num_rows == 0) {
        echo ('<h3 class="text-center">Empty</h3>');
      } else { ?>
        <div class="row">
          <table class="table table-hover col-12">
            <thead>
              <tr>
                <th class="text-danger">Product Name</th>
                <th class="text-danger">Category</th>
                <th class="text-danger">Image</th>
                <th class="text-danger">Price</th>
              </tr>
            </thead>
            <tbody>

              <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                  <th><?php echo ($row['product_name']) ?></th>
                  <td><?php echo ($row['category_name']) ?></td>
                  <td><img width="100px" height="100px" src="../files/images/<?php echo ($row['product_image']) ?>" alt="Card image cap"></td>
                  <td><?php echo ($row['price']) ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      <?php } ?>
    </div>
  </div>
</body>

</html>