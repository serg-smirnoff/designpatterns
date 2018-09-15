<?php

abstract class woo_controller_PageController {
   private $request;

   function __construct() {
      $request = woo_base_RequestRegistry::getRequest();
         if ( is_null( $request ) ) {
            $request = new woo_controller_Request();
         }
      $this->request = $request;
   }

   abstract function process();

   function forward( $resource ) {
      include( $resource );
      exit( 0 );
   }

   function getRequest() {
      return $this->request;
   }
}


?>