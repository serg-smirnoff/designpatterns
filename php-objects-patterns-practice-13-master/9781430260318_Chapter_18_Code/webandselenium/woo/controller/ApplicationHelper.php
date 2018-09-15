<?php
namespace woo\controller;

require_once( 'woo/base/Registry.php' );
require_once( 'woo/base/Exceptions.php' );
require_once( 'woo/controller/AppController.php' );

class ApplicationHelper {
    private static $instance=null;
    private $config = "data/woo_options.xml";

    private function __construct() {}

    static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    function init( $configpath=null ) {
        $dsn = \woo\base\ApplicationRegistry::getDSN( );
        if ( ! is_null( $dsn ) ) {
            if ( ! is_null( $configpath ) ) {
                $this->configpath = $configpath;
            }
            return;
        }
        $this->getOptions();
     }

     private function getOptions() {
        $this->ensure( file_exists( $this->config  ), 
                            "Could not find options file" );
        $options = simplexml_load_file( $this->config );
        $this->ensure( $options instanceof \SimpleXMLElement,
                            "Could not resolve options file" );
        $dsn = (string)$options->dsn; 
        $this->ensure( $dsn, "No DSN found" );
        \woo\base\ApplicationRegistry::setDSN( $dsn );
        $map = new ControllerMap(); 

        foreach ( $options->control->view as $default_view ) {
            $stat_str = trim($default_view['status']); 
            if ( empty( $stat_str )) {
                $stat_str = "CMD_DEFAULT";
            }
            $status = \woo\command\Command::statuses( $stat_str );
            $map->addView( (string)$default_view, 'default', $status );
        }

        foreach ( $options->control->command as $command_view ) {
            $command =  trim((string)$command_view['name'] );
            if ( $command_view->classalias ) {
                $classroot = trim((string)$command_view->classalias['name']);
                $map->addClassroot( $command, $classroot  );
            }
            if ( $command_view->view ) {
                $view =  trim((string)$command_view->view);
                $forward = trim((string)$command_view->forward);
                $map->addView( $view, $command, 0);
                if ( $forward ) {
                    $map->addForward( $command, 0, $forward );
                }
                foreach( $command_view->status as $command_view_status ) {
                    $view =  trim((string)$command_view_status->view);
                    $forward = trim((string)$command_view_status->forward);
                    $stat_str = trim($command_view_status['value']); 
                    $status = \woo\command\Command::statuses( $stat_str );
                    if ( $view ) {
                        $map->addView( $view, $command, $status);
                    }
                    if ( $forward ) {
                        $map->addForward( $command, $status, $forward );
                    }
                }
            }
        }
        \woo\base\ApplicationRegistry::setControllerMap( $map );
    }

    private function ensure( $expr, $message ) {
        if ( ! $expr ) {
            throw new \woo\base\AppException( $message );
        }
    }
}
?>
