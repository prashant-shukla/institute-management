@php
    $student = $record->student;
    $course  = $record->course;
    $user    = $student?->user;

    $totalFee   = $student->total_fee ?? 0;
    $courseFee  = $student->course_fee ?? 0;
    $gstAmount  = $student->gst_amount ?? 0;
    $discount   = $student->discount_amount ?? 0;

    $totalPaid = \App\Models\StudentFees::where('student_id', $record->student_id)
        ->where('course_id', $record->course_id)
        ->sum('fee_amount');

    $dueAmount = max($totalFee - $totalPaid, 0);

    $allPayments = \App\Models\StudentFees::where('student_id', $record->student_id)
        ->where('course_id', $record->course_id)
        ->orderBy('received_on', 'asc')
        ->get();
@endphp

<div class="space-y-6 text-sm">

    {{-- Basic Info --}}
    <div>
        <strong>Receipt No:</strong> {{ $record->receipt_no ?? '-' }} <br>
        <strong>Date:</strong> {{ \Carbon\Carbon::parse($record->received_on)->format('d/m/Y') }}
    </div>

    {{-- Receipt To --}}
    <div class="border-t pt-3">
        <h4 class="font-bold mb-2">Receipt To</h4>
        <p><strong>{{ $user?->firstname }} {{ $user?->lastname }}</strong></p>
        <p>Father Name: {{ $student->father_name ?? '-' }}</p>
        <p>Reg No: {{ $student->reg_no ?? '-' }}</p>
        <p>Address: {{ $student->correspondence_add ?? '-' }}</p>
    </div>

    {{-- Payment Description --}}
    <div class="border-t pt-3">
        <h4 class="font-bold mb-2">Payment Description</h4>

        <table class="w-full border text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">Course</th>
                    <th class="border p-2">Course Fee</th>
                    <th class="border p-2">GST</th>
                    <th class="border p-2">Total Fee</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border p-2">{{ $course->name ?? '-' }}</td>
                    <td class="border p-2">₹{{ number_format($courseFee, 2) }}</td>
                    <td class="border p-2">₹{{ number_format($gstAmount, 2) }}</td>
                    <td class="border p-2">₹{{ number_format($totalFee, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Payment History --}}
    <div class="border-t pt-3">
        <h4 class="font-bold mb-2">Payment History</h4>

        <table class="w-full border text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">Date</th>
                    <th class="border p-2">Receipt</th>
                    <th class="border p-2">Mode</th>
                    <th class="border p-2">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allPayments as $payment)
                    <tr>
                        <td class="border p-2">
                            {{ \Carbon\Carbon::parse($payment->received_on)->format('d/m/Y') }}
                        </td>
                        <td class="border p-2">{{ $payment->receipt_no }}</td>
                        <td class="border p-2">{{ ucfirst($payment->payment_mode) }}</td>
                        <td class="border p-2">₹{{ number_format($payment->fee_amount, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Summary --}}
    <div class="border-t pt-3 text-right">
        <p>Total Fee: ₹{{ number_format($totalFee, 2) }}</p>
        <p>Total Paid: ₹{{ number_format($totalPaid, 2) }}</p>
        <p class="font-bold text-red-600">Current Due: ₹{{ number_format($dueAmount, 2) }}</p>
    </div>

    <!-- {{-- Print Button --}}
    <div class="pt-4 text-right">
        <a 
            href="{{ route('fees.print', $record->id) }}" 
            target="_blank"
            class="px-4 py-2 bg-primary-600 text-white rounded-lg"
        >
            🖨 Print Receipt
        </a>
    </div> -->

</div>