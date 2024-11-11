<?php

namespace App\Filament\Installation;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Shipu\WebInstaller\Concerns\StepContract;

class ApplicationSettings implements StepContract
{


  public static function form(): array
  {
    $applicationFields = [];

    foreach (config('installer.applications', []) as $key => $value) {
      if ($key == 'admin.password') {
        $applicationFields[] = TextInput::make('applications.' . $key)
          ->label($value['label'])
          ->password()
          ->maxLength(255)
          ->default($value['default'])
          ->dehydrateStateUsing(fn($state) => !empty($state) ? Hash::make($state) : "")
          ->required($value['required'])
          ->rules($value['rules']);
      } elseif ($key == 'admin.password_confirmation') {
        $applicationFields[] = TextInput::make('applications.' . $key)
          ->label($value['label'])
          ->password()
          ->maxLength(255)
          ->default($value['default'])
          ->required($value['required'])
          ->rules('required|string|min:8|max:100|same:applications.admin.password'); // Validate against the password
      } else {
        $applicationFields[] = TextInput::make('applications.' . $key)
          ->label($value['label'])
          ->required($value['required'])
          ->rules($value['rules'])
          ->default($value['default'] ?? '');
      }
    }

    $applicationFields[] = Checkbox::make('import_demo_data')
      ->label('Import Demo Data')
      ->helperText('Check this if you want to import the database with demo data.')
      ->reactive();

    return $applicationFields;
  }

  public static function make(): Step
  {
    return Step::make('application')
      ->label('Application Settings')
      ->schema(self::form());
  }

  protected static function handleFinish($data): void
  {
    if ($data && isset($data['import_demo_data']) && $data['import_demo_data']) {
      Artisan::call('migrate --seed');
    } else {
      Artisan::call('migrate');
    }
  }
}
