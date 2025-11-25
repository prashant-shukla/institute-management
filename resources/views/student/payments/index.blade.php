@extends('student.layout')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    {{-- Summary Card --}}
    <div class="bg-white shadow-md rounded-xl p-6">
        <h2 class="text-2xl font-semibold mb-4">💳 Payment Summary</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
            <div class="p-3 rounded-lg bg-gray-50">
                <p class="text-gray-500">Total Course Fee</p>
                <p class="text-xl font-bold">₹{{ number_format($totalFee, 2) }}</p>
            </div>

            <div class="p-3 rounded-lg bg-green-50">
                <p class="text-gray-500">Total Paid</p>
                <p class="text-xl font-bold text-green-700">₹{{ number_format($totalPaid, 2) }}</p>
            </div>

            <div class="p-3 rounded-lg bg-red-50">
                <p class="text-gray-500">Pending Amount</p>
                <p class="text-xl font-bold text-red-700">₹{{ number_format($balance, 2) }}</p>
            </div>
        </div>
    </div>

    {{-- Payments Table --}}
    <div class="bg-white shadow-md rounded-xl p-6">
        <h3 class="text-xl font-semibold mb-4">Payment History</h3>

        @if($payments->isEmpty())
        <p class="text-gray-500 text-sm">No payments recorded yet.</p>
        @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b bg-gray-100">
                        <th class="text-left px-3 py-2">Date</th>
                        <th class="text-left px-3 py-2">Amount</th>
                        <th class="text-left px-3 py-2">Mode</th>
                        <th class="text-left px-3 py-2">Received</th>
                        <th class="text-left px-3 py-2">Receipt</th> {{-- 🔹 New column --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-3 py-2">
                            {{ optional($payment->created_at)->format('Y-m-d') }}
                        </td>
                        <td class="px-3 py-2 font-medium">
                            ₹{{ number_format($payment->fee_amount, 2) }}
                        </td>
                        <td class="px-3 py-2">
                            {{ $payment->payment_mode ?? '-' }}
                        </td>
                        <td class="px-3 py-2">
                            {{ $payment->received_on ?? '-' }}
                        </td>

                        {{-- 🔹 Download Receipt Button --}}
<td class="px-3 py-2">
    <a href="{{ route('student.payments.download') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700">
            ⬇ Download
        </a>
</td>



                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>


</div>

@endsection