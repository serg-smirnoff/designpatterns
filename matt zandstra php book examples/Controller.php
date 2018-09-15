<?php

class Controller {
   private $context;

   function __construct() {
      $this->context = new CommandContext();
   }

   function getContext() {
      return $this->context;
   }

   function process() {
      $cmd = CommandFactory::getCommand( $this->context->get('action') );
      if ( ! $cmd->execute( $this->context ) ) {
         // Обработка ошибки
      } else {
         // Все прошло успешно
         // Теперь отобразим результаты
      }
   }
}

?>