<div class="p-6 space-y-4">
    <h2 class="text-lg font-semibold text-gray-800 border-b pb-2">
        Inquiry Details
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <p class="text-sm text-gray-500">Name</p>
            <p class="font-medium text-gray-900">{{ $record->name }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Email</p>
            <p class="font-medium text-gray-900">{{ $record->email }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Mobile</p>
            <p class="font-medium text-gray-900">{{ $record->mobile }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Qualification</p>
            <p class="font-medium text-gray-900">{{ $record->qualification }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Branch / Course</p>
            <p class="font-medium text-gray-900">{{ $record->courseCategory?->name ?? '-' }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Tool</p>
            <p class="font-medium text-gray-900">{{ $record->tool?->name ?? '-' }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Status</p>
            <span class="px-2 py-1 text-xs rounded-full 
                {{ $record->is_online ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                {{ $record->is_online ? 'Online' : 'Offline' }}
            </span>
        </div>

        <div>
            <p class="text-sm text-gray-500">Date</p>
            <p class="font-medium text-gray-900">{{ $record->created_at->format('d-M-Y H:i') }}</p>
        </div>
    </div>

    <div>
        <p class="text-sm text-gray-500">Message</p>
        <p class="font-medium text-gray-900 whitespace-pre-line">
            {{ $record->message }}
        </p>
    </div>
</div>
