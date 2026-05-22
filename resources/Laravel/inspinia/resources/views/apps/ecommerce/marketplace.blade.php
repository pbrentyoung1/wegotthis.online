@extends("shared.base", ["title" => "Marketplace"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Ecommerce", "title" => "Marketplace"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Ecommerce", "title" => "Marketplace"])

                <div class="container">
                    <div class="grid grid-cols-1 pt-6 md:grid-cols-2 lg:grid-cols-3 gap-base mb-base">
                        <div class="bg-primary/10 flex justify-between rounded px-6 pt-6">
                            <div>
                                <h5 class="mb-5 font-semibold">For Men</h5>
                                <ul class="list-unstyled text-body">
                                    <li>
                                        <a class="block py-1.5" href="#">Sports suits</a>
                                    </li>
                                    <li>
                                        <a class="block py-1.5" href="#">Trousers</a>
                                    </li>
                                    <li>
                                        <a class="block py-1.5" href="#">Jackets and coats</a>
                                    </li>
                                    <li>
                                        <a class="block py-1.5" href="#">Shirts</a>
                                    </li>
                                </ul>
                                <a class="text-default-700 hover:text-primary my-5 inline-flex items-center gap-0.5 font-semibold" href="{{ url("/apps/ecommerce/products-grid") }}">
                                    View All
                                    <i class="iconify tabler--arrow-right text-base"></i>
                                </a>
                            </div>
                            <img alt="For men" class="mt-auto" src="/images/products/man.png" style="max-height: 220px" />
                        </div>
                        <div class="bg-warning/10 flex justify-between rounded px-6 pt-6">
                            <div>
                                <h5 class="mb-5 font-semibold">For Women</h5>
                                <ul class="list-unstyled text-body">
                                    <li>
                                        <a class="block py-1.5" href="#">Dresses</a>
                                    </li>
                                    <li>
                                        <a class="block py-1.5" href="#">Pants and jeans</a>
                                    </li>
                                    <li>
                                        <a class="block py-1.5" href="#">Shirts and blouses</a>
                                    </li>
                                    <li>
                                        <a class="block py-1.5" href="#">Sweatshirts</a>
                                    </li>
                                </ul>
                                <a class="text-default-700 hover:text-primary my-5 inline-flex items-center gap-0.5 font-semibold" href="{{ url("/apps/ecommerce/products-grid") }}">
                                    View All
                                    <i class="iconify tabler--arrow-right text-base"></i>
                                </a>
                            </div>
                            <img alt="For women" class="mt-auto" src="/images/products/women.png" style="max-height: 220px" />
                        </div>
                        <div class="bg-danger/10 flex justify-between rounded px-6 pt-6">
                            <div>
                                <h5 class="mb-5 font-semibold">Accessories</h5>
                                <ul class="list-unstyled text-body">
                                    <li>
                                        <a class="block py-1.5" href="#">Caps and hats</a>
                                    </li>
                                    <li>
                                        <a class="block py-1.5" href="#">Sunglasses</a>
                                    </li>
                                    <li>
                                        <a class="block py-1.5" href="#">Handbags</a>
                                    </li>
                                    <li>
                                        <a class="block py-1.5" href="#">Jewelry</a>
                                    </li>
                                </ul>
                                <a class="text-default-700 hover:text-primary my-5 inline-flex items-center gap-0.5 font-semibold" href="{{ url("/apps/ecommerce/products-grid") }}">
                                    View All
                                    <i class="iconify tabler--arrow-right text-base"></i>
                                </a>
                            </div>
                            <img alt="Accessories" class="mt-auto" src="/images/products/hanbag.png" style="max-height: 220px" />
                        </div>
                    </div>
                    <div class="pt-7.5">
                        <span class="text-default-400 block text-center">👕 Discover styles tailored for everyone</span>
                        <h3 class="mt-3 mb-7.5 text-center text-2xl font-bold">
                            Find Your
                            <mark class="bg-warning/15 text-default-800">Perfect Style</mark>
                        </h3>
                        <div class="flex justify-center gap-1.5 pt-1.5">
                            <a class="badge rounded-full border border-dark/20 text-xs text-dark px-6 py-1 font-semibold" href="#!">Best Sellers</a>
                            <a class="badge rounded-full border border-dark/20 text-xs text-default-400 px-6 py-1 font-semibold" href="#!">New Arrived</a>
                            <a class="badge rounded-full border border-dark/20 text-xs text-default-400 px-6 py-1 font-semibold" href="#!">Sale Items</a>
                            <a class="badge rounded-full border border-dark/20 text-xs text-default-400 px-6 py-1 font-semibold" href="#!">Top Rated</a>
                        </div>
                    </div>
                    <div class="my-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-base">
                        <div class="card relative h-full!">
                            <div class="badge py-0 badge-label rounded text-xs bg-success text-white absolute start-0 top-0 m-6">15% OFF</div>
                            <div class="card-body h-full!">
                                <div class="p-6">
                                    <img alt="modern-sofa" class="img-fluid" src="/images/products/1.png" />
                                </div>
                                <h6 class="card-title mb-3">
                                    <a class="hover:text-primary" href="{{ url("/apps/ecommerce/product-details") }}">Modern Minimalist Fabric Sofa Single Seater</a>
                                </h6>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-warning">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                        <i class="iconify tabler--star"></i>
                                    </span>
                                    <span>
                                        <a class="hover:text-primary font-semibold" href="{{ url("/apps/ecommerce/reviews") }}">(45)</a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer border-dashed">
                                <div class="flex w-full justify-between">
                                    <h4 class="text-success flex items-center gap-3 text-lg">
                                        <span class="text-default-400 line-through">$899.00</span>
                                        $764.15
                                    </h4>
                                    <div>
                                        <a class="btn btn-icon size-7.75 bg-primary text-white hover:bg-primary-hover" href="#!">
                                            <i class="iconify tabler--basket text-base"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card relative h-full!">
                            <div class="badge py-0 badge-label rounded text-xs bg-danger text-white absolute start-0 top-0 m-6">25% OFF</div>
                            <div class="card-body h-full!">
                                <div class="p-6">
                                    <img alt="funky-shoes" class="img-fluid" src="/images/products/2.png" />
                                </div>
                                <h6 class="card-title mb-3">
                                    <a class="hover:text-primary" href="{{ url("/apps/ecommerce/product-details") }}">Funky Streetwear Sneakers - Neon Splash</a>
                                </h6>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-warning">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                        <i class="iconify tabler--star"></i>
                                    </span>
                                    <span>
                                        <a class="hover:text-primary font-semibold" href="{{ url("/apps/ecommerce/reviews") }}">(32)</a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer border-dashed">
                                <div class="flex w-full justify-between">
                                    <h4 class="text-danger flex items-center gap-3 text-lg">
                                        <span class="text-default-400 line-through">$59.99</span>
                                        $44.99
                                    </h4>
                                    <div>
                                        <a class="btn btn-icon size-7.75 bg-primary text-white hover:bg-primary-hover" href="#!">
                                            <i class="iconify tabler--basket text-base"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card relative h-full!">
                            <div class="badge py-0 badge-label rounded text-xs bg-danger text-white absolute start-0 top-0 m-6">15% OFF</div>
                            <div class="card-body h-full!">
                                <div class="p-6">
                                    <img alt="earbuds" class="img-fluid" src="/images/products/3.png" />
                                </div>
                                <h6 class="card-title mb-3">
                                    <a class="hover:text-primary" href="{{ url("/apps/ecommerce/product-details") }}">Noise Canceling Wireless Earbuds - Black Edition</a>
                                </h6>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-warning">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                        <i class="iconify tabler--star"></i>
                                    </span>
                                    <span>
                                        <a class="hover:text-primary font-semibold" href="{{ url("/apps/ecommerce/reviews") }}">(58)</a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer border-dashed">
                                <div class="flex w-full justify-between">
                                    <h4 class="text-danger flex items-center gap-3 text-lg">
                                        <span class="text-default-400 line-through">$49.99</span>
                                        $42.49
                                    </h4>
                                    <div>
                                        <a class="btn btn-icon size-7.75 bg-primary text-white hover:bg-primary-hover" href="#!">
                                            <i class="iconify tabler--basket text-base"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card relative h-full!">
                            <div class="badge py-0 badge-label rounded text-xs bg-danger text-white absolute start-0 top-0 m-6">20% OFF</div>
                            <div class="card-body h-full!">
                                <div class="p-6">
                                    <img alt="wooden-chair" class="img-fluid" src="/images/products/4.png" />
                                </div>
                                <h6 class="card-title mb-3">
                                    <a class="hover:text-primary" href="{{ url("/apps/ecommerce/product-details") }}">Minimalist Solid Wood Dining Chair</a>
                                </h6>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-warning">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                        <i class="iconify tabler--star"></i>
                                    </span>
                                    <span>
                                        <a class="hover:text-primary font-semibold" href="{{ url("/apps/ecommerce/reviews") }}">(46)</a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer border-dashed">
                                <div class="flex w-full justify-between">
                                    <h4 class="text-danger flex items-center gap-3 text-lg">
                                        <span class="text-default-400 line-through">$120.00</span>
                                        $96.00
                                    </h4>
                                    <div>
                                        <a class="btn btn-icon size-7.75 bg-primary text-white hover:bg-primary-hover" href="#!">
                                            <i class="iconify tabler--basket text-base"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card relative h-full!">
                            <div class="badge py-0 badge-label rounded text-xs bg-danger text-white absolute start-0 top-0 m-6">20% OFF</div>
                            <div class="card-body h-full!">
                                <div class="p-6">
                                    <img alt="black-wall-watch" class="img-fluid" src="/images/products/5.png" />
                                </div>
                                <h6 class="card-title mb-3">
                                    <a class="hover:text-primary" href="{{ url("/apps/ecommerce/product-details") }}">Modern Black Minimalist Wall Clock</a>
                                </h6>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-warning">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                    </span>
                                    <span>
                                        <a class="hover:text-primary font-semibold" href="{{ url("/apps/ecommerce/reviews") }}">(62)</a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer border-dashed">
                                <div class="flex w-full justify-between">
                                    <h4 class="text-danger flex items-center gap-3 text-lg">
                                        <span class="text-default-400 line-through">$49.99</span>
                                        $39.99
                                    </h4>
                                    <div>
                                        <a class="btn btn-icon size-7.75 bg-primary text-white hover:bg-primary-hover" href="#!">
                                            <i class="iconify tabler--basket text-base"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card relative h-full!">
                            <div class="badge py-0 badge-label rounded text-xs bg-danger text-white absolute start-0 top-0 m-6">20% OFF</div>
                            <div class="card-body h-full!">
                                <div class="p-6">
                                    <img alt="brown-chair" class="img-fluid" src="/images/products/6.png" />
                                </div>
                                <h6 class="card-title mb-3">
                                    <a class="hover:text-primary" href="{{ url("/apps/ecommerce/product-details") }}">Elegant Brown Wooden Chair</a>
                                </h6>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-warning">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                    </span>
                                    <span>
                                        <a class="hover:text-primary font-semibold" href="{{ url("/apps/ecommerce/reviews") }}">(48)</a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer border-dashed">
                                <div class="flex w-full justify-between">
                                    <h4 class="text-danger flex items-center gap-3 text-lg">
                                        <span class="text-default-400 line-through">$120.00</span>
                                        $96.00
                                    </h4>
                                    <div>
                                        <a class="btn btn-icon size-7.75 bg-primary text-white hover:bg-primary-hover" href="#!">
                                            <i class="iconify tabler--basket text-base"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card relative h-full!">
                            <div class="badge py-0 badge-label rounded text-xs bg-danger text-white absolute start-0 top-0 m-6">20% OFF</div>
                            <div class="card-body h-full!">
                                <div class="p-6">
                                    <img alt="imac" class="img-fluid" src="/images/products/7.png" />
                                </div>
                                <h6 class="card-title mb-3">
                                    <a class="hover:text-primary" href="{{ url("/apps/ecommerce/product-details") }}">Apple iMac 24" Retina 4.5K Display</a>
                                </h6>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-warning">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                    </span>
                                    <span>
                                        <a class="hover:text-primary font-semibold" href="{{ url("/apps/ecommerce/reviews") }}">(65)</a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer border-dashed">
                                <div class="flex w-full justify-between">
                                    <h4 class="text-danger flex items-center gap-3 text-lg">
                                        <span class="text-default-400 line-through">$1,299.00</span>
                                        $1,039.20
                                    </h4>
                                    <div>
                                        <a class="btn btn-icon size-7.75 bg-primary text-white hover:bg-primary-hover" href="#!">
                                            <i class="iconify tabler--basket text-base"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card relative h-full!">
                            <div class="badge py-0 badge-label rounded text-xs bg-danger text-white absolute start-0 top-0 m-6">20% OFF</div>
                            <div class="card-body h-full!">
                                <div class="p-6">
                                    <img alt="coolest-chair" class="img-fluid" src="/images/products/8.png" />
                                </div>
                                <h6 class="card-title mb-3">
                                    <a class="hover:text-primary" href="{{ url("/apps/ecommerce/product-details") }}">Coolest Ergonomic Lounge Chair</a>
                                </h6>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-warning">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                    </span>
                                    <span>
                                        <a class="hover:text-primary font-semibold" href="{{ url("/apps/ecommerce/reviews") }}">(52)</a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer border-dashed">
                                <div class="flex w-full justify-between">
                                    <h4 class="text-danger flex items-center gap-3 text-lg">
                                        <span class="text-default-400 line-through">$320.00</span>
                                        $256.00
                                    </h4>
                                    <div>
                                        <a class="btn btn-icon size-7.75 bg-primary text-white hover:bg-primary-hover" href="#!">
                                            <i class="iconify tabler--basket text-base"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <a class="btn bg-success mt-5 text-white hover:bg-success-hover" href="{{ url("/apps/ecommerce/products-grid") }}">
                            View More products
                            <i class="iconify tabler--arrow-right text-base"></i>
                        </a>
                    </div>
                    <div class="pt-7.5 text-center">
                        <h3 class="mb-3 text-2xl font-bold">
                            Shop by
                            <mark class="bg-warning/15">Brand</mark>
                        </h3>
                        <span class="text-default-400 inline-block">🏷️ Discover trusted names loved by millions</span>
                    </div>
                    <div class="mx-auto mt-7.5 mb-15 lg:w-5xl">
                        <div class="flex gap-base flex-wrap justify-center">
                            <div class="border-default-300 rounded border p-6">
                                <a class="block" href="#!">
                                    <img alt="logo" class="block h-10.5" src="/images/clients/01.svg" />
                                </a>
                            </div>
                            <div class="border-default-300 rounded border p-6">
                                <a class="block" href="#!">
                                    <img alt="logo" class="block h-10.5" src="/images/clients/02.svg" />
                                </a>
                            </div>
                            <div class="border-default-300 rounded border p-6">
                                <a class="block" href="#!">
                                    <img alt="logo" class="block h-10.5" src="/images/clients/03.svg" />
                                </a>
                            </div>
                            <div class="border-default-300 rounded border p-6">
                                <a class="block" href="#!">
                                    <img alt="logo" class="block h-10.5" src="/images/clients/04.svg" />
                                </a>
                            </div>
                            <div class="border-default-300 rounded border p-6">
                                <a class="block" href="#!">
                                    <img alt="logo" class="block h-10.5" src="/images/clients/05.svg" />
                                </a>
                            </div>
                            <div class="border-default-300 rounded border p-6">
                                <a class="block" href="#!">
                                    <img alt="logo" class="block h-10.5" src="/images/clients/06.svg" />
                                </a>
                            </div>
                            <div class="border-default-300 rounded border p-6">
                                <a class="block" href="#!">
                                    <img alt="logo" class="block h-10.5" src="/images/clients/07.svg" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection

@section("scripts")
@endsection
