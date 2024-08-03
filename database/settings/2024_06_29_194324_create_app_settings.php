<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('app.title', 'عنوان برنامه');
        $this->migrator->add('app.description', 'توضیحات برنامه');
        $this->migrator->add('app.logoLight', 'logo-light.png');
        $this->migrator->add('app.logoDark', 'logo-dark.png');
    }
};
