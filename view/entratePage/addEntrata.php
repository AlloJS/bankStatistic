<?php
    require_once('../../constant_sys.php');
    require_once(ROOT . "/model/session.php"); 
    require_once(ROOT . "/controller/auth/is_logged.php"); 
    require_once(ROOT . "/model/db.php"); 
    require_once(ROOT . "/controller/addEntrateController.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Entrate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php require_once(ROOT . "/view/temp/header.php") ?>
    <div class="text-center p-3">
        <h1>Inserisci entrata</h1>
        <p>Dati aggiornati al: <?php $today = strtotime('now');  echo date('d/m/Y', $today) ?></p>
        <a class="text-danger" href="<?php echo PATH . '/view/entrate.php' ?>"><i class="bi bi-skip-backward"></i> Torna al menù di entrate</a>
    </div>

    <form method="post" name="addAccredito" class="m-4 text-center">
        <h3 class="<?php echo $strResultColor ?>"><?php echo $strResult ?></h3>
        <div class="input-group mb-3">
            <input name="titolo" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Dai un titolo">
        </div>
        <select name="tipo" class="form-select mt-3" aria-label="Default select example">
            <option selected>Scegli il tipo di entrata</option>
            <?php echo $options ?>
        </select>
        <div class="input-group mt-3">
            <input name="importo" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="Scegli l'importo">
            <span class="input-group-text">$</span>
            <span class="input-group-text">0.00</span>
        </div>
        <div class="input-group mt-3">
            <input name="dataAccredito" class="form-control form-control-lg" type="date" placeholder=".form-control-lg" aria-label=".form-control-lg example">
        </div>

        <div class="input-group mt-3">
            <span class="input-group-text">Descrizione entrata</span>
            <textarea name="descrizioneAccredito" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <button onclick="checkFormAccredito()" type="button" class="btn btn-outline-success mt-3">Aggiungi</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="<?php echo PATH ?>/public/js/addEntrate.js?ts=<?=time()?>&quot"></script>
</body>
</html>