<?php

namespace App\Core;

use App\Models\Glossary\PackageDataColumn;
use App\Models\Main\PackageFile;
use App\Models\Main\ValidatorRule;

class PackageDataValidator
{
    public static function nullable($rule, $row)
    {
        return true;
    }

    public static function regexp($rule, $row)
    {
        return preg_match('/' . $rule->value . '/', $row->{$rule->column_code});
    }

    public static function one_of_regexp($rule, $row){
        $flag = false;
        foreach (json_decode($rule->value) as $regexp) {
            if (preg_match('/' . $regexp . '/', $row->{$rule->column_code})) $flag = true;
        }

        return $flag;
    }

    public static function min($rule, $row){
        return floatval($row->{$rule->column_code}) > floatval($rule->value);
    }

    public static function max($rule, $row){
        return floatval($row->{$rule->column_code}) < floatval($rule->value);
    }
}
