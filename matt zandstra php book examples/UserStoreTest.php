<?php

//require_once('UserStore.php');
require_once('PHPUnit/Framework/TestCase.php');

class UserStoreTest extends PHPUnit_Framework_TestCase {
   private $store;

   public function setUp() {
      $this->store = new UserStore();
   }

   public function tearDown() {
   }

   public function testGetUser() {
      $this->store->addUser( "bob williams", "a@b.com", "12345" );
      $user = $this->store->getUser( "a@b.com" );
      $this->assertEquals( $user['mail'], "a@b.com" );
      $this->assertEquals( $user['name'], "bob williams" );
      $this->assertEquals( $user['pass'], "12345", 0, "abcd" );
   }

  public function testAddUser_ShortPass() {
      try {
         $this->store->addUser( "bob williams", "bob@example.com", "ff" );
          } catch ( Exception $e ) { return; }
         $this->fail("Ожидается исключение из-за короткого пароля.");
      }


}

/* 

class UserStoreTest extends PHPUnit_Extensions_ExceptionTestCase {
   private $store;

   public function setUp() {
      $this->store = new UserStore();
   }

   public function testAddUser_ShortPass() {
      $this->setExpectedException('Exception');
      $this->store->addUser( "bob williams", "bob@example.com", "ff" );
   }

   public function testAddUser_duplicate() {
      try {
         $ret = $this->store->addUser( "bob williams", "a@b.com", "123456" );
         $ret = $this->store->addUser( "bob stevens",  "a@b.com", "123456" );
         self::fail( "Здесь должно быть вызвано исключение." );
      } catch ( Exception $e ) {

        $const = $this->logicalAnd(
                 $this->logicalNot( $this->contains("bob stevens")),
                 $this->isType('array')
                 );
        self::AssertThat( $this->store->getUser( "a@b.com"), $const );
   }


}

*/










?>