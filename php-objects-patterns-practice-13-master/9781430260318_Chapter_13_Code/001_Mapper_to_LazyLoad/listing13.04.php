<?php
namespace woo\domain;

//require_once( "woo/domain/DomainObject.php" );
abstract class DomainObject{}

class Venue extends DomainObject {
    private $name;
    private $spaces=null;

    function __construct( $id=null, $name=null ) {
        $this->name = $name;
        parent::__construct( $id );
    }

    function setSpaces( SpaceCollection $spaces ) {
        $this->spaces = $spaces;
    } 

    function getSpaces() {
        if ( is_null( $this->spaces ) ) {
            $this->spaces = self::getCollection( Space::class );
        }
        return $this->spaces;
    } 

    function addSpace( Space $space ) {
        $this->getSpaces()->add( $space );
        $space->setVenue( $this );
    }

    function setName( $name_s ) {
        $this->name = $name_s;
        $this->markDirty();
    }

    function getName( ) {
        return $this->name;
    }
    
}

?>
