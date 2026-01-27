<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\User;

class StudentsOverview extends Page
{
    protected static string $view = 'filament.pages.students-overview';
    protected static ?string $navigationLabel = 'Users Without Student';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public function getViewData(): array
    {
        $query = User::whereDoesntHave('student');

        // ✅ Today filter
        if (request('filter') === 'today') {
            $query->whereDate('created_at', today());
        }

        // ✅ This month filter
        if (request('filter') === 'month') {
            $query->whereMonth('created_at', now()->month)
                  ->whereYear('created_at', now()->year);
        }

        // ✅ Date range filter
        if (request('from') && request('to')) {
            $query->whereBetween('created_at', [
                request('from'),
                request('to'),
            ]);
        }

        return [
            'usersWithoutStudent' => $query->latest()->get(),
        ];
    }
}
