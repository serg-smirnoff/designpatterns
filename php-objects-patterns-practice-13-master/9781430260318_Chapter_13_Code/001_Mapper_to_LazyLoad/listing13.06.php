<?php
require_once("woo/domain/Venue.php");

$venue = new \woo\domain\Venue();
$mapper = $venue->finder();

$venue->setName( "The Likey Lounge" );
$mapper->insert( $venue );
$venue = $mapper->find( $venue->getId() );
print_r( $venue );
$venue->setName( "The Bibble Beer Likey Lounge" );
$mapper->update( $venue );
$venue = $mapper->find( $venue->getId() );
print_r( $venue );
?>
