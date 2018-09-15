<?php

class woo_domain_Venue extends woo_domain_DomainObject {
   private $name;
   private $spaces;

   function __construct( $id=null, $name=null ) {
      $this->name = $name;
      $this->spaces = self::getCollection("woo_domain_Space");
      parent::__construct( $id );
   }

   function setSpaces( woo_domain_SpaceCollection $spaces ) {
      $this->spaces = $spaces;
   }

   function getSpaces() {
      return $this->spaces;
   }

   function addSpace( woo_domain_Space $space ) {
      $this->spaces->add( $space );
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