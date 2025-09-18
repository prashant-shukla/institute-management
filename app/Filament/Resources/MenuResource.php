<?php

namespace App\Filament\Resources;

use Datlechin\FilamentMenuBuilder\Resources\MenuResource as BaseMenuResource;

class MenuResource extends BaseMenuResource
{
    protected static ?string $navigationGroup = 'Navigation';
    protected static ?int $navigationSort = 902;
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-book-close';
    protected static ?string $navigationLabel = 'Navigation';


    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }
}
