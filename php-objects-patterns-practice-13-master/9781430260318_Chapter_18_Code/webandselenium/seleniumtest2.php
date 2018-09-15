<?php
require_once('PHPUnit/Framework/TestCase.php');
require_once( "php-webdriver/lib/__init__.php" );


class seleniumtest extends PHPUnit_Framework_TestCase {

    protected function setUp() {
        $host = "http://127.0.0.1:4444/wd/hub";
        $capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->driver = new RemoteWebDriver($host, $capabilities);
    }

    public function testAddVenue() {
    }
}
?>
