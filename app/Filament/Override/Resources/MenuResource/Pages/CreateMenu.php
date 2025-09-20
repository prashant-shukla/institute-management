<?php

namespace App\Filament\Override\Resources\MenuResource\Pages;

use App\Filament\Override\Resources\MenuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMenu extends CreateRecord
{
    protected static string $resource = MenuResource::class;
}
