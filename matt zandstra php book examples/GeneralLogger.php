<?php

class GeneralLogger extends LoginObserver {
   function doUpdate( Login $login ) {
      $status = $login->getStatus();
      // Зарегистрируем подключение в журнале
      print __CLASS__ . ":\tРегистрация в системном журнале\n";
   }
}

?>
