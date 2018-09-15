<?php
class Runner {
   static function init() {
      try {
          $conf = new Conf( dirname(__FILE__) . "/conf.xml" );
          print "<pre>";	
          print "user: " . $conf->get('user') . "\n";
          print "host: " . $conf->get('host') . "\n";
          print "</pre>";	
          $conf->set("pass", "newpass");
          $conf->write();
      } catch ( FileException $e ) {
        // Файл не существует либо недоступен для записи
        print "Файл не существует либо недоступен для записи";  
        print "<pre>";	 
        var_dump($e);
        print "</pre>";	 


      } catch ( XmlException $e ) {
        // Поврежденный XML-файл
         print "Поврежденный XML-файл"; 
	 print "<pre>";	 
	 var_dump($e);
	 print "</pre>";	 

      } catch ( ConfException $e ) {
        // Некорректный формат XML-файла
         print "Некорректный формат XML-файла";  
        print "<pre>";	 
        var_dump($e);
        print "</pre>";	 


      } catch ( Exception $e ) {
        // Ограничитель: этот код не должен никогда вызываться
         print "Ограничитель: этот код не должен никогда вызываться";  
        print "<pre>";	 
        var_dump($e);
        print "</pre>";	 

      }
   }
}
?>