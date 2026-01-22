@extends('student.layout')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    {{-- Summary Card --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <div class="p-4 bg-gray-100 rounded-lg">
        <p>Total Amount</p>
        <p class="text-xl font-bold">₹{{ number_format($totalFee,2) }}</p>
    </div>

    <div class="p-4 bg-green-100 rounded-lg">
        <p>Paid</p>
        <p class="text-xl font-bold text-green-700">₹{{ number_format($totalPaid,2) }}</p>
    </div>

    <div class="p-4 bg-red-100 rounded-lg">
        <p>Balance</p>
        <p class="text-xl font-bold text-red-700">₹{{ number_format($balance,2) }}</p>
    </div>
</div>


    {{-- Payments Table --}}
 <h3 class="text-lg font-semibold mt-6 mb-3">📘 Course Payments</h3>

@if($coursePayments->isEmpty())
    <p class="text-gray-500">No course payments found.</p>
@else
<table class="w-full border rounded-lg overflow-hidden">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2 text-left">Date</th>
            <th class="p-2 text-left">Amount</th>
            <th class="p-2 text-left">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($coursePayments as $payment)
        <tr class="border-t">
            <td class="p-2">{{ $payment->created_at->format('d M Y') }}</td>
            <td class="p-2">₹{{ number_format($payment->fee_amount,2) }}</td>
            <td class="p-2 text-green-600">Paid</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

<h3 class="text-lg font-semibold mt-10 mb-3">📝 Exam Payments</h3>

@if($examPayments->isEmpty())
    <p class="text-gray-500">No exam payments found.</p>
@else
<table class="w-full border rounded-lg overflow-hidden">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2 text-left">Date</th>
            <th class="p-2 text-left">Exam</th>
            <th class="p-2 text-left">Amount</th>
            <th class="p-2 text-left">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($examPayments as $exam)
        <tr class="border-t">
            <td class="p-2">{{ $exam->created_at->format('d M Y') }}</td>
            <td class="p-2">{{ $exam->exam->name ?? 'N/A' }}</td>
            <td class="p-2">₹{{ number_format($exam->total_fee,2) }}</td>
            <td class="p-2 text-green-600">Paid</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif


</div>

@endsection