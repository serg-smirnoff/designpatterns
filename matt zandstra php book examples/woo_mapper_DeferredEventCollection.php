<?php

class woo_mapper_DeferredEventCollection
            extends woo_mapper_EventCollection {
   private $stmt;
   private $valueArray;
   private $run=false;

   function __construct( woo_mapper_Mapper $mapper, PDOStatement $stmt_handle,
                         array $valueArray ) {
      parent::__construct( null, $mapper );
      $this->stmt = $stmt_handle;
      $this->valueArray = $valueArray;
   }

   function notifyAccess() {
      if ( ! $this->run ) {
         $this->stmt->execute( $this->valueArray );
         $this->raw = $this->stmt->fetchAll();
         $this->total = count( $this->raw );
      }
      $this->run=true;
   }
}



?>