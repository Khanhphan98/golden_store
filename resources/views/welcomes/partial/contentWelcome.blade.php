@extends('welcomes.app')

@section('myJs')
    {{--  Service  --}}
    <script src="{{ url('') }}/js/factory/service/itemService.js"></script>
    <script src="{{ url('') }}/js/factory/service/brandService.js"></script>
    <script src="{{ url('') }}/js/factory/service/categoryService.js"></script>
    {{--  Directive  --}}
    {{--  Ctrl  --}}
    <script src="{{ url('') }}/js/ctrl/contentWCtrl.js"></script>
@endsection()

@section('welcomes')
    <div ng-controller="contentWCtrl">
        <section class="py-0">

            <div class="container">
                <div class="row h-100">
                    <div class="col-lg-7 mx-auto text-center mt-7 mb-5">
                        <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Best Deals</h5>
                    </div>
                    <div class="col-12">
                        <div class="carousel slide" id="carouselBestDeals" data-bs-touch="false" data-bs-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <div class="row h-100 align-items-center g-2">
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div ng-repeat="(key, item) in data.listItems" class="card card-span h-100 text-white">
                                                <img class="img-fluid h-100" src="{{ asset('img/gallery/flat-hill.png') }}" alt="..." />
                                                <div class="card-img-overlay ps-0"></div>
                                                <div class="card-body ps-0 bg-200">
                                                    <h5 class="fw-bold text-1000 text-truncate">@{{ item.itemName }}</h5>
                                                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">
                                                            @{{ item.newPrice }}</span><span class="text-primary">
                                                            @{{ item.oldPrice }}</span>
                                                    </div>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="carousel-item" data-bs-interval="5000">--}}
{{--                                    <div class="row h-100 align-items-center g-2">--}}
{{--                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">--}}
{{--                                            <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('img/gallery/flat-hill.png') }}" alt="..." />--}}
{{--                                                <div class="card-img-overlay ps-0"> </div>--}}
{{--                                                <div class="card-body ps-0 bg-200">--}}
{{--                                                    <h5 class="fw-bold text-1000 text-truncate">Flat Hill Slingback</h5>--}}
{{--                                                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>--}}
{{--                                                </div><a class="stretched-link" href="#"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">--}}
{{--                                            <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('img/gallery/blue-ring.png') }}" alt="..." />--}}
{{--                                                <div class="card-img-overlay ps-0"> </div>--}}
{{--                                                <div class="card-body ps-0 bg-200">--}}
{{--                                                    <h5 class="fw-bold text-1000 text-truncate">Ocean Blue Ring</h5>--}}
{{--                                                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>--}}
{{--                                                </div><a class="stretched-link" href="#"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">--}}
{{--                                            <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('img/gallery/wallet.png') }}" alt="..." />--}}
{{--                                                <div class="card-img-overlay ps-0"> </div>--}}
{{--                                                <div class="card-body ps-0 bg-200">--}}
{{--                                                    <h5 class="fw-bold text-1000 text-truncate">Brown Leathered Wallet</h5>--}}
{{--                                                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>--}}
{{--                                                </div><a class="stretched-link" href="#"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">--}}
{{--                                            <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('img/gallery/wrist-watch.png') }}" alt="..." />--}}
{{--                                                <div class="card-img-overlay ps-0"> </div>--}}
{{--                                                <div class="card-body ps-0 bg-200">--}}
{{--                                                    <h5 class="fw-bold text-1000 text-truncate">Silverside Wristwatch</h5>--}}
{{--                                                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>--}}
{{--                                                </div><a class="stretched-link" href="#"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="carousel-item" data-bs-interval="3000">--}}
{{--                                    <div class="row h-100 align-items-center g-2">--}}
{{--                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">--}}
{{--                                            <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('img/gallery/flat-hill.png') }}" alt="..." />--}}
{{--                                                <div class="card-img-overlay ps-0"> </div>--}}
{{--                                                <div class="card-body ps-0 bg-200">--}}
{{--                                                    <h5 class="fw-bold text-1000 text-truncate">Flat Hill Slingback</h5>--}}
{{--                                                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>--}}
{{--                                                </div><a class="stretched-link" href="#"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">--}}
{{--                                            <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('img/gallery/blue-ring.png') }}" alt="..." />--}}
{{--                                                <div class="card-img-overlay ps-0"> </div>--}}
{{--                                                <div class="card-body ps-0 bg-200">--}}
{{--                                                    <h5 class="fw-bold text-1000 text-truncate">Ocean Blue Ring</h5>--}}
{{--                                                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>--}}
{{--                                                </div><a class="stretched-link" href="#"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">--}}
{{--                                            <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('img/gallery/wallet.png') }}" alt="..." />--}}
{{--                                                <div class="card-img-overlay ps-0"> </div>--}}
{{--                                                <div class="card-body ps-0 bg-200">--}}
{{--                                                    <h5 class="fw-bold text-1000 text-truncate">Brown Leathered Wallet</h5>--}}
{{--                                                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>--}}
{{--                                                </div><a class="stretched-link" href="#"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">--}}
{{--                                            <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('img/gallery/wrist-watch.png') }}" alt="..." />--}}
{{--                                                <div class="card-img-overlay ps-0"> </div>--}}
{{--                                                <div class="card-body ps-0 bg-200">--}}
{{--                                                    <h5 class="fw-bold text-1000 text-truncate">Silverside Wristwatch</h5>--}}
{{--                                                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>--}}
{{--                                                </div><a class="stretched-link" href="#"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="carousel-item">--}}
{{--                                    <div class="row h-100 align-items-center g-2">--}}
{{--                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">--}}
{{--                                            <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('img/gallery/flat-hill.png') }}" alt="..." />--}}
{{--                                                <div class="card-img-overlay ps-0"> </div>--}}
{{--                                                <div class="card-body ps-0 bg-200">--}}
{{--                                                    <h5 class="fw-bold text-1000 text-truncate">Flat Hill Slingback</h5>--}}
{{--                                                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>--}}
{{--                                                </div><a class="stretched-link" href="#"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">--}}
{{--                                            <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('img/gallery/blue-ring.png') }}" alt="..." />--}}
{{--                                                <div class="card-img-overlay ps-0"> </div>--}}
{{--                                                <div class="card-body ps-0 bg-200">--}}
{{--                                                    <h5 class="fw-bold text-1000 text-truncate">Ocean Blue Ring</h5>--}}
{{--                                                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>--}}
{{--                                                </div><a class="stretched-link" href="#"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">--}}
{{--                                            <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('img/gallery/wallet.png') }}" alt="..." />--}}
{{--                                                <div class="card-img-overlay ps-0"> </div>--}}
{{--                                                <div class="card-body ps-0 bg-200">--}}
{{--                                                    <h5 class="fw-bold text-1000 text-truncate">Brown Leathered Wallet</h5>--}}
{{--                                                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>--}}
{{--                                                </div><a class="stretched-link" href="#"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">--}}
{{--                                            <div class="card card-span h-100 text-white"><img class="img-fluid h-100" src="{{ asset('img/gallery/wrist-watch.png') }}" alt="..." />--}}
{{--                                                <div class="card-img-overlay ps-0"> </div>--}}
{{--                                                <div class="card-body ps-0 bg-200">--}}
{{--                                                    <h5 class="fw-bold text-1000 text-truncate">Silverside Wristwatch</h5>--}}
{{--                                                    <div class="fw-bold"><span class="text-600 me-2 text-decoration-line-through">$200</span><span class="text-primary">$175</span></div>--}}
{{--                                                </div><a class="stretched-link" href="#"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="row">
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBestDeals" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselBestDeals" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next </span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center mt-5"> <a class="btn btn-lg btn-dark" href="#!">View All </a></div>
                </div>
            </div>
            <!-- end of .container-->

        </section>

        <section>

            <div class="container">
                <div class="row h-100 g-0">
                    <div class="col-md-6">
                        <div class="bg-300 p-4 h-100 d-flex flex-column justify-content-center">
                            <h4 class="text-800">Exclusive collection 2021</h4>
                            <h1 class="fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">Be exclusive</h1>
                            <p class="mb-5 fs-1">The best everyday option in a Super Saver range within a reasonable price. It is our responsibility to keep you 100 percent stylish. Be smart &amp; , trendy with us.</p>
                            <div class="d-grid gap-2 d-md-block"><a class="btn btn-lg btn-dark" href="#" role="button">Explore</a></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/outfit.png') }}" alt="..." />
                            <div class="card-img-overlay bg-dark-gradient">
                                <div class="d-flex align-items-end justify-content-center h-100"><a class="btn btn-lg text-light fs-1" href="#!" role="button">Outfit
                                        <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"> </path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row h-100 g-2 py-1">
                    <div class="col-md-4">
                        <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/vanity-bag.png') }}" alt="..." />
                            <div class="card-img-overlay bg-dark-gradient">
                                <div class="d-flex align-items-end justify-content-center h-100"><a class="btn btn-lg text-light fs-1" href="#!" role="button">Vanity Bags
                                        <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"> </path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/hat.png') }}" alt="..." />
                            <div class="card-img-overlay bg-dark-gradient">
                                <div class="d-flex align-items-end justify-content-center h-100"><a class="btn btn-lg text-light fs-1" href="#!" role="button">Hats
                                        <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"> </path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/high-heels.png') }}" alt="..." />
                            <div class="card-img-overlay bg-dark-gradient">
                                <div class="d-flex align-items-end justify-content-center h-100"><a class="btn btn-lg text-light fs-1" href="#!" role="button">High Heels
                                        <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"> </path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->
        </section>

        <section class="py-0">
            <div class="container">
                <div class="row h-100">
                    <div class="col-lg-7 mx-auto text-center mb-6">
                        <h5 class="fs-3 fs-lg-5 lh-sm mb-3">Checkout New Arrivals</h5>
                    </div>
                    <div class="col-12">
                        <div class="carousel slide" id="carouselNewArrivals" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <div class="row h-100 align-items-center g-2">
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/full-body.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Flat Hill Slingback</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/formal-coat.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Ocean Blue Ring</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/ocean-blue.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Brown Leathered Wallet</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/sweater.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Silverside Wristwatch</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="5000">
                                    <div class="row h-100 align-items-center g-2">
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/full-body.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Flat Hill Slingback</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/formal-coat.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Ocean Blue Ring</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/ocean-blue.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Brown Leathered Wallet</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/sweater.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Silverside Wristwatch</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="3000">
                                    <div class="row h-100 align-items-center g-2">
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/full-body.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Flat Hill Slingback</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/formal-coat.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Ocean Blue Ring</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/ocean-blue.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Brown Leathered Wallet</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/sweater.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Silverside Wristwatch</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row h-100 align-items-center g-2">
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/full-body.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Flat Hill Slingback</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/formal-coat.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Ocean Blue Ring</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/ocean-blue.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Brown Leathered Wallet</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                                            <div class="card card-span h-100 text-white"><img class="card-img h-100" src="{{ asset('img/gallery/sweater.png') }}" alt="..." />
                                                <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                                                    <h6 class="text-primary">$175</h6>
                                                    <p class="text-400 fs-1">Jumper set for Women</p>
                                                    <h4 class="text-light">Silverside Wristwatch</h4>
                                                </div><a class="stretched-link" href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselNewArrivals" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselNewArrivals" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next </span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection()
