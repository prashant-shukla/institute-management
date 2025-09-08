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
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use TomatoPHP\FilamentMenus\FilamentMenuLoader;
use Datlechin\FilamentMenuBuilder\FilamentMenuBuilderPlugin;
use Datlechin\FilamentMenuBuilder\MenuPanel\StaticMenuPanel;
use Datlechin\FilamentMenuBuilder\MenuPanel\ModelMenuPanel;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\MenuLocation;
use App\Filament\Resources\MenuResource;
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
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->resources([
                \App\Filament\Resources\MenuResource::class,
            ])
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                // Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
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
            ])->plugins([
                FilamentShieldPlugin::make(),
                FilamentSettingsPlugin::make()->pages([
                    Settings::class,
                ]),
                FilamentFabricatorPlugin::make(),
                FilamentMenuBuilderPlugin::make()
                    ->addLocation('header', 'Header')
                    ->addLocation('footer', 'Footer'),
                FilamentMenuBuilderPlugin::make()
                    ->addLocations([
                        'header' => 'Header',
                        'footer' => 'Footer',
                    ]),
                FilamentMenuBuilderPlugin::make()
                    ->showCustomLinkPanel(false),
                FilamentMenuBuilderPlugin::make()
                    ->showCustomTextPanel(),
                FilamentMenuBuilderPlugin::make()
                    ->addMenuPanels([
                        StaticMenuPanel::make()
                            ->description('Lorem ipsum...')
                            ->icon('heroicon-m-link')
                            ->collapsed(true)
                            ->collapsible(true)
                            ->paginate(perPage: 5, condition: true)
                    ]),

                FilamentMenuBuilderPlugin::make()
                    ->addMenuPanels([
                        ModelMenuPanel::make()
                            ->model(\App\Models\MenuCategory::class),
                    ]),
                FilamentMenuBuilderPlugin::make()
                    ->addMenuFields([
                        Toggle::make('is_logged_in'),
                    ])
                    ->addMenuItemFields([
                        TextInput::make('classes'),
                    ]),
                FilamentMenuBuilderPlugin::make()
                    ->usingResource(MenuResource::class),
                FilamentMenuBuilderPlugin::make()
                    ->usingMenuModel(Menu::class)
                    ->usingMenuItemModel(MenuItem::class)
                    ->usingMenuLocationModel(MenuLocation::class),
                \Filament\SpatieLaravelTranslatablePlugin::make()->defaultLocales(['en', 'ar']),
                \TomatoPHP\FilamentMenus\FilamentMenusPlugin::make(),
            ])

        ;
    }
}
