<?php


interface gi_parse_Handler {

   function handleMatch( gi_parse_Parser $parser, 
                         gi_parse_Scanner $scanner );
}



?>