<?php

namespace App\Enums;

enum ExpenseCategoryEnum: string
{
    case FOOD = 'Alimentation';
    case TRANSPORT = 'Transport';
    case HOBBIES = 'Loisirs';
    case OTHERS = 'Autres';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}