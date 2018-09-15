<?php
namespace woo\mapper;
require_once( "woo/mapper/VenueUpdateFactory.php" );
require_once( "woo/domain/Venue.php" );

$vuf = new VenueUpdateFactory();
print_r( $vuf->newUpdate( new \woo\domain\Venue( 334, "The Happy Hairband" ) ) );
?>
