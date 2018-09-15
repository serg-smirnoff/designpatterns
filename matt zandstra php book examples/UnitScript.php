<?php

class UnitScript {
   static function joinExisting( Unit $newUnit,
                                 Unit $occupyingUnit ) {

      if ( ! is_null( $comp = $occupyingUnit->getComposite() ) ) {
         $comp->addUnit( $newUnit );
      } else {
         $comp = new Army();
         $comp->addUnit( $occupyingUnit );
         $comp->addUnit( $newUnit );
      }
      return $comp;
   }
}


?>