@extends('student.layout')

@section('content')
<div class="bg-gray-100 text-gray-800">

  <div class="max-w-6xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
    <h1 class="text-2xl font-bold text-blue-600 mb-6 text-center">
      📊 My Exam Performance Summary
    </h1>

    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
        <thead class="bg-blue-50">
          <tr>
            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">#</th>
            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Exam Name</th>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-600">Total Qs</th>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-600">Attempted</th>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-600">Correct</th>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-600">Wrong</th>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-600">Score (%)</th>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-600">Date</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">
          @forelse ($summaries as $index => $s)
            <tr class="hover:bg-gray-50 transition">
              <td class="px-4 py-2 text-sm text-gray-600">{{ $index + 1 }}</td>
              <td class="px-4 py-2 text-sm font-medium text-gray-800">{{ $s['exam']->name }}</td>
              <td class="px-4 py-2 text-center text-sm">{{ $s['total'] }}</td>
              <td class="px-4 py-2 text-center text-sm">{{ $s['attempted'] }}</td>
              <td class="px-4 py-2 text-center text-sm text-green-600 font-semibold">{{ $s['correct'] }}</td>
              <td class="px-4 py-2 text-center text-sm text-red-500 font-semibold">{{ $s['wrong'] }}</td>
              <td class="px-4 py-2 text-center text-sm font-bold
                {{ $s['percentage'] >= 60 ? 'text-green-600' : 'text-red-600' }}">
                {{ $s['percentage'] }}%
              </td>
              <td class="px-4 py-2 text-center text-sm text-gray-500">
                {{ \Carbon\Carbon::parse($s['date'])->format('d M Y') }}
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="8" class="text-center py-6 text-gray-500">
                No exams attempted yet.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-6 text-center">
      <a href="{{ route('student.exams') }}"
         class="bg-gray-200 text-gray-800 px-5 py-2 rounded-md hover:bg-gray-300 transition">
        🏠 Back to Exams
      </a>
    </div>
  </div>

</div>
@endsection
