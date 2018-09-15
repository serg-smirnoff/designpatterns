<?php

class woo_command_DefaultCommand extends woo_command_Command {
   function doExecute( woo_controller_Request $request ) {
      $request->addFeedback( "Добро пожаловать в Woo!" );
       include( "woo_main.php");
  }
}


?>