<?php
namespace test;

require_once "PHPUnit/Framework/TestCase.php";

ob_start();
require_once "listing12.06.php";
ob_end_clean();

class listing1206Test extends \PHPUnit_Framework_TestCase {

    function setUp() { 
        \woo\base\ApplicationRegistry::clean();
    }

    function tearDown() { }

    function testController() {
        ob_start();
        \woo\controller\Controller::run();
        $output = ob_get_contents();
        ob_end_clean();

        // this tests the feedback from the default command
        $this->assertTrue( preg_match( "/Welcome to WOO/si", $output ) === 1 );

        // this tests the title of the default view 
        $this->assertTrue( preg_match( "/Woo! it's WOO!/si", $output ) === 1 );
    }

    function testApplicationController() {
        if ( file_exists( "data/dsn" ) ) {
            unlink("data/dsn");
        }
        $helper = \woo\controller\ApplicationHelper::instance();
        $helper->init();
        $this->assertTrue( ! is_null( $helper ) );
        $this->assertEquals( \woo\base\ApplicationRegistry::getDSN(), "sqlite:./data/woo.db" );
        $this->assertTrue( file_exists( "data/dsn" ) );
    }

    function testCommandResolver() {
        $resolver = new \woo\command\CommandResolver();
        $request = new \woo\controller\Request();
        $cmd = $resolver->getCommand( $request );
        $this->assertTrue( $cmd instanceof \woo\command\DefaultCommand );

        $request->setProperty("cmd", "AddVenue" );
        $cmd = $resolver->getCommand( $request );
        $this->assertTrue( $cmd instanceof \woo\command\AddVenue );
    }
}
?>
