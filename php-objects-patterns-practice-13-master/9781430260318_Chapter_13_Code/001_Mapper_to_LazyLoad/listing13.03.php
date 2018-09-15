<?php
require_once( "woo/domain/HelperFactory.php" );
require_once( "woo/domain/Venue.php" );
use woo\domain as dom;
//$collection = \woo\domain\HelperFactory::getCollection("woo\\domain\\Venue");

$collection = \woo\domain\HelperFactory::getCollection( dom\Venue::class );
$collection->add( new \woo\domain\Venue( null, "Loud and Thumping" ) );
$collection->add( new \woo\domain\Venue( null, "Eeezy" ) );
$collection->add( new \woo\domain\Venue( null, "Duck and Badger" ) );

foreach( $collection as $venue ) {
    print $venue->getName()."\n";
}


$collection = \woo\domain\Venue::getCollection();
$collection->add( new \woo\domain\Venue( null, "2Loud and Thumping" ) );
$collection->add( new \woo\domain\Venue( null, "2Eeezy" ) );
$collection->add( new \woo\domain\Venue( null, "2Duck and Badger" ) );

foreach( $collection as $venue ) {
    print $venue->getName()."\n";
}

?>
