<!DOCTYPE html>
<html>
<head>
    <title>Fee Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .receipt-box {
            max-width: 600px;
            margin: auto;
            border: 1px solid #eee;
            padding: 20px;
            font-size: 14px;
        }
        h2 { text-align: center; }
        .row { margin-bottom: 10px; }
        .label { font-weight: bold; }
        .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #777; }
        .print-btn { margin-bottom: 15px; text-align: right; }
    </style>
</head>
<body onload="window.print()">
    <div class="receipt-box">
        <div class="print-btn">
            <button onclick="window.print()">🖨 Print</button>
        </div>

        <h2>Fee Receipt</h2>

        <div class="row"><span class="label">Student:</span> {{ $fee->student->user->full_name ?? 'N/A' }}</div>
        <div class="row"><span class="label">Mobile:</span> {{ $fee->student->mobile_no ?? '' }}</div>
        <div class="row"><span class="label">Course:</span> {{ $fee->course->name ?? '' }}</div>
        <div class="row"><span class="label">Amount:</span> ₹{{ number_format($fee->fee_amount, 2) }}</div>
        <div class="row"><span class="label">Date:</span> {{ \Carbon\Carbon::parse($fee->received_on)->format('d M Y') }}</div>
        <div class="row"><span class="label">Payment Mode:</span> {{ ucfirst($fee->payment_mode) }}</div>
        <div class="row"><span class="label">Remark:</span> {{ $fee->remark }}</div>

        <div class="footer">
            Thank you for your payment!<br>
            Institute Management System
        </div>
    </div>
</body>
</html>
