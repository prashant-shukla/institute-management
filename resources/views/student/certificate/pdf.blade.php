<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .page {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .bg-image {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: auto;
        }

        /* Approx positions – tum baad me adjust kar sakte ho */
        .student-name {
            position: absolute;
            top: 310px;      /* yahan se vertical position control karo */
            left: 450px;     /* yahan se horizontal position */
            font-size: 20px;
            font-weight: bold;
            color: #000;
        }

        .course-name {
            position: absolute;
            top: 355px;
            left: 370px;
            font-size: 18px;
            color: #000;
        }
        

        .tools {
            position: absolute;
            top: 415px;
            left: 350px;
            font-size: 14px;
            color: #000;
            max-width: 500px;
        }

        .cert-no {
            position: absolute;
            bottom: 115px;
            left: 400px;
            font-size: 14px;
            color: #000;
        }

        .issue-date {
            position: absolute;
            bottom: 115px;
            left: 620px;
            font-size: 14px;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="page">
        {{-- Background image --}}
        <img src="{{ public_path('images/certificate_background.jpg') }}" class="bg-image" alt="Certificate">

        {{-- Student name --}}
        <div class="student-name">
            {{ $studentName ?? 'Student Name' }}
        </div>

        {{-- Course name --}}
        <div class="course-name">
            {{ $course->name ?? 'Course Name' }}
        </div>

        {{-- Tools list --}}
        @if(!empty($tools) && count($tools))
            <div class="tools">
                @foreach($tools as $tool)
                    {{ $tool }}@if(!$loop->last), @endif
                @endforeach
            </div>
        @endif

        {{-- Certificate number --}}
        @if(!empty($certificate?->certificate_no))
            <div class="cert-no">
                {{ $certificate->certificate_no }}
            </div>
        @endif

        {{-- Issue date + duration --}}
        @php
            $issueDate = null;
            if (!empty($certificate?->issue_date)) {
                try {
                    $issueDate = \Carbon\Carbon::parse($certificate->issue_date)->format('d M, Y');
                } catch (\Exception $e) {
                    $issueDate = null;
                }
            }
        @endphp

        <div class="issue-date">
            @if($issueDate)
                {{ $issueDate }}
            @endif

            @if(!empty($course->course_duration))
                @if($issueDate) / @endif
                {{ $course->course_duration }}
            @endif
        </div>
    </div>
</body>
</html>
