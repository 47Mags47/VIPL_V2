<?php

namespace Database\Seeders;

use App\Models\Glossary\ValidatorType;
use App\Models\Main\ValidatorRule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValidatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ### VALIDATOR
        ##################################################
        ### RULES
        ValidatorType::create(['code' => 'nullable',        'name' => 'Может отсутствовать',                'error_pattern' => '']);
        ValidatorType::create(['code' => 'regexp',          'name' => 'Соответсвует шаблону',               'error_pattern' => 'Значение ":Attribute" не соответсвует шаблону']);
        ValidatorType::create(['code' => 'max',             'name' => 'Меньше',                             'error_pattern' => 'Значение ":Attribute" должно быть меньше :Value']);
        ValidatorType::create(['code' => 'min',             'name' => 'Больше',                             'error_pattern' => 'Значение ":Attribute" должно быть больше :Value']);
        ValidatorType::create(['code' => 'len_max',         'name' => 'Длина меньше',                       'error_pattern' => 'Длина ":Attribute" должно быть меньше :Value']);
        ValidatorType::create(['code' => 'len_min',         'name' => 'Длина больше',                       'error_pattern' => 'Длина ":Attribute" должно быть больше :Value']);
        ValidatorType::create(['code' => 'required',        'name' => 'Обязательное',                       'error_pattern' => '":Attribute" Не должно быть пустым']);
        ValidatorType::create(['code' => 'after',           'name' => 'до',                                 'error_pattern' => 'Дата ":Attribute" Должна быть до :Value']);
        ValidatorType::create(['code' => 'before',          'name' => 'после',                              'error_pattern' => 'Дата ":Attribute" Должна быть после :Value']);
        ValidatorType::create(['code' => 'one_of_regexp',   'name' => 'соответсвует одному из шаблонов',    'error_pattern' => 'Значение ":Attribute" не соответсвует шаблону']);

        ### VALIDATORS
        ValidatorRule::create(['type_code' => 'nullable',           'column_code' => 'kbk']);
        ValidatorRule::create(['type_code' => 'nullable',           'column_code' => 'first_name']);
        ValidatorRule::create(['type_code' => 'nullable',           'column_code' => 'middle_name']);
        ValidatorRule::create(['type_code' => 'min',                'column_code' => 'summ',            'value' => 0]);
        ValidatorRule::create(['type_code' => 'max',                'column_code' => 'summ',            'value' => 9999999]);
        ValidatorRule::create(['type_code' => 'regexp',             'column_code' => 'kbk',             'value' => '^[0-9]{20}$']);
        ValidatorRule::create(['type_code' => 'regexp',             'column_code' => 'pasp',            'value' => '^[0-9]{6}$']);
        ValidatorRule::create(['type_code' => 'regexp',             'column_code' => 'first_name',      'value' => '^[а-яА-ЯёЁ-]*$']);
        ValidatorRule::create(['type_code' => 'regexp',             'column_code' => 'middle_name',     'value' => '^[а-яА-ЯёЁ-]*$']);
        ValidatorRule::create(['type_code' => 'regexp',             'column_code' => 'last_name',       'value' => '^[а-яА-ЯёЁ-]*$']);
        ValidatorRule::create(['type_code' => 'regexp',             'column_code' => 'birth',           'value' => '^[0-9]{2}\.[0-9]{2}\.[0-9]{4}$']);
        ValidatorRule::create(['type_code' => 'regexp',             'column_code' => 'snils',           'value' => '^[0-9]{3}-[0-9]{3}-[0-9]{3} [0-9]{2}$']);
        ValidatorRule::create(['type_code' => 'one_of_regexp',      'column_code' => 'account',         'value' => json_encode([
            '^40817810[0-9]{12}$',
            '^40820810[0-9]{12}$',
            '^40823810[0-9]{12}$',
            '^40914810[0-9]{12}$',
            '^423[0-9]{2}810[0-9]{12}$',
        ])]);
        ValidatorRule::create(['type_code' => 'one_of_regexp',      'column_code' => 'summ',            'value' => json_encode([
            '^[0-9]*$',
            '^[0-9]*[\.\,]{0,1}[0-9]{0,2}$',
        ])]);
    }
}
