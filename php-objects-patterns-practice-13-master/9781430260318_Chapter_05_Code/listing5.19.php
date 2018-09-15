<?php

namespace {

function replaceUnderscores( $classname ) {
    //print "underscores\n";
    $path = str_replace('_', DIRECTORY_SEPARATOR, $classname );
    if ( file_exists( "{$path}.php" ) ) {
        require_once( "{$path}.php" );
    }
}

function myNamespaceAutoload( $path ) {
    //print "namespace\n";
    if ( preg_match( '/\\\\/', $path ) ) {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path );
    } 
    if ( file_exists( "{$path}.php" ) ) {
        require_once( "{$path}.php" );
    }
}

spl_autoload_register( 'replaceUnderscores' );
spl_autoload_register( 'myNamespaceAutoload' );

$x = new ShopProduct();
$y = new business_ShopProduct();
$z = new business\ShopProduct2();
$a = new \business\ShopProduct3();
}


namespace business {
//$a = new \business\ShopProduct3();
$a = new ShopProduct3();
}
namespace pants {
    use business\ShopProduct2 as tweetiepie;
    $a = new tweetiepie();
}

?>
