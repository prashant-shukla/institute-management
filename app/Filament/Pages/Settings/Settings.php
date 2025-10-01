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
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 901;
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
                            Textarea::make('address.name'),
                            Select::make('address.city')
                            ->options([
                                'mumbai' => 'Mumbai',
                                'delhi' => 'Delhi',
                                'bengaluru' => 'Bengaluru',
                                'hyderabad' => 'Hyderabad',
                                'ahmedabad' => 'Ahmedabad',
                                'chennai' => 'Chennai',
                                'kolkata' => 'Kolkata',
                                'pune' => 'Pune',
                                'jaipur' => 'Jaipur',
                                'jodhpur' => 'Jodhpur',
                                'lucknow' => 'Lucknow',
                                'kanpur' => 'Kanpur',
                                'nagpur' => 'Nagpur',
                                'visakhapatnam' => 'Visakhapatnam',
                                'bhopal' => 'Bhopal',
                                'patna' => 'Patna',
                                'ludhiana' => 'Ludhiana',
                                'agra' => 'Agra',
                                'nashik' => 'Nashik',
                                'vadodara' => 'Vadodara',
                                'meerut' => 'Meerut',
                            ]),
                        
                            Select::make('address.state')
                            ->options([
                                'andhra_pradesh' => 'Andhra Pradesh',
                                'arunachal_pradesh' => 'Arunachal Pradesh',
                                'assam' => 'Assam',
                                'bihar' => 'Bihar',
                                'chhattisgarh' => 'Chhattisgarh',
                                'goa' => 'Goa',
                                'gujarat' => 'Gujarat',
                                'haryana' => 'Haryana',
                                'himachal_pradesh' => 'Himachal Pradesh',
                                'jharkhand' => 'Jharkhand',
                                'karnataka' => 'Karnataka',
                                'kerala' => 'Kerala',
                                'madhya_pradesh' => 'Madhya Pradesh',
                                'maharashtra' => 'Maharashtra',
                                'manipur' => 'Manipur',
                                'meghalaya' => 'Meghalaya',
                                'mizoram' => 'Mizoram',
                                'nagaland' => 'Nagaland',
                                'odisha' => 'Odisha',
                                'punjab' => 'Punjab',
                                'rajasthan' => 'Rajasthan',
                                'sikkim' => 'Sikkim',
                                'tamil_nadu' => 'Tamil Nadu',
                                'telangana' => 'Telangana',
                                'tripura' => 'Tripura',
                                'uttar_pradesh' => 'Uttar Pradesh',
                                'uttarakhand' => 'Uttarakhand',
                                'west_bengal' => 'West Bengal',
                                'andaman_nicobar' => 'Andaman and Nicobar Islands',
                                'chandigarh' => 'Chandigarh',
                                'dadra_nagar_haveli_daman_diu' => 'Dadra and Nagar Haveli and Daman and Diu',
                                'delhi' => 'Delhi',
                                'jammu_kashmir' => 'Jammu and Kashmir',
                                'ladakh' => 'Ladakh',
                                'lakshadweep' => 'Lakshadweep',
                                'puducherry' => 'Puducherry',
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