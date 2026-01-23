<x-filament::page>

    <h2 class="text-xl font-bold mb-4">👤 Users Without Student</h2>

    {{-- 🔍 FILTERS --}}
    <form method="GET" class="flex flex-wrap gap-3 mb-5">

        <select name="filter" class="border rounded px-3 py-2">
            <option value="">All</option>
            <option value="today" {{ request('filter')=='today' ? 'selected' : '' }}>Today</option>
            <option value="month" {{ request('filter')=='month' ? 'selected' : '' }}>This Month</option>
        </select>

        <input type="date" name="from" value="{{ request('from') }}"
               class="border rounded px-3 py-2">

        <input type="date" name="to" value="{{ request('to') }}"
               class="border rounded px-3 py-2">

        <button class="bg-primary-600 text-white px-4 py-2 rounded">
            Filter
        </button>
    </form>

    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Joined</th>
                </tr>
            </thead>
            <tbody>
                @forelse($usersWithoutStudent as $user)
                    <tr class="border-t">
                        <td class="p-3">
                            {{ trim($user->firstname.' '.$user->lastname) }}
                        </td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3">
                            {{ $user->created_at->format('d M Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center p-4 text-gray-500">
                            ✅ All users are already students
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-filament::page>
