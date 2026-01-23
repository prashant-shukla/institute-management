<?php

namespace App\Filament\Pages;

use App\Models\Student;
use App\Models\User;
use Filament\Pages\Page;

class StudentsOverview extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Students';
    protected static ?string $title = 'Students';
    protected static ?string $navigationGroup = 'Students';

    protected static string $view = 'filament.pages.students-overview';

    public function getViewData(): array
    {
        return [
            'students' => Student::with('course')->latest()->get(),

            'usersWithoutStudent' => User::whereDoesntHave('student')->get(),
        ];
    }
}
