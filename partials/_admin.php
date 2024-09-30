<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container ">
        <?php if(isset($_GET['adminloginsuccess'])&&$_GET['adminloginsuccess']=='false'&& isset($_GET['adminerror'])){
    echo '<div class="alert alert-danger m-3 alert-dismissible fade show w-50 mx-auto" role="alert">
    <strong>Failure!</strong>'.$_GET['adminerror'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  } ?>
        <div class="card text-center position-absolute top-50 start-50 translate-middle shadow-lg">
            <div class="card-body p-5">
                <h3 class="card-title">Hey Admin...</h3>
                <p class="card-text">Unlock your administrative potential.</p>
                <div class="container px-4 py-2 " style="width:450px;">
                    <form class="p-2 p-md-5 border rounded-3 bg-body-tertiary" method="POST" action="/coincraft/partials/_handleadmin.php">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="adminname" disabled value="Admin">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                name="adminpass">
                            <label for="floatingPassword">PassCode</label>
                        </div>
                        <button class="w-50 btn btn-lg btn-outline-primary" type="submit">Login</button>
                    </form>
                </div>

            </div>
            <div class="card-footer text-body-secondary">
                Be sure, you are admin! <a href="/coincraft/" class="btn btn-primary btn-sm">Go Back</a>
            </div>
        </div>
    </div>

</body>

</html>