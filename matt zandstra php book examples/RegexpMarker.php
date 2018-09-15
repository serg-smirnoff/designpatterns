<?php

class RegexpMarker extends Marker {
   function mark( $response ) {
      return ( preg_match( $this->test, $response ) );
   }
}

?>