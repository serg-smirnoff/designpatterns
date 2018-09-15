<?php
class XmlException extends Exception {
   private $error;

   function __construct( LibXmlError $error ) {
      $shortfile = basename( $error->file );
      $msg  = "[{$shortfile}, строка {$error->line}, ";
      $msg .= "колонка {$error->column}] {$error->message}";
      $this->error = $error;
      parent::__construct( $msg, $error->code );
   }

   function getLibXmlError() {
      return $this->error;
   }
}
class FileException extends Exception { }
class ConfException extends Exception { }
?>