<?php

class MyPearException extends PEAR_Exception { }

class MyFeedThing {
   function acquire( $source ) {
      try {
         $myfeed = @new XML_Feed_Parser( $source );
         return $myfeed;
      } catch ( XML_Feed_Parser_Exception $e ) {
         throw new MyPearException( "feed acquisition failed", $e );
      }
   }
}



?>