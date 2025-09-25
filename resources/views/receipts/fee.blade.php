<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CADADDA Fee Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            color: #333;
        }

        .container {
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 700px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .header-left h2 {
            margin: 0;
            color: #007BFF;
        }

        .header-left p {
            margin: 2px 0;
            font-size: 13px;
        }

        .header-right {
            text-align: right;
            font-size: 13px;
        }

        .header-right h3 {
            margin: 0;
        }

        .section {
            margin-top: 20px;
        }

        .section h4 {
            margin-bottom: 8px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 3px;
        }

        .details p {
            margin: 4px 0;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 14px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f8f8f8;
        }

        .summary {
            margin-top: 20px;
            text-align: right;
            font-size: 14px;
        }

        .summary p {
            margin: 5px 0;
        }

        .total {
            font-weight: bold;
            color: #007BFF;
            font-size: 15px;
        }

        .print-btn {
            text-align: right;
            margin-bottom: 10px;
        }
    </style>
</head>

<body onload="window.print()">

@php
    $courseFee      = $fee->student->course_fee ?? 0;
    $gstAmount      = $fee->student->gst_amount ?? 0;
    $totalFee       = $fee->student->total_fee ?? 0;
    $receivedAmount = $fee->fee_amount ?? 0;
    $dueAmount      = $totalFee - $receivedAmount;
    $cgst           = $gstAmount > 0 ? $gstAmount / 2 : 0;
    $sgst           = $gstAmount > 0 ? $gstAmount / 2 : 0;
@endphp

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
            <h3>Receipt No: {{ $fee->receipt_no ?? '' }}</h3>
            <p>Date: {{ \Carbon\Carbon::parse($fee->received_on)->format('d/m/Y') }}</p>
                @if($gstAmount > 0)
                    <p>GST No: 08DAZPK3683R1ZB</p>
                @endif
        </div>
    </div>

    <div class="section">
        <h4>Receipt To:</h4>
        <div class="details">
            <p>
                <b>
                    {{ $fee->student->user->firstname ?? '' }} {{ $fee->student->user->lastname ?? '' }}
                    @if(isset($fee->student->is_online) && $fee->student->is_online == 0)
                        (Offline)
                    @endif
                </b>
            </p>
            
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
                    <th>Course Name</th>
                    <th>Course Fee (Excl. GST)</th>
                    @if($gstAmount > 0)
                        <th>CGST (9%)</th>
                        <th>SGST (9%)</th>
                    @endif
                    <th>Total GST</th>
                    <th>Total Fee (Incl. GST)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $fee->student->course->name ?? '' }}<br>
                        <small style="color:#777">{{ $fee->student->course->short_description ?? '' }}</small>
                    </td>
                    <td>₹{{ number_format($courseFee, 2) }}</td>
                    @if($gstAmount > 0)
                        <td>₹{{ number_format($cgst, 2) }}</td>
                        <td>₹{{ number_format($sgst, 2) }}</td>
                    @endif
                    <td>₹{{ number_format($gstAmount, 2) }}</td>
                    <td>₹{{ number_format($totalFee, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="summary">
        <p>Base Amount: ₹{{ number_format($courseFee, 2) }}</p>
        @if($gstAmount > 0)
            <p>CGST (9%): ₹{{ number_format($cgst, 2) }}</p>
            <p>SGST (9%): ₹{{ number_format($sgst, 2) }}</p>
            <p>Total GST (18%): ₹{{ number_format($gstAmount, 2) }}</p>
        @else
            <p>GST: ₹0.00</p>
        @endif
        <p class="total">Total Fee (Incl. GST): ₹{{ number_format($totalFee, 2) }}</p>
        <p class="total">Total Received: ₹{{ number_format($receivedAmount, 2) }}</p>
        <p class="total">Current Due: ₹{{ number_format($dueAmount, 2) }}</p>
    </div>
</div>

</body>
</html>
