<?php

class AuthenticateRequest extends DecorateProcess {
   function process( RequestHelper $req ) {
      print __CLASS__.": аутентификация запроса \n";
      $this->processrequest->process( $req );
   }
}

?>