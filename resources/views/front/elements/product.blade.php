@extends('front.layouts.app')

@section('content')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Products</h1>
                <h4 class="page-subtitle">Elements</h4>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10 pb-1">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('elements.index') }}">Elements</a></li>
                    <li>Products</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <section>
                    <h2 class="title title-center mb-5">Default</h2>
                    <div class="row product-wrapper mb-7">
                        <div class="col-md-3 col-6">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ route('shop.product') }}">
                                        <img src="{{ asset('front/assets/images/products/elements/1.jpg') }}" alt="Product"
                                            width="295" height="335" />
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-action-vertical">
                                        <a href="{{ route('cart.index') }}" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="{{ route('wishlist.index') }}"
                                            class="btn-product-icon btn-wishlist w-icon-heart" title="Wishlist"></a>
                                        <a href="{{ route('compare.index') }}"
                                            class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="{{ route('shop.product') }}">Electronics Black Wrist Watch</a>
                                    </h3>
                                    <div class="product-price">$40.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ route('shop.product') }}">
                                        <img src="{{ asset('front/assets/images/products/elements/2.jpg') }}" alt="Product"
                                            width="295" height="335" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="{{ route('cart.index') }}" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="{{ route('wishlist.index') }}"
                                            class="btn-product-icon btn-wishlist w-icon-heart" title="Wishlist"></a>
                                        <a href="{{ route('compare.index') }}"
                                            class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="{{ route('shop.product') }}">Summer Sport Shoes</a>
                                    </h3>
                                    <div class="product-price">$86.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ route('shop.product') }}">
                                        <img src="{{ asset('front/assets/images/products/elements/3.jpg') }}"
                                            alt="Product" width="295" height="335" />
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-action-vertical">
                                        <a href="{{ route('cart.index') }}" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="{{ route('wishlist.index') }}"
                                            class="btn-product-icon btn-wishlist w-icon-heart" title="Wishlist"></a>
                                        <a href="{{ route('compare.index') }}"
                                            class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="{{ route('shop.product') }}">Charming Design Watch</a>
                                    </h3>
                                    <div class="product-price">$30.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ route('shop.product') }}">
                                        <img src="{{ asset('front/assets/images/products/elements/4-1.jpg') }}"
                                            alt="Product" width="295" height="335" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="{{ route('cart.index') }}" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="{{ route('wishlist.index') }}"
                                            class="btn-product-icon btn-wishlist w-icon-heart" title="Wishlist"></a>
                                        <a href="{{ route('compare.index') }}"
                                            class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="{{ route('shop.product') }}">Populated Gaming Mouse</a>
                                    </h3>
                                    <div class="product-price">$236.00</div>
                                    <div class="product-variations">
                                        <a class="image active" href="#"
                                            data-src="{{ asset('front/assets/images/products/elements/4-1.jpg') }}"
                                            style="background-image: url(assets/images/products/elements/va-4-1.jpg);"></a>
                                        <a class="image" href="#"
                                            data-src="{{ asset('front/assets/images/products/elements/4-2.jpg') }}"
                                            style="background-image: url(assets/images/products/elements/va-4-2.jpg);"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

                <section class="mb-6 product-carousel">
                    <h2 class="title title-center mb-5">Carousel</h2>
                    <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-sm-2 cols-2"
                        data-owl-options="{
                                'items': 5,
                                'nav': true,
                                'dots': false,
                                'margin': 20,                                
                                'responsive': {
                                    '0': {
                                        'nav': false,
                                        'items': 2
                                    },
                                    '768': {
                                        'nav': false,
                                        'items': 3
                                    },
                                    '992': {
                                        'nav': false,
                                        'items': 4
                                    },
                                    '1200': {
                                        'items': 4
                                    }
                                }
                            }">
                        <div class="product product-simple">
                            <figure class="product-media">
                                <a href="{{ route('shop.product') }}">
                                    <img src="{{ asset('front/assets/images/products/elements/1.jpg') }}" alt="Product"
                                        width="295" height="335" />
                                </a>
                                <div class="product-label-group">
                                    <label class="product-label label-discount">-25%</label>
                                </div>
                                <div class="product-action-vertical">
                                    <a href="{{ route('compare.index') }}"
                                        class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <a href="{{ route('wishlist.index') }}" class="btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <div class="product-cat">
                                    <a href="{{ route('shop.index') }}">Electronics</a>
                                </div>
                                <h4 class="product-name"><a href="{{ route('shop.product') }}">Electronics Black Wrist Watch</a></h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="{{ route('shop.product') }}" class="rating-reviews">(3 reviews)</a>
                                </div>
                                <div class="product-pa-wrapper">
                                    <div class="product-price">
                                        <ins class="new-price">$25.68</ins><del class="old-price">$30.45</del>
                                    </div>
                                    <div class="product-action">
                                        <a href="{{ route('cart.index') }}" title="Add to Cart"
                                            class="btn-cart btn-product btn btn-link btn-underline">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product-simple">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="assets/images/products/elements/2.jpg" alt="Product" width="295"
                                        height="335" />
                                </a>
                                <div class="product-label-group">
                                    <label class="product-label label-discount">-25%</label>
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                        View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                <div class="product-cat">
                                    <a href="shop-banner-sidebar.html">Sports</a>
                                </div>
                                <h4 class="product-name"><a href="product-default.html">Summer Sports Shoes</a></h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                </div>
                                <div class="product-pa-wrapper">
                                    <div class="product-price">
                                        <ins class="new-price">$86.00</ins><del class="old-price">$120.00</del>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" title="Add to Cart"
                                            class="btn-cart btn-product btn btn-link btn-underline">Add
                                            to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product-simple">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="assets/images/products/elements/3.jpg" alt="Product" width="295"
                                        height="335" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                        View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                <div class="product-cat">
                                    <a href="shop-banner-sidebar.html">Electronics</a>
                                </div>
                                <h4 class="product-name"><a href="product-default.html">Charming Design Watch</a>
                                </h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                </div>
                                <div class="product-pa-wrapper">
                                    <div class="product-price">
                                        $30.00
                                    </div>
                                    <div class="product-action">
                                        <a href="#" title="Add to Cart"
                                            class="btn-cart btn-product btn btn-link btn-underline">Add
                                            to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product product-simple">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="assets/images/products/elements/4-1.jpg" alt="Product" width="295"
                                        height="335" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                        View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                <div class="product-cat">
                                    <a href="shop-banner-sidebar.html">Electronics</a>
                                </div>
                                <h4 class="product-name"><a href="product-default.html">Populated Gaming Mouse</a>
                                </h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                </div>
                                <div class="product-pa-wrapper">
                                    <div class="product-price">
                                        $236.00
                                    </div>
                                    <div class="product-action">
                                        <a href="#" title="Add to Cart"
                                            class="btn-cart btn-product btn btn-link btn-underline">Add
                                            to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <h2 class="title title-center mb-5 ls-15">Simple Style</h2>
                    <div class="row">
                        <div class="col-md-3 col-6 mb-4">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/1.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">-25%</label>
                                    </div>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="product-default.html">Electronics Black Wrist Watch</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            <ins class="new-price">$25.68</ins><del class="old-price">$30.45</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/2.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="product-default.html">Summer Sport Shoes</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">$86.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/3.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="product-default.html">Charming Design Watch</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">$30.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/4-1.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">-35%</label>
                                    </div>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a href="product-default.html">Populated Gaming Mouse</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            <ins class="new-price">$236.00</ins><del class="old-price">$250.89</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-2 mb-lg-7">
                    <h2 class="title title-center mb-5">Image Gap Style</h2>
                    <div class="row product-wrapper">
                        <div class="col-md-3 col-6">
                            <div class="product product-image-gap product-simple">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/1.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">-25%</label>
                                    </div>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare">

                                        </a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                    <div class="product-cat">
                                        <a href="shop-banner-sidebar.html">Electronics</a>
                                    </div>
                                    <h4 class="product-name">
                                        <a href="product-default.html">Electronics Black Wrist Watch</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            <ins class="new-price">$25.68</ins><del class="old-price">$30.45</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-cart btn-product btn btn-link btn-underline">Add
                                                To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="product product-image-gap product-simple">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/2.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare">

                                        </a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                    <div class="product-cat">
                                        <a href="shop-banner-sidebar.html">Sports</a>
                                    </div>
                                    <h4 class="product-name">
                                        <a href="product-default.html">Summer Sports Shoes</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">$86.00</div>
                                        <div class="product-action">
                                            <a href="#" class="btn-cart btn-product btn btn-link btn-underline">Add
                                                To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="product product-image-gap product-simple">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/3.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare">

                                        </a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                    <div class="product-cat">
                                        <a href="shop-banner-sidebar.html">Electronics</a>
                                    </div>
                                    <h4 class="product-name">
                                        <a href="product-default.html">Charming Design Watch</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">$30.00</div>
                                        <div class="product-action">
                                            <a href="#" class="btn-cart btn-product btn btn-link btn-underline">Add
                                                To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="product product-image-gap product-simple">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/4-1.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare">

                                        </a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <a href="#" class="btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                    <div class="product-cat">
                                        <a href="shop-banner-sidebar.html">Electronics</a>
                                    </div>
                                    <h4 class="product-name">
                                        <a href="product-default.html">Populated Gaming Mouse</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">$236.00</div>
                                        <div class="product-action">
                                            <a href="#" class="btn-cart btn-product btn btn-link btn-underline">Add
                                                To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-2 mb-lg-6">
                    <h2 class="title title-center mb-5">Slide Up</h2>
                    <div class="row product-wrapper">
                        <div class="col-md-3 col-6">
                            <div class="product product-slideup-content">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/1.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">-25%</label>
                                    </div>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="shop-banner-sidebar.html">Electronics</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="product-default.html">Electronics Black Wrist Watch</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$25.68</ins><del class="old-price">$30.45</del>
                                    </div>
                                </div>
                                <div class="product-hidden-details">
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to Cart">
                                            <i class="w-icon-cart"></i><span>Add To Cart</span></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="product product-slideup-content">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/2.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="shop-banner-sidebar.html">Sports</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="product-default.html">Summer Sport Shoes</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-price">$86.00</div>
                                </div>
                                <div class="product-hidden-details">
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to Cart">
                                            <i class="w-icon-cart"></i><span>Add To Cart</span></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="product product-slideup-content">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/3.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="shop-banner-sidebar.html">Electronics</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="product-default.html">Charming Design Watch</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-price">$30.00</div>
                                </div>
                                <div class="product-hidden-details">
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to Cart">
                                            <i class="w-icon-cart"></i><span>Add To Cart</span></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="product product-slideup-content">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/4-1.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">-25%</label>
                                    </div>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="shop-banner-sidebar.html">Electronics</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="product-default.html">Populated Gaming Mouse</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$236.00</ins><del class="old-price">$300.00</del>
                                    </div>
                                </div>
                                <div class="product-hidden-details">
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to Cart">
                                            <i class="w-icon-cart"></i><span>Add To Cart</span></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-7">
                    <h2 class="title title-center mb-5">Without Space</h2>
                    <div class="row gutter-xs">
                        <div class="col-md-3 col-6 mb-4">
                            <div class="product product-simple text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/1.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">-25%</label>
                                    </div>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Electronics Black Wrist
                                            Watch</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            <ins class="new-price">$25.68</ins><del class="old-price">$30.45</del>
                                        </div>
                                        <div class="product-action">
                                            <a href="#"
                                                class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                                                To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="product product-simple text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/2.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Summer Sport Shoes</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">$86.00</div>
                                        <div class="product-action">
                                            <a href="#"
                                                class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                                                To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="product product-simple text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/3.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Charming Design
                                            Watch</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">$30.00</div>
                                        <div class="product-action">
                                            <a href="#"
                                                class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                                                To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="product product-simple text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/elements/4-1.jpg" alt="Product" width="295"
                                            height="335" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Populated Gaming
                                            Mouse</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">$236.00</div>
                                        <div class="product-action">
                                            <a href="#"
                                                class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                                                To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="product-list-section">
                    <h2 class="title title-center mb-5">Products List</h2>
                    <div class="row">
                        <div class="col-lg-9 mb-5">
                            <div class="row cols-lg-1 cols-md-1 cols-sm-1">
                                <div class="product product-list">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="assets/images/products/elements/2.jpg" alt="Product"
                                                width="330" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="product-default.html">Summer Sport Shoes</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="#" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">$86.00</div>
                                        <ul class="product-desc">
                                            <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                                            <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                                            <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                                        </ul>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to Cart"><i
                                                    class="w-icon-cart"></i> Add To Cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product product-list">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="assets/images/products/elements/3.jpg" alt="Product"
                                                width="330" height="338" />
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="product-default.html">Charming Design Watch</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="#" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">$30.00</div>
                                        <ul class="product-desc">
                                            <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                                            <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                                            <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                                        </ul>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to Cart"><i
                                                    class="w-icon-cart"></i> Add To Cart</a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="title-link-wrapper mb-2">
                                <h4 class="title title-link title-sm font-weight-bold pt-0 pb-1">Featured</h4>
                            </div>
                            <div class="widget widget-products">
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="assets/images/products/elements/2.jpg" alt="Product"
                                                width="100" height="106" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="product-default.html">Summer Sport Shoes</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">$86.00</div>
                                    </div>
                                </div>
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="assets/images/products/elements/3.jpg" alt="Product"
                                                width="100" height="106" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="product-default.html">Charming Design Watch</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">$30.00</div>
                                    </div>
                                </div>
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="assets/images/products/elements/4-1.jpg" alt="Product"
                                                width="100" height="106" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="product-default.html">Populated Gaming Mouse</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">$236.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="element-section text-center mt-10 mb-10 pt-5 pb-2" id="section-elements">
                    <h3 class="section-title">Wolmart Element</h3>
                    <p class="text-default section-desc mx-auto">Wolmart offers tons of elements that your website
                        design needs. Enjoy Wolmart's Elements!</p>

                    <div class="row elements cols-xl-5 cols-lg-4 cols-md-3 cols-xs-2 cols-1">
                        <div class="mb-4">
                            <a href="element-accordions.html" target="blank" class="element">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1" x="0px" y="0px" width="70px" height="70px"
                                    viewBox="0 -4 70 70" enable-background="new 0 -4 70 70" xml:space="preserve">
                                    <g>
                                        <path
                                            d="M19.9,32.4h28.8c0.5,0,0.9-0.5,0.9-1.1c0-0.6-0.4-1.1-0.9-1.1H19.9c-0.5,0-0.9,0.5-0.9,1.1C19,31.9,19.4,32.4,19.9,32.4z" />
                                        <path
                                            d="M19.9,37.7h28.6c0.5,0,0.9-0.5,0.9-1.1c0-0.6-0.4-1.1-0.9-1.1H19.9c-0.5,0-0.9,0.5-0.9,1.1C19,37.2,19.4,37.7,19.9,37.7z" />
                                        <path
                                            d="M19.9,43h14.7c0.5,0,0.9-0.5,0.9-1.1c0-0.6-0.4-1.1-0.9-1.1H19.9c-0.5,0-0.9,0.5-0.9,1.1C19,42.5,19.4,43,19.9,43z" />
                                        <path
                                            d="M54.2,11H15.8c-1.9,0-3.4,1.7-3.4,3.8v32.4c0,2.1,1.5,3.8,3.4,3.8h38.4c1.9,0,3.4-1.7,3.4-3.8V14.8   C57.6,12.7,56,11,54.2,11z M14.3,23.6c0.1,0,0.1,0,0.2,0h41.2v23.5c0,1-0.7,1.8-1.5,1.8H15.8c-0.8,0-1.5-0.8-1.5-1.8V23.6z    M15.8,13h38.4c0.8,0,1.5,0.8,1.5,1.8v6.7H14.5c-0.1,0-0.1,0-0.2,0v-6.7C14.3,13.8,15,13,15.8,13z" />
                                        <path
                                            d="M19.5,18.7h6c0.5,0,0.9-0.4,0.9-1c0-0.5-0.4-1-0.9-1h-6c-0.5,0-0.9,0.4-0.9,1C18.6,18.2,19,18.7,19.5,18.7z" />
                                        <path
                                            d="M33.8,18.7h0.5c0.5,0,0.9-0.4,0.9-1c0-0.5-0.4-1-0.9-1h-0.5c-0.5,0-0.9,0.4-0.9,1C32.9,18.2,33.3,18.7,33.8,18.7z" />
                                        <path
                                            d="M28.8,18.7h0.5c0.5,0,0.9-0.4,0.9-1c0-0.5-0.4-1-0.9-1h-0.5c-0.5,0-0.9,0.4-0.9,1C28,18.2,28.4,18.7,28.8,18.7z" />
                                        <path
                                            d="M31.3,18.7h0.5c0.5,0,0.9-0.4,0.9-1c0-0.5-0.4-1-0.9-1h-0.5c-0.5,0-0.9,0.4-0.9,1C30.5,18.2,30.8,18.7,31.3,18.7z" />
                                        <path
                                            d="M48.5,19.5c0.1,0.1,0.2,0.2,0.4,0.2c0.1,0,0.3-0.1,0.4-0.2l2.8-2.7c0.2-0.2,0.2-0.4,0.1-0.6c-0.1-0.2-0.3-0.3-0.5-0.3h-5.5   c-0.2,0-0.4,0.1-0.5,0.3c-0.1,0.2-0.1,0.4,0.1,0.6L48.5,19.5z" />
                                    </g>
                                </svg>
                                <p>Accordions</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-alerts.html" target="blank" class="element">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px"
                                    height="70px" viewBox="0 -5 70 70" enable-background="new 0 -5 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path
                                            d="M35.2,37.8c0.6,0,1.1-0.5,1.1-1l0.4-15.4c0-0.6-0.4-1-1-1h-1.4c-0.6,0-1,0.5-1,1l0.4,15.4c0,0.6,0.5,1,1.1,1H35.2z" />
                                        <path
                                            d="M35,40.1c-1.2,0-2.1,0.9-2.1,2.2c0,1.2,0.9,2.2,2.1,2.2c1.3,0,2.1-0.9,2.1-2.2C37.1,41,36.3,40.1,35,40.1z" />
                                        <path d="M57.8,44.3L38.4,11.9c-0.7-1.2-2-1.9-3.4-1.9c-1.4,0-2.7,0.7-3.4,1.9L12.2,44.3c-0.7,1.2-0.7,2.6,0,3.8
                c0.7,1.2,2,1.9,3.4,1.9h38.8c1.4,0,2.7-0.7,3.4-1.9C58.5,46.9,58.5,45.5,57.8,44.3z M55.9,47c-0.3,0.5-0.8,0.7-1.5,0.7H15.6
                c-0.7,0-1.2-0.3-1.5-0.7c-0.3-0.5-0.3-1.1,0-1.6L33.5,13c0.3-0.5,0.9-0.8,1.5-0.8c0.6,0,1.2,0.3,1.5,0.8l19.4,32.4
                C56.2,45.9,56.2,46.5,55.9,47z" />
                                    </g>
                                </svg>
                                <p>Alerts</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-blog-posts.html" target="blank" class="element">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px"
                                    height="70px" viewBox="0 -9 70 70" enable-background="new 0 -9 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path d="M55.6,46c-3.5,0-6.3-2.8-6.3-6.3c0-0.4,0-0.8,0.1-1.2c-0.1-1.3-1.1-2.2-2.3-2.2c-1.1,0-2.1,0.8-2.3,1.9
                c0.1,0.6,0.2,1.1,0.2,1.6c0,3.5-2.8,6.3-6.3,6.3c-3.5,0-6.3-2.8-6.3-6.3c0-3.5,2.8-6.3,6.3-6.3c2,0,4,1,5.1,2.7l0.1,0.1
                c0,0,0.1,0.1,0.1,0.1c0,0,0,0,0,0c0,0,0.1,0,0.1,0l0.1-0.1c0.7-0.8,1.8-1.3,2.8-1.3c1.1,0,2.2,0.5,2.9,1.4l0.1,0.1c0,0,0.1,0,0.1,0
                c0,0,0,0,0,0c0,0,0.1,0,0.1-0.1l0.1-0.1c1.2-1.7,3.1-2.7,5.2-2.7c3.5,0,6.3,2.8,6.3,6.3C61.9,43.2,59.1,46,55.6,46z M38.8,34.9
                c-2.7,0-4.9,2.2-4.9,4.8c0,2.7,2.2,4.8,4.9,4.8c2.7,0,4.9-2.2,4.9-4.8c0-0.4,0-0.8-0.1-1.2l0-0.1c0,0,0-0.1-0.1-0.1l0,0
                c0,0,0-0.1,0-0.1C42.7,36.2,40.9,34.9,38.8,34.9z M55.6,34.9c-2.7,0-4.9,2.2-4.9,4.8c0,2.7,2.2,4.8,4.9,4.8c2.7,0,4.9-2.2,4.9-4.8
                C60.5,37.1,58.3,34.9,55.6,34.9z" />
                                        <path d="M15.3,23.2h36.2v1.5H15.3V23.2z" />
                                        <path d="M15.3,30.2h36.2v1.5H15.3V30.2z" />
                                        <path d="M15.3,37.7h12.2v1.5H15.3V37.7z" />
                                        <path d="M22,20.7l-4-5.3c0,0-0.1-0.1-0.1-0.1c0,0,0,0,0,0c-0.1,0-0.1,0.1-0.1,0.1v5.2h-1.3v-7.6h1.3l4.2,5.4c0,0,0.1,0.1,0.1,0.1
                c0,0,0,0,0,0c0.1,0,0.1-0.1,0.1-0.1v-5.4h1.3v7.6L22,20.7L22,20.7z" />
                                        <path d="M26,20.7v-7.6h5.4v1.1h-3.9c-0.1,0-0.1,0.1-0.1,0.1v1.9c0,0.1,0.1,0.1,0.1,0.1h3.5v1h-3.5c-0.1,0-0.1,0.1-0.1,0.1v1.9
                c0,0.1,0.1,0.1,0.1,0.1h4.1v1.1H26L26,20.7z" />
                                        <path d="M40.3,20.7l-1.9-5.9c0-0.1-0.1-0.1-0.1-0.1l0,0c-0.1,0-0.1,0-0.1,0.1l-1.8,5.9h-1l-2.7-7.6h1.4l1.7,4.9
                c0,0.1,0.1,0.1,0.1,0.1c0,0,0,0,0,0c0.1,0,0.1,0,0.1-0.1l1.5-4.9h1.5l1.5,4.9c0,0.1,0.1,0.1,0.1,0.1c0,0,0,0,0,0
                c0.1,0,0.1,0,0.1-0.1l1.7-4.9h1.4l-2.7,7.6H40.3z" />
                                        <path d="M48.1,20.8c-1.1,0-2.2-0.4-3.1-1.2l0.8-0.9c0.8,0.7,1.7,1,2.4,1c0.4,0,0.7-0.1,1-0.3c0.3-0.2,0.4-0.5,0.4-0.8
                c0-0.3-0.1-0.6-0.4-0.8c-0.2-0.2-0.7-0.3-1.3-0.5c-0.9-0.2-1.6-0.5-2-0.8c-0.4-0.3-0.6-0.8-0.6-1.5c0-0.7,0.2-1.2,0.7-1.6
                c0.5-0.4,1.2-0.6,1.9-0.6c0.5,0,1,0.1,1.5,0.3c0.4,0.1,0.8,0.3,1.1,0.6L50,14.7c-0.7-0.5-1.4-0.7-2.1-0.7c-0.4,0-0.7,0.1-0.9,0.3
                c-0.2,0.2-0.4,0.5-0.4,0.8c0,0.3,0.2,0.6,0.4,0.8c0.2,0.2,0.7,0.3,1.6,0.5c0.7,0.2,1.3,0.4,1.7,0.8c0.4,0.3,0.6,0.8,0.6,1.5
                c0,0.7-0.2,1.2-0.7,1.6C49.6,20.6,48.9,20.8,48.1,20.8z" />
                                        <path d="M54.6,6H12C9.8,6,8.1,7.7,8.1,9.8v32c0,2.1,1.7,3.8,3.9,3.8h15.9v-2H12c-1,0-1.8-0.8-1.8-1.8v-32C10.2,8.8,11,8,12,8h42.6
                c1,0,1.8,0.8,1.8,1.8v19.9h2.1V9.8C58.5,7.7,56.8,6,54.6,6z" />
                                    </g>
                                </svg>
                                <p>Blog Post</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-buttons.html" target="blank" class="element">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px"
                                    height="70px" viewBox="0 -17 70 70" enable-background="new 0 -17 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path d="M58,8.1C55.4,5.5,51.8,4,48,4H22C14.1,4,7.8,10.3,7.8,18c0,7.7,6.4,14,14.2,14H48c7.8,0,14.2-6.3,14.2-14
                C62.2,14.3,60.7,10.8,58,8.1z M48,29.9H22c-6.6,0-12-5.3-12-11.9c0-6.6,5.4-11.9,12-11.9H48c6.6,0,12,5.3,12,11.9
                C60.1,24.6,54.7,29.9,48,29.9z" />
                                        <path d="M26.4,12.4c-1.5-1.5-3.5-2.3-5.7-2.3c-4.4,0-8,3.6-8,7.9c0,4.4,3.6,7.9,8,7.9c4.4,0,8-3.6,8-7.9
                C28.8,15.9,27.9,13.9,26.4,12.4z M20.7,23.9c-3.2,0-5.9-2.6-5.9-5.8c0-3.2,2.6-5.8,5.9-5.8c3.2,0,5.9,2.6,5.9,5.8
                C26.6,21.2,24,23.9,20.7,23.9z" />
                                        <path d="M55.5,15.6L54,13.5l-8.6,6.5l-2.7-4.2l-2.2,1.5l4.3,6.5L55.5,15.6z" />
                                    </g>
                                </svg>
                                <p>Buttons</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-cta.html" target="blank" class="element">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px"
                                    height="70px" viewBox="0 0 70 70" enable-background="new 0 0 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path d="M52.9,56H39v-2.1h13.8c0.6,0,1-0.5,1-1V17.1c0-0.6-0.5-1-1-1H17.1c-0.6,0-1,0.5-1,1v14.3H14V17.1c0-1.7,1.4-3.1,3.1-3.1
                h35.7c1.7,0,3.1,1.4,3.1,3.1v35.7C56,54.6,54.6,56,52.9,56z" />
                                        <path d="M31.3,55.9H17.1c-1.7,0-3.1-1.4-3.1-3.1V38.4c0-1.7,1.4-3.1,3.1-3.1h14.2c1.7,0,3.1,1.4,3.1,3.1v14.4
                C34.5,54.5,33.1,55.9,31.3,55.9z M17.1,37.4c-0.6,0-1,0.5-1,1v14.4c0,0.6,0.5,1,1,1h14.2c0.6,0,1-0.5,1-1V38.4c0-0.6-0.5-1-1-1
                H17.1z" />
                                        <path
                                            d="M41.6,19.7c-0.6,0-1,0.5-1,1l0,0c0,0.6,0.5,1,1,1l4.1,0c0.6,0,0.7,0.3,0.3,0.7L35.7,32.8c-0.4,0.4-0.4,1.1,0,1.5
                c0.4,0.4,1.1,0.4,1.5,0L47.4,24c0.4-0.4,0.7-0.3,0.7,0.3v4.2c0,0.6,0.5,1,1,1l0,0c0.6,0,1-0.5,1-1v-7.7c0-0.6-0.5-1-1-1H41.6z" />
                                    </g>
                                </svg>
                                <p>Call to Action</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-icons.html" target="blank" class="element">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px"
                                    height="70px" viewBox="0 0 70 70" enable-background="new 0 0 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path d="M35,14c-11.6,0-21,9.4-21,21s9.4,21,21,21s21-9.4,21-21S46.6,14,35,14z M35,53.9c-10.4,0-18.9-8.5-18.9-18.9
                S24.6,16.1,35,16.1c10.4,0,18.9,8.5,18.9,18.9S45.4,53.9,35,53.9z" />
                                        <path d="M47.2,30.6l-7.7-1.3L36.1,22c-0.2-0.4-0.6-0.7-1-0.7c-0.4,0-0.8,0.3-1,0.7l-3.6,7.3l-7.7,1.1c-0.5,0.1-0.8,0.3-0.9,0.7
                c-0.1,0.4,0,0.8,0.3,1.2l5.6,5.8l-1.4,8.1c-0.1,0.4,0,0.7,0.2,1c0.3,0.4,0.9,0.5,1.4,0.2l7-3.7l6.9,3.9c0.5,0.3,1.1,0.2,1.4-0.2
                c0.2-0.2,0.3-0.6,0.2-0.9l-1.2-8.1l5.7-5.7c0.3-0.3,0.4-0.8,0.3-1.1C48,31,47.7,30.7,47.2,30.6z M41,36.9c-0.4,0.4-0.6,1.1-0.5,1.6
                l1,6.8l-5.7-3.2c-0.2-0.1-0.6-0.2-0.9-0.2c-0.2,0-0.5,0-0.8,0.2l-5.8,3.1l1.2-6.8c0.1-0.5-0.1-1.2-0.5-1.6l-4.7-4.9l6.5-0.9
                c0.6-0.1,1.1-0.5,1.4-1l3-6.1l2.8,6.2c0.2,0.5,0.8,0.9,1.3,1l6.5,1.1L41,36.9z" />
                                    </g>
                                </svg>
                                <p>Icons</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-icon-boxes.html" target="blank" class="element">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px"
                                    height="70px" viewBox="-5 0 70 70" enable-background="new -5 0 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path
                                            d="M42.5,47.2h-25c-0.4,0-0.7,0.3-0.7,0.7s0.3,0.7,0.7,0.7h25c0.4,0,0.7-0.3,0.7-0.7C43.2,47.6,42.9,47.2,42.5,47.2z" />
                                        <path
                                            d="M37.3,51.4H22.7c-0.4,0-0.7,0.3-0.7,0.7c0,0.4,0.3,0.7,0.7,0.7h14.6c0.4,0,0.7-0.3,0.7-0.7C38,51.7,37.7,51.4,37.3,51.4z" />
                                        <path d="M24.8,36.2c0,0.3,0.1,0.6,0.1,0.8l-1.8,1.7l-1.1,2.2l1.3,0.6l1-2l1.2-1.2c0.9,1.5,2.6,2.5,4.5,2.5c1.9,0,3.5-1,4.5-2.5
                l1.2,1.2l1,2l1.3-0.6l-1.1-2.2L35.1,37c0.1-0.3,0.1-0.6,0.1-0.8l0.1-1.4h4v-1.4h-3.9l0.2-2.6c0-0.1,0-0.2,0-0.3l0,0l2.2-2.1
                l1.1-2.2l-1.3-0.6l-1,2l-1.4,1.4c-0.1-0.2-0.3-0.4-0.4-0.6c-0.5-0.6-1.3-0.9-2-1v-1.4c0-0.6-0.2-1.2-0.6-1.7l1.6-3.1l-1.3-0.6
                L31,23.2c-0.3-0.1-0.7-0.2-1-0.2c-0.4,0-0.7,0.1-1,0.2l-1.5-2.9L26.2,21l1.6,3.1c-0.4,0.5-0.6,1.1-0.6,1.7v1.4
                c-0.8,0.1-1.5,0.5-2,1c-0.2,0.2-0.3,0.4-0.4,0.6l-1.4-1.4l-1-2L21,26.1l1.1,2.2l2.2,2.1l0,0c0,0.1,0,0.2,0,0.3l0.2,2.6h-3.9v1.4h4
                L24.8,36.2z M31.4,25.8v1.3h-2.7v-1.3c0-0.7,0.6-1.3,1.4-1.3C30.8,24.5,31.4,25.1,31.4,25.8z M26.2,29.2c0.4-0.4,0.9-0.6,1.4-0.6
                h4.7c0.5,0,1,0.2,1.4,0.6c0.4,0.4,0.5,0.9,0.5,1.4L33.8,36C33.6,38,32,39.5,30,39.5S26.4,38,26.2,36l-0.5-5.4
                C25.7,30.1,25.9,29.6,26.2,29.2z" />
                                        <path d="M49.1,17.6l-5-5c-0.6-0.6-1.4-0.9-2.3-0.9l-28.6,0c-1.8,0-3.2,1.4-3.2,3.1v40.4c0,1.7,1.4,3.1,3.2,3.1h33.6
                c1.8,0,3.2-1.4,3.2-3.1V19.8C50,18.9,49.7,18.2,49.1,17.6z M12.2,14.8c0-0.5,0.4-1,1-1h28.6c0,0,0,0,0.1,0v3c0,1.5,1.3,2.8,2.8,2.8
                l3,0l0,0c0,0,0,0.1,0,0.1v35.4c0,0.5-0.4,1-1,1H13.2c-0.5,0-1-0.4-1-1C12.2,55.2,12.2,14.8,12.2,14.8z M44.7,18.2
                c-0.7,0-1.3-0.6-1.3-1.3l0-1.8l3.2,3.2H44.7z" />
                                    </g>
                                </svg>
                                <p>Icon Boxes</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-instagrams.html" target="blank" class="element">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px"
                                    height="70px" viewBox="0 -8.5 70 70" enable-background="new 0 -8.5 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path d="M43,21.8c2.1,0,3.8-1.7,3.8-3.8c0-2.1-1.7-3.8-3.8-3.8c-2.1,0-3.8,1.7-3.8,3.8C39.2,20.1,40.9,21.8,43,21.8z M43,16.1
                c1,0,1.9,0.8,1.9,1.9c0,1-0.8,1.9-1.9,1.9c-1,0-1.9-0.8-1.9-1.9C41.1,16.9,41.9,16.1,43,16.1z" />
                                        <path d="M56.6,38.3h-1.8L46.3,30c-0.4-0.4-1-0.4-1.3,0l-3.5,3.4l-10-10.1c-0.4-0.4-1-0.4-1.4,0L15.2,38.3h-1.8c-0.5,0-1,0.4-1,1
                c0,0.5,0.4,1,1,1h2.2H46h8.4h2.2c0.5,0,1-0.4,1-1C57.5,38.7,57.1,38.3,56.6,38.3z M17.9,38.3l12.9-13.1l12.9,13.1H17.9z M46.4,38.3
                l-3.6-3.7l2.7-2.6l6.5,6.3H46.4z" />
                                        <path d="M57.5,6.5H12.4c-2.1,0-3.8,1.7-3.8,3.8v32.4c0,2.1,1.7,3.8,3.8,3.8h45.1c2.1,0,3.9-1.7,3.9-3.8V10.3
                C61.4,8.2,59.7,6.5,57.5,6.5z M59.5,42.7c0,1.1-0.9,2-1.9,2H12.4c-1.1,0-1.9-0.9-1.9-2V10.3c0-1.1,0.8-2,1.9-2h45.1
                c1.1,0,1.9,0.9,1.9,2L59.5,42.7L59.5,42.7z" />
                                    </g>
                                </svg>
                                <p>Instagram</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-categories.html" target="blank" class="element">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px"
                                    height="70px" viewBox="0 0 70 70" enable-background="new 0 0 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path
                                            d="M32.3,16.8c0.1,0,0.2,0.1,0.2,0.2v15.3c0,0.1-0.1,0.2-0.2,0.2H17c-0.1,0-0.2-0.1-0.2-0.2V17c0-0.1,0.1-0.2,0.2-0.2H32.3
                    M32.3,15H17c-1.1,0-2,0.9-2,2v15.3c0,1.1,0.9,2,2,2l15.3,0c1.1,0,2-0.9,2-2V17C34.3,15.9,33.4,15,32.3,15L32.3,15z" />
                                        <path
                                            d="M53,16.8L53,16.8c0.1,0,0.2,0.1,0.2,0.2v15.3c0,0.1-0.1,0.2-0.2,0.2H37.7c-0.1,0-0.2-0.1-0.2-0.2V17c0-0.1,0.1-0.2,0.2-0.2
                H53 M53,15H37.7c-1.1,0-2,0.9-2,2v15.3c0,1.1,0.9,2,2,2H53c1.1,0,2-0.9,2-2V17C55,15.9,54.1,15,53,15L53,15z" />
                                        <path
                                            d="M32.3,37.4c0.1,0,0.2,0.1,0.2,0.2V53c0,0.1-0.1,0.2-0.2,0.2H17c-0.1,0-0.2-0.1-0.2-0.2V37.7c0-0.1,0.1-0.2,0.2-0.2H32.3
                    M32.3,35.6H17c-1.1,0-2,0.9-2,2V53c0,1.1,0.9,2,2,2h15.3c1.1,0,2-0.9,2-2V37.7C34.3,36.6,33.4,35.6,32.3,35.6L32.3,35.6z" />
                                        <path
                                            d="M53,37.4c0.1,0,0.2,0.1,0.2,0.2V53c0,0.1-0.1,0.2-0.2,0.2H37.7c-0.1,0-0.2-0.1-0.2-0.2V37.7c0-0.1,0.1-0.2,0.2-0.2H53
                    M53,35.6H37.7c-1.1,0-2,0.9-2,2V53c0,1.1,0.9,2,2,2H53c1.1,0,2-0.9,2-2V37.7C55,36.6,54.1,35.6,53,35.6L53,35.6z" />
                                    </g>
                                </svg>
                                <p>Product Categories</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-products.html" target="blank" class="element">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px"
                                    height="70px" viewBox="0 0 70 70" enable-background="new 0 0 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path d="M47.4,16.5l-1.1-0.3L41.3,15c-0.1,0-0.1,0-0.2,0c-0.4,0-0.8,0.3-0.9,0.7c0,0.1,0,0.1,0,0.2l0,0.6h-0.1
                c-0.4,1.7-2.5,3.1-5.1,3.1c-2.6,0-4.7-1.3-5.1-3.1h-0.1v-0.6c0-0.1,0-0.2,0-0.2c-0.1-0.4-0.5-0.7-0.9-0.7c-0.1,0-0.1,0-0.2,0
                l-5,1.2l-1.2,0.3c-1.1,0.2-6.8,2.2-7.6,18.4c0,0.3,0.1,0.5,0.3,0.7c0.2,0.2,0.4,0.3,0.7,0.3h5.2v16.6c0,1.3,1.1,2.4,2.4,2.4h22.9
                c1.3,0,2.4-1.1,2.4-2.4V35.9h5.2c0.3,0,0.5-0.1,0.7-0.3c0.2-0.2,0.3-0.4,0.3-0.7C54.3,18.7,48.6,16.8,47.4,16.5z M48.9,34.1v-5.2
                c0-0.5-0.4-0.9-0.9-0.9c-0.5,0-0.9,0.4-0.9,0.9v24.3H23V28.9c0-0.5-0.4-0.9-0.9-0.9c-0.5,0-0.9,0.4-0.9,0.9v5.2h-4.2l0-0.6
                c0.8-11.1,4.1-14.1,5.4-14.8l0-0.2l0.6-0.1c0,0,0.1,0,0.1,0l1.2-0.3l3.9-0.9l0.2,0.5c0.9,2.3,3.7,3.9,6.7,3.9s5.8-1.6,6.7-3.9
                l0.2-0.5l3.9,0.9l1.2,0.4l0.1,0c0.2,0,5,1.3,6,15.1l0,0.6L48.9,34.1L48.9,34.1z" />
                                    </g>
                                </svg>
                                <p>Products</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-tabs.html" target="blank" class="element">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px"
                                    height="70px" viewBox="0 -6 70 70" enable-background="new 0 -6 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path
                                            d="M54.5,18.7H26.6c-0.6,0-1.2-0.5-1.2-1.2v-4.2c0-1.7-1.4-3.1-3-3.1h-6.9c-1.7,0-3,1.4-3,3.1v31.2c0,1.7,1.4,3.1,3,3.1h38.9
                c1.7,0,3-1.4,3-3.1V21.8C57.5,20.1,56.1,18.7,54.5,18.7z M55.6,44.6c0,0.7-0.5,1.2-1.2,1.2H15.5c-0.6,0-1.2-0.5-1.2-1.2V13.4
                c0-0.7,0.5-1.2,1.2-1.2h6.9c0.6,0,1.2,0.5,1.2,1.2v4.2c0,1.7,1.4,3.1,3,3.1h27.9c0.6,0,1.2,0.5,1.2,1.2L55.6,44.6L55.6,44.6z" />
                                        <path d="M30.7,15.2h7.2c0.4,0,0.7-0.3,0.7-0.7V14c0-0.4-0.3-0.7-0.7-0.7h-7.2c-0.4,0-0.7,0.3-0.7,0.7v0.5
                C30,14.9,30.3,15.2,30.7,15.2z" />
                                        <path d="M44.4,15.2h7.2c0.4,0,0.7-0.3,0.7-0.7V14c0-0.4-0.3-0.7-0.7-0.7h-7.2c-0.4,0-0.7,0.3-0.7,0.7v0.5
                C43.7,14.9,44,15.2,44.4,15.2z" />
                                    </g>
                                </svg>
                                <p>Tabs</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-testimonials.html" target="blank" class="element">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px"
                                    height="70px" viewBox="0 -9 70 70" enable-background="new 0 -9 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path
                                            d="M54.5,17c0.3,0,0.6-0.4,0.6-0.8c0-0.5-0.3-0.8-0.6-0.8H32.1c-0.3,0-0.6,0.4-0.6,0.8c0,0.5,0.3,0.8,0.6,0.8H54.5z" />
                                        <path
                                            d="M26.6,20.9c0,0.5,0.3,0.8,0.6,0.8h27.3c0.3,0,0.6-0.4,0.6-0.8c0-0.5-0.3-0.8-0.6-0.8H27.2C26.9,20.1,26.6,20.4,26.6,20.9z" />
                                        <path
                                            d="M54.5,24.8h-19c-0.3,0-0.6,0.4-0.6,0.8c0,0.5,0.3,0.8,0.6,0.8h19c0.3,0,0.6-0.4,0.6-0.8C55.1,25.1,54.8,24.8,54.5,24.8z" />
                                        <path
                                            d="M31.3,29.2c-0.3-0.8-0.9-1.3-1.7-1.4l-5.5-0.8l-2.5-5c-0.4-0.7-1.1-1.2-1.9-1.2c-0.8,0-1.5,0.5-1.9,1.2l-2.4,5l-5.5,0.8
                                                            c-0.8,0.1-1.5,0.7-1.7,1.4c-0.2,0.8,0,1.6,0.5,2.2l4,3.9l-0.9,5.5c-0.1,0.8,0.2,1.6,0.8,2.1c0.6,0.5,1.5,0.5,2.2,0.2l4.9-2.6
                                                            l4.9,2.6c0.3,0.2,0.6,0.2,1,0.2c0.4,0,0.9-0.1,1.2-0.4c0.6-0.5,1-1.3,0.8-2.1l-0.9-5.5l4-3.9C31.3,30.8,31.5,29.9,31.3,29.2z
                                                                M14.7,34.7L14.7,34.7l-5.1-5l6.9-1l0.1,0l3.1-6.3l3.1,6.3l0,0.1l7,1l-5.1,4.9l1.2,7l-6.2-3.3l-0.1,0l-6.2,3.3L14.7,34.7z" />
                                        <path
                                            d="M58.5,6H21.1c-1.9,0-3.4,1.5-3.4,3.4v6.4l0.1,0c0,0,0.1,0,0.1,0l0.2,0c0.2,0,0.3,0,0.5,0c0.3,0,0.6,0,0.8,0l0.2,0V9.4
                                                            c0-0.9,0.7-1.6,1.5-1.6h37.4c0.8,0,1.6,0.7,1.6,1.6v24.3c0,0.9-0.7,1.6-1.6,1.6h-3.7v6.5l-5.5-6.5H33.7l0,0.1
                                                            c0.1,0.6,0.1,1.1,0,1.6l0,0.1h15.1l7.5,8.9v-8.9h2.2c1.9,0,3.5-1.5,3.5-3.4V9.4C62,7.5,60.4,6,58.5,6z" />
                                    </g>
                                </svg>
                                <p>Testimonials</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-titles.html" target="blank" class="element">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px"
                                    height="70px" viewBox="0 -2.5 70 70" enable-background="new 0 -2.5 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path
                                            d="M25.4,14.6h-1.6l-5.2,15.7h11.9L25.4,14.6z M21.3,28.4l3.3-10.1l3.3,10.1H21.3z" />
                                        <path
                                            d="M36.6,38.4l-8.9-25.7c-0.2-0.7-0.9-1.1-1.6-1.1H23c-0.7,0-1.4,0.5-1.6,1.1l-8.9,25.7c-0.2,0.5-0.1,1.1,0.2,1.5
                                                            c0.3,0.4,0.8,0.7,1.4,0.7H16c0.7,0,1.4-0.5,1.6-1.1l2.1-6.1h9.9l2,6.1c0.2,0.7,0.9,1.1,1.6,1.1H35c0.5,0,1-0.3,1.4-0.7
                                                            C36.7,39.5,36.8,38.9,36.6,38.4z M34.6,38.7h-1.3l-2.4-7.3H18.3l-2.5,7.3h-1.3l8.7-25.2h2.7L34.6,38.7z" />
                                        <path
                                            d="M57.3,51.1H12.7v2.2h44.6c0,0,0,0,0.1,0L57.3,51.1C57.3,51.1,57.3,51.1,57.3,51.1z" />
                                        <path
                                            d="M57.3,53.4H12.6V51l44.9,0l0,0.1v2.3L57.3,53.4C57.3,53.4,57.3,53.4,57.3,53.4z M12.8,53.2h44.4v-2l-44.4,0V53.2z" />
                                        <path
                                            d="M57.3,44.6H12.7v2.2h44.6c0,0,0,0,0.1,0L57.3,44.6C57.3,44.6,57.3,44.6,57.3,44.6z" />
                                        <path
                                            d="M57.3,47H12.6v-2.5l44.9,0l0,0.1V47L57.3,47C57.3,47,57.3,47,57.3,47z M12.8,46.7h44.4v-2l-44.4,0V46.7z" />
                                        <path d="M57.2,34H40v-2.3h17.3C57.2,31.6,57.2,34,57.2,34z" />
                                        <path d="M57.2,40.4H40v-2.3h17.3C57.2,38.1,57.2,40.4,57.2,40.4z" />
                                    </g>
                                </svg>
                                <p>Titles</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-typography.html" target="blank" class="element">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px"
                                    height="70px" viewBox="-8.5 0 70 70" enable-background="new -8.5 0 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path
                                            d="M43.2,12.5H9.8L9.5,29.7l0,0.1h3.8l1.2-4.9c1.2-3.6,3.1-5.4,5.8-5.7h2.3v31.5h-7v6.7h21.9v-6.7h-7.3V19.3h2.5
                                                    c2.8,0,4.7,1.7,5.7,5.1c0,0.2,0.1,0.4,0.1,0.5l1.2,4.9h3.8L43.2,12.5z M28,17.1v33.7h-3.2V17.1h0l0,0l-4.6,0
                                                    c-0.2,0-0.4,0.1-0.7,0.1c-0.2,0-0.5,0.1-0.7,0.1c-3,0.7-5.2,3.1-6.5,7l-0.6,2.3L12,14.7h29l0.2,11.9l-0.3-1l-0.3-1.1l0,0L40.6,24
                                                    c-1.3-4.6-3.9-6.9-7.9-6.9L28,17.1L28,17.1L28,17.1L28,17.1z M17.8,55.3V53h17.5v2.4H17.8z" />
                                    </g>
                                </svg>
                                <p>Typography</p>
                            </a>
                        </div>
                        <div class="mb-4">
                            <a href="element-vendors.html" target="blank" class="element element-vendor">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    id="Layer_1" x="0px" y="0px" width="70px" height="70px" viewBox="0 0 70 70"
                                    xml:space="preserve">
                                    <g>
                                        <path
                                            d="M14.659,51.631h25.517V37.1H14.659V51.631z M24.605,49.461V39.273h6.104v10.188H24.605L24.605,49.461z
                                                        M37.981,49.461h-5.076V39.273h5.076V49.461z M16.854,39.273h5.556v10.188h-5.556V39.273z">
                                        </path>
                                        <path d="M63.642,25.199c-0.172-0.366-0.359-0.773-0.568-1.235l-4.112-8.958l-0.092-0.163
                                                        c-1.034-1.495-2.306-1.81-3.192-1.81L14.245,13c-1.4,0-2.94,1.404-3.333,2.311l-3.978,
                                                        8.667c-0.173,0.396-0.344,0.769-0.509,1.128   C5.63,26.847,5,28.227,5,29.616l0.011,
                                                        0.153c0.465,3.261,2.856,5.542,6.08,5.971v19.086c0,1.198,0.985,2.174,2.196,2.174h44.792
                                                        c1.209,0,2.195-0.976,2.195-2.174V35.382c2.521-0.458,4.324-2.499,4.716-5.463L65,29.778C65,
                                                        28.125,64.488,27.023,63.642,25.199z    M34.414,28.544c0,2.628-2.86,4.765-6.378,4.765c-3.077,
                                                        0-5.577-1.963-5.788-4.434l2.84-13.69l9.329,0.007v13.352H34.414z    M36.608,15.192l8.843,
                                                        0.008l2.852,13.655c-0.169,2.477-2.539,4.455-5.453,4.455c-3.442,0-6.244-2.137-6.244-4.767L36.608,15.192
                                                        L36.608,15.192z M7.197,29.544c0.026-0.912,0.56-2.077,1.23-3.543c0.167-0.365,0.342-0.749,0.513-1.136l3.981-8.673
                                                        c0.144-0.318,0.989-1,1.324-1.02l8.601,0.008l-2.773,13.361h-0.064c0,0.167-0.014,0.331-0.039,0.494l-0.026,0.125h0.001
                                                         c-0.471,2.527-3.767,4.492-7.757,4.492C9.499,33.656,7.592,32.083,7.197,29.544z M45.047,
                                                         54.759V39.273h8.629v15.485H45.047z    M55.869,54.824V37.1H42.85v17.723H13.287v-19.04c3.369-0.269,6.238-1.758,
                                                         7.755-3.843c1.378,2.112,3.993,3.542,6.991,3.542   c3.202,0,5.996-1.429,7.468-3.541c1.449,2.112,4.197,3.541,
                                                         7.349,3.541c2.912,0,5.451-1.463,6.753-3.616   c1.647,1.978,4.757,3.354,8.475,3.583v19.376H55.869z M59.176,
                                                         33.309c-4.685,0-8.642-2.167-8.642-4.732h-0.046l-2.794-13.375   l7.982,0.006c0.354,0,0.82,0.092,1.328,
                                                         0.791l4.067,8.861c0.208,0.46,0.399,0.875,0.575,1.248c0.776,1.677,1.142,2.462,1.156,3.599   C62.48,31.964,
                                                         61.126,33.309,59.176,33.309z">
                                        </path>
                                    </g>
                                </svg>
                                <p>Vendors</p>
                            </a>
                        </div>
                    </div>
                </section>
                <!-- End of Element Section -->
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
@endsection
