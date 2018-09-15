<?php
namespace woo\mapper;

require_once("woo/mapper/EventIdentityObject.php");

$idobj = new EventIdentityObject();
$idobj->field("banana")->eq("The Good Show")
      ->field("start")->gt( time() )
                      ->lt( time()+(24*60*60) );
print $idobj;
?>
