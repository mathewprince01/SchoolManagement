<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card mt-5 w-50">
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
                <div class="card-header text-center">
                    <h2>LOGIN</h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('login')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="col-8 mb-3">
                            <label for="email" class="form-label"> Email: </label>
                            <input type="text" name="email" id="eamil" class="form-control" value="<?php echo e(old('email')); ?>">
                            <?php $__errorArgs = ['email'];
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
                        <div class="col-8 mb-4">
                            <label for="password" class="form-label">Password: </label>
                            <input type="password" name="password" id="password" value="<?php echo e(old('password')); ?>" class="form-control">
                            <?php $__errorArgs = ['password'];
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
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH F:\SchoolManagement\resources\views/auth/login.blade.php ENDPATH**/ ?>