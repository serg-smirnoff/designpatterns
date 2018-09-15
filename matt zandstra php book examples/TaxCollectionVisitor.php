<?php

class TaxCollectionVisitor extends ArmyVisitor {
   private $due=0;
   private $report="";

   function visit( Unit $node ) {
      $this->levy( $node, 1 );
   }

   function visitArcher( Archer $node ) {
      $this->levy( $node, 2 );
   }

   function visitCavalry( Cavalry $node ) {
      $this->levy( $node, 3 );
   }

   function visitLaserCannonUnit( LaserCannonUnit $node ) {
      $this->levy( $node, 5 );
   }

   private function levy( Unit $unit, $amount ) {
      $this->report .= "Налог для " . get_class( $unit );
      $this->report .= ": $amount\n";
      $this->due += $amount;
   }

   function getReport() {
      return $this->report;
   }

   function getTax() {
      return $this->due;
   }
}

?>