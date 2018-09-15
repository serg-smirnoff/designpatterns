<?php

class woo_FrontController {

   function handleRequest() {
      $request = new woo_controller_Request();
      $app_c   = woo_base_ApplicationRegistry::appController();
      while( $cmd = $app_c->getCommand( $request ) ) {
         print "Выполняется " . get_class( $cmd ) . "\n";
         $cmd->execute( $request );
      }
      $this->invokeView( $app_c->getView( $request ) );
   }

   function invokeView( $target ) {
      include( "woo/view/$target.php" );
      exit;
   }


}


?>