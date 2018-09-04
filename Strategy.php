<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class Lesson {
    
    private $duration;
    private $costStrategy;
    
    function __construct( $duration, CostStrategy $strategy ){
        $this->duration     = $duration;
        $this->costStrategy = $strategy;
    }
    
    function cost(){
       return $this->costStrategy->cost ( $this );
    }
    
    function chargeType(){
        return $this->costStrategy->chargeType();
    }

    function getDuration(){
        return $this->duration;
    }
    
}

class Lecture extends Lesson{}
class Seminar extends Lesson{}

/*
 * Strategy 
 */

abstract class CostStrategy{
    abstract function cost( Lesson $lesson );
    abstract function chargeType();
}

class TimedCostStrategy extends CostStrategy{
    
    function cost( Lesson $lesson ){
        return ( $lesson->getDuration() * 5 );
    }
    
    function chargeType(){
        return "Почасовая оплата";
    }
    
}    

class FixedCostStrategy extends CostStrategy{
    
    function cost( Lesson $lesson){
        return 30;
    }
    
    function chargeType(){
        return "Фиксированная оплата";
    }
    
} 

$lessons[] = new Seminar ( 4, new TimedCostStrategy() );
$lessons[] = new Lecture ( 4, new FixedCostStrategy() );

foreach ( $lessons as $lesson ){
    print "Оплата за занятие {$lesson->cost()}\n\n";
    print "Тип оплаты {$lesson->chargeType()}\n\n";
}
