<?php
/**
 * @license   http://www.example.com Borsetshire Open License
 * @package   command
 */

namespace megaquiz\command;

/**
 * includes
 */
require_once( "Command.php" );

/**
 * @package command
 */
class FeedbackCommand extends Command {

    function execute( megazuiz\command\CommandContext $context ) {
        $msgSystem = ReceiverFactory::getMessageSystem();
        $email = $context->get( 'email' );
        $msg = $context->get( 'pass' );
        $topic = $context->get( 'topic' );
        $result = $msgSystem->despatch( $email, $msg, $topic );
        if ( ! $user ) {
            $this->context->setError( $msgSystem->getError() );
            return false;
        }
        $context->addParam( "user", $user );
        return true;
    }
}


?>
