<header>
    <nav class="navbar bg-danger p-2">
        <h2 class="navbar-brand text-bg-danger ps-1">School Management System</h2>
        <ul class="nav p-3">
            <li class="nav-item">
                <a href="<?php echo e(route('student.index')); ?>" class="nav-link text-white">Students</a>
            </li>
            <?php if(auth()->user()->role == 'Student' || auth()->user()->role == 'Admin'): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('student.create')); ?>" class="nav-link text-white">Student register</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('marks_list')); ?>" class="nav-link text-white">Result</a>
                </li>
            <?php endif; ?>
            <?php if(auth()->user()->role == 'Teacher' || auth()->user()->role == 'Admin'): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('teacher.index')); ?>" class="nav-link text-white">Teachers</a>
                </li>
            <?php endif; ?>
            <?php if(auth()->user()->role == 'Teacher'): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('marks_create')); ?>" class="nav-link text-white">Mark Entry</a>
                </li>
            <?php endif; ?>
            <?php if(auth()->user()->role == 'Teacher' || auth()->user()->role == 'Student'): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('timetable_index')); ?>" class="nav-link text-white">Time Table</a>
                </li>
            <?php endif; ?>
            <?php if(auth()->user()->role == 'Admin'): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('teacher.create')); ?>" class="nav-link text-white">Teachers Entry</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('timetable_create')); ?>" class="nav-link text-white">Time Table</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('mark_summary')); ?>" class="nav-link text-white">Mark Summary</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('top_performer')); ?>" class="nav-link text-white">Top Performer</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<?php /**PATH F:\SchoolManagement\resources\views/Layout/navabar.blade.php ENDPATH**/ ?>