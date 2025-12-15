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
        <p>Name : <b> <?php echo e($student->full_name); ?> </b> </p>
        <p>Class : <b> <?php echo e($student->sclclass->name); ?> </b> - <b><?php echo e($student->section->name); ?></b> </p>
        <h3>Results </h3>
        <table>
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Total</th>
                    <th>Grade</th>
                </tr>
            </thead>
                <?php $__currentLoopData = $marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($mark->subject->name); ?></td>
                        <td><?php echo e($mark->marks_obtained); ?></td>
                        <td><?php echo e($mark->grade); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th>Total Marks</th>
                    <td colspan="2"><?php echo e($marks->sum('marks_obtained')); ?></td>
                </tr>
                <tr>
                    <th>Percentage</th>
                    <td colspan="2"><?php echo e($percentage); ?>%</td>
                </tr>
        </table>
    </div>
</body>
</html>
<?php /**PATH F:\Test\SchoolManagement\resources\views/student/student_pdf.blade.php ENDPATH**/ ?>