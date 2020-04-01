<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>restore password</title>
    <style>
        html,
        body {
            height: 100%;
            background-image: url("files/images/background.jpg");
        }
    </style>
</head>
<script>
    function getusername(e) {
        document.getElementById('mail').href = "mailto:admin@example.com?subject=Forgot my cafeteria password&body=UserName : " + e + " and i forgot my password "
    }
</script>

<body>
    <div class="container h-100 d-flex justify-content-center">
        <div class="jumbotron my-auto">
            <label for="exampleInputEmail1">User name</label>
            <small id="emailHelp" class="form-text text-muted">enter your user name</small>
            <input type="text" id="UserName" oninput="getusername(this.value)" name="UserName" class="form-control" aria-describedby="emailHelp">
            <a class="btn btn-primary mt-3" id="mail" href="mailto:admin@example.com?subject=Forgot my cafeteria password&body=">
                Send an e-mail to admin
            </a>
            <a class="btn btn-primary mt-3" href="login.php">
                Back to login
            </a>
        </div>
    </div>
</body>
<script src="files/jquery/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="files/bootstrap/css/bootstrap.css">
<script src="files/bootstrap/js/bootstrap.min.js"></script>

</html>