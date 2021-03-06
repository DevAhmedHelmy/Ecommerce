<!-- START HEADER NAVIGATION -->
<div class="header-area">
    <div class="container">
        <div class="row upper-nav">

            <div class="col-3 nav-icon pt-3">
                <ul class="social-icons-simple text-left">
                    <li><a href="javascript:void(0)" class="facebook-bg-hvr"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0)" class="twitter-bg-hvr"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
                    <li><a href="javascript:void(0)" class="instagram-bg-hvr"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="col-6 text-center nav-logo pt-3">
                <a href="index-shop.html" class="navbar-brand"><img src="{{asset('frontend/shop/img/logo.jpg')}}" alt="img"></a>
            </div>

            <div class="col-3 nav-utility text-right d-flex justify-content-end align-items-center pt-3">
                <div class="manage-icons d-inline-block">
                        <ul>
                            <li class="d-inline-block">
                                <a id="add_search_box">
                                    <i class="fas fa-search search-sidebar-hover"></i>
                                </a>
                            </li>
                            <li class="d-inline-block mini-menu-card" id="mini-menu-card">
                                <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages4">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                                <div id="sideNavPages4" class="collapse sideNavPages shopping-cart">
                                    <i class="fas fa-caret-up mini-cart-caret"></i>
                                    <div class="mini-cart-header text-left">
                                        <h4>Shopping Cart</h4>
                                    </div>
                                    <div class="mini-cart-body">
                                        <div class="inner-card">
                                            <div class="media">
                                                <div class="img-holder ml-1 mr-2">
                                                    <a href="#"><img src="{{asset('frontend/shop/img/product-listing/p42.1.jpg')}}" class="align-self-center" alt="cartitem"></a>
                                                </div>
                                                <div class="media-body mt-auto mb-auto">
                                                    <h5 class="name"><a href="#">light wear</a></h5>
                                                    <p class="category">light wear Lastest</p>
                                                    <p class="price"><span>$20</span>(x1) <a href="#"> <i class="fa fa-trash dustbin"></i></a></p>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="img-holder ml-1 mr-2">
                                                    <a href="#"><img src="{{asset('frontend/shop/img/product-listing/p44.jpg')}}" class="align-self-center" alt="cartitem"></a>
                                                </div>
                                                <div class="media-body mt-auto mb-auto">
                                                    <h5 class="name"><a href="#">Casual wear</a></h5>
                                                    <p class="category">Casual wear Lastest</p>
                                                    <p class="price"><span>$20</span>(x1) <a href="#"> <i class="fa fa-trash dustbin"></i></a></p>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="img-holder ml-1 mr-2">
                                                    <a href="#"><img src="{{asset('frontend/shop/img/product-listing/p29.jpg')}}" class="align-self-center" alt="cartitem"></a>
                                                </div>
                                                <div class="media-body mt-auto mb-auto">
                                                    <h5 class="name"><a href="#">long Frock</a></h5>
                                                    <p class="category">long Frock Lastest</p>
                                                    <p class="price"><span>$20</span>(x1) <a href="#"> <i class="fa fa-trash dustbin"></i></a></p>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="img-holder ml-1 mr-2">
                                                    <a href="#"><img src="{{asset('frontend/shop/img/product-listing/p43.jpg')}}" class="align-self-center" alt="cartitem"></a>
                                                </div>
                                                <div class="media-body mt-auto mb-auto">
                                                    <h5 class="name"><a href="#">Long shirt</a></h5>
                                                    <p class="category">Log shirt Lastest</p>
                                                    <p class="price"><span>$20</span>(x1) <a href="#"> <i class="fa fa-trash dustbin"></i></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mini-cart-footer">
                                        <div class="subtotal text-center">
                                            <span class="total-title">Total: </span>
                                            <span class="total-price">
                                          <span class="Price-amount">
                                          $135
                                          </span>
                                          </span>
                                        </div>
                                        <div class="actions text-center">
                                            <a href="shop/shop-cart.html" class="btn pink-gradient-btn-into-black">View Bag</a>
                                            <a href="shop/shop-cart.html" class="btn pink-gradient-btn-into-transparent">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="d-inline-block simple-dropdown" id="mini-menu1">
                                <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages1">
                                    <i class="fas fa-th"></i>
                                </a>

                                <div id="sideNavPages1" class="collapse sideNavPages user-utiliity">
                                    <i class="fas fa-caret-up user-utiliity-caret"></i>
                                    <h6 class="user-utiliity-title">@lang('languages')</h6>
                                    <hr>
                                    <ul class="text-left">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item text-dark">
                                              {{ $properties['native'] }}
                                        </a>
                                        @endforeach

                                    </ul>
                                </div>

                            </li>
                            <li class="d-inline-block simple-dropdown" id="mini-menu">
                                <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages5">
                                    <i class="fas fa-th"></i>
                                </a>

                                <div id="sideNavPages5" class="collapse sideNavPages user-utiliity">
                                    <i class="fas fa-caret-up user-utiliity-caret"></i>
                                    <h6 class="user-utiliity-title">@lang('my_account')</h6>
                                    <hr>
                                    <ul class="text-left">
                                        @auth
                                            <li>
                                                <a href="#">@lang('my_account')</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{route('register')}}">@lang('register')</a>
                                            </li>
                                            <li>
                                                <a href="{{route('login')}}">@lang('login')</a>
                                            </li>
                                        @endauth

                                    </ul>
                                </div>

                            </li>
                        </ul>
                 </div>
            </div>

            <div class="col-12 nav-mega">
                <header class="site-header" id="header">
                    <nav class="navbar navbar-expand-md  static-nav">
                        <div class="container position-relative megamenu-custom">
                            <a class="navbar-brand center-brand" href="index.html">
                                <img src="{{asset('frontend/shop/img/logo.jpg')}}" alt="logo" class="logo-scrolled">
                            </a>
                            <div class="collapse navbar-collapse">
                                <ul class="navbar-nav ml-auto mr-auto">
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{url('/')}}">@lang('site.home')</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{route('about')}}">@lang('site.about')</a>
                                    </li>
                                    @if(count(get_categories()) > 0)
                                        @foreach(get_categories() as $category)
                                            @if(!count($category->childs) > 0)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('show.category',$category->id)}}">{{$category->name}}</a>
                                            </li>
                                            @else
                                            <li class="nav-item dropdown static">
                                                <a class="nav-link dropdown-toggle active" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{$category->name}} </a>
                                                <ul class="dropdown-menu megamenu flexable-megamenu">
                                                    <li>
                                                        <div class="container">
                                                            <div class="row">
                                                                @if($category->childs)
                                                                    @foreach($category->childs as $sub_cat)
                                                                        <div class="col-lg-3 col-md-6 col-sm-12 mengmenu_border">

                                                                        <h5 class="dropdown-title"> {{$sub_cat->name}}</h5>
                                                                            <ul>
                                                                                @if($sub_cat->childs)
                                                                                @foreach($sub_cat->childs as $sub_sub_cat)
                                                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="{{route('show.category',$category->id)}}">{{$sub_sub_cat->name}}</a></li>

                                                                                @endforeach
                                                                                @endif
                                                                            </ul>


                                                                        </div>
                                                                    @endforeach
                                                                @endif


                                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                                    <h5 class="dropdown-title text-left">Featured Items </h5>
                                                                    <div class="carousel-menu mt-4">
                                                                        <div class="featured-megamenu-carousel owl-carousel owl-theme">
                                                                            <div class="item ">
                                                                                <img src="{{asset('frontend/shop/img/shop1.jpg')}}" alt="shop-image" >
                                                                            </div>
                                                                            <div class="item">
                                                                                <img src="{{asset('frontend/shop/img/shop2.jpg')}}"  alt="shop-image">
                                                                            </div>
                                                                        </div>
                                                                        <i class="lni-chevron-left ini-customPrevBtn"></i>
                                                                        <i class="lni-chevron-right ini-customNextBtn"></i>
                                                                    </div>
                                                                    <p class="mt-4 megamenu-slider-para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                                                    <a href="shop/product-listing.html" class="btn trans-pink-color-gradient-btn slider-btn text-left">Shop Now</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            @endif
                                        @endforeach
                                    @endif
                                    {{-- <li class="nav-item dropdown static">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> CLOTHES </a>
                                        <ul class="dropdown-menu megamenu flexable-megamenu">
                                            <li>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-12 mengmenu_border">
                                                            <h5 class="dropdown-title bottom10"> General </h5>

                                                            <ul>
                                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-listing.html">Dresses</a></li>
                                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-listing.html">Hoodies & Sweatshirts</a></li>
                                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-listing.html">Top</a></li>
                                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-listing.html">Shoes & Trainers</a></li>
                                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-listing.html">Jeans</a></li>
                                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-listing.html">Shorts</a></li>
                                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-listing.html">Loungewear</a></li>

                                                            </ul>

                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-sm-12 mengmenu_border">
                                                            <h5 class="dropdown-title opacity-10"> Others </h5>
                                                            <ul>
                                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-listing.html">All Clothing</a></li>
                                                                <li><i class="lni-angle-double-right right-arrow"></i> <a class="dropdown-item" href="shop/product-listing.html">Shoes</a></li>
                                                                <li><i class="lni-angle-double-right right-arrow"></i> <a class="dropdown-item" href="shop/product-listing.html">ActiveWear</a></li>
                                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-listing.html">Treading Now</a></li>
                                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-listing.html">Accessories
                                                                </a></li>
                                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-listing.html">Face + Body</a></li>
                                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-listing.html">Back in stock</a></li>
                                                            </ul>

                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-sm-12 mengmenu_border">
                                                            <h5 class="dropdown-title bottom10"> Outlet </h5>

                                                            <div class="media outlet-media mt-3">
                                                                <div class="box">
                                                                    <img class="align-self-start" src="{{asset('frontend/shop/img/product-listing/p42.1.jpg')}}" alt="Generic placeholder image">
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="mt-3 ml-3"><a href="shop/product-listing.html">Modest Fashion</a></h6>
                                                                </div>
                                                            </div>

                                                            <div class="media outlet-media">
                                                                <div class="box">
                                                                    <img class="align-self-start" src="{{asset('frontend/shop/img/product-listing/p54.jpg')}}" alt="Generic placeholder image">
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="mt-3 ml-3"><a href="shop/product-listing.html">Responsible Edit</a></h6>
                                                                </div>
                                                            </div>

                                                            <div class="media outlet-media">
                                                                <div class="box">
                                                                    <img class="align-self-start" src="{{asset('frontend/shop/img/product-listing/p49.jpg')}}" alt="Generic placeholder image">
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="mt-3 ml-3"><a href="shop/product-listing.html">Going Out</a></h6>
                                                                </div>
                                                            </div>


                                                            <div class="media outlet-media">
                                                                <div class="box">
                                                                    <img class="align-self-start" src="{{asset('frontend/shop/img/product-listing/p6.jpg')}}" alt="Generic placeholder image">
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="mt-3 ml-3"><a href="shop/product-listing.html">Holiday</a></h6>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-sm-12 pt-3">

                                                            <a href="javascript:void(0);"><img src="{{asset('frontend/shop/img/product-listing/p10.jpg')}}" alt="image"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li> --}}
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" href="about.html">SHOES</a>-->
<!--                                    </li>-->
                                    {{-- <li class="nav-item dropdown position-relative">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PAGES</a>
                                        <div class="dropdown-menu">
                                            <ul>
                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-listing.html">Listing One</a></li>
                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/product-detail.html">Detail Page</a></li>
                                                <li><i class="lni-angle-double-right right-arrow"></i><a class="dropdown-item" href="shop/standalone.html">StandAlone Page</a></li>
                                            </ul>
                                        </div>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('contact')}}">@lang('site.contact_us')</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!--side menu open button-->
                        <a href="javascript:void(0)" class="d-inline-block sidemenu_btn d-lg-none d-md-block" id="sidemenu_toggle">
                            <span></span> <span></span> <span></span>
                        </a>
                    </nav>


                    <!-- side menu -->
                    <div class="side-menu opacity-0 gradient-bg hidden">
                        <div class="inner-wrapper">
                            <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
                            <nav class="side-nav w-100">
                                <ul class="navbar-nav">

                                    <li class="nav-item">
                                        <a class="nav-link" href="shop/product-listing.html"> Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages1">
                                            Women <i class="fas fa-chevron-down"></i>
                                        </a>
                                        <div id="sideNavPages1" class="collapse sideNavPages">

                                            <ul class="navbar-nav mt-2">
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">WomensWear</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Classic Dress</a></li>
                                                <li class="nav-item" ><a class="nav-link" href="shop/product-listing.html">Nightwear</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Active wear</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Footwear / Shoes</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Coats / Outerwear</a></li>
                                            </ul>
                                            <h5 class="sub-title">1. All Accessories</h5>
                                            <ul class="navbar-nav mt-2">
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Hand Bags</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Belts</a></li>
                                                <li class="nav-item" ><a class="nav-link" href="shop/product-listing.html">Jewellery</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Scarves</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Sun Glasses</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html"> Others</a></li>
                                            </ul>

                                            <h5 class="sub-title">2. Babies</h5>
                                            <ul class="navbar-nav mt-2">
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Baby Clothes</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Baby Footwear</a></li>
                                                <li class="nav-item" ><a class="nav-link" href="shop/product-listing.html">Sleep Suits</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Socks And Tights</a></li>
                                            </ul>

                                            <h5 class="sub-title">3. Shop Collection</h5>
                                            <ul class="navbar-nav mt-2">
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Holiday Shop</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Gifts</a></li>
                                                <li class="nav-item" ><a class="nav-link" href="shop/product-listing.html">Workwear Range</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Essential</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages3">
                                            Clothes <i class="fas fa-chevron-down"></i>
                                        </a>
                                        <div id="sideNavPages3" class="collapse sideNavPages">
                                            <ul class="navbar-nav mt-2">
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Dresses</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html"> Hoodies & Sweatshirts</a></li>
                                                <li class="nav-item" ><a class="nav-link" href="shop/product-listing.html">Top</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Shoes & Trainers</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Jeans</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Shorts</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Loungewear</a></li>
                                            </ul>
                                            <h5 class="sub-title">1. Others</h5>
                                            <ul class="navbar-nav mt-2">
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">All Clothing</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Shoes</a></li>
                                                <li class="nav-item" ><a class="nav-link" href="shop/product-listing.html">ActiveWear</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Treading Now</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Accessories</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Face + Body</a></li>
                                                <li class="nav-item"><a class="nav-link" href="shop/product-listing.html">Back in stock</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="shop/product-listing.html">Shoes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages2">
                                            Pages <i class="fas fa-chevron-down"></i>
                                        </a>
                                        <div id="sideNavPages2" class="collapse sideNavPages">
                                            <ul class="navbar-nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="shop/product-listing.html">Listing One</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="shop/product-detail.html">Detail Page</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="shop/standalone.html">StandAlone Page</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="shop/contact.html">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="side-footer w-100">
                                <ul class="social-icons-simple white top40">
                                    <li><a class="facebook-bg-hvr"  href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                                    <li><a class="twitter-bg-hvr" href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                                    <li><a class="instagram-bg-hvr" href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                                </ul>
                                <p class="whitecolor">&copy; <span id="year"></span> Product Shop. Made With Love by ThemesIndustry</p>
                            </div>
                        </div>
                    </div>
                    <div id="close_side_menu" class="tooltip"></div>
                    <!-- End side menu -->
                </header>
            </div>
        </div>
    </div>
</div>
<!-- END HEADER NAVIGATION -->
