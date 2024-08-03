<?php

namespace App\Contracts;

use Illuminate\Support\Str;

use function Filament\Support\locale_has_pluralization;

trait TranslateLabels
{
    public static function getNavigationGroup(): ?string
    {
        return __(parent::getNavigationGroup());
    }

    public static function getNavigationLabel(): string
    {
        return __(parent::getNavigationLabel());
    }

    public static function getModelLabel(): string
    {
        return __(parent::getModelLabel());
    }

    public function getTitle(): string
    {
        return __(parent::getTitle());
    }

    public static function getPluralModelLabel(): string
    {
        if (filled($label = parent::$pluralModelLabel ?? parent::getPluralLabel())) {
            return __($label);
        }

        if (locale_has_pluralization()) {
            return __(Str::plural(parent::getModelLabel()));
        }

        return __(parent::getModelLabel());
    }
}
