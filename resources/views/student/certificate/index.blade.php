@extends('student.layout')

@section('page_title', 'Certificate')

@section('content')

<div class="max-w-2xl mx-auto">

    {{-- 🎓 Certificate Section --}}
    <div class="bg-white shadow-md rounded-xl p-6 mt-8">
        <h2 class="text-xl font-semibold mb-3">🎓 Certificate Status</h2>

        @if($student->certificate_assigned == 1)

            <p class="text-gray-600 mb-4">
                Congratulations! Your certificate has been issued.
            </p>

            <a href="{{ route('student.certificate.download') }}"
               class="inline-block px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                ⬇ Download Certificate
            </a>

        @else

            <p class="text-gray-600">
                Your certificate is not issued yet.<br>
                Please contact the institute or wait for admin approval.
            </p>

        @endif
    </div>

</div>

@endsection
