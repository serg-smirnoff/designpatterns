<?php

class XmlException extends Exception {
    private $error;

    function __construct( LibXmlError $error ) {
        $shortfile = basename( $error->file );
	print_r( $error );
        $msg = "[{$shortfile}, line {$error->line}, col {$error->column}] {$error->message}";
        $this->error = $error;
        parent::__construct( $msg, $error->code );
    }

    function getLibXmlError() {
        return $this->error;
    }
}

class FileException extends Exception { }
class ConfException extends Exception { }

class Conf {
    private $file;
    private $xml;
    private $lastmatch;

    function __construct( $file ) {
        $this->file = $file;
        if ( ! file_exists( $file ) ) {
            throw new FileException( "file '$file' does not exist" );
        }
        $this->xml = simplexml_load_file($file, null, LIBXML_NOERROR );
        if ( ! is_object( $this->xml ) ) {
            throw new XmlException( libxml_get_last_error() );
        }
        $matches = $this->xml->xpath("/conf");
        if ( ! count( $matches ) ) {
            throw new ConfException( "could not find root element: conf" );
        }
    }    

    function write() {
        if ( ! is_writeable( $this->file ) ) {
            throw new Exception("file '{$this->file}' is not writeable");
        }
        file_put_contents( $this->file, $this->xml->asXML() );
    }

    function get( $str ) {
        $matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
        if ( count( $matches ) ) {
            $this->lastmatch = $matches[0];
            return (string)$matches[0];
        }
        return null;
    }

    function set( $key, $value ) {
        if ( ! is_null( $this->get( $key ) ) ) {
            $this->lastmatch[0]=$value;
            return;
        }
        $conf = $this->xml->conf;
        $this->xml->addChild('item', $value)->addAttribute( 'name', $key );
    }
}


class Runner {
    static function init() { 
        try {
            $fh = fopen("./log.txt","a");
            fputs( $fh, "start\n" );
            $conf = new Conf( dirname(__FILE__)."/conf.broken.xml" );
            print "user: ".$conf->get('user')."\n";
            print "host: ".$conf->get('host')."\n";
            $conf->set("pass", "newpass");
            $conf->write();
            fputs( $fh, "end\n" );
            fclose( $fh );
        } catch ( FileException $e ) {
            // permissions issue or non-existent file
            fputs( $fh, "file exception\n" );
            throw $e;
        } catch ( XmlException $e ) {
            fputs( $fh, "xml exception\n" );
            // broken xml
        } catch ( ConfException $e ) {
            fputs( $fh, "conf exception\n" );
            // wrong kind of XML file
        } catch ( Exception $e ) {
            fputs( $fh, "general exception\n" );
            // backstop: should not be called
        }
    }
}

Runner::init();

?>
