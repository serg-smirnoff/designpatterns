<?php

class BloggsCommsManager extends CommsManager {

   function getHeaderText() {
      return "BloggsCal верхний колонтитул\n";
   }

   function getApptEncoder() {
      return new BloggsApptEncoder();
   }

   function getFooterText() {
      return "BloggsCal нижний колонтитул\n";
   }
}

?>