<?php

abstract class woo_domain_DomainObject {
   private $id = -1;

   function __construct( $id=null ) {
      if ( is_null( $id ) ) {
         $this->markNew();
      } else {
         $this->id = $id;
      }
   }

   function markNew() {
      woo_domain_ObjectWatcher::addNew( $this );
   }

   function markDeleted() {
      woo_domain_ObjectWatcher::addDelete( $this );
   }

   function markDirty() {
      woo_domain_ObjectWatcher::addDirty( $this );
   }

   function markClean() {
      woo_domain_ObjectWatcher::addClean( $this );
   }

   function setId( $id ) {
      $this->id = $id;
   }

   function getId( ) {
      return $this->id;
   }

   function finder() {
      return self::getFinder( get_class( $this ) );
   }

   static function getFinder( $type ) {
      return woo_domain_HelperFactory::getFinder( $type );
   }

}

?>