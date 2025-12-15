<?php $__env->startSection('title', 'Student List'); ?>
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
            <div class="card-header bg-light text-center">
                <h3>Student Dashboard</h3>
            </div>
            <?php if(auth()->user()->role == 'Admin'): ?>
                <form action="<?php echo e(route('student_import')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row p-2">
                        <div class="col-8">
                            <label for="import" class="form-label">Student Import: </label>
                            <input type="file" name="import" id="import" class="form-control">
                            <?php $__errorArgs = ['import'];
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
                        <div class="col-2 text-center mt-4">
                            <button class="btn btn-success">Import</button>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
            <div class="card-body">
                <table class="table table-bordered table-stripped">
                    <thead class="table-dark">
                        <tr>
                            <th>S.NO</th>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>DOB</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($student->student_id); ?></td>
                                <td><?php echo e($student->full_name); ?></td>
                                <td><?php echo e($student->sclclass->name); ?></td>
                                <td><?php echo e($student->section->name); ?></td>
                                <td><?php echo e(date_format(date_create($student->date_of_birth), 'd-M-Y')); ?></td>
                                <td><?php echo e($student->address); ?></td>
                                <td class="d-flex gap-2">
                                    <form action="<?php echo e(route('student_pdf')); ?>" method="get">
                                        <input type="hidden" name="student_id" value="<?php echo e($student->id); ?>">
                                        <button class="btn btn-info">Summary</button>
                                    </form>
                                    <?php if(auth()->user()->role == 'Admin'): ?>
                                        <a href="<?php echo e(route('student.edit',$student->id)); ?>" class="btn btn-warning">Edit</a>
                                        <form action="<?php echo e(route('student.destroy',$student->id)); ?>" method="POST" onsubmit="return confirm('Are You Sure?')">
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

<?php echo $__env->make('Layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\SchoolManagement\resources\views/student/list.blade.php ENDPATH**/ ?>