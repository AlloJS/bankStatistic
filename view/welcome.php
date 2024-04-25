<?php
    require_once('../constant_sys.php');
    require_once(ROOT . "/model/session.php"); 
    require_once(ROOT . "/controller/auth/is_not_logged.php"); 
    require_once(ROOT . "/model/db.php"); 
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container text-center mt-5 p-5">
        <img class="m-3" src="<?php echo PATH . '/public/img/logo.png' ?>" alt="" width="150px">
        <h1>WELCOME TO BANK STATISTIC SOFTWARE <i class="bi bi-currency-dollar"></i></h1>
        <p>Prima di accedere controlla la tua e-mail per effettuare il login</p>
        <a href="<?php echo PATH . '/view/auth/login.php' ?>" class="btn btn-primary">Torna al login</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>