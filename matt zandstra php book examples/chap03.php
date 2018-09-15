<?php
 require_once 'ShopProduct.php';
 require_once 'ShopProductWriter.php';
 require_once 'CDProduct.php';
 require_once 'BookProduct.php';

/* $product1 = new ShopProduct();
 $product2 = new ShopProduct();
 $product1->title="Собачье сердце";
 $product2->title="Ревизор";
 $product1->title             = "Собачье сердце";
 $product1->producerMainName  = "Булгаков";
 $product1->producerFirstName = "Михаил";
 $product1->price             = 5.99;

$product1 = new ShopProduct( "Собачье сердце",
                             "Михаил", "Булгаков", 5.99 );
$product2 = new ShopProduct( "Пропавший без вести",
                             "Группа", "ДДТ", 10.99 );
print "<pre>";
print "Автор: "       . $product1->getProducer() . "\n";
print "Исполнитель: " . $product2->getProducer() . "\n";
print "</pre>";


 print "<pre>";
 var_dump($product1);
// var_dump($product2);

 print $product1->title;
 print "<br>";
// print $product2->title;
// print "<br>";
 print "Автор: {$product1->producerFirstName} "
            . "{$product1->producerMainName}\n";
 
 print "Автор: {$product1->getProducer()}\n";

 print "Автор: {$product1->getProducer()}\n";



 $settings = simplexml_load_file("settings.xml");
 $writer= new ShopProductWriter();
 $writer->write($product1); 
 print "</pre>";
*/

print "<pre>";
$product2 = new CDProduct( "Пропавший без вести",
                             "Группа", "ДДТ",
                            10.99, 62.33 );
print "Исполнитель: {$product2->getProducer()}\n";
print "{$product2->getSummaryLine()}\n";
print "</pre>";


?>
