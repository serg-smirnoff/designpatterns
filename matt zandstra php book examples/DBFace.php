<?php

class DBFace {
   private $pdo;

   function __construct( $dsn, $user=null, $pass=null ) {
      $this->pdo = new PDO( $dsn, $user, $pass );
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }

   function query( $query ) {
      $stmt = $this->pdo->query( $query );
      return $stmt;
   }

   public function setUp() {
     $face = new DBFace("sqlite::memory:");
     $face->query("create table user ( id INTEGER PRIMARY KEY, name TEXT )");
     $face->query("insert into user (name) values('bob')");
     $face->query("insert into user (name) values('harry')");
     $this->mapper = new ToolMapper( $face );
   }








}


?>