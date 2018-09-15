<?php

print "<pre>";



$context = new gi_parse_Context();
$user_in = "\$input equals '4' or \$input equals 'four'";
$reader = new gi_parse_StringReader( $user_in );
$scanner = new gi_parse_Scanner( $reader, $context ); 

while ( $scanner->nextToken() != gi_parse_Scanner::EOF ) {
   print $scanner->token();
   print "\t{$scanner->char_no()}";
   print "\t{$scanner->getTypeString()}\n";
} 


print "</pre>";


function __autoload( $classname ) {
//   print $classname . "\n";
   include_once( "{$classname}.php" );
}

?>