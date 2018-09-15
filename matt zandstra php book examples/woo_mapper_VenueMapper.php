<?php

class woo_mapper_VenueMapper extends woo_mapper_Mapper {

   function __construct() {
      parent::__construct();
      $this->selectStmt = self::$PDO->prepare(
                         "SELECT * FROM venue WHERE id=?");
      $this->updateStmt = self::$PDO->prepare(
                         "UPDATE venue SET name=?, id=? WHERE id=?");
      $this->insertStmt = self::$PDO->prepare(
                         "INSERT into venue ( name ) values( ? )");
   }

   protected function doCreateObject( array $array ) {
      $obj = new woo_domain_Venue( $array['id'] );
      $obj->setname( $array['name'] );
       return $obj;
   }

   protected function doInsert( woo_domain_DomainObject $object ) {
      $values = array( $object->getname() );
      $this->insertStmt->execute( $values );
      $id = self::$PDO->lastInsertId();
      $object->setId( $id );
   }

   function update( woo_domain_DomainObject $object ) {
      $values = array( $object->getname(), 
                       $object->getid(), $object->getId() );
      $this->updateStmt->execute( $values );
   }

   function selectStmt() {
      return $this->selectStmt;
   }

   protected function targetClass() {
      return "woo_domain_Venue";
   }
}


?>