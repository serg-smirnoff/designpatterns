<?php

print "<pre>";

//$boss = new NastyBoss();
//$boss->addEmployee( "Игорь" );
//$boss->addEmployee( "Владимир" );
//$boss->addEmployee( "Мария" );
//$boss->projectFails();

//$boss = new NastyBoss();
//$boss->addEmployee( new Minion( "Игорь" ) );
//$boss->addEmployee( new CluedUp( "Владимир" ) );
//$boss->addEmployee( new Minion( "Мария" ) );
//$boss->projectFails();
//$boss->projectFails();
//$boss->projectFails();

//$boss = new NastyBoss();
//$boss->addEmployee( Employee::recruit( "Игорь" ) );
//$boss->addEmployee( Employee::recruit( "Владимир" ) );
//$boss->addEmployee( Employee::recruit( "Мария" ) );
//$boss->projectFails();
//$boss->projectFails();
//$boss->projectFails();

//$pref = Preferences::getInstance();
//$pref->setProperty( "name", "Иван" );

//unset( $pref ); // Удалим ссылку

//$pref2 = Preferences::getInstance();
// Убедимся, что ранее установленное значение сохранено
//print $pref2->getProperty( "name" ) . "\n"; 


//$comms = new CommsManager( CommsManager::MEGA );
//$comms = new BloggsCommsManager();
//$apptEncoder = $comms->getApptEncoder();
//print $apptEncoder->encode();


//$factory = new TerrainFactory( new EarthSea(),
//                               new EarthPlains(),
//                               new EarthForest() );

//$factory = new TerrainFactory( new EarthSea( -1 ),
//                               new EarthPlains(),
//                               new EarthForest() );

//print_r( $factory->getSea() );
//print_r( $factory->getPlains() );
//print_r( $factory->getForest() );


$commsMgr = AppConfig::getInstance()->getCommsManager();
print $commsMgr->getApptEncoder()->encode();




print "</pre>";

function __autoload( $classname ) {
   include_once( "{$classname}.php" );
}

?>