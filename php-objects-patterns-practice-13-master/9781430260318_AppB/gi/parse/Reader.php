<?php
namespace gi\parse;

interface Reader {

    function getChar();
    function getPos();
    function pushBackChar();
}
?>
