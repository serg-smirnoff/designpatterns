<?php
print "<pre>";


$store=new UserStore();
$store->addUser( "bob williams",
                 "bob@example.com",
                 "12345" ); 
$user = $store->getUser( "bob@example.com" );
print_r( $user );

$validator = new Validator( $store );
if ( $validator->validateUser( "bob@example.com", "12345" ) ) {
   print "Привет, друзьям!\n";
}




print "</pre>";


function __autoload( $classname ) {
//   print $classname . "\n";
   include_once( "{$classname}.php" );
}


?>
