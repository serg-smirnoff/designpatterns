<?php


class woo_command_CommandResolver {
   private static $base_cmd;
   private static $default_cmd;

   function __construct() {
      if ( ! self::$base_cmd ) {
         self::$base_cmd    = new ReflectionClass( "woo_command_Command" );
         self::$default_cmd = new woo_command_DefaultCommand();
      }
   }

   function getCommand( woo_controller_Request $request ) {
      $cmd = $request->getProperty( 'cmd' );
      $sep = DIRECTORY_SEPARATOR;
      if ( ! $cmd ) {
         return self::$default_cmd;
      }
      $cmd=str_replace( array('.', $sep), "", $cmd );
      $filepath = "woo{$sep}command{$sep}{$cmd}.php";
      $classname = "woo_command_$cmd";
      if ( file_exists( $filepath ) ) {
         @require_once( "$filepath" );
         if ( class_exists( $classname) ) {
            $cmd_class = new ReflectionClass($classname);
               if ( $cmd_class->isSubClassOf( self::$base_cmd ) ) {
                  return $cmd_class->newInstance();
               } else {
                  $request->addFeedback( "Объект Command команды '$cmd' не найден" );
               }
         }
      }
      $request->addFeedback( "Команда '$cmd' не найдена" );
      return clone self::$default_cmd;
   }
}


?>