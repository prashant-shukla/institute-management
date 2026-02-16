<!DOCTYPE html>
<html lang="en">
 <script src="https://cdn.tailwindcss.com/3.4.1"></script>
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('{{ asset('images/certificate_background.jpg') }}') center center no-repeat fixed;
            background-size: contain;
            /* Ensures the whole image is visible */
            background-color: #fff;
            /* Adds white space if image doesn't cover fully */
            width: 100vw;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .content {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 80%;
        }

        .student-name {
            font-size: 24px;
            font-weight: bold;
            color: #000;
           margin-bottom: 20px;
            
        }

        .course-name {
            font-size: 24px;
            color: #444;
          margin-top: 20px;
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
        .details1{
            position: absolute;
               left: 36%;
               top:-60px;
        }
 .details2{
            position: absolute;
               right: 36%;
               top:-60px;
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
        <div class="student-name mt-6">{{ $studentName ?? 'Student Name' }}</div>
        <div class="course-name  ">{{ $course->name ?? 'Course Name' }}</div>
                <div class="course-name  "> @foreach($tools as $tool)
             {{ $tool }},
            @endforeach</div>

    </div>
    
    <div class="details">
        <div class="details1">
            {{ $certificate->certificate_no }}
        </div>
            <div class="details2">
                  {{ \Carbon\Carbon::parse($certificate->issue_date)->format('d M, Y') }} /
            {{ $course->course_duration }}
        </div>
        
    </div>

</body>

</html>
