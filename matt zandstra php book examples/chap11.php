<?php
print "<pre>";

/*
$_REQUEST['form_input']="print file_get_contents('/etc/passwd');";

$form_input = $_REQUEST['form_input'];
// Содержит: "print file_get_contents('/etc/passwd');"
eval( $form_input );
*/

/*
$context = new InterpreterContext();
$literal = new LiteralExpression( 'Четыре');
$literal->interpret( $context );
print $context->lookup( $literal ) . "\n";
*/

/*
$context = new InterpreterContext();
$myvar = new VariableExpression( 'input', 'Четыре');
$myvar->interpret( $context );
print $context->lookup( $myvar ). "\n";
// Выводится: 'Четыре'

$newvar = new VariableExpression( 'input' );
$newvar->interpret( $context );
print $context->lookup( $newvar ). "\n";
// Выводится: 'Четыре'

$myvar->setValue("Пять");
$myvar->interpret( $context );
print $context->lookup( $myvar ). "\n";
// Выводится: 'Пять'
print $context->lookup( $newvar ) . "\n";
// Выводится: 'Пять'

*/

/*
$context = new InterpreterContext();
$input = new VariableExpression( 'input' );
$statement = new BooleanOrExpression(
   new EqualsExpression($input, new LiteralExpression( 'Четыре' ) ),
   new EqualsExpression($input, new LiteralExpression( '4' ) )
);


foreach ( array( "Четыре", "4", "52" ) as $val ) {
   $input->setValue( $val );
   print "$val:\n";
   $statement->interpret( $context );
   if ( $context->lookup( $statement ) ) {
      print "соответствует\n\n";
   } else {
      print "не соответствует\n\n";
   }
}
*/

/*
$markers = array( new RegexpMarker( "/П.ть/" ),
                  new MatchMarker( "Пять" ),
                  new MarkLogicMarker( '$input equals "Пять"' )
                );
foreach ( $markers as $marker ) {
   print get_class( $marker ) . "\n";
   $question = new TextQuestion( "Сколько лучей у Кремлевской звезды?", $marker );
   foreach ( array( "Пять", "Четыре" ) as $response ) {
      print "\tОтвет: $response: ";
      if ( $question->mark( $response ) ) {
         print "Правильно! \n";
      } else {
         print "Неверно! \n";
      }
   }
}

*/

/*
$login = new Login();
$login->attach( new SecurityMonitor() );

*/

/*
$login = new Login();
new SecurityMonitor( $login );
new GeneralLogger( $login );
new PartnershipTool( $login );

var_dump($login);
*/

/*
$main_army = new Army();
$main_army->addUnit( new Archer() );
$main_army->addUnit( new LaserCannonUnit() );
$main_army->addUnit( new Cavalry() );
$textdump = new TextDumpArmyVisitor();
$main_army->accept( $textdump );
print $textdump->getText();
*/


/*
$main_army = new Army();
$main_army->addUnit( new Archer() );
$main_army->addUnit( new LaserCannonUnit() );
$main_army->addUnit( new Cavalry() );
$taxcollector = new TaxCollectionVisitor();
$main_army->accept( $taxcollector );
print $taxcollector->getReport() . "\n";
print "ИТОГО: ";
print $taxcollector->getTax() . "\n";
*/

$controller = new Controller();
// Эмулируем запрос пользователя
$context = $controller->getContext();
$context->addParam('action', 'login' );
$context->addParam('username', 'bob' );
$context->addParam('pass', 'tiddles' );
$controller->process();




print "</pre>";


function __autoload( $classname ) {
   include_once( "{$classname}.php" );
}


?>
