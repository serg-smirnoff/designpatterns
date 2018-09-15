<?php
// require_once 'ShopProduct.php';
// require_once 'CDProduct.php';
// require_once 'BookProduct.php';
// require_once 'StaticExample.php';
// require_once 'ShopProductWriter.php';

// require_once 'Runner.php';
// require_once 'Conf.php';
// require_once 'XmlException.php';

   require_once 'Person.php';
// require_once 'Account.php';
// require_once 'PersonWriter.php';



// class ErroredWriter extends ShopProductWriter{}
//  print "<pre>";
//  print StaticExample::$aNum;
//  print ShopProduct::AVAILABLE;
//  StaticExample::sayHello();
  

//  $dsn = "sqlite:products.db";
//  $pdo = new PDO( $dsn, null, null );
//  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Удалим таблицу products 

//  $query  = "DROP TABLE products";
//  $stmt   = $pdo->query( $query );

// Создадим таблицу базы данных products
//  $query  = file_get_contents( "products.sql" );
//  $stmt   = $pdo->query( $query );

// Наполним ее данными

//  $query  = file_get_contents( "products_data_1.sql" );
//  $stmt   = $pdo->query( $query );

//  $query  = file_get_contents( "products_data_2.sql" );
//  $stmt   = $pdo->query( $query );

//  $obj = ShopProduct::getInstance( 2, $pdo );
//  var_dump($obj);
//  $writer = new ShopProductWriter();
//  print "</pre>";

//    Runner::Init();
   setLocale(LC_ALL, "ru_RU.CP1251");
//   $p = new Person();
//   $p->name = "Иван";
//
//   print $p->name;

// $person = new Person( new PersonWriter() );
// $person->name="Петр";
// $person->age=33;
// $person->writeName();

// $person = new Person( "Иван", 33 );
// $person->setId( 343 );
// unset( $person );

// class CopyMe {var $i=1,$t=123;}
// $first = new CopyMe();
// $second = clone $first;
// $second->i=5;
// print "<pre>";
// var_dump($first,$second);
// print "</pre>";
// В PHP 4 переменные $second and $first ссылаются на 2 разных объекта
// Начиная с PHP 5 переменные $second and $first ссылаются на один объект

// $person = new Person( "Петр", 44 );
// $person->setId( 343 );
// $person2 = clone $person;
// print "<pre>";
// var_dump($person,$person2);
// print "</pre>";

// $person = new Person( "Иван", 44, new Account( 200 ) );
// $person->setId( 343 );
// $person2 = clone $person;
   // Добавим $person немного денег
// $person->account->balance += 10;
   // Это изменение увидит и $person2
// print $person->account->balance;
// print $person2->account->balance;

// class StringThing {}

// $st = new StringThing();
// print "<pre>";
// var_dump($st);
// print "</pre>";
//
// print $st;
  $person = new Person("Иван", 44);
  print $person;


?>