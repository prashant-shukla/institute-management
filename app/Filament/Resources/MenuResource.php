<?php

namespace App\Filament\Plugins\Resources;
 
use Datlechin\FilamentMenuBuilder\Resources\MenuResource as BaseMenuResource;
 
class MenuResource extends BaseMenuResource
{
    protected static ?string $navigationGroup = 'Navigation';
 
    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }
}