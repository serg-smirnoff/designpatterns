<?php
//require_once( "parse/Parser.php" );
require_once( "parse/MarkLogic.php" );

abstract class Question {
    protected $prompt;
    protected $marker;

    function __construct( $prompt, Marker $marker ) {
        $this->prompt=$prompt;
        $this->marker=$marker;
    }

    function mark( $response ) {
        return $this->marker->mark( $response );
    }
}

class TextQuestion extends Question {
    // do text question specific things
}

class AVQuestion extends Question {
    // do audiovisual question specific things
}

abstract class Marker {
    protected $test;

    function __construct( $test ) {
        $this->test = $test;
    }

    abstract function mark( $response );
}

class MarkLogicMarker extends Marker {
    private $engine;
    function __construct( $test ) {
        parent::__construct( $test );
        $this->engine = new MarkParse( $test );
    }

    function mark( $response ) {
        return $this->engine->evaluate( $response );
    }
}

class MatchMarker extends Marker {
    function mark( $response ) {
        return ( $this->test == $response );
    }
}

class RegexpMarker extends Marker {
    function mark( $response ) {
        return ( preg_match( "$this->test", $response ) );
    }
}

$questions = array( 
    "how many beans make five?" => '$input equals "five" or $input equals "5"', 
    "give a childs name?" => '$input equals "jake" or $input equals "holly"',
    "life begins at" => '$input equals "forty" or $input equals "40"' 
);

foreach ( $questions as $prompt => $mark ) {
    print "$prompt\n";
    $marker = new MarkLogicMarker( $mark );
    $result=false;
    do {
        $fh = fopen( 'php://stdin', 'r' );
        $line = fgets( $fh );
        $line = trim( $line );
        $question = new TextQuestion( $prompt, $marker );
        if ( $result = $question->mark( $line ) ) {
            print "well done!\n";
        } else {
            print "wrong, try again\n";
        }
    } while ( ! $result );
            
}

/*
while ( $fh = fopen( 'php://stdin', 'r' ) ) {
    $line = fgets( $fh );
    print $line;
}
$markers = array(   new RegexpMarker( "/f.ve/" ),
                    new MatchMarker( "five" ),
                    new MarkLogicMarker( '$input equals "five"' )
        );

foreach ( $markers as $marker ) {
    print get_class( $marker )."\n";
    $question = new TextQuestion( "how many beans make five", $marker );
    foreach ( array( "five", "four" ) as $response ) { 
        print "\tresponse: $response: ";
        if ( $question->mark( $response ) ) {
            print "well done\n";
        } else {
            print "never mind\n";
        }
    }
}
*/
?>
