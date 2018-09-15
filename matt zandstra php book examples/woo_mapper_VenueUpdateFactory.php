<?php


class woo_mapper_VenueUpdateFactory extends woo_mapper_UpdateFactory {
   function newUpdate( woo_domain_DomainObject $obj ) {
      $id = $obj->getId();
      $cond = null;
      $values['name'] = $obj->getName();
      if ( $id > -1 ) {
         $cond['id'] = $id;
      }
      return $this->buildStatement( "venue", $values, $cond );
   }
}


?>