<!DOCTYPE html>
<html dir="rtl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Courses Enrolled</title>
    </head>
    <body>
        <div style="padding: 16px;">
            <h1 style="margin-bottom: 32px;">لقد سجلت في الدورات التالية:</h1>
            @foreach ($tickets as $ticket)
                <div style="padding: 16px; background-color: #eee; margin-bottom: 32px; border: 1px solid #aaa;">
                    <h3><b>عنوان الدورة: </b>{{ $ticket->course->title }}</h3>
                    <p><b>مزود التدريب: </b>{{ $ticket->course->traiPro }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>