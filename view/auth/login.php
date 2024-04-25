<?php
    require_once('../../constant_sys.php');
    require_once(ROOT . "/model/session.php"); 
    require_once(ROOT . "/controller/auth/is_not_logged.php"); 
    require_once(ROOT . "/model/db.php"); 
    require_once(ROOT . "/controller/auth/loginController.php"); 
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Statistic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="">
    
    <form name="login" class="container text-center mt-3 p-5" method="post" action="">
        <img class="m-3" src="<?php echo PATH . '/public/img/logo.png' ?>" alt="" width="150px">
        <h1>BANK STATISTIC SOFTWARE <i class="bi bi-currency-dollar"></i></h1>
        <h2 class='text-danger'>Login form</h2>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" id="submitLogin" class="btn btn-primary">Login</button>
        <a class='p-2' href="<?php echo PATH . '/view/auth/register.php' ?>">Or register</a>
        <h3 class="text-danger mt-3"><?php echo $stringError; ?></h3>
        <a class='p-2' href="<?php echo PATH . '/view/auth/forgot.php' ?>">Or forgot</a>
    </form>

    <script src="<?php echo PATH . '/public/js/login.js' ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>