<?php


class StringLiteralHandler implements gi_parse_Handler { 

   function handleMatch( gi_parse_Parser $parser,
                         gi_parse_Scanner $scanner ) {
      $value = $scanner->getContext()->popResult();
      $scanner->getContext()->pushResult(
            new LiteralExpression( $value ) ); 
   }
} 




?>