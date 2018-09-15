<?php

class TroopCarrier extends CompositeUnit {
   function addUnit( Unit $unit ) {
      if ( $unit instanceof Cavalry ) {
         throw new UnitException(
                   "Ќельз€ помещать лошадь на транспортное средство");
      }
      super::addUnit( $unit );
   }

   function bombardStrength() {
      return 0;
   }
}

?>