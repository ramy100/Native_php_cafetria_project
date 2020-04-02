<?php require '../models/users.php' ?>
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
</head>

<body>
    <?php include '../partials/admin_partial.php'; ?>
    <div class="container h-100 d-flex justify-content-center">
        <div class="jumbotron my-auto">
            <div class="row">
                <div class="card-columns">
                    <?php $result = user::get_users() ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="card">
                            <img class="card-img-top" src="../files/images/<?php echo ($row['image']) ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="text-center text-danger card-title"><?php echo ($row['user_name']) ?></h5>
                                <p class="text-center card-text"><span class="font-weight-bold">Email: </span>: <?php echo ($row['email']) ?></small></p>
                                <p class="text-center card-text"><span class="font-weight-bold">Room: </span> <?php echo ($row['room_number']) ?></p>
                                <p class="text-center card-text"><span class="font-weight-bold">Ext: </span>: <?php echo ($row['ext']) ?></small></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>