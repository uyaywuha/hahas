    

    <?php $__env->startSection('content'); ?>
    <div id="carouselExampleIndicators" class="carousel slide w-100 mx-auto" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="slide/aws.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>SHOPPING</h2> 
               
              </div>
          </div>
          <div class="carousel-item">
            <img src="slide/hehe.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>BUY NOW!</h2>
               
              </div>
          </div>
          <div class="carousel-item" style="">
            <img src="slide/32.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>SHOES</h2>
                
              </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    
    </div>
        <div class="container">
            <h2 class="text-center"><?php echo e(__('Products')); ?></h2>
            <div class="row row-cols-1 row-cols-md-3 justify-content-center">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card shadow-lg m-3 p-3 mb-5  " style="width:18rem">
                                    <img class="card-img-tops" style="height: 250px" src="<?php echo e(url('storage/' . $product->image)); ?>"
                                        alt="Card image cap">
                                    <div class="card-body m-auto ">
                                        <p class="card-text"><?php echo e($product->name); ?></p>
                                        <form action="<?php echo e(route('show_product', $product)); ?>" method="get">
                                            <button type="submit" class="btn btn-primary">Show detail</button>
                                        </form>
                                        <?php if(Auth::check() && Auth::user()->is_admin): ?>
                                            <form action="<?php echo e(route('delete_product', $product)); ?>" method="post">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger mt-2">Delete product</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
    <div class="text-center text-light p-3 bg-black">
       
       <h1>Created by Farall</h1>
        
  <p>STUDY AT:SMKN 7 PONTIANAK</p>
</div>


    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\faralldycommerce\resources\views/index_product.blade.php ENDPATH**/ ?>