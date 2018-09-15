<?php

class woo_mapper_VenueObjectFactory extends woo_mapper_DomainObjectFactory {
   function createObject( array $array ) {
      $obj = new woo_domain_Venue( $array['id'] );
      $obj->setname( $array['name'] );
      return $obj;
   }
}



?>