<?php
class DiamondPlains extends Plains {
   function getWealthFactor() {
      return parent::getWealthFactor() + 2;
   }
}

?>