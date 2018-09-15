<?php

class MatchMarker extends Marker {
   function mark( $response ) {
      return ( $this->test == $response );
   }
}

?>