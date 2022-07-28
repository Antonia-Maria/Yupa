<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <?php if(session('message')): ?>
                <h5 class="alert alert-success"><?php echo e(session('message')); ?></h5>
            <?php endif; ?>
            <div class="card-header">
                <h3>Edit Product
                    <a href="<?php echo e(url('admin/products')); ?>"
                       class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
            <div class="card-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-warning">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div><?php echo e($error); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(url('admin/products/'.$product->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">
                                Details
                            </button>

                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home" role="tabpanel">
                        </div>
                        <div class="tab-pane fade border p-3 show active" id="image" role="tabpanel"
                             aria-labelledby="image-tab">
                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="name" value="<?php echo e($product->name); ?>" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Product Description</label>
                                <input type="text" name="description" value="<?php echo e($product->description); ?>"
                                       class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Product Price</label>
                                <input type="number" name="price" value="<?php echo e($product->price); ?>" class="form-control"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Replace Existing Image(Max 1 image)</label>
                            <input type="file" name="image[]" class="form-control"/>
                        </div>
                        <div>
                            <?php if($product->productImages): ?>
                                <div class="row">
                                    <?php $__currentLoopData = $product->productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-2">
                                            <img src="<?php echo e(asset($image->image)); ?>" style="width: 80px;height: 80px;"
                                                 class="me-4 border" alt="Img"/>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php else: ?>
                                <h5>No Image Added</h5>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="py-2 float-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\YupaProduct\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>
