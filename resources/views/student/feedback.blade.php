

@extends('student.layout')

@section('content')



<form action="{{ route('feedback.store') }}" method="POST"
      class="bg-white rounded-xl shadow-md border border-gray-200 p-6 md:p-8">
    @csrf

    <!-- Heading -->
    <p class="text-base md:text-lg font-semibold text-sky-600 mb-6">
        Rate our service in each of the following areas.
        <span class="text-gray-700">
            <strong>1</strong> is poor,
            <strong>10</strong> is excellent.
        </span>
    </p>

    <!-- Questions Loop -->
    <div class="space-y-4">
        @foreach ($questions as $index => $text)
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 
                        py-3 border-b border-gray-200 last:border-b-0">

                <!-- Question Text -->
                <label class="flex-1 text-sm md:text-base text-gray-800 leading-relaxed">
                    <span class="font-semibold">{{ $index }}.</span>
                    {{ $text }}
                    <span class="text-red-500">*</span>
                </label>

                <!-- Select Box (Fixed Width 70px) -->
                <div class="w-[150px]">
                    <select name="q{{ $index }}"
                            class="w-[150px] border border-gray-300 rounded-md px-2 py-1 
                                   text-sm focus:outline-none focus:ring-2
                                   focus:ring-blue-500 focus:border-blue-500">
                        <option value="">--</option>
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Comments -->
    <div class="mt-6">
        <label class="block text-sm md:text-base font-semibold text-gray-800 mb-2">
            Comments and Suggestions <span class="text-red-500">*</span>
        </label>
        <textarea name="comments" rows="3"
                  class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm md:text-base
                         focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                  placeholder="Write your feedback here..."></textarea>
    </div>

    <!-- Buttons -->
    <div class="mt-8 flex justify-end gap-3">
        <a href="{{ url()->previous() }}"
           class="px-5 py-3.5 border border-gray-300 rounded-md text-sm md:text-base text-gray-700
                  hover:bg-gray-100 transition">
            Back
        </a>

        <button type="submit"
                class="px-6 py-2.5 bg-blue-600 text-white rounded-md text-sm md:text-base font-semibold
                       hover:bg-blue-700 active:scale-95 transition">
            Submit Feedback
        </button>
    </div>

</form>


@endsection