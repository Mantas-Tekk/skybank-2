<?php

namespace App;

class Validator
{

    function __construct()
    {
        // _c('Made validator <br>');
    }

    public function fromInputsvalidaion(array $user, array $users): bool
    {

        _c($user);

        if (!($this->PersonNumberValidator($user['personalNumber']))) {
            return false;
        }

        if (!($this->inputStringValidation($user['name']))) {
            return false;
        }

        if (!($this->inputStringValidation($user['surname']))) {
            return false;
        }

        if(!($this->uniquePersonalNumberValidator($user['personalNumber'], $users))) {
            return false;
        }

        return true;
    }

    private function uniquePersonalNumberValidator(string $pn, array $users): bool
    {
        $is_unique = true;
        foreach ($users as $value) {
            if ('a' . $value->personalNumber == 'a' . $pn) {
                $is_unique = false;
                return false;
            }
        }
        return true;
    }

    private function PersonNumberValidator(string $s): bool
    {
        if (!is_numeric($s) || strlen($s) != 11) {

            return false;
        }
        $d = 0;
        $e = 0;
        $b = 1;
        $c = 3;
        for ($i = 0; $i < 10; $i++) {
            $a = $s[$i];
            $d = $d + ($b * $a);
            $e = $e + ($c * $a);
            $b++;
            if ($b == 10) $b = 1;
            $c++;
            if ($c == 10) $c = 1;
        }
        $d = $d % 11;
        $e = $e % 11;
        if ($d == 10) {
            $i = ($e == 10) ? 0 : $e;
        } else {
            $i = $d;
        }
        return ($s[10] == $i) ? true : false;
    }

    private function inputStringValidation(string $str): bool
    {
        $is_name_valid = true;
        $pattern = '/(\d)|(\W)/';
        $pattern2 = '/([ąčęėįšųūžĄČĘĖĮŠŲŪŽ])/';
        $str_lt_replace = preg_replace($pattern2, '', $str);

        if (strlen($str) < 4) {
            $is_name_valid = false;
            return $is_name_valid;
        }

        if (preg_match($pattern, $str_lt_replace) != 0) {
            $is_name_valid = false;
        }
        return $is_name_valid;
    }

    public function validSumValidator($money)
    {
        $pattern = '/^[0-9]+(\.[0-9]{1,2})?/';
        if (strlen(preg_replace($pattern, '', $money)) != 0) {
            return false;
        }
        return true;
    }
}
