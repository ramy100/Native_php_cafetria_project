<?php require '../models/product.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <style>
    html,
    body {
      height: 100%;
      background-image: url("../files/images/background.jpg");
    }
  </style>
  <?php include '../partials/style_files.php'; ?>
  <script>
    function reduceQuantity(id) {
      if ($(`input[name='${id}']`).val() == 1) {
        $(`.${id}`).remove()
        return
      }
      let quantity = parseInt($(`input[name='${id}']`).val()) - 1
      $(`input[name='${id}']`).val(quantity)
    }

    function addToList(image, name, id) {
      if ($(`input[name='${id}']`).val() >= 1) {
        let quantity = parseInt($(`input[name='${id}']`).val()) + 1
        $(`input[name='${id}']`).val(quantity)
      } else {
        let newProduct = $(`<div class="row ${id} mt-5">
              <div class="col ">
                <input type="text" class="form-control" readonly value=${name}>
              </div>
              <div class="col">
                <input type="text" class="form-control" name=${id} value=1 readonly>
              </div>
              <div class="col">
                <button type="button" onclick="reduceQuantity(${id})" class="btn btn-danger">X</button>
              </div>
            </div>`)
        $('.recipt').prepend(newProduct)
      }
    }
  </script>
</head>

<body>
  <?php include '../partials/user_partial.php'; ?>
  <div class="container h-100 d-flex justify-content-center">
    <div class="jumbotron my-auto">
      <div class="row">
        <div class="col-4 bg-warning">
          <form class="recipt" method="POST" action="user_controller.php">

            <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3"></textarea>
            <button name="make_order" type="submit">Confirm</button>
          </form>
        </div>
        <div class="col-8">
          <div class="card-columns">
            <?php $result = Product::get_products() ?>
            <?php while ($row = $result->fetch_assoc()) { ?>
              <div class="card" onclick='addToList(
                "<?php echo ($row["product_image"]) ?>",
                "<?php echo ($row["product_name"]) ?>",
                "<?php echo ($row["id"]) ?>"
                )'>
                <img class="card-img-top" src="../files/images/<?php echo ($row['product_image']) ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="text-center text-danger card-title"><?php echo ($row['product_name']) ?></h5>
                  <p class="text-center card-text"><span class="font-weight-bold">Category:</span> <?php echo ($row['category_id']) ?></p>
                  <p class="text-center card-text"><span class="font-weight-bold">Price</span>: <?php echo ($row['price']) ?></small></p>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>