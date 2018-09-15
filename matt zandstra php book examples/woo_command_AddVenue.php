<?php

class woo_command_AddVenue extends woo_command_Command {

   function doExecute( woo_controller_Request $request ) {
      $name = $request->getProperty("venue_name");
      if ( ! $name ) {
         $request->addFeedback( "Имя не задано" );
         return self::statuses('CMD_INSUFFICIENT_DATA');
      } else {
         $venue_obj = new woo_domain_Venue( null, $name );
         $request->setObject( 'venue', $venue_obj );
         $request->addFeedback( "'$name' добавлено в ({$venue_obj->getId()})" );
         return self::statuses('CMD_OK');
      }
   }
}

?>