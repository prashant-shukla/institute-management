<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('{{ asset('images/certificate_background.jpg') }}') no-repeat center center;
            background-size: cover;
            width: 100%;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            position: relative;
        }
        .content {
            position: absolute;
            top: 42%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 80%;
        }
        .student-name {
            font-size: 32px;
            font-weight: bold;
            color: #000;
            margin-bottom: 10px;
        }
        .course-name {
            font-size: 24px;
            color: #444;
            margin-bottom: 20px;
        }
        .details {
            position: absolute;
            bottom: 10%;
            left: 10%;
            right: 10%;
            display: flex;
            justify-content: space-between;
            font-size: 16px;
            color: #000;
        }
        .sign {
            text-align: center;
        }
        .sign img {
            height: 50px;
        }
    </style>
</head>
<body>

    <div class="content">
        <div class="student-name">{{ $student->name ?? 'Student Name' }}</div>
        <div class="course-name">{{ $course->name ?? 'Course Name' }}</div>
    </div>

    <div class="details">
        <div>
            <strong>Certificate No:</strong> {{ $certificate->id }}
        </div>
        <div>
            <strong>Date / Duration:</strong> {{ $course->duration ?? 'N/A' }}
        </div>
        <div class="sign">
            <img src="{{ asset('images/director_sign.png') }}" alt="Signature">
            <div>Bhupesh Kumar</div>
            <div>Managing Director</div>
        </div>
    </div>

</body>
</html>
