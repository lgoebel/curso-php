<?php 
require_once 'config/config.php';
require_once 'modules/hg-api.php';

$hg = new HG_API_WEATHER(HG_API_KEY_WEATHER);
$tempo = $hg->weather();

if($hg->is_error() == false){
    $max = ($tempo['max'] < 25 ) ? 'info' : 'danger';
}

if($hg->is_error() == false){
    $min = ($tempo['min'] < 25 ) ? 'info' : 'danger';
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Temperatura Pará de Minas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Temperatura do dia: </p>
                <?php if ($hg->is_error() == false): ?>
                  <p>Temperatura Máxima: <span class="badge bg-<?php echo($max); ?>"><?php echo( $tempo['max']); ?></span></p>
                  <p>Temperatura Minima: <span class="badge bg-<?php echo($min); ?>"><?php echo( $tempo['min']); ?></span></p>
                <?php else : ?>
                  <p><span class="badge bg-danger">Serviços indisponíveis</span></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>