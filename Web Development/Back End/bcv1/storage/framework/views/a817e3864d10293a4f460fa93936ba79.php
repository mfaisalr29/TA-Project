<?php $__env->startSection('container'); ?>
    <h2><?php echo e($title); ?></h2>
    <h3><?php echo e($name); ?></h3>
    <p><?php echo e($email); ?></p>
    <img src="img/<?php echo e($image); ?>" alt="Fharist" width="200">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\muham\Documents\GitHub\TA-Project\Web Development\Back End\bcv1\resources\views/about.blade.php ENDPATH**/ ?>