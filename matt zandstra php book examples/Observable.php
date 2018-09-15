<?php

interface Observable {
   function attach( Observer $observer );
   function detach( Observer $observer );
   function notify();
}

?>