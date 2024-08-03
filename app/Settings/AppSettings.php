<?php

namespace App\Settings;

use App\Contracts\BaseSetting;

class AppSettings extends BaseSetting
{
    public string $title;

    public string $description;

    public string $logoLight;

    public string $logoDark;

    public static function group(): string
    {
        return 'app';
    }
}
