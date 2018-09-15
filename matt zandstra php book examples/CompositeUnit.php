<?php

abstract class CompositeUnit extends Unit {
   private $units = array();

   function getComposite() {
      return $this;
   }

   protected function units() {
      return $this->units;
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
/*
   function addUnit( Unit $unit ) {
      if ( in_array( $unit, $this->units, true ) ) {
         return;
      }
      $this->units[] = $unit;
   }
*/
   function addUnit( Unit $unit ) {
      foreach ( $this->units as $thisunit ) {
         if ( $unit === $thisunit ) {
            return;
         }
      }
      $unit->setDepth($this->depth+1);
      $this->units[] = $unit;
   }



   function textDump( $num=0 ) {
      $ret = parent::textDump( $num );
      foreach ( $this->units as $unit ) {
         $ret .= $unit->textDump( $num + 1 );
      }
      return $ret;
   }

/*

   function accept( ArmyVisitor $visitor ) {
      $method = "visit" . get_class( $this );
      $visitor->$method( $this );
      foreach ( $this->units as $thisunit ) {
         $thisunit->accept( $visitor );
      }
   }
*/

   function accept( ArmyVisitor $visitor ) {
      parent::accept( $visitor );
      foreach ( $this->units as $thisunit ) {
         $thisunit->accept( $visitor );
      }
   }


}

?>