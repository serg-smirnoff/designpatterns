<?php

class StructureRequest extends DecorateProcess {
   function process( RequestHelper $req ) {
      print __CLASS__.": упорядочивание данных запроса \n";
      $this->processrequest->process( $req );
   }
}

?>