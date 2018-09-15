<?php
namespace woo\mapper;
//...

abstract class Collection implements \Iterator {
    protected $mapper;
    protected $total = 0;
    protected $raw = array();

    private $result;
    private $pointer = 0;
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

    public function rewind() {
       $this->pointer = 0;
    }

   public function current() {
       return $this->getRow( $this->pointer );
   }

   public function key() {
       return $this->pointer;
   }

   public function next() {
        $row = $this->getRow( $this->pointer );
        if ( $row ) { $this->pointer++; }
        return $row;
   }

   public function valid() {
       return ( ! is_null( $this->current() ) );
   }
}

/// dummy classes to test code

class WrapperCollection extends Collection {
    function __construct( $array, MockMapper $mapper ) {
        parent::__construct( $array, $mapper );
    }

    function targetClass() {
        return Wrapper::class;
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
foreach ( $collection as $wrapper ) {
    print_r( $wrapper );
}
?>
