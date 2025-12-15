<?php $__env->startSection('title', 'Timetable'); ?>
<?php $__env->startSection('main'); ?>
    <div class="container ">
        <div class="card my-5">
            <div class="card-header text-center">
                <h3>Time Table</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('timetable_store')); ?>" method="post" class="w-50">
                    <?php echo csrf_field(); ?>
                    <?php
                        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday','Saturday'];
                    ?>
                    <div class="mb-3">
                        <label for="day" class="form_label">Day: </label>
                        <select name="day" id="day" class="form-select">
                            <option value="">--Select Day--</option>
                            <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($day); ?>" <?php if(old('day') == $day): echo 'selected'; endif; ?>><?php echo e($day); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['day'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="period" class="form_label"> Period: </label>
                        <input type="number" name="period" id="period" id="period" value="<?php echo e(old('period')); ?>" class="form-control">
                        <?php $__errorArgs = ['period'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="subject_id" class="form_label">Subject: </label>
                        <select name="subject_id" id="subject_id" class="form-select">
                            <option value="">--Select Subject--</option>
                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>" <?php if(old('subject_id') == $subject): echo 'selected'; endif; ?>><?php echo e($subject); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['subject_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4">
                        <label for="teacher" class="form_label">Teacher: </label>
                        <select name="teacher" id="teacher" class="form-select">
                            <option value="">--Select Teacher--</option>
                        </select>
                        <?php $__errorArgs = ['teacher'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function(){
            $(document).on('change', '#subject_id', function(){
                let teacher = "<?php echo e(old('teacher')); ?>";
                let subject_id = $(this).val();
                $.ajax({
                    url : "<?php echo e(route('getteacher')); ?>",
                    method : "GET",
                    data : {teacher, subject_id},
                    success : function(data){
                        $('#teacher').html(data)
                    }
                })
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\Test\SchoolManagement\resources\views/timetable/create.blade.php ENDPATH**/ ?>