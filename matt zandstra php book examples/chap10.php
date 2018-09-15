<?php
print "<pre>";

//$tile = new PollutedPlains();
//print $tile->getWealthFactor();

//$tile = new Plains();
//print $tile->getWealthFactor(); // 2

//$tile = new DiamondDecorator( new Plains() );
//print $tile->getWealthFactor(); // Возвращается 4

//$tile = new PollutionDecorator(
//              new DiamondDecorator( new Plains() ));
//print $tile->getWealthFactor(); // Возвращается 0

//$process = new AuthenticateRequest( 
//              new StructureRequest(
//                 new LogRequest (
//                    new MainProcess()
//            )));
//$process->process( new RequestHelper() );

/*
$lines = getProductFileLines( 'test.txt' );
$objects = array();
foreach ( $lines as $line ) {
   $id   = getIDFromLine  ( $line );
   $name = getNameFromLine( $line );
   $objects[$id] = getProductObjectFromID( $id, $name );
}
var_dump($objects);
*/

$facade = new ProductFacade( 'test.txt' );
$result=$facade->getProduct( 234 );
var_dump($result);


print "</pre>";

function getProductFileLines( $file ) {
   return file( $file );
}

function getProductObjectFromId( $id, $productname ) {
// Выполняем запрос к базе данных 
   return new Product( $id, $productname );
}

function getNameFromLine( $line ) {
   if ( preg_match( "/.*-(.*)\s\d+/", $line, $array ) ) {
      return str_replace( '_',' ', $array[1] );
   }
   return '';
}

function getIDFromLine( $line ) {
   if ( preg_match( "/^(\d{1,3})-/", $line, $array ) ) {
      return $array[1];
   }
   return -1;
}

class Product {
   public $id;
   public $name;

   function __construct( $id, $name ) {
      $this->id = $id;
      $this->name = $name;
   }
}














function __autoload( $classname ) {
   include_once( "{$classname}.php" );
}

?>