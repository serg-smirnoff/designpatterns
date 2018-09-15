<?php

class MegaCommsManager extends CommsManager {

   function getHeaderText() {
      return "MegaCal верхний колонтитул\n";
   }

   function getApptEncoder() {
      return new MegaApptEncoder();
   }

   function getFooterText() {
      return "MegaCal нижний колонтитул\n";
   }
}

?>