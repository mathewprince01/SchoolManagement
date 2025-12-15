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
        th{
            background-color: rgb(26, 25, 25);
            color: white;
        }

        table{
            border-collapse: collapse;
            margin-top: 30px;
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
       <h2>Teacher Performance Report</h2>
       <p>Name: <b><?php echo e($teacher->full_name); ?></b> </p>

       <h3>Summary:</h3>
       <table>
        <tr>
            <th>Subject</th>
            <th>Student Performance</th>
        </tr>
        <tr>
            <td><?php echo e($teacher->subject->name); ?></td>
            <td><?php echo e($average); ?></td>
        </tr>
       </table>
    </div>
</body>
</html>
<?php /**PATH F:\SchoolManagement\resources\views/teacher/performance_report.blade.php ENDPATH**/ ?>