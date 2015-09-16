<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Product{
    
    public $id;
    public $name;
    
    function __constuct( $id, $name ){
        $this->id = $id;
        $this->name = $name;
    }
    
}

class ProductFacade {

    private $products = array();
    
    function __construct( $file ){
        $this->file = $file;
        $this->compile();
    }

    public function getProductFileLines( $file ){
        return file ( $file );
    }
    
    public function getProductObjectFromID( $id, $productname ){
        return new Product ( $id, $productname );
    }

    public function getNameFromLine( $line ){
        return 'test';
    }

    public function getIDFromLine( $line ){
        return '1';
    }
    
    private function compile(){
        
        $lines = getProductFileLines ($this->file);
        
        foreach ( $lines as $line ) {
          $id = getIDFromLine ( $line );
          $name = getNameFromLine ( $line );
          $this->products[$id] = geetProductObjectsFromID ( $id, $name );
        }
        
    }
    
}

$facade = new ProductFacede ( 'test.txt' );
$facade->getProduct( 234 );