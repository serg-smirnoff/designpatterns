<?php

class TextDumpArmyVisitor extends ArmyVisitor {
   private $text="";

   function visit( Unit $node ) {
      $ret  = "";
      $pad  = 4*$node->getDepth();
      $ret .= sprintf( "%{$pad}s", "" );
      $ret .= get_class($node).": ";
      $ret .= "Огневая мощь: " . $node->bombardStrength() . "\n";
      $this->text .= $ret;
   }

   function getText() {
      return $this->text;
   }
}

?>