<?php

namespace App\Filament\Resources\NewResource\Pages;

use App\Filament\Resources\NewResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNew extends CreateRecord
{
    protected static string $resource = NewResource::class;
    
    //     return [
    //         TextColumn::make('status')
    //             ->label('Status')
    //             ->searchable()
    //             ->sortable()
    //             ->toggleable()
    //             ->formatStateUsing(function ($state) {
    //                 return [
    //                     '0' => 'Draft',
    //                     '1' => 'Reviewing',
    //                     '2' => 'Published'
    //                 ];
    //             }),
    //     ];
    // }

    // protected function getFilters(): array
    // {
    //     return [
    //         SelectFilter::make('status')
    //             ->options([
    //                 '0' => 'Draft',
    //                 '1' => 'Reviewing',
    //                 '2' => 'Published',
    //             ]),
    //     ];
    // }


}