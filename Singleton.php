<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Preferences {
    
    private $props = array();
    
    private static $instance;                       // статическое свойство
    
    private function __construct()   {}             // закрытый конструктор. теперь нельзя создать экземпляр класса из вне
        
    public static function getInstance()            // статический метод
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