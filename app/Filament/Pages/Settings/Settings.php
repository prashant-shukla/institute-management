<?php
namespace App\Filament\Pages\Settings;
 
use Closure;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Outerweb\FilamentSettings\Filament\Pages\Settings as BaseSettings;
 
class Settings extends BaseSettings
{
    use HasPageShield;
    public function schema(): array|Closure
    {
        return [
            Tabs::make('Settings')
                ->schema([
                    Tabs\Tab::make('General')
                        ->schema([
                            TextInput::make('general.institute_name'),
                            FileUpload::make('general.institute_logo')->directory('setting_images'),
                            FileUpload::make('general.institute_favicon')->directory('setting_images'),
                        ]),
                    Tabs\Tab::make('Address')
                        ->schema([
                            Textarea::make('address.street'),
                            Select::make('address.city')
                             ->options([
                                'draft' => 'Draft',
                                'reviewing' => 'Reviewing',
                                'published' => 'Published',
                            ]),
                            Select::make('address.status')
                             ->options([
                                'draft' => 'Draft',
                                'reviewing' => 'Reviewing',
                                'published' => 'Published',
                            ]),
                            TextInput::make('address.zip_code'),
                        ]),
                    Tabs\Tab::make('Contact')
                        ->schema([
                            Textarea::make('contact.email'),
                            TextInput::make('contact.phone_number'),
                            TextInput::make('contact.fax'),
                            TextInput::make('contact.time_zone'),
                        ]),
                ]),
        ];
    }
}