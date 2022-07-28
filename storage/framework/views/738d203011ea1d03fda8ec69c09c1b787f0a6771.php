<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="mdi mdi-pac-man menu-icon"></i>
                <span class="menu-title">Welcome Page</span>
            </a>
        </li>



















        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
                <i class="mdi mdi-cactus menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('admin/products/create')); ?>">Add Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('admin/products')); ?>">View Products</a></li>
                </ul>
            </div>
        </li>

        <form class="align-self-center" action="/home">
            <input type="submit" value="Go to HOME" />
        </form>
    </ul>









































</nav>
<?php /**PATH C:\laragon\www\Yupa\resources\views/layouts/inc/admin/sidebar.blade.php ENDPATH**/ ?>