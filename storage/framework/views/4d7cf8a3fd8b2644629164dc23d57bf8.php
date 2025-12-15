<?php $__env->startSection('title', 'Mark List'); ?>
<?php $__env->startSection('main'); ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-light text-center">
                <h3>Mark List</h3>
            </div>
            <?php if (isset($component)) { $__componentOriginal4d3653e433c7eed1e25fe717ae6058c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d3653e433c7eed1e25fe717ae6058c7 = $attributes; } ?>
<?php $component = App\View\Components\SessionComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('SessionComponent'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SessionComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d3653e433c7eed1e25fe717ae6058c7)): ?>
<?php $attributes = $__attributesOriginal4d3653e433c7eed1e25fe717ae6058c7; ?>
<?php unset($__attributesOriginal4d3653e433c7eed1e25fe717ae6058c7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d3653e433c7eed1e25fe717ae6058c7)): ?>
<?php $component = $__componentOriginal4d3653e433c7eed1e25fe717ae6058c7; ?>
<?php unset($__componentOriginal4d3653e433c7eed1e25fe717ae6058c7); ?>
<?php endif; ?>
            <div class="card-body">
                <table class="table table-bordered table-stripped">
                    <thead class="table-dark">
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Exam</th>
                            <th>Subject</th>
                            <th>Marks</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                                <td><?php echo e($mark->student->student_id); ?></td>
                                <td><?php echo e($mark->student->full_name); ?></td>
                                <td><?php echo e($mark->exam->exam_name); ?></td>
                                <td><?php echo e($mark->subject->name); ?></td>
                                <td><?php echo e($mark->marks_obtained); ?></td>
                                <td><?php echo e($mark->grade); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\Test\SchoolManagement\resources\views/mark/list.blade.php ENDPATH**/ ?>