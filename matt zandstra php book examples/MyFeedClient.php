<?php

class MyFeedClient {
   function __construct() {
      PEAR_Exception::addObserver( array( $this, "notifyError") );
   }

   function process() {
      try {
        $feedt = new MyFeedThing();
        $parser = $feedt->acquire('wrong.xml');
      } catch ( Exception $e ) {
        print "an error occurred. See log for details\n";
      }
   }

   function notifyError( PEAR_Exception $e ) {
      print get_class( $e ).":";
      print $e->getMessage()."\n";
      $cause = $e->getCause();
      if ( is_object( $cause ) ) {
         print "[cause] ".get_class( $cause ).":";
         print $cause->getMessage()."\n";
      } else if ( is_array( $cause ) ) {
         foreach( $cause as $sub_e ) {
            print "[cause] ".get_class( $sub_e ).":";
            print $sub_e->getMessage()."\n";
         }
      }
      print "----------------------\n";
   }
}


?>
