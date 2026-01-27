<x-filament-panels::page>

    <form method="GET" class="flex gap-3 mb-5">
        <input type="date" name="from" value="{{ request('from') }}"
            class="border px-3 py-2 rounded">

        <input type="date" name="to" value="{{ request('to') }}"
            class="border px-3 py-2 rounded">

        <button type="submit"
            class="px-6 py-2 border text-black rounded-md
               transition">
            Filter
        </button>

    </form>

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
                    <td class="p-3">{{ $user->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center p-4 text-gray-500">
                        No users found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-filament-panels::page>