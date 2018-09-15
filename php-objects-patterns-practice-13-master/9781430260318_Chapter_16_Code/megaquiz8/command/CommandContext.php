<?php
/**
 * @license   http://www.example.com Borsetshire Open License
 * @package   command
 */

namespace megaquiz\command;

/**
 * Encapsulates data for passing to, from and between Commands.
 * Commands require disparate data according to context. The
 * CommandContext object is passed to the Command::execute()
 * method, and contains data in key/value format. The class
 * automatically extracts the contents of the $_REQUEST 
 * superglobal.
 *
 * @author  Clarrie Grundie
 * @copyright 2013 Ambridge Technologies Ltd
 *
 * @see \megaquiz\command\Command::execute()   the execute() method
 */

class CommandContext {
/**
 * The application name.
 * Used by various clients for error messages, etc.
 * @var string
 */
    public $applicationName;

/**
 * Encapsulated Keys/values.
 * This class is essentially a wrapper for this array
 * @var array
 */
    private $params = array();

/**
 * An error message.
 * @var string
 */
    private $error = "";

    function __construct( $appname ) {
        $this->params = $_REQUEST;
        $this->applicationName = $appname;
    }

    function addParam( $key, $val ) { 
        $this->params[$key]=$val;
    }

/**
 * Get a value
 * @see Command::execute()
 * @see megaquiz\command\Command::execute()
 */
    function get( $key ) { 
        return $this->params[$key];
    }

    function setError( $error ) {
        $this->error = $error;
    }

    function getError() {
        return $this->error;
    }
}

?>
