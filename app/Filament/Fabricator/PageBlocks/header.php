<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

class header extends PageBlock

{
    
    public static function getBlockSchema(): Block
    {
        return Block::make('header')
            ->schema([
                TextInput::make('titel')->required(),
                RichEditor::make('content'),
                FileUpload::make('attachment')
                
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}