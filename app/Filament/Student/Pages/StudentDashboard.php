<?php

namespace App\Filament\Student\Pages;

use Filament\Pages\Page;

class StudentDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.student.pages.student-dashboard';
}
