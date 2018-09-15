<?php

//class Login implements Observable {
class Login implements SplSubject {
   const LOGIN_USER_UNKNOWN = 1;
   const LOGIN_WRONG_PASS   = 2;
   const LOGIN_ACCESS       = 3;
   private $status = array();
   private $observers;
   private $storage;

   function __construct() {
      $this->storage = new SplObjectStorage();
   }


   function handleLogin( $user, $pass, $ip ) {
      switch ( rand(1,3) ) {
         case 1:
            $this->setStatus( self::LOGIN_ACCESS, $user, $ip );
            $ret = true;
            break;
         case 2:
            $this->setStatus( self::LOGIN_WRONG_PASS, $user, $ip );
            $ret = false;
            break;
         case 3:
            $this->setStatus( self::LOGIN_USER_UNKNOWN, $user, $ip );
            $ret = false;
            break;
         }
      $this->notify();
      return $ret;
   }

   private function setStatus( $status, $user, $ip ) {
      $this->status = array( $status, $user, $ip );
   }

   function getStatus() {
      return $this->status;
   }
/*
   function attach( Observer $observer ) {
      $this->observers[] = $observer;
   }

   function detach( Observer $observer ) {
      $newobservers = array();
      foreach ( $this->observers as $obs ) {
         if ( ($obs !== $observer) ) {
            $newobservers[]=$obs;
         }
      }
      $this->observers = $newobservers;
   }

   function notify() {
      foreach ( $this->observers as $obs ) {
         $obs->update( $this );
      }
   }
*/

   function attach( SplObserver $observer ) {
      $this->storage->attach( $observer );
   }

   function detach( SplObserver $observer ) {
      $this->storage->attach( $observer );
   }

   function notify() {
      foreach ( $this->storage as $obs ) {
         $obs->update( $this );
      }
   }

}

?>