<?php
  print "<pre>";
//  print_r( get_declared_classes() );
//  var_dump( get_declared_classes() );

   $product = getProduct();
//   var_dump($product);
// if ( get_class( $product ) == 'CDProduct' ) {
//    print "\$product -- объект класса CDProduct\n";
// }
//
// if ( $product instanceof ShopProduct ) {
//    print "\$product -- объект типа ShopProduct\n";
// }
//
// if ( is_subclass_of( $product, 'ShopProduct' ) ) {
//    print "CDProduct является подклассом класса ShopProduct\n";
// }
//
// $method = "getSummaryLine";      // Определим имя метода
// print $product->$method() . "\n"; // Вызовем метод

//  $prod_class = new ReflectionClass( 'CDProduct' );
    $prod_class = new ReflectionClass( 'PersonWriter' );

//  Reflection::export( $prod_class );
//  print classData( $prod_class );
//  print ReflectionUtil::getClassSource($prod_class);

//  print_r( get_class_methods( 'CDProduct' ) );
//  print_r( get_class_methods( $product ) );
//  print_r( get_declared_classes() );
//  print_r( get_class_vars( 'CDProduct' ) );
//  print get_parent_class( 'CDProduct' );

//    $methods = $prod_class->getMethods();
//    foreach ( $methods as $method ) {
//       print methodData( $method );
//       print "\n----\n";
//    }

//     $method = $prod_class->getMethod( 'getSummaryLine' );
//     print ReflectionUtil::getMethodSource( $method );

//     $method = $prod_class->getMethod( "__construct" );
//     $method = $prod_class->getMethod( "writeName" );
//     print ReflectionUtil::getMethodSource( $method );
//     $params = $method->getParameters();
//
//     foreach ( $params as $param ) {
//        print argData( $param );
//     }
//
      $test = new ModuleRunner();
      $test->init();


  print "</pre>";

  exit();

/********************************************************/
function getProduct() {
   return new CDProduct( "Пропавший без вести",
                             "Группа", "ДДТ",
                            10.99, 60.33 );
}

function __autoload( $classname ) {
   include_once( "{$classname}.php" );
}

function classData( ReflectionClass $class ) {
   $details = "";
   $name = $class->getName();
   if ( $class->isUserDefined() ) {
      $details .= "$name -- класс определен пользователем\n";
   }
   if ( $class->isInternal() ) {
      $details .= "$name -- встроенный класс\n";
   }
   if ( $class->isInterface() ) {
      $details .= "$name -- это интерфейс\n";
   }
   if ( $class->isAbstract() ) {
      $details .= "$name -- это абстрактный класс\n";
   }
   if ( $class->isFinal() ) {
      $details .= "$name -- это завершенный класс\n";
   }
   if ( $class->isInstantiable() ) {
      $details .= "$name -- можно создать экземпляр класса\n";
   } else {
      $details .= "$name -- нельзя создать экземпляр класса\n";
   }
   return $details;
}

function methodData( ReflectionMethod $method ) {
   $details = "";
   $name = $method->getName();
   if ( $method->isUserDefined() ) {
      $details .= "$name -- метод определен пользователем\n";
   }
   if ( $method->isInternal() ) {
      $details .= "$name -- внутренний метод\n";
   }
   if ( $method->isAbstract() ) {
      $details .= "$name -- абстрактный метод\n";
   }
   if ( $method->isPublic() ) {
      $details .= "$name -- общедоступный метод\n";
   }
   if ( $method->isProtected() ) {
      $details .= "$name -- защищенный метод\n";
  }
   if ( $method->isPrivate() ) {
      $details .= "$name -- закрытый метод\n";
   }
   if ( $method->isStatic() ) {
      $details .= "$name -- статический метод\n";
   }
   if ( $method->isFinal() ) {
      $details .= "$name -- завершенный метод\n";
   }
   if ( $method->isConstructor() ) {
      $details .= "$name -- метод конструктора\n";
   }
   if ( $method->returnsReference() ) {
      $details .= "$name -- метод возвращает ссылку, а не значение\n";
   }
   return $details;
}

function argData( ReflectionParameter $arg ) {
   $details = "";
   $name  = $arg->getName();
   $class = $arg->getClass();
   if ( ! empty( $class ) ) {
      $classname = $class->getName();
      $details .= "\$$name должен быть объектом типа $classname\n";
   }
   if ( $arg->isPassedByReference() ) {
      $details .= "\$$name передан по ссылке\n";
   }
   return $details;
}


?>