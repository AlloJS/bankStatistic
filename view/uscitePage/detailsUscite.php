<?php
    require_once('../../constant_sys.php');
    require_once(ROOT . "/model/session.php"); 
    require_once(ROOT . "/controller/auth/is_logged.php"); 
    require_once(ROOT . "/model/db.php"); 
    require_once(ROOT . "/controller/detailsUsciteController.php"); 
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Uscite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
    <?php require_once(ROOT . "/view/temp/header.php") ?>
    <div class="text-center p-3">
        <h1>Dettagli uscite</h1>
        <p>Dati aggiornati al: <?php $today = strtotime('now');  echo date('d/m/Y', $today) ?></p>
        <a class="text-danger" href="<?php echo PATH . '/view/uscite.php' ?>"><i class="bi bi-skip-backward"></i> Torna al menù di uscite</a>
    </div>


    <div class="container">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Filtra per importo
                </button>
                </h2>
                <form  method="post" name="filtroImportoForm" id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="input-group mt-3 container">
                        <input id="startImporto" name="startImporto" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="Da:">
                        <span class="input-group-text">$</span>
                        <span class="input-group-text">0.00</span>
                    </div>
                    <div class="input-group mt-3 container">
                        <input id="andImporto" name="andImporto" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="A:">
                        <span class="input-group-text">$</span>
                        <span class="input-group-text">0.00</span>
                    </div>
                    <input id="importoFiltro" type="hidden" name="importoFiltro">
                    <div class="text-center mb-2">
                        <button id="btnFiltroImporto" type="submit" class="btn btn-outline-primary mt-3">Cerca</button>
                    </div>
                </form>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Filtra per periodo
                </button>
                </h2>
                <form method="POST" name="periodoFiltroForm" id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <select id="periodo" name="periodo" class="form-select mt-3" aria-label="Default select example">
                        <option selected>Scegli mese:</option>
                        <option value="01">Gennaio</option>
                        <option value="02">Febbraio</option>
                        <option value="03">Marzo</option>
                        <option value="04">Aprile</option>
                        <option value="05">Maggio</option>
                        <option value="06">Giugno</option>
                        <option value="07">Luiglio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Settembre</option>
                        <option value="10">Ottobre</option>
                        <option value="11">Novemre</option>
                        <option value="12">Dicembre</option>
                    </select>
                    <div class="input-group mt-3 container">
                        <input id="anno" name="anno" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="inserisci anno">
                    </div>
                    <input id="periodoFiltro" type="hidden" name="periodoFiltro">
                    <div class="text-center mb-2">
                        <button id="btnFiltroPeriodo" type="submit" class="btn btn-outline-primary mt-3">Cerca</button>
                    </div>
                </form>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Filtra per tipologia
                </button>
                </h2>
                <form name="tipoFiltroForm" method="POST" id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <select name="tipo" id="tipo" class="form-select mt-3" aria-label="Default select example">
                        <option selected>Scegli il tipo di uscita</option>
                        <?php echo $options ?>
                    </select>
                    <select id="periodoTipo" name="periodoTipo" class="form-select mt-3" aria-label="Default select example">
                        <option selected>Scegli mese:</option>
                        <option value="01">Gennaio</option>
                        <option value="02">Febbraio</option>
                        <option value="03">Marzo</option>
                        <option value="04">Aprile</option>
                        <option value="05">Maggio</option>
                        <option value="06">Giugno</option>
                        <option value="07">Luiglio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Settembre</option>
                        <option value="10">Ottobre</option>
                        <option value="11">Novemre</option>
                        <option value="12">Dicembre</option>
                    </select>
                    <div class="input-group mt-3 container">
                        <input id="annoTipo" name="annoTipo" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="inserisci anno">
                    </div>
                    <input id="tipoFiltro" type="hidden" name="tipoFiltro">
                    <div class="text-center mb-2">
                        <button id="btnFiltroTipo" type="submit" class="btn btn-outline-primary mt-3">Cerca</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-4">
    <div class="d-flex justify-content-center align-items-center mb-3">
        <a href="<?php echo PATH . '/view/uscitePage/detailsUscite.php' ?>" id="btnFiltroImporto" class="btn btn-outline-primary ">Ricarica</a>
        <h4 class="m-2 text-danger text-center">Totale importo uscite: <br> <?php echo $total ?> €</h4>
    </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Imp</th>
                <th scope="col">Giorno</th>
                <th scope="col">Tipo</th>
                <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $row?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="<?php echo PATH ?>/public/js/detailsUscite.js?ts=<?=time()?>&quot"></script>
</body>
</html>