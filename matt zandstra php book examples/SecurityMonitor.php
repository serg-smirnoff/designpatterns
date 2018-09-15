<?php

class SecurityMonitor extends LoginObserver {
   function doUpdate( Login $login ) {
      $status = $login->getStatus();
      if ( $status[0] == Login::LOGIN_WRONG_PASS ) {
         // Отправим почту системному администратору
         print __CLASS__ . ":\tОтправка почты системному администратору \n";
      }
   }
}

?>