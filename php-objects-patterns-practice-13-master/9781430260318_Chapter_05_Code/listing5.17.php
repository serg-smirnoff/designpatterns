<?php
function replaceUnderscores( $classname ) {
    $path = str_replace('_', DIRECTORY_SEPARATOR, $classname );
    if ( file_exists( "{$path}.php" ) ) {
        require_once( "{$path}.php" );
    }
}
spl_autoload_register( 'replaceUnderscores' );

$x = new ShopProduct();
$y = new business_ShopProduct();
?>
