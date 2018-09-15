<?php
class FtpModule implements Module {
   function setHost( $host ) {
      print "FtpModule::setHost(): $host\n";
   }

   function setUser( $user ) {
      print "FtpModule::setUser(): $user\n";
   }

   function execute() {
   // Выполнение работы
   }
}
?>