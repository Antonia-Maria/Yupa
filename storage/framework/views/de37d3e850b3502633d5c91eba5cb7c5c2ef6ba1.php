<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <?php if(session('message') ): ?>
                            <label class="alert-success"><?php echo e(session('message')); ?></label>
                        <?php endif; ?>
                    </div><br>
                    <div> <span class="alert-info">This is Admin Panel</span></div>





















        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\YupaProduct\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
