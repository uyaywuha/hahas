<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Cart')); ?></div>

                    <div class="card-body ">
                        <?php if($errors->any()): ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <?php
                            $total_price = 0;
                        ?>

                        <div class="card-group m-auto">
                            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card m-3" style="width: 14rem;">
                                    <img class="card-img-top" src="<?php echo e(url('storage/' . $cart->product->image)); ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($cart->product->name); ?></h5>
                                        <form action="<?php echo e(route('update_cart', $cart)); ?>" method="post">
                                            <?php echo method_field('patch'); ?>
                                            <?php echo csrf_field(); ?>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" aria-describedby="basic-addon2"
                                                    name="amount" value=<?php echo e($cart->amount); ?>>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">Update
                                                        amount</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="<?php echo e(route('delete_cart', $cart)); ?>" method="post">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                    $total_price += $cart->product->price * $cart->amount;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="d-flex flex-column justify-content-end align-items-end">
                            <p>Total: Rp<?php echo e($total_price); ?></p>
                            <form action="<?php echo e(route('checkout')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-primary"
                                    <?php if($carts->isEmpty()): ?> disabled <?php endif; ?>>Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\faralldycommerce\resources\views/show_cart.blade.php ENDPATH**/ ?>