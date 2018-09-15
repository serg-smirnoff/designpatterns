<?php

namespace {
function myNamespaceAutoload( $path ) {
    print "classname: $path\n";
    if ( preg_match( '/\\\\/', $path ) ) {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path );
    } 
    if ( file_exists( "{$path}.php" ) ) {
        require_once( "{$path}.php" );
    }
}

spl_autoload_register( 'myNamespaceAutoload' );

$x = new ShopProduct();
$z = new business\ShopProduct2();
$a = new \business\ShopProduct3();

}


namespace business {
$a = new ShopProduct3();
}

namespace pants {
    use business\ShopProduct2 as tweetiepie;
    $a = new tweetiepie();
}

?>
