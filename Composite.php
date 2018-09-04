<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UnitException extends Exception {}

abstract class Unit {

    function getComposite(){
        return null;
    }
    
    function addUnit( Unit $unit ){
        throw new UnitExeption ( get_class ( $this ) ."относиться к листьям" );
    }
    
    function removeUnit( Unit $unit ){
        throw new UnitExeption ( get_class ( $this ) ."относиться к листьям" );
    }
    
    abstract function bombardStrength();
       
}

class Army extends Unit {
    
    private $units = array();
    
    function addUnit ( Unit $unit ){
        if ( in_array ( $unit, $this->units, true ) ){
            return;
        }
        $this->units[] = $unit;
    }
    
    function removeUnit ( Unit $unit ){
        
        $units = array();
        
        foreach ( $this->units as $thisunit ){
            $units = array();
            if ( $unit !== $thisunit ){
               $units[] = $thisunit;
            }
        }
        $this->unit = $units;
    }
    
    function bombardStrength(){
        $ret = 0;
        foreach ( $this->units as $unit ){
            $ret += $unit->bombardStrength();
        }
        return $ret;
    }
}

class TroopCarrier extends CompositeUnit{
    
    function addUnit( Unit $unit ){
        if ( $unit instanceof Cavalry ){
            throw new UnitException( " Нельзя помещать лошадь на бронетранспортер " );
        }
        super::addUnit( $unit );
    }
    
    function bombardStrength(){
        return 0;
    }
    
}

class Archer extends Unit{
    function bombardStrength(){return 4;}
}

class LaserCannonUnit extends Unit{
    function bombardStrength(){return 44;}
}

abstract class CompositeUnit extends Unit{
    
    private $units = array();
    
    function getComposite(){
        return $this;
    }
    
    protected function units(){
        return $this->units;
    }
    
    function removeUnit ( Unit $unit ){
        $units = array();
        foreach ( $this->units as $thisunit ){
            if ( $unit !== $thisunit ) {
                $units[] = $thisunit;
            }
        }
        $this->units = $units;
    }
    
    function addUnit( Unit $unit ){
        if ( in_array( $unit, $this->units, true )){
            return;
        }
        $this->units[] = $unit;
    }
    
}

$main_army = new Army();

$main_army->addUnit ( new Archer() );
$main_army->addUnit ( new LaserCannonUnit() );

$sub_army = new Army();

$sub_army->addUnit ( new Archer() );
$sub_army->addUnit ( new Archer() );
$sub_army->addUnit ( new Archer() );

$main_army->addUnit( $sub_army );

var_dump ( $sub_army );
var_dump ( $main_army );
