<?php
/*

class woo_mapper_EventIdentityObject
           extends woo_mapper_IdentityObject {
   private $start = null;
   private $minstart = null;

   function setMinimumStart( $minstart ) {
      $this->minstart = $minstart;
   }

   function getMinimumStart() {
      return $this->minstart;
   }

   function setStart( $start ) {
      $this->start = $start;
   }

   function getStart() {
      return $this->start;
   }
}

*/

class woo_mapper_EventIdentityObject extends woo_mapper_IdentityObject {
   function __construct( $field=null ) {
      parent::__construct( $field,
      array('name', 'id','start','duration', 'space' ) );
   }
}


?>