<?php
print "<pre>";

/*
$mapper = new woo_mapper_VenueMapper();
$venue = $mapper->find( 12 );
print_r( $venue );

$venue = new woo_domain_Venue();
$venue->setName( "The Likey Lounge" );

// Добавим объект в базу данных
$mapper->insert( $venue );

// Снова найдем объект - просто для проверки, что все работает!
$venue = $mapper->find( $venue->getId() );
print_r( $venue );

// Изменим объект
$venue->setName( "The Bibble Beer Likey Lounge" );

// Вызовем операцию обновления измененных данных
$mapper->update( $venue );

// И снова обратимся в базе данных, чтобы проверить, что все работает
$venue = $mapper->find( $venue->getId() );
print_r( $venue );



$venue = new woo_domain_Venue();
$venue->setName( "The Likey Lounge" );
$mapper->insert( $venue );
$venue = $mapper->find( $venue->getId() );
print_r( $venue );

$venue->setName( "The Bibble Beer Likey Lounge" );
$mapper->update( $venue );
$venue = $mapper->find( $venue->getId() );
print_r( $venue );

*/

$idobj = $factory->getIdentityObject()->field('name')
                 ->eq('The Eyeball Inn');
$collection = $finder->find( $idobj );
foreach ( $collection as $venue ) {
    print_r( $venue );
}






print "</pre>";


function __autoload( $classname ) {
   print $classname . "\n";
   include_once( "{$classname}.php" );
}


?>
