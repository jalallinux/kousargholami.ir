<?php

namespace App\Filament\Pages\Setting;

use App\Contracts\TranslateLabels;
use App\Providers\Filament\AdminPanelProvider;
use App\Settings\AppSettings;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class AppSetting extends SettingsPage
{
    use HasPageShield, TranslateLabels;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = AppSettings::class;

    protected static ?string $navigationGroup = 'Setting';

    protected static ?string $slug = 'setting/app';

    protected static ?string $title = 'App setting';

    protected static ?string $navigationLabel = 'App';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('app')
                    ->label(__('App'))
                    ->schema([
                        Split::make([
                            FileUpload::make('logoLight')
                                ->label(__('Logo light'))
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->getUploadedFileNameForStorageUsing(fn () => 'logo-light.png'),
                        ]),
                        Split::make([
                            FileUpload::make('logoDark')
                                ->label(__('Logo dark'))
                                ->image()
                                ->imageEditor()
                                ->maxSize(1024)
                                ->getUploadedFileNameForStorageUsing(fn () => 'logo-dark.png'),
                        ]),
                        Grid::make()
                            ->schema([
                                TextInput::make('title')
                                    ->label(__('Title'))
                                    ->required(),
                                TextInput::make('description')
                                    ->label(__('Description')),
                            ]),
                    ]),
            ]);
    }

    protected function getActions(): array
    {
        return [
            Action::make('restoreSetting')
                ->label(__('Restore setting'))
                ->button()
                ->color('danger')
                ->requiresConfirmation()
                ->modalIcon('heroicon-o-arrow-path')
                ->modalSubmitActionLabel(__('Restore'))
                ->action(fn () => AdminPanelProvider::resetSettings()),
        ];
    }
}
