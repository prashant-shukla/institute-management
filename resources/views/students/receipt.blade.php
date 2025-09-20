<!DOCTYPE html>
<html>
<head>
    <title>Student Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; color: #333; }
        .header { display: flex; justify-content: space-between; align-items: center; }
        .header h2 { margin: 0; color: green; }
        .section { margin-top: 20px; }
        .section h3 { margin-bottom: 8px; font-size: 14px; border-bottom: 1px solid #ccc; }
        .grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 6px; font-size: 13px; }
        th { background: #f8f8f8; }
        .photo { width: 100px; height: 120px; border: 1px solid #ccc; text-align: center; }
    </style>
</head>
<body onload="window.print()">

    <div class="header">
        <h2>Student Receipt</h2>
        <span>{{ now()->format('d/m/Y') }}</span>
    </div>

    <div class="section">
        <h3>Student Details</h3>
        <div class="grid">
            <div><b>Name:</b> {{ $student->user->firstname }} {{ $student->user->lastname }}</div>
            <div><b>Reg No:</b> {{ $student->reg_no }}</div>
            <div><b>Father:</b> {{ $student->father_name }}</div>
            <div><b>DOB:</b> {{ $student->date_of_birth }}</div>
            <div><b>Mobile:</b> {{ $student->mobile_no }}</div>
            <div><b>Email:</b> {{ $student->user->email }}</div>
        </div>
    </div>

    <div class="section">
        <h3>Course Details</h3>
        <div class="grid">
            <div><b>Course:</b> {{ $student->course->name ?? '' }}</div>
            <div><b>Course Fee:</b> ₹ {{ number_format($student->course_fee, 2) }}</div>
            <div><b>Total Received:</b> ₹ {{ $student->feeReceipts->sum('fee_amount') }}</div>
            <div><b>Total Due:</b> ₹ {{ $student->course_fee - $student->feeReceipts->sum('fee_amount') }}</div>
        </div>
    </div>

    <div class="section">
        <h3>Fee’s History</h3>
        <table>
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student->feeReceipts as $receipt)
                    <tr>
                        <td>₹ {{ number_format($receipt->fee_amount, 2) }}</td>
                        <td>{{ $receipt->received_on }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
