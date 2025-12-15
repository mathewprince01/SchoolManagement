<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<?php if(session('alert')): ?>
    <div class="alert alert-danger"><?php echo e(session('alert')); ?></div>
<?php endif; ?>
<?php /**PATH F:\Test\SchoolManagement\resources\views/components/session-component.blade.php ENDPATH**/ ?>