<?php

namespace App;

class Generator {

    function __construct()
    {
        _c('Made generator');
    }

    public function ibanGenerator() :string
    {
        $iban = 'LT12 1000 0';
        $iban .= '' . rand(100, 999) . ' ' . rand(1000, 9999) . ' ' . rand(1000, 9999);
        return $iban;
    }

}