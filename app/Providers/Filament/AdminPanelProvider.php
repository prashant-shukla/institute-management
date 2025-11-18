<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
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
use Illuminate\View\Middleware\ShareErrorsFromSession;

use Outerweb\FilamentSettings\Filament\Plugins\FilamentSettingsPlugin;
use App\Filament\Pages\Settings\Settings;
use Z3d0X\FilamentFabricator\FilamentFabricatorPlugin;
use TomatoPHP\FilamentMenus\FilamentMenusPlugin;

use Datlechin\FilamentMenuBuilder\FilamentMenuBuilderPlugin;
use Datlechin\FilamentMenuBuilder\MenuPanel\StaticMenuPanel;
use Datlechin\FilamentMenuBuilder\MenuPanel\ModelMenuPanel;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

use BezhanSalleh\FilamentShield\FilamentShieldPlugin;

use App\Filament\Pages\Dashboard\Dashboard;


class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->authGuard('web')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->login()   // 👈 This line is required for /admin/login
        ->registration()
        ->passwordReset()
            ->brandName('Admin Panel')
            ->discoverResources(
                in: app_path('Filament/Resources'),
                for: 'App\\Filament\\Resources'
            )

            ->discoverPages(
                in: app_path('Filament/Pages'),
                for: 'App\\Filament\\Pages'
            )

            ->discoverWidgets(
                in: app_path('Filament/Widgets'),
                for: 'App\\Filament\\Widgets'
            )

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
                \Shipu\WebInstaller\Middleware\RedirectIfNotInstalled::class,
            ])

            ->authMiddleware([
                Authenticate::class,
                \App\Http\Middleware\BlockStudentFromFilament::class,
            ])

            ->plugins([
                FilamentShieldPlugin::make(),

                FilamentSettingsPlugin::make()->pages([
                    Settings::class,
                ]),

                FilamentFabricatorPlugin::make(),

                FilamentMenuBuilderPlugin::make()
                    ->addLocation('header', 'Header')
                    ->addLocation('footer', 'Footer')
                    ->showCustomLinkPanel(false)
                    ->showCustomTextPanel()
                    ->addMenuPanels([
                        StaticMenuPanel::make()
                            ->description('Lorem ipsum...')
                            ->icon('heroicon-m-link')
                            ->collapsed(true)
                            ->collapsible(true)
                            ->paginate(perPage: 5, condition: true),
                        ModelMenuPanel::make()->model(\App\Models\MenuCategory::class),
                    ])
                    ->addMenuFields([
                        Toggle::make('is_logged_in'),
                    ])
                    ->addMenuItemFields([
                        TextInput::make('classes'),
                    ]),

                \Filament\SpatieLaravelTranslatablePlugin::make()->defaultLocales(['en', 'ar']),
                FilamentMenusPlugin::make(),
            ]);
    }
}
