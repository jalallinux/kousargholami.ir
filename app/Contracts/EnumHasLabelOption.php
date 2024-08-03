<?php

namespace App\Contracts;

trait EnumHasLabelOption
{
    public function label()
    {
        return __($this->value);
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn ($enum, $k) => [$enum->value => $enum->label()])->toArray();
    }
}
