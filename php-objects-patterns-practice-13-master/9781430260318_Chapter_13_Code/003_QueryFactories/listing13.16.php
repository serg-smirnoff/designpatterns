<?php
namespace woo\mapper;
require_once( "woo/mapper/VenueSelectionFactory.php" );
require_once( "woo/mapper/VenueIdentityObject.php" );
require_once( "woo/domain/Venue.php" );

$vio = new VenueIdentityObject();
$vio->field("name")->eq("The Happy Hairband");

$vsf = new VenueSelectionFactory();
print_r( $vsf->newSelection( $vio ) );
?>
