<?php

class MarkParse {
   private $expression;
   private $operand;
   private $interpreter;
   private $context;

   function __construct( $statement ) {
      $this->compile( $statement );
   } 

   function evaluate( $input ) {
      $icontext = new InterpreterContext();
      $prefab = new VariableExpression('input', $input );

     // Добавим переменную input в контекст
     $prefab->interpret( $icontext ); 

     $this->interpreter->interpret( $icontext );
     $result = $icontext->lookup( $this->interpreter );
     return $result; 
   } 

   function compile( $statement_str ) {
      // Построим дерево анализатора
      $context = new gi_parse_Context();
      $scanner = new gi_parse_Scanner( 
         new gi_parse_StringReader($statement_str), $context );
      $statement = $this->expression();
      $scanresult = $statement->scan( $scanner ); 

      if ( ! $scanresult || 
           $scanner->tokenType() != gi_parse_Scanner::EOF ) {
         $msg  = "";
         $msg .= " line: {$scanner->line_no()} ";
         $msg .= " char: {$scanner->char_no()}";
         $msg .= " token: {$scanner->token()}\n";
         throw new Exception( $msg ); 
      } 
      $this->interpreter = $scanner->getContext()->popResult();
   } 

   function expression() { 
      if ( ! isset( $this->expression ) ) {
         $this->expression = new gi_parse_SequenceParse();
         $this->expression->add( $this->operand() );
         $bools = new gi_parse_RepetitionParse( );
         $whichbool = new gi_parse_AlternationParse();
         $whichbool->add( $this->orExpr() );
         $whichbool->add( $this->andExpr() );
         $bools->add( $whichbool );
         $this->expression->add( $bools ); 
      }
      return $this->expression;
   } 

   function orExpr() {
      $or = new gi_parse_SequenceParse( );
      $or->add( new gi_parse_WordParse('or') )->discard();
      $or->add( $this->operand() );
      $or->setHandler( new BooleanOrHandler() );
      return $or; 
   } 

   function andExpr() {
      $and = new gi_parse_SequenceParse();
      $and->add( new gi_parse_WordParse('and') )->discard();
      $and->add( $this->operand() );
      $and->setHandler( new BooleanAndHandler() );
      return $and; 
   } 

   function operand() { 
      if ( ! isset( $this->operand ) ) {
         $this->operand = new gi_parse_SequenceParse( );
         $comp = new gi_parse_AlternationParse( );
         $exp = new gi_parse_SequenceParse( );
         $exp->add( new gi_parse_CharacterParse( '(' ))->discard();
         $exp->add( $this->expression() );
         $exp->add( new gi_parse_CharacterParse( ')' ))->discard();
         $comp->add( $exp );
         $comp->add( new gi_parse_StringLiteralParse() ) 
              ->setHandler( new StringLiteralHandler() );
         $comp->add( $this->variable() );
         $this->operand->add( $comp );
         $this->operand->add( new gi_parse_RepetitionParse( ) ) 
              ->add($this->eqExpr());
       }
       return $this->operand; 
   } 

   function eqExpr() {
      $equals = new gi_parse_SequenceParse();
      $equals->add( new gi_parse_WordParse('equals') )->discard(); 
      $equals->add( $this->operand() );
      $equals->setHandler( new EqualsHandler() );
      return $equals; 
   } 

   function variable() {
      $variable = new gi_parse_SequenceParse();
      $variable->add( new gi_parse_CharacterParse( '$' ))->discard();
      $variable->add( new gi_parse_WordParse());
      $variable->setHandler( new VariableHandler() );
      return $variable; 
   }
} 



?>