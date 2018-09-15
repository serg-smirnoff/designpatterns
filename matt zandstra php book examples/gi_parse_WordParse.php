<?php


// В этом оконечном анализаторе проверяется совпадение
// со словом
class gi_parse_WordParse extends gi_parse_Parser { 

   function __construct( $word=null, $name=null, $options=null ) {
      parent::__construct( $name, $options );
      $this->word = $word; 
   } 

   function trigger( gi_parse_Scanner $scanner ) {
      if ( $scanner->tokenType() != gi_parse_Scanner::WORD ) { 
         return false;
      }
      if ( is_null( $this->word ) ) { 
         return true;
      }
      return ( $this->word == $scanner->token() ); 
   } 

   protected function doScan( gi_parse_Scanner $scanner ) {
      $ret = ( $this->trigger( $scanner ) );
      return $ret; 
   }
} 



?>