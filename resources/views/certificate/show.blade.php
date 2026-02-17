<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>

    <script src="https://cdn.tailwindcss.com/3.4.1"></script>

    <style>
        body {
            margin: 0;
            padding: 20px;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* ===== Certificate Wrapper ===== */
        .certificate-wrapper {
            position: relative;
            width: 100%;
            max-width: 1000px;
            aspect-ratio: 16 / 12;   /* Maintain certificate ratio */
            background: url('{{ asset('images/CERTICIATE-CADADDA.jpeg') }}') center center no-repeat;
            background-size: contain;
            background-color: #fff;
        }

        /* ===== Center Content ===== */
        .content {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 100%;
        }

        .student-name {
            font-size: 1vw;
            color: #444;
            margin-bottom: 1vw;
        }

        .course-name {
            font-size: 1vw;
            color: #444;
            margin-top: 1vw;
        }

        /* ===== Bottom Details ===== */
        .details {
            position: absolute;
            bottom: 16%;
            left: 2%;
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 11%;
            font-size: 0.8vw;
            color: #444;
        }

        /* ===== Mobile Fix ===== */
@media (min-width: 300px) and (max-width: 768px) {

    .certificate-wrapper {
        max-width: 100%;
         font-size: 0.8vw;
    }

    .student-name {
         font-size: 0.8vw; 
   }

    .course-name {
        font-size: 0.8vw;
    }

    .details {
        font-size: 0.8vw;
    }
}

    </style>
</head>

<body>

    <div class="certificate-wrapper">

        <div class="content">
            <div class="student-name">
                {{ $studentName ?? 'Student Name' }}
            </div>

            <div class="course-name">
                {{ $course->name ?? 'Course Name' }}
            </div>

            <div class="course-name">
                @foreach($tools as $tool)
                    {{ $tool }}@if(!$loop->last), @endif
                @endforeach
            </div>
        </div>

        <div class="details">
            <div>
                {{ $student->reg_no ?? '' }}
            </div>

            <div>
                {{ \Carbon\Carbon::parse($certificate->issue_date)->format('d M, Y') }}
                /
                {{ $course->course_duration ?? '' }}
            </div>
        </div>

    </div>

</body>
</html>
