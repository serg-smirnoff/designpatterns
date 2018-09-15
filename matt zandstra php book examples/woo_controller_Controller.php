<?php

class woo_controller_Controller {
   private $applicationHelper;

   private function __construct() {}

   static function run() {
      $instance = new woo_controller_Controller();
      $instance->init();
      $instance->handleRequest();
   }

   function init() {
      $applicationHelper =
           woo_controller_ApplicationHelper::instance();
      $applicationHelper->init();
   }

   function handleRequest() {
      $request = new woo_controller_Request();
      $cmd_r   = new woo_command_CommandResolver();
      $cmd     = $cmd_r->getCommand( $request );
      $cmd->execute( $request );
   }
}


?>