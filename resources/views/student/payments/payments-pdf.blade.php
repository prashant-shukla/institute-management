<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment History</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2 { margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 6px 8px; text-align: left; }
        th { background: #f3f3f3; }
        .summary { margin-bottom: 15px; }
        .summary div { margin-bottom: 3px; }
    </style>
</head>
<body>

    <h2>Payment History</h2>

    <div class="summary">
        {{-- 👇 yahan student ka name --}}
<div>
    <strong>Student:</strong>
 {{ $fullName }}</div>

        <div><strong>Total Course Fee:</strong> ₹{{ number_format($totalFee, 2) }}</div>
        <div><strong>Total Paid:</strong> ₹{{ number_format($totalPaid, 2) }}</div>
        <div><strong>Pending Amount:</strong> ₹{{ number_format($balance, 2) }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Amount</th>
                <th>Mode</th>
                <th>Received</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
                <tr>
                    <td>{{ optional($payment->created_at)->format('Y-m-d') }}</td>
                    <td>₹{{ number_format($payment->fee_amount, 2) }}</td>
                    <td>{{ $payment->payment_mode ?? '-' }}</td>
                    <td>{{ $payment->received_on ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No payments recorded yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
