<?php

namespace App\Providers\Filament;

use App\Filament\Auth\Login;
use App\Settings\AppSettings;
use Filament\Enums\ThemeMode;
use Filament\FontProviders\GoogleFontProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Notifications\Notification;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public static function resetSettings(): void
    {
        shell_exec('git checkout -- '.storage_path('app/public'));
        Artisan::call('migrate:rollback', ['--path' => 'database/settings/']);
        DB::table('settings')->truncate();
        Artisan::call('migrate', ['--path' => 'database/settings/']);
        Notification::make()->success()->title(__('Setting restore successfully'))?->send();
    }

    public function panel(Panel $panel): Panel
    {
        $appSettings = app(AppSettings::class);

        return $panel
            ->default()
            ->id('panel')
            ->brandLogo(Storage::disk('public')->url($appSettings->tryGet('logoLight')))
            ->darkModeBrandLogo(Storage::disk('public')->url($appSettings->tryGet('logoDark')))
            ->brandName($appSettings->tryGet('title'))
            ->brandLogoHeight('2.5rem')
            ->path('panel')
            ->login(Login::class)
            ->defaultThemeMode(ThemeMode::Light)
            ->font('Vazirmatn', provider: GoogleFontProvider::class)
            ->spa()
            ->maxContentWidth('full')
            ->colors([
                'primary' => Color::Teal,
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->plugins([
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
