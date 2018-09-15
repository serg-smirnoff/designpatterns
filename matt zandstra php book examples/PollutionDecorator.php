<?php

class PollutionDecorator extends TileDecorator {
   function getWealthFactor() {
      return $this->tile->getWealthFactor()-4;
   }
}

?>