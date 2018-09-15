<?php
class NastyBoss {
   private $employees = array();

   function addEmployee( Employee $employee ) {
      $this->employees[] = $employee;
   }

   function projectFails() {
      if ( count( $this->employees ) > 0 ) {
         $emp = array_pop( $this->employees );
         $emp->fire();
      }
   }
}

?>