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
        $this->driver->get("http://localhost/webwoo/AddVenue.php");

        $venel = $this->driver->findElement( WebDriverBy::name("venue_name") );
        $venel->sendKeys( "my_test_venue" );
        $venel->submit();

        $tdel = $this->driver->findElement( WebDriverBy::xpath("//td[1]") );
        $this->assertRegexp( "/'my_test_venue' added/", $tdel->getText() );

        $spacel = $this->driver->findElement( WebDriverBy::name("space_name") );
        $spacel->sendKeys( "my_test_space" );
        $spacel->submit();

        $el = $this->driver->findElement( WebDriverBy::xpath("//td[1]") );
        $this->assertRegexp( "/'my_test_space' added/", $el->getText() );

    }
}
?>
