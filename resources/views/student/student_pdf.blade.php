<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            font-family: sans-serif;

        }
        th,td,tr{
            border: 1px solid black;
            padding: 10px;
        }
        thead{
            background-color: rgb(26, 25, 25);
            color: white;
        }
        tr:nth-child(even){
            background-color: lightgrey;
        }
        table{
            border-collapse: collapse;
            margin-top: 20px;
            width: 100%;
            text-align: center;
        }
        h2{
            text-align: center;
        }
        .container{
            width: 100%;
        }
    </style>
    <title>PDF</title>
</head>
<body>
    <div class="container">
        <h2>Student Report Card</h2>
        <p>Name : <b> {{$student->full_name}} </b> </p>
        <p>Class : <b> {{$student->sclclass->name}} </b> - <b>{{$student->section->name}}</b> </p>
        <h3>Results </h3>
        <table>
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Total</th>
                    <th>Grade</th>
                </tr>
            </thead>
                @foreach ($marks as $mark )
                    <tr>
                        <td>{{$mark->subject->name}}</td>
                        <td>{{$mark->marks_obtained}}</td>
                        <td>{{$mark->grade}}</td>
                    </tr>
                @endforeach
                <tr>
                    <th>Total Marks</th>
                    <td colspan="2">{{$marks->sum('marks_obtained')}}</td>
                </tr>
                <tr>
                    <th>Percentage</th>
                    <td colspan="2">{{$percentage}}%</td>
                </tr>
        </table>
    </div>
</body>
</html>
