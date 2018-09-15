<?php
require_once( "woo/domain/Venue.php");
require_once( "woo/domain/Space.php");

$venue = new \woo\domain\Venue( null, "The Green Trees" );
$venue->addSpace(
    new \woo\domain\Space( null, 'The Space Upstairs' ) );
$venue->addSpace(
    new \woo\domain\Space( null, 'The Bar Stage' ) );

// this could be called from the controller or a helper class
// (uncomment print statement in \woo\domain\ObjectWatcher to see writes)
\woo\domain\ObjectWatcher::instance()->performOperations();
