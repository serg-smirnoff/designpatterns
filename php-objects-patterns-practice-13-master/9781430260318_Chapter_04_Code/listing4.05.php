<?php
require_once( "listing4.03.php" );

abstract class ShopProductWriter {
    protected $products = array();

    public function addProduct( ShopProduct $shopProduct ) {
        $this->products[]=$shopProduct;
    }

    abstract public function write( );
}

class XmlProductWriter extends ShopProductWriter{

    public function write() {
        $writer =new XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0','UTF-8');
        $writer->startElement("products");
        foreach ( $this->products as $shopProduct ) {
            $writer->startElement("product");
            $writer->writeAttribute( "title", $shopProduct->getTitle() );
            $writer->startElement("summary");
            $writer->text( $shopProduct->getSummaryLine() );
            $writer->endElement(); // summary
            $writer->endElement(); // product
        }
        $writer->endElement(); // products
        $writer->endDocument();
        print $writer->flush();
    }
}

class TextProductWriter extends ShopProductWriter{
    public function write() {
        $str = "PRODUCTS:\n";
        foreach ( $this->products as $shopProduct ) {
            $str .= $shopProduct->getSummaryLine()."\n";
        }
        print $str;
    }
}

/*
// demonstrate abstract instantiation error
$writer = new ShopProductWriter();
*/

$product1 = new BookProduct(    "My Antonia", "Willa", "Cather", 5.99, 300 );
$product2 =   new CdProduct(    "Exile on Coldharbour Lane", 
                                "The", "Alabama 3", 10.99, 60.33 );

$textwriter = new TextProductWriter();
$textwriter->addProduct( $product1 );
$textwriter->addProduct( $product2 );
$textwriter->write();

$xmlwriter = new XmlProductWriter();
$xmlwriter->addProduct( $product1 );
$xmlwriter->addProduct( $product2 );
$xmlwriter->write();
?>
