<?php
   try {
      $venues = woo_domain_Venue::findAll();
   } catch ( Exception $e ) {
      include( 'error.php' );
      exit(0);
   }

// Стандартная страница расположена ниже
?>

<html>
   <head>
      <title>Заведения</title>
   </head>

   <body>
      <h1>Заведения</h1>
<?php foreach( $venues as $venue ) { ?>
<?php    print $venue->getName(); ?> <br />
<?php } ?>
   </body>
</html>
