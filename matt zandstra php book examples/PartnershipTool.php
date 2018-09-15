<?php

class PartnershipTool extends LoginObserver {
   function doUpdate( Login $login ) {
      $status = $login->getStatus();
      // Проверим IP-адрес
      // Отправим cookie-файл, если адрес соответствует списку
      print __CLASS__ . ":\tОтправка cookie-файла, если адрес соответствует списку\n";
   }
}

?>