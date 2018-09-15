<?php
class CDProduct extends ShopProduct {
   private $playLength = 0;
   var $coverUrl;

   public function __construct( $title, $firstName,
                             $mainName,     $price, $playLength ) {
      parent::__construct( $title, $firstName,
                        $mainName, $price );
      $this->playLength = $playLength;
   }

   public function getPlayLength() {
      return $this->playLength;
   }

   public function getSummaryLine() {
      $base  = parent::getSummaryLine();
      $base .= ": Время звучания - {$this->playLength}";
      return $base;
   }
}
?>