<?php
namespace App\Enums;

enum GenderEnum: string
{
    case MAN = 'male';
    case WOMAN = 'female';
    case OTHER = 'other';
    case SECRET = 'private';
    public static function genderType(string $val): string
    {
        return match($val){
            self::MAN->value => '男性',
            self::WOMAN->value => '女性',
            self::OTHER->value => 'その他',
            self::SECRET->value => '非公開',
            default=>'0'
        };
    }

    public static function getAllGender(): array
    {
        return [self::MAN->value, self::WOMAN->value, self::OTHER->value, self::SECRET->value];
    }

}