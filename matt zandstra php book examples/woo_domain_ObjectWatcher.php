<?php

class woo_domain_ObjectWatcher {
   private $all = array();
   private $dirty = array();
   private $new = array();
   private $delete = array(); // В нашем примере не используется

   private static $instance;

   private function __construct() { }

   static function instance() {
      if ( ! isset( self::$instance ) ) {
         self::$instance = new woo_domain_ObjectWatcher();
      }
   return self::$instance;
  }

   function globalKey( woo_domain_DomainObject $obj ) {
      $key = get_class( $obj )." . ".$obj->getId();
      return $key;
   }

   static function add( woo_domain_DomainObject $obj ) {
      $inst = self::instance();
      $inst->all[$inst->globalKey( $obj )] = $obj;
   }

   static function exists( $classname, $id ) {
      $inst = self::instance();
      $key = "$classname.$id";
      if ( isset( $inst->all[$key] ) ) {
         return $inst->all[$key];
      }
      return null;
   }

// Mapper
private function getFromMap( $id ) {
   return woo_domain_ObjectWatcher::exists( $this->targetClass(), $id );
}

private function addToMap( woo_domain_DomainObject $obj ) {
   return woo_domain_ObjectWatcher::add( $obj );
}

function find( $id ) {
   $old = $this->getFromMap( $id );
   if ( $old ) { return $old; }

   // Работаем с db
   return $object;
}

function createObject( $array ) {
   $old = $this->getFromMap( $array['id']);
   if ( $old ) { return $old; }

   // Создаем объект
   $this->addToMap( $obj );
   return $obj;
}

function insert( woo_domain_DomainObject $obj ) {
   // Обрабатываем вставку. $obj нужно модифицировать новым идентификатором
   $this->addToMap( $obj );
}

static function addDirty( woo_domain_DomainObject $obj ) {
   $inst = self::instance();
   if ( ! in_array( $obj, $inst->new, true ) ) {
      $inst->dirty[$inst->globalKey( $obj )] = $obj;
   }
}

static function addNew( woo_domain_DomainObject $obj ) {
   $inst = self::instance();
   // У нас еще нет идентификатора id
   $inst->new[] = $obj;
}

static function addClean(woo_domain_DomainObject $obj ) {
   $self = self::instance();
   unset( $self->dirty[$self->globalKey( $obj )] );
   if ( in_array( $obj, $self->new, true ) ) {
      $pruned=array();
      foreach ( $self->new as $newobj ) {
         if ( ! ( $newobj === $obj) ) {
            $pruned[]=$newobj;
         }
      }
      $self->new = $pruned;
   }
}

function performOperations() {
   foreach ( $this->dirty as $key=>$obj ) {
      $obj->finder()->update( $obj );
   }
   foreach ( $this->new as $key=>$obj ) {
      $obj->finder()->insert( $obj );
   }
   $this->dirty = array();
   $this->new = array();
}







}

?>