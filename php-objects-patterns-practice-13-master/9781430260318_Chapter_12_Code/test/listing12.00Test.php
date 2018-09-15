<?php
namespace test;

/**
 * This class provides any base functionality shared
 * by all tests
 */

require_once "PHPUnit/Framework/TestCase.php";

ob_start();
require_once "listing12.00.php";
ob_end_clean();


class listing1200Test extends \PHPUnit_Framework_TestCase {

    function setUp() {
    }

    function tearDown() {
    }

    function testAppHelper() {
        try {
            $controller = new \woo\controller\ApplicationHelper();
            $controller->getOptions();
            $this->fail( "Exception should have been thrown" );
        } catch ( \Exception $e ) {
            $this->assertTrue( $e instanceof \woo\base\AppException );
        }
    }
}
?>
