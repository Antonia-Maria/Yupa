<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">


<body>
<div id="notifDiv"></div>

<?php $__env->startSection('content'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>

    <div class="row" align="left">
        <div class="col-md-12">
            <?php if(session('message')): ?>
                <div class="alert alert-success"><?php echo e(session ('message')); ?></div>
            <?php endif; ?>
            <div class="card"><br>
                <h3>Products
                    <a href="<?php echo e(url('admin/products/create')); ?>" class="btn btn-primary btn-sm text-white float-end" object.style.tabSize="16">Add Product</a>
                </h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($product->id); ?></td>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->price); ?></td>
                            <td>
                                <input type="checkbox" class="toggle-class" data-id="<?php echo e($product->id); ?>"
                                       data-toggle="toggle" data-style="slow"
                                       data-on="Active"
                                       data-off="Inactive" <?php echo e($product->status == true ? 'checked' : ''); ?>></td>
                            <td>
                                <a href="<?php echo e(url('admin/products/'.$product->id.'/edit')); ?>"
                                   class="btn btn-success">Edit</a>
                                <a href="<?php echo e(url('admin/products/'.$product->id.'/delete')); ?>"
                                   onclick="return confirm('Confirm')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7">No Products Available</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(function () {
            $('#toggle-two').bootstrapToggle({
                on: 'Enabled',
                off: 'Disabled'
            });
        })
    </script>

    <script>
        $('.toggle-class').on('change', function () {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var product_id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: 'http://Yupaproduct.test/admin/changeStatus',
                data: {
                    'status': status,
                    'product_id': product_id
                },
                success: function (data) {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'green');
                    $('#notifDiv').text('Status Updated Successfully');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                }
            });
        });
    </script>
</body>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\YupaProduct\resources\views/admin/products/index.blade.php ENDPATH**/ ?>
