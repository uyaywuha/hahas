<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Product Detail')); ?></div>

                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <div class="">
                                <img src="<?php echo e(url('storage/' . $product->image)); ?>" alt="" width="200px">
                            </div>
                            <div class="">
                                <h1><?php echo e($product->name); ?></h1>
                                <h6><?php echo e($product->description); ?></h6>
                                <h3>Rp<?php echo e($product->price); ?></h3>
                                <hr>
                                <p><?php echo e($product->stock); ?> left</p>
                                <?php if(!Auth::user()->is_admin): ?>
                                    <form action="<?php echo e(route('add_to_cart', $product)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" aria-describedby="basic-addon2"
                                                name="amount" value=1>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Add to
                                                    cart</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php else: ?>
                                    <form action="<?php echo e(route('edit_product', $product)); ?>" method="get">
                                        <button type="submit" class="btn btn-primary">Edit product</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if($errors->any()): ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\faralldycommerce\resources\views/show_product.blade.php ENDPATH**/ ?>