<?php $__env->startSection('title', 'Teacher List'); ?>
<?php $__env->startSection('main'); ?>
    <?php if (isset($component)) { $__componentOriginala3f4a4039d8ff14a4bf76f67b4a444c0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3f4a4039d8ff14a4bf76f67b4a444c0 = $attributes; } ?>
<?php $component = App\View\Components\LogoutComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('LogoutComponent'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LogoutComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3f4a4039d8ff14a4bf76f67b4a444c0)): ?>
<?php $attributes = $__attributesOriginala3f4a4039d8ff14a4bf76f67b4a444c0; ?>
<?php unset($__attributesOriginala3f4a4039d8ff14a4bf76f67b4a444c0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3f4a4039d8ff14a4bf76f67b4a444c0)): ?>
<?php $component = $__componentOriginala3f4a4039d8ff14a4bf76f67b4a444c0; ?>
<?php unset($__componentOriginala3f4a4039d8ff14a4bf76f67b4a444c0); ?>
<?php endif; ?>
    <div class="container">
        <div class="card p-2">
            <div class="card-header bg-light text-center">
                <h3>Teacher's Dashboard</h3>
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
                            <th>S.NO</th>
                            <th>Teacher ID</th>
                            <th>Teacher Name</th>
                            <th>Subject</th>
                            <th>contact</th>
                            <th>Assigned Classes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($teacher->teacher_id); ?></td>
                                <td><?php echo e($teacher->full_name); ?></td>
                                <td><?php echo e($teacher->subject->name); ?></td>
                                <td><?php echo e($teacher->contact); ?></td>
                                <td><?php echo e($teacher->assigned_classes); ?></td>
                                <td class="d-flex gap-2">
                                    <form action="<?php echo e(route('teacher_report')); ?>" method="get">
                                        <input type="hidden" name="teacher_id" value="<?php echo e($teacher->id); ?>">
                                        <button class="btn btn-info">Report</button>
                                    </form>
                                    <?php if(auth()->user()->role == 'Admin'): ?>
                                        <a href="<?php echo e(route('student.edit',$teacher->id)); ?>" class="btn btn-warning">Edit</a>
                                        <form action="<?php echo e(route('student.destroy',$teacher->id)); ?>" method="POST" onsubmit="return confirm('Are You Sure?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\Test\SchoolManagement\resources\views/teacher/list.blade.php ENDPATH**/ ?>