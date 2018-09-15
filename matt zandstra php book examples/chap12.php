<?php
print "<pre>";

/*
$reg = Registry::instance();
$reg->setRequest( new Request() );

$reg = Registry::instance();
var_dump( $reg->getRequest() );

*/


//require( "woo/controller/Controller.php" );
//woo_controller_Controller::run();


$controller = new woo_controller_AddVenueController();
$controller->process();













print "</pre>";


function __autoload( $classname ) {
   print $classname . "\n";
   include_once( "{$classname}.php" );
}


?>
