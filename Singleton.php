<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Preferences {
    
    private $props = array();
    
    private static $instance;                       // static property
    
    private function __construct()   {}             // closed constructor. can not create an instance of the class because it's private
        
    public static function getInstance()            // static method
    {
      if ( empty ( self::$instance ) ) {
          self::$instance = new Preferences();
      }
      return self::$instance;
    }
    
    public function setProperty($key, $val){
        $this->props[$key] = $val;
    }
    
    public function getProperty($key){
        return $this->props[$key];
    }
    
}

$pref = Preferences::getInstance();
$pref->setProperty( "name", "Иван" );
unset ($pref);

$pref2 = Preferences::getInstance();
print $pref2->getProperty( "name" );