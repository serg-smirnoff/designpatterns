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

abstract class TileDecorator extends Tile {
   protected $tile;

   function __construct( Tile $tile ) {
      $this->tile = $tile;
   }
}


?>