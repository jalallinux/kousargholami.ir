<?php

namespace App\Contracts;

use Illuminate\Support\Facades\DB;
use Spatie\LaravelSettings\Settings;

abstract class BaseSetting extends Settings
{
    public function tryGet(string $propertyName, $default = null)
    {
        try {
            DB::getPdo();

            return $this->{$propertyName};
        } catch (\Exception $ex) {
            return $default;
        }
    }
}
