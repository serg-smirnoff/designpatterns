<?php
class PersonModule implements Module {
   function setPerson( Person $person ) {
      print "PersonModule::setPerson(): {$person->name}\n";
   }

   function execute() {
   // Выполнение работы 
   }
}
?>