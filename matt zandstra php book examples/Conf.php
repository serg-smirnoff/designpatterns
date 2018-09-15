<?php
class Conf {
   private $file;
   private $xml;
   private $lastmatch;

/*   function __construct( $file ) {
      $this->file = $file;
      $this->xml = simplexml_load_file($file);
   }


   function __construct( $file ) {
      $this->file = $file;
      if ( ! file_exists( $file ) ) {
         throw new Exception( "Файл '$file' не найден" );
      }
      $this->xml = simplexml_load_file($file);
   }


   function write() {
      file_put_contents( $this->file, $this->xml->asXML() );
   }

   function write() {
      if ( ! is_writeable( $this->file ) ) {
         throw new Exception("Файл '{$this->file}' недоступен для записи.");
      }
      file_put_contents( $this->file, $this->xml->asXML() );
   }

*/

   function __construct( $file ) {
      $this->file = $file;
      if ( ! file_exists( $file ) ) {
         throw new FileException( "Файл '$file' не существует" );
      }
      $this->xml = simplexml_load_file($file, null, LIBXML_NOERROR );
      if ( ! is_object( $this->xml ) ) {
         throw new XmlException( libxml_get_last_error() );
      }
      print "<pre>";	
      print gettype( $this->xml );
      print "</pre>";	
      $matches = $this->xml->xpath("/conf");
      if ( ! count( $matches ) ) {
         throw new ConfException( "Корневой элемент conf не найден." );
      }
   }


   function write() {
      if ( ! is_writeable( $this->file ) ) {
         throw new FileException("Файл '{$this->file}' недоступен для записи");
      }
      file_put_contents( $this->file, $this->xml->asXML() );
   }


   function get( $str ) {
      $matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
      if ( count( $matches ) ) {
         $this->lastmatch = $matches[0];
         return (string)$matches[0];
      }
      return null;
   }

   function set( $key, $value ) {
      if ( ! is_null( $this->get( $key ) ) ) {
         $this->lastmatch[0]=$value;
         return;
      }
      $conf = $this->xml->conf;
      $this->xml->addChild('item', $value)->addAttribute( 'name', $key );
   }
}
?>