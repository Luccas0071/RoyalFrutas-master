<?php
  include './../app/config.php';
  include './../app/autoload.php';

/*   include './../app/Libraries/DatabaseTeste.php';
  $db = new Database(); */

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= URL?>/public/css/estilos.css" rel="stylesheet">
    <title>Royal Frutas</title>
  </head>
  <body>
    <?php
      include '../app/Views/header.php';
      $rotas = new Rota();  
      include '../app/Views/footer.php';
    ?>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="<?= URL?>public/js/funcoes.js"></script>
  </body>
</html>