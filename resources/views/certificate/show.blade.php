<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Certificate</title>

    <script src="https://cdn.tailwindcss.com/3.4.1"></script>

    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* ===== Certificate Wrapper ===== */
        .certificate-wrapper {
            position: relative;
            width: 100%;
            max-width: 1000px;
            aspect-ratio: 16 / 12;
            /* Maintain certificate ratio */
            background: url('{{ asset('images/CERTICIATE-CADADDA.jpeg') }}') center center no-repeat;

            background-size: contain;
            background-color: #fff;
        }

        /* ===== Center Content ===== */
        .content {
            position: absolute;
            top: 48%;
            left: 80.5%;
            transform: translate(-50%, -50%);
            text-align: left;
            width: 100%;
        }

        .student-name {
            position: absolute;
            top: -17%;
            left:11.5%;
            color: #444;
        }

        .course-name {
            color: #444;
            margin-top: 1.3vw;
        }


        /* ===== Bottom Details ===== */
        .details {
            width: 100%;
            display: flex;
            justify-content: center;
            color: #444;
        }
       .details1 {
            position: absolute;
            bottom: 16%;
            left: 36%;
            width: 100%;
            color: #444;
        }
       .details2 {
            position: absolute;
            bottom: 16%;
            left: 54%;
            width: 100%;
            color: #444;
        }
        /* ===== Mobile Fix ===== */
        @media (min-width: 300px) and (max-width: 768px) {

            .certificate-wrapper {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="certificate-wrapper">

        <div class="content">
            <div class="student-name font-bold ">
                {{ $studentName ?? 'Student Name' }}
            </div>

            <div class="course-name font-bold">
                {{ $course->name ?? 'Course Name' }}
            </div>

            <div class="course-name font-bold">
                @foreach($tools as $tool)
                {{ $tool }}@if(!$loop->last), @endif
                @endforeach
            </div>
        </div>
        <div class="qr">
            <div class="absolute bottom-40 left-20">
                {!! QrCode::size(80)
                ->backgroundColor(255,255,255)
                ->color(0,0,0)
                ->generate(route('student.verify', urlencode($student->reg_no))) !!}
            </div>
        </div>
        <div class="details font-bold">
            <div class="details1">
                {{ $student->reg_no ?? '' }}
            </div>

            <div class="details2 font-bold">
                {{ \Carbon\Carbon::parse($certificate->issue_date)->format('d M, Y') }}
                /
                {{ $course->course_duration ?? '' }}
            </div>
        </div>

    </div>

</body>

</html>