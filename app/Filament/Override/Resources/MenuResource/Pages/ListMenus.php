<?php

namespace App\Filament\Override\Resources\MenuResource\Pages;

use App\Filament\Override\Resources\MenuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMenus extends ListRecords
{
    protected static string $resource = MenuResource::class;
    protected static ?int $navigationSort = 902;
    protected static ?string $navigationGroup = 'Navigation';


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
