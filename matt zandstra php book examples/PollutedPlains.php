<?php

class PollutedPlains extends Plains {
   function getWealthFactor() {
      return parent::getWealthFactor() - 4;
   }
}

?>