@extends('student.layout')

@section('page_title', 'Dashboard')

@section('content')
<div class="space-y-6">

    @foreach ($courses as $course)
        {{-- Course Card --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold">{{ $course->title ?? $course->name }}</h2>
            <p class="text-gray-500 mt-1">{{ $course->category ?? '' }}</p>

            <div class="mt-4">
                <p class="font-medium">
                    Ends on:
                    <span class="text-red-500">
                        {{ $course->end_date ? \Carbon\Carbon::parse($course->end_date)->format('Y/m/d') : 'N/A' }}
                    </span>
                </p>
            </div>

            <p class="mt-4 text-gray-700">{!! $course->description ?? '' !!}</p>
        </div>

        {{-- Content Summary --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="font-semibold text-lg">Content Summary</h3>

            <div class="flex justify-between mt-3 text-sm">
                <p>{{ $course->files_count ?? 0 }} file(s)</p>
                <p>
                    Remove Course:
                    <strong>
                        {{ $course->end_date ? \Carbon\Carbon::parse($course->end_date)->format('Y/m/d') : 'N/A' }}
                    </strong>
                </p>
            </div>
        </div>

        {{-- Payment Summary --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="font-semibold text-lg">Payment Summary</h3>

            <div class="mt-3 space-y-2 text-sm">
                <p>Course Fee (Base):
                    <strong>₹{{ number_format($courseFee, 2) }}</strong>
                </p>

                <p>Total Fee (with GST):
                    <strong>₹{{ number_format($totalFee, 2) }}</strong>
                </p>

                <p>Total Paid:
                    <strong>₹{{ number_format($totalPaid, 2) }}</strong>
                </p>

                <p>Balance Due:
                    <strong>₹{{ number_format($balance, 2) }}</strong>
                </p>

                <p>Last Payment Date:
                    <strong>{{ $lastPaymentDate ?? 'N/A' }}</strong>
                </p>
            </div>

            <div class="mt-4 flex space-x-3">
                @if(isset($course->id))
                    <a class="px-4 py-2 bg-gray-200 rounded">
                        Download Receipt
                    </a>

                    <a class="px-4 py-2 bg-gray-200 rounded">
                        Platform Fee Invoice
                    </a>
                @endif
            </div>
        </div>
    @endforeach

</div>
@endsection
