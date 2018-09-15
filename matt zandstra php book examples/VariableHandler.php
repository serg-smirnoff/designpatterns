<?php


class VariableHandler implements gi_parse_Handler { 

   function handleMatch( gi_parse_Parser $parser,
                         gi_parse_Scanner $scanner ) {
      $varname = $scanner->getContext()->popResult();
      $scanner->getContext()->pushResult(
              new VariableExpression( $varname ) ); 
   }
} 



?>