<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YUPA</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body class="antialiased">
<h1 class="border">YUPA</h1>

<section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
        @if(session('message') )
            <div class="alert"><p>{{ session('message') }}</p></div>
        @endif
        <div style="text-align: center"
             class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <button><a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        </button>
                        @if(Auth::User()->role_as == 1)
                            <button><a href="{{ url('/admin/dashboard') }}"
                                       class="text-sm text-gray-700 dark:text-gray-500 underline">Go to DASHBOARD</a>
                            </button>
                        @endif
                    @else
                        <button><a href="{{ route('login') }}"
                                   class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                                in</a></button>

                        @if (Route::has('register'))
                            <button><a href="{{ route('register') }}"
                                       class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            </button>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up" class="aos-init aos-animate">Enjoy Your Healthy Break</h2>
                    <label data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">Fresh and
                        delicious</label>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start"><img
                        src="https://cdn.pixabay.com/photo/2020/10/23/05/23/leaves-5677717_960_720.png"
                        class="img-fluid aos-init aos-animate" alt="" data-aos="zoom-out" data-aos-delay="300"></div>
            </div>
        </div>
    </div>
</section>


<section class="section-products">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                <div class="header">
                    <h2>Our Products</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @forelse ($products as $productItem)
                    <!-- Single Product -->
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div id="part-1" class="single-product">
                            <div class="part-1">
                                <img style='height: 100%; width: 100%; object-fit: contain'
                                     src="{{ asset($productItem->image)}}" alt="{{$productItem->name}}">
                                <ul>
                                    <li>
                                        @if($productItem->status == 0)
                                            <img style='height: 70%; width: 70%; object-fit: cover'
                                                 src="http://1.bp.blogspot.com/_YTnWwtgfB78/TGP4lFQ_QFI/AAAAAAAAECE/4Oek5rgB35E/s1600/inactive.gif"/>
                                        @endif</li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 style="font-family: 'Arial Black'" class="product-title">{{$productItem->name}}</h3>
                                <h4 style="font-family: 'Arial'" class="product-price">{{$productItem->price}}$</h4>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h4>No Products Available</h4>
                    </div>
                @endforelse
                {{ $products->links() }}

                <label>Results: {{$products->count()}} products</label>
            </div>
        </div>
    </div>
</section>
</div>
</body>

<script type="text/javascript">
    $().ready(function () {

        $('div.alert').delay(1500);
        $('div.alert').hide(1000);
    });
</script>

<style>

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

    .section-bg {
        background-color: #eee;
    }


    div.alert {
        color: green;
        background-color: rgb(50, 200, 50, .5);
        padding: 10px;
        text-align: center;
    }


    body {
        font-family: "Poppins", sans-serif;
        color: #444444;
    }

    a,
    a:hover {
        text-decoration: none;
        color: inherit;
    }

    .section-products {
        padding: 80px 0 54px;
    }

    .section-products .header {
        margin-bottom: 100px;
    }

    /*.section-products .header h3 {*/
    /*    font-size: 1rem;*/
    /*    color: #fe302f;*/
    /*    font-weight: 500;*/
    /*}*/

    /*.section-products .header h2 {*/
    /*    font-size: 2.2rem;*/
    /*    font-weight: 400;*/
    /*    color: #444444;*/
    /*}*/

    .section-products .single-product {
        margin-bottom: 35px;
    }

    .section-products .single-product .part-1 {
        position: relative;
        max-width: 250px;
        max-height: 250px;
        margin-bottom: 40px;
        overflow: hidden;
    }

    /*.section-products .single-product .part-1::before {*/
    /*    position: absolute;*/
    /*    content: "";*/
    /*    top: 0;*/
    /*    left: 0;*/
    /*    max-width: 250px;*/
    /*    max-height: 250px;*/
    /*    transition: all 0.3s;*/
    /*}*/


    .section-products .single-product .part-1 ul {
        position: absolute;
        bottom: 15px;
        left: 15px;
        list-style: none;
        opacity: 0;
        transition: opacity 0.6s;
    }


    .section-products .single-product:hover .part-1 ul {
        opacity: 0.6;
    }

    /*.section-products .single-product .part-1 ul li a {*/
    /*    display: inline-block;*/
    /*    width: 20px;*/
    /*    height: 20px;*/
    /*    line-height: 20px;*/
    /*    background-color: #ffffff;*/
    /*    color: #444444;*/
    /*    text-align: center;*/
    /*    box-shadow: 0 2px 20px rgb(50 50 50 / 10%);*/
    /*    transition: color 0.2s;*/
    /*}*/


    .section-products .single-product .part-2 .product-title {
        font-size: 1rem;
    }

    .section-products .single-product .part-2 h4 {
        display: inline-block;
        font-size: 1rem;
    }

</style>




