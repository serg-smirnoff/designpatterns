<?php
/*
class Registry {
   private static $instance;
   private $request;

   private function __construct() { }

   static function instance() {
      if ( ! isset( self::$instance ) ) { 
                    self::$instance = new self();
      }
      return self::$instance;
   }

   function getRequest() {
      return $this->request;
   }

   function setRequest( Request $request ) {
      $this->request = $request;
   }
}
*/

class Registry {
   private static $instance;
   private $values = array();
   private $treeBuilder;
   private $conf;

   private function __construct() { }

   static function instance() {
      if ( ! isset( self::$instance ) ) {
                    self::$instance = new self();
      }
      return self::$instance;
   }

   function get( $key ) {
      if ( isset( $this->values[$key] ) ) {
        return $this->values[$key];
      }
      return null;
   }

   function set( $key, $value ) {
      $this->values[$key] = $value;
   }

   function getRequest() {
      return $this->request;
   }

   function setRequest( Request $request ) {
      $this->request = $request;
   }


   function treeBuilder() {
      if ( ! isset( $this->treeBuilder ) ) {
         $this->treeBuilder = new TreeBuilder(
                               $this->conf()->get('treedir') );
      }
      return $this->treeBuilder;
   }

   function conf() {
      if ( ! isset( $this->conf ) ) {
         $this->conf = new Conf();
      }
      return $this->conf;
   }





}


// Пустой класс для тестирования
class Request {}
class TreeBuilder {}
class Conf {}


?>