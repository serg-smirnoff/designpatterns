<?php
class PersonWriter {

   function writeName( Person $p ) {
      print $p->getName() . "\n";
   }

   function writeAge( Person $p ) {
      print $p->getAge() . "\n";
   }
}
?>