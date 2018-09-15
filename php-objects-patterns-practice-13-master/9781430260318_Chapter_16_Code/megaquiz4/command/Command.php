<?php
/**
 * Defines core functionality for commands.
 * Command classes perform specific tasks in a system via
 * the execute() method
 *
 * @package command
 * @author  Clarrie Grundie
 * @copyright 2013 Ambridge Technologies Ltd
 */
abstract class Command {

/**
 * Perform the key operation encapsulated by the class.
 * Command classes encapsulate a single operation. They
 * are easy to add to and remove from a project, can be
 * stored after instantiation and execute() invoked at
 * leisure.
 * @param  $context CommandContext Shared contextual data
 * @return bool     false on failure, true on success
 */
    abstract function execute( CommandContext $context );
}
?>
