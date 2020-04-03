<!-- ====ramy task===== -->
<?php
require '../models/database.php'

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Page</title>
    <?php include '../partials/style_files.php'; ?>

</head>

<style>
    html,
    body {
        height: 100%;
        background-image: url("../files/images/background.jpg");
    }

    button:hover {
        background-color: lightgreen;
        transition-duration: 1s;
    }

    .color {
        background-color: lightgreen;
    }
</style>
<script>
    $(function() {
        $(".user").on('click', function(e) {
            if ($(this).parents("button")[0].classList.contains("color"))
                $("button").removeClass("color")
            else {
                $("button").removeClass("color")
                $(this).parents("button").toggleClass("color")
            }
        })
    })
</script>

<body>
    <?php include '../partials/admin_partial.php'; ?>
    <div class="container h-100 d-flex justify-content-center">
        <div class="jumbotron my-auto">
            <h1 class="text-center text-danger">All Orders</h1>
            <div id="accordion">
                <?php
                $sql = "SELECT o.id,o.date,u.user_name,u.room_number,u.ext,o.status,o.notes FROM `orders` AS o, users AS u WHERE o.user_id=u.id";
                $result = $mysqli->query($sql);
                if ($result->num_rows == 0)
                    echo ('<h3 class="text-center">Empty</h3>');
                while ($row = $result->fetch_assoc()) {
                    $total_price = 0; ?>
                    <div class="card text-center m-4 ">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo ($row['id']) ?>" aria-expanded="false" aria-controls="collapseOne">
                                    <table class="table user ">
                                        <thead>
                                            <tr>
                                                <th scope="col">date</th>
                                                <th scope="col">user_name</th>
                                                <th scope="col">room_number</th>
                                                <th scope="col">ext</th>
                                                <th scope="col">notes</th>
                                                <th scope="col">status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row"><?php echo "{$row['date']}" ?></td>
                                                <td><?php echo "{$row['user_name']}" ?></td>
                                                <td><?php echo "{$row['room_number']}" ?></td>
                                                <td><?php echo "{$row['ext']}" ?></td>
                                                <td><?php echo "{$row['notes']}" ?></td>
                                                <td><?php echo "{$row['status']}" ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse<?php echo ($row['id']) ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class=" text-center">
                                    <?php
                                    $sql2 = "SELECT o.order_id,o.quantity,p.product_name,p.price,p.product_image  FROM order_products as o, products as p  WHERE o.product_id=p.id and o.order_id='{$row['id']}'";
                                    $result2 = $mysqli->query($sql2);
                                    while ($row2 = $result2->fetch_assoc()) {    ?>
                                        <table class="m-3" style="display:inline-block">
                                            <tr>
                                                <td><img class="border border-success rounded " width="80px" height="80px" src=<?php echo ("../files/images/{$row2['product_image']}") ?> alt=""></td>
                                            </tr>
                                            <tr>
                                                <td><span class="bg-success p-1 mt-1 rounded text-light d-inline-block"><?php echo ("{$row2['product_name']}") ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><span>Price :</span> <?php echo ("{$row2['price']}") ?></td>
                                            </tr>
                                            <tr>
                                                <td>Quantity : <?php echo ("{$row2['quantity']}") ?></td>
                                            </tr>
                                        </table>
                                    <?php $total_price += $row2['price'] * $row2['quantity'];
                                    } ?>
                                    <p class="text-right"><span>Total : EGP </span> <span class="bg-danger p-2 m-1 rounded-circle text-light d-inline-block"><?php echo ("{$total_price}"); ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </div>
</body>

</html>
<!-- ====ending of ramy task===== -->