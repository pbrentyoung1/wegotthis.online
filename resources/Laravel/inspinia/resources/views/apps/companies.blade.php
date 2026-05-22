@extends("shared.base", ["title" => "Companies"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Apps", "title" => "Companies"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Apps", "title" => "Companies"])

                <div class="container-fluid">
                    <div class="card border border-default-300 shadow-none mb-base">
                        <div class="card-body">
                            <div class="grid xl:grid-cols-3 gap-base">
                                <div class="col-span-1 lg:pe-2.5">
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--search input-icon text-default-400"></i>
                                        <input class="form-input" placeholder="Search company name..." type="text" />
                                    </div>
                                </div>
                                <div class="xl:col-span-2 lg:ps-2.5">
                                    <div class="flex flex-wrap items-center gap-2.5">
                                        <span class="font-semibold me-2.5">Filter By:</span>
                                        <div class="input-icon-group">
                                            <i class="iconify tabler--map-pin input-icon text-default-400"></i>
                                            <select class="form-select">
                                                <option selected="">Location</option>
                                                <option value="USA">USA</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Germany">Germany</option>
                                                <option value="India">India</option>
                                                <option value="UK">United Kingdom</option>
                                            </select>
                                        </div>
                                        <div class="input-icon-group">
                                            <i class="iconify tabler--briefcase input-icon text-default-400"></i>
                                            <select class="form-select">
                                                <option selected="">Category</option>
                                                <option value="Tech">Tech</option>
                                                <option value="Finance">Finance</option>
                                                <option value="eCommerce">eCommerce</option>
                                                <option value="Healthcare">Healthcare</option>
                                                <option value="Automotive">Automotive</option>
                                            </select>
                                        </div>
                                        <div class="input-icon-group">
                                            <i class="iconify tabler--star input-icon text-default-400"></i>
                                            <select class="form-select">
                                                <option selected="">Rating</option>
                                                <option value="5">5 Stars</option>
                                                <option value="4">4 Stars &amp; Up</option>
                                                <option value="3">3 Stars &amp; Up</option>
                                                <option value="2">2 Stars &amp; Up</option>
                                                <option value="1">1 Star &amp; Up</option>
                                            </select>
                                        </div>
                                        <button class="btn bg-secondary text-white hover:bg-secondary-hover" type="submit">Apply</button>
                                        <div class="ms-auto">
                                            <nav aria-label="Tabs" aria-orientation="horizontal" class="flex items-center gap-x-1" role="tablist">
                                                <button aria-controls="tabs-contact-1" aria-selected="true" class="hs-tab-active:bg-primary hs-tab-active:text-white bg-primary/15 text-primary btn btn-icon active size-9.25!" data-hs-tab="#tabs-contact-1" id="contact-tab-1"
                                                    role="tab" type="button">
                                                    <i class="iconify tabler--category text-lg"></i>
                                                </button>
                                                <button aria-controls="#tabs-contact-2" aria-selected="false" class="hs-tab-active:bg-primary hs-tab-active:text-white bg-primary/15 text-primary btn btn-icon size-9.25!" data-hs-tab="#tabs-contact-2" id="contact-tab-2" role="tab"
                                                    type="button">
                                                    <i class="iconify tabler--list-check text-lg"></i>
                                                </button>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-base mb-5">
                        <div class="card flex flex-row p-5">
                            <img alt="Amazon Logo" class="size-12 me-5" src="/images/logos/amazon.svg" />
                            <div class="grow">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="mb-1.25 font-bold text-lg">Amazon Inc.</h4>
                                        <a class="text-default-400" href="https://www.amazon.com">www.amazon.com</a>
                                    </div>
                                    <a class="btn btn-sm border border-danger text-danger hover:bg-danger hover:text-white rounded-full" href="#!">
                                        <i class="iconify tabler--heart me-1.25"></i>
                                        Follow
                                    </a>
                                </div>
                                <div class="mt-2.5 mb-5 flex flex-wrap gap-2.5">
                                    <span class="badge bg-light text-primary text-2xs">
                                        <i class="iconify tabler--map-pin me-1.25"></i>
                                        Seattle, WA
                                    </span>
                                    <span class="badge bg-light text-success text-2xs">eCommerce</span>
                                </div>
                                <p class="text-default-400 mb-5">Amazon.com, Inc. is an American multinational technology company focusing on e-commerce, cloud computing...</p>
                                <div class="flex justify-between flex-wrap mt-2.5 gap-5">
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Employees</h6>
                                        <span class="font-semibold text-base">1.5M+</span>
                                    </div>
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Revenue</h6>
                                        <span class="font-semibold text-base">$514B</span>
                                    </div>
                                    <div class="text-warning align-self-center fs-lg">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card flex flex-row p-5">
                            <img alt="Apple Logo" class="size-12 me-5" src="/images/logos/apple.svg" />
                            <div class="grow">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="mb-1.25 font-bold text-lg">Apple Inc.</h4>
                                        <a class="text-default-400" href="https://www.apple.com">www.apple.com</a>
                                    </div>
                                    <a class="btn btn-sm border border-danger text-danger hover:bg-danger hover:text-white rounded-full" href="#!">
                                        <i class="iconify tabler--heart me-1.25"></i>
                                        Follow
                                    </a>
                                </div>
                                <div class="mt-2.5 mb-5 flex flex-wrap gap-2.5">
                                    <span class="badge bg-light text-primary text-2xs">
                                        <i class="iconify tabler--map-pin me-1.25"></i>
                                        Cupertino, CA
                                    </span>
                                    <span class="badge bg-light text-success text-2xs">Tech</span>
                                </div>
                                <p class="text-default-400 mb-5">Apple Inc. designs, manufactures, and markets smartphones, personal computers, tablets, and accessories.</p>
                                <div class="flex justify-between flex-wrap mt-2.5 gap-5">
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Employees</h6>
                                        <span class="font-semibold text-base">160K+</span>
                                    </div>
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Revenue</h6>
                                        <span class="font-semibold text-base">$383B</span>
                                    </div>
                                    <div class="text-warning align-self-center fs-lg">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card flex flex-row p-5">
                            <img alt="Walmart Logo" class="size-12 me-5" src="/images/logos/walmart.svg" />
                            <div class="grow">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="mb-1.25 font-bold text-lg">Walmart Inc.</h4>
                                        <a class="text-default-400" href="https://www.walmart.com">www.walmart.com</a>
                                    </div>
                                    <a class="btn btn-sm border border-danger text-danger hover:bg-danger hover:text-white rounded-full" href="#!">
                                        <i class="iconify tabler--heart me-1.25"></i>
                                        Follow
                                    </a>
                                </div>
                                <div class="mt-2.5 mb-5 flex flex-wrap gap-2.5">
                                    <span class="badge bg-light text-primary text-2xs">
                                        <i class="iconify tabler--map-pin me-1.25"></i>
                                        Bentonville, AR
                                    </span>
                                    <span class="badge bg-light text-success text-2xs">Retail</span>
                                </div>
                                <p class="text-default-400 mb-5">Walmart operates a chain of hypermarkets, discount department stores, and grocery stores worldwide.</p>
                                <div class="flex justify-between flex-wrap mt-2.5 gap-5">
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Employees</h6>
                                        <span class="font-semibold text-base">2.1M+</span>
                                    </div>
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Revenue</h6>
                                        <span class="font-semibold text-base">$611B</span>
                                    </div>
                                    <div class="text-warning align-self-center fs-lg">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                        <i class="iconify tabler--star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card flex flex-row items-center p-5">
                            <img alt="Starbucks Logo" class="size-12 me-5" src="/images/logos/starbucks.svg" />
                            <div class="grow">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="mb-1.25 font-bold text-lg">Starbucks</h4>
                                        <a class="text-default-400" href="https://www.starbucks.com">www.starbucks.com</a>
                                    </div>
                                    <a class="btn btn-sm border border-danger text-danger hover:bg-danger hover:text-white rounded-full" href="#!">
                                        <i class="iconify tabler--heart me-1.25"></i>
                                        Follow
                                    </a>
                                </div>
                                <div class="mt-2.5 mb-5 flex flex-wrap gap-2.5">
                                    <span class="badge bg-light text-primary text-2xs">
                                        <i class="iconify tabler--map-pin me-1.25"></i>
                                        Seattle, WA
                                    </span>
                                    <span class="badge bg-light text-success text-2xs">Food &amp; Beverage</span>
                                </div>
                                <p class="text-default-400 mb-5">Starbucks is a multinational chain of coffeehouses and roastery reserves headquartered in Seattle, Washington.</p>
                                <div class="flex justify-between flex-wrap mt-2.5 gap-5">
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Employees</h6>
                                        <span class="font-semibold text-base">400K+</span>
                                    </div>
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Revenue</h6>
                                        <span class="font-semibold text-base">$36B</span>
                                    </div>
                                    <div class="text-warning align-self-center fs-lg">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                        <i class="iconify tabler--star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card flex flex-row items-center p-5">
                            <img alt="Meta Logo" class="size-12 me-5" src="/images/logos/meta.svg" />
                            <div class="grow">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="mb-1.25 font-bold text-lg">Meta Platforms</h4>
                                        <a class="text-default-400" href="https://about.meta.com">about.meta.com</a>
                                    </div>
                                    <a class="btn btn-sm border border-danger text-danger hover:bg-danger hover:text-white rounded-full" href="#!">
                                        <i class="iconify tabler--heart me-1.25"></i>
                                        Follow
                                    </a>
                                </div>
                                <div class="mt-2.5 mb-5 flex flex-wrap gap-2.5">
                                    <span class="badge bg-light text-primary text-2xs">
                                        <i class="iconify tabler--map-pin me-1.25"></i>
                                        Menlo Park, CA
                                    </span>
                                    <span class="badge bg-light text-success text-2xs">Tech</span>
                                </div>
                                <p class="text-default-400 mb-5">Meta develops social media platforms and technologies including Facebook, Instagram, and the Metaverse.</p>
                                <div class="flex justify-between flex-wrap mt-2.5 gap-5">
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Employees</h6>
                                        <span class="font-semibold text-base">86K+</span>
                                    </div>
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Revenue</h6>
                                        <span class="font-semibold text-base">$117B</span>
                                    </div>
                                    <div class="text-warning align-self-center fs-lg">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card flex flex-row items-center p-5">
                            <img alt="Spotify Logo" class="size-12 me-5" src="/images/logos/spotify.svg" />
                            <div class="grow">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="mb-1.25 font-bold text-lg">Spotify</h4>
                                        <a class="text-default-400" href="https://www.spotify.com">www.spotify.com</a>
                                    </div>
                                    <a class="btn btn-sm border border-danger text-danger hover:bg-danger hover:text-white rounded-full" href="#!">
                                        <i class="iconify tabler--heart me-1.25"></i>
                                        Follow
                                    </a>
                                </div>
                                <div class="mt-2.5 mb-5 flex flex-wrap gap-2.5">
                                    <span class="badge bg-light text-primary text-2xs">
                                        <i class="iconify tabler--map-pin me-1.25"></i>
                                        Stockholm, Sweden
                                    </span>
                                    <span class="badge bg-light text-success text-2xs">Entertainment</span>
                                </div>
                                <p class="text-default-400 mb-5">Spotify is a digital music, podcast, and video streaming service with millions of active users worldwide.</p>
                                <div class="flex justify-between flex-wrap mt-2.5 gap-5">
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Employees</h6>
                                        <span class="font-semibold text-base">8K+</span>
                                    </div>
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Revenue</h6>
                                        <span class="font-semibold text-base">$13B</span>
                                    </div>
                                    <div class="text-warning align-self-center fs-lg">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                        <i class="iconify tabler--star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card flex flex-row items-center p-5">
                            <img alt="Google Logo" class="size-12 me-5" src="/images/logos/google.svg" />
                            <div class="grow">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="mb-1.25 font-bold text-lg">Google LLC</h4>
                                        <a class="text-default-400" href="https://www.google.com">www.google.com</a>
                                    </div>
                                    <a class="btn btn-sm border border-danger text-danger hover:bg-danger hover:text-white rounded-full" href="#!">
                                        <i class="iconify tabler--heart me-1.25"></i>
                                        Follow
                                    </a>
                                </div>
                                <div class="mt-2.5 mb-5 flex flex-wrap gap-2.5">
                                    <span class="badge bg-light text-primary text-2xs">
                                        <i class="iconify tabler--map-pin me-1.25"></i>
                                        Mountain View, CA
                                    </span>
                                    <span class="badge bg-light text-success text-2xs">Tech</span>
                                </div>
                                <p class="text-default-400 mb-5">Google specializes in internet-related services and products, including search, ads, cloud, and more.</p>
                                <div class="flex justify-between flex-wrap mt-2.5 gap-5">
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Employees</h6>
                                        <span class="font-semibold text-base">180K+</span>
                                    </div>
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Revenue</h6>
                                        <span class="font-semibold text-base">$324B</span>
                                    </div>
                                    <div class="text-warning align-self-center fs-lg">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card flex flex-row items-center p-5">
                            <img alt="Airbnb Logo" class="size-12 me-5" src="/images/logos/airbnb.svg" />
                            <div class="grow">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="mb-1.25 font-bold text-lg">Airbnb</h4>
                                        <a class="text-default-400" href="https://www.airbnb.com">www.airbnb.com</a>
                                    </div>
                                    <a class="btn btn-sm border border-danger text-danger hover:bg-danger hover:text-white rounded-full" href="#!">
                                        <i class="iconify tabler--heart me-1.25"></i>
                                        Follow
                                    </a>
                                </div>
                                <div class="mt-2.5 mb-5 flex flex-wrap gap-2.5">
                                    <span class="badge bg-light text-primary text-2xs">
                                        <i class="iconify tabler--map-pin me-1.25"></i>
                                        San Francisco, CA
                                    </span>
                                    <span class="badge bg-light text-success text-2xs">Hospitality</span>
                                </div>
                                <p class="text-default-400 mb-5">Airbnb is a global platform for lodging, primarily homestays for vacation rentals and tourism activities.</p>
                                <div class="flex justify-between flex-wrap mt-2.5 gap-5">
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Employees</h6>
                                        <span class="font-semibold text-base">6K+</span>
                                    </div>
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Revenue</h6>
                                        <span class="font-semibold text-base">$9.9B</span>
                                    </div>
                                    <div class="text-warning align-self-center fs-lg">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                        <i class="iconify tabler--star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card flex flex-row items-center p-5">
                            <img alt="Shell Logo" class="size-12 me-5" src="/images/logos/shell.svg" />
                            <div class="grow">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="mb-1.25 font-bold text-lg">Shell plc</h4>
                                        <a class="text-default-400" href="https://www.shell.com">www.shell.com</a>
                                    </div>
                                    <a class="btn btn-sm border border-danger text-danger hover:bg-danger hover:text-white rounded-full" href="#!">
                                        <i class="iconify tabler--heart me-1.25"></i>
                                        Follow
                                    </a>
                                </div>
                                <div class="mt-2.5 mb-5 flex flex-wrap gap-2.5">
                                    <span class="badge bg-light text-primary text-2xs">
                                        <i class="iconify tabler--map-pin me-1.25"></i>
                                        London, UK
                                    </span>
                                    <span class="badge bg-light text-success text-2xs">Energy</span>
                                </div>
                                <p class="text-default-400 mb-5">Shell is a global energy and petrochemical company focused on oil, gas, and renewable energy solutions.</p>
                                <div class="flex justify-between flex-wrap mt-2.5 gap-5">
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Employees</h6>
                                        <span class="font-semibold text-base">90K+</span>
                                    </div>
                                    <div>
                                        <h6 class="text-default-400 mb-2 text-xs">Revenue</h6>
                                        <span class="font-semibold text-base">$381B</span>
                                    </div>
                                    <div class="text-warning align-self-center fs-lg">
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star-filled"></i>
                                        <i class="iconify tabler--star"></i>
                                        <i class="iconify tabler--star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Pagination" class="flex items-center justify-center gap-1.5">
                        <button aria-label="Previous" class="btn btn-icon bg-card border-default-300 hover:bg-default-50 hover:text-primary rounded-full" type="button">
                            <span>«</span>
                        </button>
                        <button class="btn btn-icon bg-primary rounded-full text-white" type="button">1</button>
                        <button class="btn btn-icon bg-card hover:bg-default-50 border-default-300 hover:text-primary rounded-full" type="button">2</button>
                        <button class="btn btn-icon bg-card hover:bg-default-50 border-default-300 hover:text-primary rounded-full" type="button">3</button>
                        <button class="btn btn-icon bg-card hover:bg-default-50 border-default-300 hover:text-primary rounded-full" type="button">4</button>
                        <button class="btn btn-icon bg-card hover:bg-default-50 border-default-300 hover:text-primary rounded-full" type="button">5</button>
                        <button aria-label="Next" class="btn btn-icon bg-card border-default-300 hover:bg-default-50 hover:text-primary rounded-full" type="button">
                            <span>»</span>
                        </button>
                    </nav>
                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection

@section("scripts")
@endsection
