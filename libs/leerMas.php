<?php

    function leerMas($content, $word_limit = 30)
    {
        $words = explode(" ",$content);

        return implode(" ",array_splice($words,0,$word_limit));
    }