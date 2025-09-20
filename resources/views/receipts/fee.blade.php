<!DOCTYPE html>
<html>
<head>
    <title>Fee Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; color: #333; }
        .container { border: 1px solid #ddd; padding: 20px; }
        .header { display: flex; justify-content: space-between; align-items: flex-start; }
        .header-left { max-width: 60%; }
        .header-left h2 { margin: 0; color: #007BFF; }
        .header-left p { margin: 2px 0; font-size: 13px; }
        .header-right { text-align: right; font-size: 13px; }
        .header-right h3 { margin: 0; }
        .section { margin-top: 20px; }
        .section h4 { margin-bottom: 8px; border-bottom: 1px solid #ccc; padding-bottom: 3px; }
        .details { font-size: 14px; margin-bottom: 15px; }
        .details p { margin: 4px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; font-size: 13px; text-align: left; }
        th { background: #f8f8f8; }
        .summary { margin-top: 20px; text-align: right; font-size: 14px; }
        .summary p { margin: 5px 0; }
        .total { font-weight: bold; font-size: 15px; color: #007BFF; }
        .print-btn { text-align: right; margin-bottom: 10px; }
    </style>
</head>
<body onload="window.print()">

<div class="container">
    <div class="print-btn">
        <button onclick="window.print()">🖨 Print</button>
    </div>

    <div class="header">
        <div class="header-left">
            <h2>CADADDA</h2>
            <p>8, Behind Mahaveer Complex, C Road, SardarPura, Jodhpur, Raj.</p>
            <p>📞 +91-9261077888</p>
        </div>
        <div class="header-right">
            <h3>{{ $fee->receipt_no ?? '' }}</h3>
            <p>Date: {{ \Carbon\Carbon::parse($fee->received_on)->format('d/m/Y') }}</p>
            <p><b>Payment Details:</b></p>
            <p>Total Course Fee: ₹{{ number_format($fee->course->fee ?? 0, 2) }}</p>
            <p>Total Received Amount: ₹{{ number_format(($fee->fee_amount ?? 0), 2) }}</p>
            <p>Current Due Amount: ₹{{ number_format((($fee->course->fee ?? 0) - ($fee->fee_amount ?? 0)), 2) }}</p>
        </div>
    </div>

    <div class="section">
        <h4>Receipt To:</h4>
        <div class="details">
            <p><b>{{ $fee->student->user->firstname ?? '' }} {{ $fee->student->user->lastname ?? '' }}</b></p>
            <p>Father Name: {{ $fee->student->father_name ?? '' }}</p>
            <p>Reg. No.: {{ $fee->student->reg_no ?? '' }}</p>
            <p>Address: {{ $fee->student->correspondence_add ?? '' }}</p>
        </div>
    </div>

    <div class="section">
        <h4>Payment Description</h4>
        <table>
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Course Fee (Excl. GST)</th>
                    <th>GST Amount</th>
                    <th>Received Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $fee->course->name ?? '' }}<br>
                        <small style="color:#777">{{ $fee->course->short_description ?? '' }}</small>
                    </td>
                    <!-- Fee excluding GST -->
                    <td>₹{{ number_format(($fee->fee_amount ?? 0) - ($fee->gst_amount ?? 0), 2) }}</td>

                    <!-- GST -->
                    <td>₹{{ number_format($fee->gst_amount ?? 0, 2) }}</td>

                    <!-- Total received (fee + GST) -->
                    <td>₹{{ number_format($fee->fee_amount ?? 0, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="summary">
        <p>Course Fee (Excl. GST): ₹{{ number_format(($fee->fee_amount ?? 0) - ($fee->gst_amount ?? 0), 2) }}</p>
        <p>GST: ₹{{ number_format($fee->gst_amount ?? 0, 2) }}</p>
        <p>Total Received: <span class="total">₹{{ number_format($fee->fee_amount ?? 0, 2) }}</span></p>
    </div>
</div>

</body>
</html>
