<?php

// Здесь достигается совпадение, если один или более
// вложенных анализаторов достигают совпадения. 
class gi_parse_RepetitionParse extends gi_parse_CollectionParse { 
   private $min; 
   private $max; 

   function __construct( $min=0, $max=0, $name=null, $options=null ) {
      parent::__construct( $name, $options );
      if ( $max < $min && $max > 0 ) { 
         throw new Exception( 
                "maximum ( $max ) larger than minimum ( $min )");
      }
       $this->min = $min;
       $this->max = $max; 
   } 

   function trigger( gi_parse_Scanner $scanner ) {
      return true;
   } 

   protected function doScan( gi_parse_Scanner $scanner ) {
      $start_state = $scanner->getState();
      if ( empty( $this->parsers ) ) { 
         return true;
      }
      $parser = $this->parsers[0];
      $count = 0; 

      while ( true ) {
         if ( $this->max > 0 && $count >= $this->max ) {
            return true;
         } 

         if ( ! $parser->trigger( $scanner ) ) {
            if ( $this->min == 0 || $count >= $this->min ) {
               return true; 
            } else {
               $scanner->setState( $start_state );
               return false; 
            }
         }

         if ( ! $parser->scan( $scanner ) ) { 
            if ( $this->min == 0 || $count >= $this->min ) {
               return true; 
            } else {
               $scanner->setState( $start_state );
               return false; 
            }
         }
         $count++; 
      }
      return true;
   } 
} 



?>