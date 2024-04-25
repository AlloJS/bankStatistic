<?php
    require_once('../constant_sys.php');
    require_once(ROOT . "/model/session.php"); 
    require_once(ROOT . "/controller/auth/is_logged.php"); 
    require_once(ROOT . "/model/db.php"); 
    require_once(ROOT . "/controller/statisticController.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>
    <?php require_once(ROOT . "/view/temp/header.php") ?>
    <div class="text-center p-3">
        <h1>Statistiche di <?php echo $userSession ?></h1>
        <h3>Mese di: <?php echo date("M-Y") ?></h3>
        <p>Dati aggiornati al: <?php $today = strtotime('now');  echo date('d/m/Y', $today) ?></p>
        <p class="text-primary">Media movimenti <?php echo $mediaMovimenti ?>€</p>
        <p class="text-success">Media movimenti entrate <?php echo $mediaEntrate ?>€</p>
        <p class="text-danger">Media movimenti uscite <?php echo $mediaUscite ?>€</p>
        <a class="text-danger" href="<?php echo PATH . '/view/home.php' ?>"><i class="bi bi-skip-backward"></i> Torna alla Home</a>
    </div>
    


    <div class="d-flex justify-content-center">
        <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
        <script>
            var xValues = ["Entrate €","Media entrate €","Uscite €","Media uscite €","Media movimenti €"];
            var yValues = [<?php echo $JSONentrate ?>,<?php echo $mediaEntrate ?>,<?php echo $JSONuscite ?>,<?php echo $mediaUscite ?>,<?php echo $mediaMovimenti ?>];
            var barColors = ["green","yellow","red","pink","blue"];

            new Chart("myChart2", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                legend: {display: false},
                title: {
                display: true
                }
            }
            });
        </script>



            
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>