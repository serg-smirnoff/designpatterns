<?php
namespace woo\mapper;
//...

abstract class Collection {
    protected $mapper;
    protected $total = 0;
    protected $raw = array();

    private $result;
    private $objects = array();

    function __construct( array $raw=null, Mapper $mapper=null ) {
        if ( ! is_null( $raw ) && ! is_null( $mapper ) ) {
            $this->raw = $raw;
            $this->total = count( $raw );
        }
        $this->mapper = $mapper;
    }

    function add( \woo\domain\DomainObject $object ) {
        $class = $this->targetClass();
        if ( ! ($object instanceof $class ) ) {
            throw new Exception("This is a {$class} collection");
        }
        $this->notifyAccess();
        $this->objects[$this->total] = $object;
        $this->total++;
    }

    function getGenerator() {
        for ( $x = 0; $x<$this->total; $x++ ) {
            yield ( $this->getRow($x ) );
        }
    }

    abstract function targetClass();

    protected function notifyAccess() {
        // deliberately left blank!
    }

    private function getRow( $num ) {
        $this->notifyAccess();
        if ( $num >= $this->total || $num < 0 ) {
            return null;
        }
        if ( isset( $this->objects[$num]) ) {
            return $this->objects[$num];
        }

        if ( isset( $this->raw[$num] ) ) {
            $this->objects[$num]=$this->mapper->createObject( $this->raw[$num] );
            return $this->objects[$num];
        }
    }
}

/// dummy classes to test code

class WrapperCollection extends Collection {
    function __construct( $array, MockMapper $mapper ) {
        parent::__construct( $array, $mapper );
    }
    function targetClass() {
        return \woo\mapper\Wrapper::class;
    }
}

abstract class Mapper {
    abstract function createObject( array $fields );
}

class MockMapper extends Mapper {
    function createObject( array $fields ) {
        return new Wrapper( $fields );
    }
}

class Wrapper {
    private $fields;
    function __construct( array $fields ) {
        $this->fields = $fields;
    }
    function getFields() {
        return $this->fields;
    }
}

$blah = array( 
            array( "name" => "bob" ),
            array( "name" => "mary" ),
            array( "name" => "sue" )
        );
$collection = new WrapperCollection( $blah, new MockMapper() );
$gen = $collection->getGenerator();

foreach ( $gen as $wrapper ) {
    print_r( $wrapper );
}
?>
