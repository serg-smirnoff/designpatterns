<?php
require_once('DBFace.php');
require_once('PHPUnit/Framework/TestCase.php');


class ToolTest extends PHPUnit_Framework_TestCase {
    private $mapper = null;
    private $face = null;

    public function setUp() {
        $face = new DBFace("sqlite::memory:");
        $face->query("create table user ( id INTEGER PRIMARY KEY, name TEXT )");
        $face->query("insert into user (name) values('bob')");
        $face->query("insert into user (name) values('harry')");
        $this->mapper = new ToolMapper( $face );
        $this->face = $face;

    }

    function testTool() {
        $result = $this->face->query("select * from user");
        $names = array();
        while ( $row = $result->fetch() ) {
            $names[] = $row['name'];
        }
        $this->assertEquals( count( $names ), 2 );
        $this->assertTrue( in_array( "bob", $names ) );
        $this->assertTrue( in_array( "harry", $names ) );
    }
}

class ToolMapper {
    function __construct( DBFace $face ) {
        //..
    }
}
?>
