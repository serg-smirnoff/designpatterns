<?php

abstract class Tile {
   abstract function getWealthFactor();
}

class Plains extends Tile {
   private $wealthfactor = 2;

   function getWealthFactor() {
      return $this->wealthfactor;
   }
}

?>
