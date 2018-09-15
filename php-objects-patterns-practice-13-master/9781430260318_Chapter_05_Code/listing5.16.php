<?php

function straightIncludeWithCase( $classname ) {
    $file = "{$classname}.php";
    if ( file_exists( $file ) ) { 
        require_once( $file );
    }
}

spl_autoload_register( 'straightIncludeWithCase' );

$product = new ShopProduct( 'The Darkening', 'Harry', 'Hunter', 12.99 );
?>
