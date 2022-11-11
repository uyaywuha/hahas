<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="https://kit.fontawesome.com/c4ed16d53e.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow p-5 mb-2">
            <div class="container">
                <a class="navbar-brand fs-4" href="<?php echo e(route('index_product')); ?>">
                    SHOP-FARAL
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end shadow-sm p-7 " aria-labelledby="navbarDropdown">
                                    <?php if(Auth::user()->is_admin): ?>
                                        <a class="dropdown-item" href="<?php echo e(route('create_product')); ?>">
                                            <i class="fa-solid fa-cart-plus"></i>
                                            Create product 
                                        </a>
                                    <?php else: ?>
                                        <a class="dropdown-item" href="<?php echo e(route('show_cart')); ?>">
                                        <i class="fa fa-cart-shopping " aria-hidden="true"></i>
                                        Cart
                                        </a>
                                    <?php endif; ?>

                                    <a class="dropdown-item" href="<?php echo e(route('index_order')); ?>">
                                        <i class="fa-sharp fa-solid fa-clipboard-list"></i>
                                      My Order
                                    </a>   
                                  
                                    <a class="dropdown-item" href="<?php echo e(route('show_profile')); ?>">
                                         <i class="fa-solid fa-user"></i>
                                       Profile 
                                    </a>

                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    
                                        onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-sharp fa-solid fa-right-from-bracket"></i>

                                        <?php echo e(__('Logout')); ?>

                                    </a>


                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-2 ">
        
            
            <?php echo $__env->yieldContent('content'); ?>
        </main>
       </div>
    </div>
</div>
</div>

</body>

</html>
<?php /**PATH C:\laragon\www\faralldycommerce\resources\views/layouts/app.blade.php ENDPATH**/ ?>