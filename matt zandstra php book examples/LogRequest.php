<?php

class LogRequest extends DecorateProcess {
   function process( RequestHelper $req ) {
      print __CLASS__.": регистрация запроса \n";
      $this->processrequest->process( $req );
   }
}

?>