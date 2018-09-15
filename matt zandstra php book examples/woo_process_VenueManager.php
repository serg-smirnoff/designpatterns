<?php

class woo_process_VenueManager extends woo_process_Base {
   static $add_venue = "INSERT INTO venue
                        ( name )
                         values( ? )";
   static $add_space = "INSERT INTO space
                        ( name, venue )
                        values( ?, ? )";
   static $check_slot = "SELECT id, name
                         FROM event
                         WHERE space = ?
                         AND (start+duration) > ?
                         AND start < ?";
   static $add_event = "INSERT INTO event
                        ( name, space, start, duration )
                        values( ?, ?, ?, ? )";


  function addVenue( $name, $space_array ) {
   $ret = array();
   $ret['venue'] = array( $name );
   $this->doStatement( self::$add_venue, $ret['venue']);
   $v_id = self::$DB->lastInsertId();
   $ret['spaces'] = array();
   foreach ( $space_array as $space_name ) {
      $values = array( $space_name, $v_id );
      $this->doStatement( self::$add_space, $values);
      $s_id = self::$DB->lastInsertId();
      array_unshift( $values, $s_id );
      $ret['spaces'][] = $values;
   }
   return $ret;
  }


  function bookEvent( $space_id, $name, $time, $duration ) {
   $values = array( $space_id, $time, ($time+$duration) );
   $stmt = $this->doStatement( self::$check_slot, $values, false ) ;
   if ( $result = $stmt->fetch() ) {
      throw new woo_base_AppException(
         "Уже зарегистрировано! Попробуйте еще раз" );
   }
   $this->doStatement( self::$add_event,
            array( $name, $space_id, $time, $duration ) );
  }




}


?>