<?php
namespace woo\mapper;

require_once("woo/mapper/IdentityObject.php");

$idobj = new IdentityObject();
$idobj->field("name")->eq("The Good Show")
      ->field("start")->gt( time() )
                      ->lt( time()+(24*60*60) );
print $idobj;
?>
