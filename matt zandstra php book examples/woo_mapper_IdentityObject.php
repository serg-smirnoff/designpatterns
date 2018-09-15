<?php

/*

class woo_mapper_IdentityObject {
   private $name = null;

   function setName( $name ) {
      $this->name=$name;
   }

   function getName() {
      return $this->name;
   }
}

*/

class woo_mapper_IdentityObject {
   protected $currentfield=null;
   protected $fields = array();
   private $and=null;
   private $enforce=array();

   // Конструктор identity object может запускаться 
   // без параметров или с именем поля
   function __construct( $field=null, array $enforce=null ) {
      if ( ! is_null( $enforce ) ) {
         $this->enforce = $enforce;
      }
      if ( ! is_null( $field ) ) {
         $this->field( $field );
      }
   }

   // Имена полей, для которых наложено это ограничение
   function getObjectFields() {
      return $this->enforce;
   }

   // Вводим новое поле.
   // Генерируется ошибка, если текущее поле неполное
   // (т.е. age, а не age > 40).
   // Этот метод возвращает ссылку на текущий объект,
   // и тем самым разрешает свободный синтаксис
   function field( $fieldname ) {
      if ( ! $this->isVoid() && $this->currentfield->isIncomplete() ) {
         throw new Exception("Неполное поле");
      }
      $this->enforceField( $fieldname );
      if ( isset( $this->fields[$fieldname] ) ) {
          $this->currentfield=$this->fields[$fieldname];
      } else {
          $this->currentfield = new woo_Mapper_Field( $fieldname );
          $this->fields[$fieldname]=$this->currentfield;
      }
      return $this;
   }

   // Есть ли уже поля у identity object
   function isVoid() {
      return empty( $this->fields );
   }

   // Заданное имя поля допустимо?
   function enforceField( $fieldname ) {
      if ( ! in_array( $fieldname, $this->enforce ) &&
           ! empty( $this->enforce ) ) {
         $forcelist = implode( ', ', $this->enforce );
          throw new Exception("{$fieldname} не является корректным полем ($forcelist)");
     }
   }

   // Добавим оператор равенства к текущему полю
   // т.е. 'age' становится age=40.
   // Возвращает ссылку на текущий объект (с помощью operator())
   function eq( $value ) {
      return $this->operator( "=", $value );
   }

   // Меньше чем
   function lt( $value ) {
      return $this->operator( "<", $value );
   }

   // Больше чем 
   function gt( $value ) {
      return $this->operator( ">", $value );
   }

   // Выполняет работу для методов operator.
   // Получает текущее поле и добавляет значение оператора 
   // и результаты теста к нему
   private function operator( $symbol, $value ) {
      if ( $this->isVoid() ) {
         throw new Exception("Поле не определено");
      }
      $this->currentfield->addTest( $symbol, $value );
      return $this;
   }

   // Возвращает все сравнения, созданные до сих пор в ассоциативном массиве
   function getComps() {
      $ret = array();
      foreach ( $this->fields as $key => $field ) {
         $ret = array_merge( $ret, $field->getComps() );
      }
      return $ret;
   }
}


?>