<?php

/*
class Army extends Unit {
   private $units = array();

   function addUnit( Unit $unit ) {
      if ( in_array( $unit, $this->units, true ) ) {
         return;
      }
      $this->units[] = $unit;
   }

   function removeUnit( Unit $unit ) {
      $units = array();
      foreach ( $this->units as $thisunit ) {
         if ( $unit !== $thisunit ) {
            $units[] = $thisunit;
         }
      }
      $this->units = $units;
   }

   function bombardStrength() {
      $ret = 0;
      foreach( $this->units as $unit ) {
         $ret += $unit->bombardStrength();
      }
      return $ret;
   }

   function addUnit( Unit $unit ) {
      foreach ( $this->units as $thisunit ) {
         if ( $unit === $thisunit ) {
            return;
         }
      }
      $unit->setDepth($this->depth+1);
      $this->units[] = $unit;
   }

}
*/

class Army extends CompositeUnit {
   function bombardStrength() {
      $ret = 0;
      foreach( $this->units() as $unit ) {
         $ret += $unit->bombardStrength();
      }
      return $ret;
   }
}


?>