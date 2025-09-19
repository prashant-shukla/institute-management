<?php
namespace App\Filament\Resources;

use Z3d0X\FilamentFabricator\Resources\PageResource as BasePageResource;

class PageResource extends BasePageResource
{
    protected static ?string $navigationGroup = 'CMS';
    protected static ?int $navigationSort = 500;
}
