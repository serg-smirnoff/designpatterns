<?php

abstract class ArmyVisitor {
   abstract function visit( Unit $node );

   function visitArcher( Archer $node ) {
      $this->visit( $node );
   }

   function visitCavalry( Cavalry $node ) {
      $this->visit( $node );
   }

   function visitLaserCannonUnit( LaserCannonUnit $node ) {
      $this->visit( $node );
   }

   function visitTroopCarrierUnit( TroopCarrierUnit $node ) {
      $this->visit( $node );
   }

   function visitArmy( Army $node ) {
      $this->visit( $node );
   }
}

?>