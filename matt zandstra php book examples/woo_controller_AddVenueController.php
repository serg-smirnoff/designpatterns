<?php

class woo_controller_AddVenueController extends woo_controller_PageController {

   function process() {
      try {
         $request = $this->getRequest();
         $name = $request->getProperty( 'venue_name' );
         if ( is_null( $request->getProperty('submitted') ) ) {
            $request->addFeedback("Выберите имя заведения");
            $this->forward( 'AddVenue.php' );
         } else if ( is_null( $name ) ) {
            $request->addFeedback("Имя должно быть обязательно задано");
            $this->forward( 'AddVenue.php' );
         }
         $venue = new woo_domain_Venue( null, $name );
         $this->forward( "ListVenues.php" );
      } catch ( Exception $e ) {
         $this->forward( 'error.php' );
      }
   }
}


?>