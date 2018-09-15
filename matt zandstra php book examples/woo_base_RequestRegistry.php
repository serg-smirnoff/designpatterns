<?php

class woo_base_RequestRegistry extends woo_base_Registry {
   private $values = array();
   private static $instance;

   private function __construct() {}

   static function instance() {
      if ( ! isset(self::$instance) ) { 
         self::$instance = new self();
      }
      return self::$instance;
   }

   protected function get( $key ) {
      if ( isset( $this->values[$key] ) ) {
         return $this->values[$key];
      }
      return null;
   }

   protected function set( $key, $val ) {
      $this->values[$key] = $val;
   }

   static function getRequest() {
      return self::instance()->get('request');
   }

   static function setRequest( woo_controller_Request $request ) {
      return self::instance()->set('request', $request );
   }
}


?>