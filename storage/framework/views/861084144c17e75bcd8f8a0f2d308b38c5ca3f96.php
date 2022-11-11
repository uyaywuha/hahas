<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Order Detail')); ?></div>

                    <?php
                        $total_price = 0;
                    ?>

                    <div class="card-body">
                        <h5 class="card-title">Order ID <?php echo e($order->id); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">By <?php echo e($order->user->name); ?></h6>

                        <?php if($order->is_paid == true): ?>
                            <p class="card-text">Paid</p>
                        <?php else: ?>
                            <p class="card-text">Unpaid</p>
                        <?php endif; ?>
                        <hr>
                        <?php $__currentLoopData = $order->transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><?php echo e($transaction->product->name); ?> - <?php echo e($transaction->amount); ?> pcs</p>
                            <?php
                                $total_price += $transaction->product->price * $transaction->amount;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <hr>
                        <p>Total: Rp<?php echo e($total_price); ?></p>
                        <hr>

                        <?php if($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin): ?>
                            <form action="<?php echo e(route('submit_payment_receipt', $order)); ?>" method="post"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label>Upload your payment receipt</label>
                                    <input type="file" name="payment_receipt" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit payment</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\faralldycommerce\resources\views/show_order.blade.php ENDPATH**/ ?>