<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class ApptEncoder {
    abstract function encode();
}

class BloggsApptEncoder extends ApptEncoder {
    function encode(){
        return "Данные о встрече закодированы в формате BloggsCal \n";
    }
}

abstract BloggsCommsManager extends CommsManager{
    
    function getHeaderText(){
        return "BloggsCal верхний колонтитул\n";
    }

    function getApptEncoder(){
        return new BloggsApptEncoder();
    }
    
    function getFooterText(){
        return "BloggsCal нижний колонтитул\n";
    }

}
