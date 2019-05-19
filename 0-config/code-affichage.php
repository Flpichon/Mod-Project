<?php

function Head($titre = "") {?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URL_HOME ?>css/bootstrap.min.css" >

    <title><?php echo $titre; ?></title>
  </head>

<?php }

function Js(){
    ?>
    <script src="<?php echo URL_HOME ?>js/jquery.min.js" ></script>
    <script src="<?php echo URL_HOME?>js/popper.min.js"></script>
    <script src="<?php echo URL_HOME ?>js/bootstrap.min.js" ></script>
<?php }