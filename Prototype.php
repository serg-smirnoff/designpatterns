<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sea {}
class EarthSea extends Sea{}
class MarsSea extends Sea{}

class Plains {}
class EarthPlains extends Plains{}
class MarsPlains extends Plains{}

class Forest {}
class EarthForest extends Forest{}
class MarsForest extends Forest{}

class TerrainFactory {
    
    private $sea;
    private $forest;
    private $plains;
    
    function __construct( Sea $sea, Plains $plains, Forest $forest ){
        $this->sea = $sea;
        $this->plains = $plains;        
        $this->forest = $forest;        
    }
    
    function getSea(){
        return clone $this->sea;
    }
    
    function getPlains(){
        return clone $this->plains;
    }

    function getForest(){
        return clone $this->forest;
    }
    
}
