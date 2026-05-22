@extends("shared.base", ["title" => "Team Board"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Apps", "title" => "Team Board"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                <div class="container-fluid">
                    <div class="xl:w-5/6 mx-auto">
                        <div class="my-5 flex items-center justify-between">
                            <div class="grow">
                                <h4 class="mb-1.25 page-main-title">Manage Teams</h4>
                                <p class="text-default-400">Assign roles to streamline teamwork and secure access.</p>
                            </div>
                            <div class="text-end">
                                <a aria-controls="addTeamModal" aria-expanded="false" aria-haspopup="dialog" class="btn bg-success text-white hover:bg-success-hover" data-hs-overlay="#addTeamModal" href="#addTeamModal"> <i class="iconify tabler--plus"></i> Add New Team </a>
                            </div>
                        </div>
                        <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-base">
                            <div class="card h-full">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        IT-01 - Design Team
                                        <span class="badge badge-label ms-2.5 text-white bg-primary">New</span>
                                    </h4>
                                    <div class="ms-auto relative">
                                        <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                                            <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle text-default-400" type="button">
                                                <i class="iconify tabler--dots-vertical size-4.5"></i>
                                            </button>
                                            <div aria-orientation="vertical" class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-44 px-0 py-1" role="menu">
                                                <div class="space-y-0.5">
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-default-600 hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--eye"></i>
                                                        View
                                                    </a>
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-default-600 hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--edit"></i>
                                                        Edit
                                                    </a>
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-danger hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--trash"></i>
                                                        Remove
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2.5 text-default-400 text-sm">Total 4 members</p>
                                    <div class="flex mb-5">
                                        <div>
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-7.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-8.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-9.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-10.jpg" />
                                        </div>
                                    </div>
                                    <div class="pb-5">
                                        <h5 class="mb-2.5">About Team:</h5>
                                        <p class="text-default-400 mb-4">The Design Team focuses on creating intuitive user experiences and visually appealing interfaces. We handle UI/UX design, prototyping, and brand consistency across all digital products.</p>
                                    </div>
                                    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-base">
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--layout-kanban text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Projects</h6>
                                                <p class="font-medium">25</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--medal text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Ranking</h6>
                                                <p class="font-medium">#5</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--wallet text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Budgets</h6>
                                                <p class="font-medium">$20.3M</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-5">
                                        <div class="flex items-center justify-between mb-2.5">
                                            <p class="text-default-400 font-semibold text-xs">Status of current project</p>
                                            <p class="font-semibold">65%</p>
                                        </div>
                                        <div class="w-full h-2 bg-default-100 rounded-full overflow-hidden">
                                            <div class="bg-primary h-full w-[65%]"></div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-default-400 text-xs flex items-center">
                                            <i class="iconify tabler--clock me-1.25"></i>
                                            Updated 1 hour ago
                                        </span>
                                        <a class="btn btn-sm bg-primary text-white rounded-full" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card h-full">
                                <div class="card-header">
                                    <h4 class="card-title">IT-02 - Development Team</h4>
                                    <div class="ms-auto relative">
                                        <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                                            <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle text-default-400" type="button">
                                                <i class="iconify tabler--dots-vertical size-4.5"></i>
                                            </button>
                                            <div aria-orientation="vertical" class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-44 px-0 py-1" role="menu">
                                                <div class="space-y-0.5">
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-default-600 hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--eye"></i>
                                                        View
                                                    </a>
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-default-600 hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--edit"></i>
                                                        Edit
                                                    </a>
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-danger hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--trash"></i>
                                                        Remove
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2.5 text-default-400 text-sm">Total 6 members</p>
                                    <div class="flex mb-5">
                                        <div>
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-1.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-2.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-3.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-4.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-5.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-6.jpg" />
                                        </div>
                                    </div>
                                    <div class="pb-5">
                                        <h5 class="mb-2.5">About Team:</h5>
                                        <p class="text-default-400 mb-4">
                                            The Development Team builds and maintains core product features, ensuring robust performance, scalability, and code quality across all platforms. We specialize in full-stack development and agile delivery.
                                        </p>
                                    </div>
                                    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-base">
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--layout-kanban text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Projects</h6>
                                                <p class="font-medium">42</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--medal text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Ranking</h6>
                                                <p class="font-medium">#2</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--wallet text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Budgets</h6>
                                                <p class="font-medium">$32.7M</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-5">
                                        <div class="flex items-center justify-between mb-2.5">
                                            <p class="text-default-400 font-semibold text-xs">Status of current project</p>
                                            <p class="font-semibold">78%</p>
                                        </div>
                                        <div class="w-full h-2 bg-default-100 rounded-full overflow-hidden">
                                            <div class="bg-primary h-full w-[78%]"></div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-default-400 text-xs flex items-center">
                                            <i class="iconify tabler--clock me-1.25"></i>
                                            Updated 30 mins ago
                                        </span>
                                        <a class="btn btn-sm bg-primary text-white rounded-full" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card h-full">
                                <div class="card-header">
                                    <h4 class="card-title">IT-03 - Administrator Team</h4>
                                    <div class="ms-auto relative">
                                        <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                                            <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle text-default-400" type="button">
                                                <i class="iconify tabler--dots-vertical size-4.5"></i>
                                            </button>
                                            <div aria-orientation="vertical" class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-44 px-0 py-1" role="menu">
                                                <div class="space-y-0.5">
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-default-600 hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--eye"></i>
                                                        View
                                                    </a>
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-default-600 hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--edit"></i>
                                                        Edit
                                                    </a>
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-danger hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--trash"></i>
                                                        Remove
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2.5 text-default-400 text-sm">Total 3 members</p>
                                    <div class="flex mb-5">
                                        <div>
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-10.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-9.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-8.jpg" />
                                        </div>
                                    </div>
                                    <div class="pb-5">
                                        <h5 class="mb-2.5">About Team:</h5>
                                        <p class="text-default-400 mb-4">The Administrator Team manages system settings, user roles, permissions, and ensures data security and compliance across platforms.</p>
                                    </div>
                                    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-base">
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--list-details text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Tasks</h6>
                                                <p class="font-medium">18</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--medal text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Ranking</h6>
                                                <p class="font-medium">#6</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--user-hexagon text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Access</h6>
                                                <p class="font-medium">Full</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-5">
                                        <div class="flex items-center justify-between mb-2.5">
                                            <p class="text-default-400 font-semibold text-xs">Status of current ops</p>
                                            <p class="font-semibold">53%</p>
                                        </div>
                                        <div class="w-full h-2 bg-default-100 rounded-full overflow-hidden">
                                            <div class="bg-primary h-full w-[53%]"></div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-default-400 text-xs flex items-center">
                                            <i class="iconify tabler--clock me-1.25"></i>
                                            Updated 45 mins ago
                                        </span>
                                        <a class="btn btn-sm bg-primary text-white rounded-full" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card h-full">
                                <div class="card-header">
                                    <h4 class="card-title">IT-04 - Finance Team</h4>
                                    <div class="ms-auto relative">
                                        <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                                            <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle text-default-400" type="button">
                                                <i class="iconify tabler--dots-vertical size-4.5"></i>
                                            </button>
                                            <div aria-orientation="vertical" class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-44 px-0 py-1" role="menu">
                                                <div class="space-y-0.5">
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-default-600 hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--eye"></i>
                                                        View
                                                    </a>
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-default-600 hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--edit"></i>
                                                        Edit
                                                    </a>
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-danger hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--trash"></i>
                                                        Remove
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2.5 text-default-400 text-sm">Total 5 members</p>
                                    <div class="flex mb-5">
                                        <div>
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-2.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-10.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-8.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-3.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-1.jpg" />
                                        </div>
                                    </div>
                                    <div class="pb-5">
                                        <h5 class="mb-2.5">About Team:</h5>
                                        <p class="text-default-400 mb-4">The Finance Team handles budgeting, forecasts, and financial analysis. We ensure transparency and strategic alignment with business goals.</p>
                                    </div>
                                    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-base">
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--report text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Reports</h6>
                                                <p class="font-medium">30</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--medal text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Ranking</h6>
                                                <p class="font-medium">#3</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--wallet text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Budgets</h6>
                                                <p class="font-medium">$28.9M</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-5">
                                        <div class="flex items-center justify-between mb-2.5">
                                            <p class="text-default-400 font-semibold text-xs">Q2 Audit Progress</p>
                                            <p class="font-semibold">72%</p>
                                        </div>
                                        <div class="w-full h-2 bg-default-100 rounded-full overflow-hidden">
                                            <div class="bg-primary h-full w-[72%]"></div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-default-400 text-xs flex items-center">
                                            <i class="iconify tabler--clock me-1.25"></i>
                                            Updated 20 mins ago
                                        </span>
                                        <a class="btn btn-sm bg-primary text-white rounded-full" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card h-full">
                                <div class="card-header">
                                    <h4 class="card-title">IT-05 - Marketing Team</h4>
                                    <div class="ms-auto relative">
                                        <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                                            <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle text-default-400" type="button">
                                                <i class="iconify tabler--dots-vertical size-4.5"></i>
                                            </button>
                                            <div aria-orientation="vertical" class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-44 px-0 py-1" role="menu">
                                                <div class="space-y-0.5">
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-default-600 hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--eye"></i>
                                                        View
                                                    </a>
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-default-600 hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--edit"></i>
                                                        Edit
                                                    </a>
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-danger hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--trash"></i>
                                                        Remove
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2.5 text-default-400 text-sm">Total 7 members</p>
                                    <div class="flex mb-5">
                                        <div>
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-9.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-3.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-5.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-7.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-10.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-1.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-2.jpg" />
                                        </div>
                                    </div>
                                    <div class="pb-5">
                                        <h5 class="mb-2.5">About Team:</h5>
                                        <p class="text-default-400 mb-4">The Marketing Team manages branding, campaigns, and audience engagement. We drive growth through creative storytelling and data-driven strategies.</p>
                                    </div>
                                    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-base">
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--speakerphone text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Campaigns</h6>
                                                <p class="font-medium">18</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--chart-donut text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Reach</h6>
                                                <p class="font-medium">1.2M</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--wallet text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Budgets</h6>
                                                <p class="font-medium">$12.4M</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-5">
                                        <div class="flex items-center justify-between mb-2.5">
                                            <p class="text-default-400 font-semibold text-xs">Campaign Completion</p>
                                            <p class="font-semibold">60%</p>
                                        </div>
                                        <div class="w-full h-2 bg-default-100 rounded-full overflow-hidden">
                                            <div class="bg-primary h-full w-[60%]"></div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-default-400 text-xs flex items-center">
                                            <i class="iconify tabler--clock me-1.25"></i>
                                            Updated 45 mins ago
                                        </span>
                                        <a class="btn btn-sm bg-primary text-white rounded-full" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card h-full">
                                <div class="card-header">
                                    <h4 class="card-title">IT-06 - Graphic Team</h4>
                                    <div class="ms-auto relative">
                                        <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                                            <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle text-default-400" type="button">
                                                <i class="iconify tabler--dots-vertical size-4.5"></i>
                                            </button>
                                            <div aria-orientation="vertical" class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-44 px-0 py-1" role="menu">
                                                <div class="space-y-0.5">
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-default-600 hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--eye"></i>
                                                        View
                                                    </a>
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-default-600 hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--edit"></i>
                                                        Edit
                                                    </a>
                                                    <a class="flex items-center gap-x-2.5 py-1.5 px-3.75 text-danger hover:bg-default-100 focus:outline-hidden focus:bg-default-100" href="#">
                                                        <i class="iconify tabler--trash"></i>
                                                        Remove
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2.5 text-default-400 text-sm">Total 5 members</p>
                                    <div class="flex mb-5">
                                        <div>
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-9.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-1.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-10.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-7.jpg" />
                                        </div>
                                        <div class="-ms-2">
                                            <img alt="" class="rounded-full size-8 hover:-translate-y-0.5 transition-all duration-200" src="/images/users/user-6.jpg" />
                                        </div>
                                    </div>
                                    <div class="pb-5">
                                        <h5 class="mb-2.5">About Team:</h5>
                                        <p class="text-default-400 mb-4">The Graphic Team brings visual concepts to life. We handle illustrations, digital , brand collateral, and motion graphics to support product and marketing teams.</p>
                                    </div>
                                    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-base">
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--brush text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Designs</h6>
                                                <p class="font-medium">36</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--photo text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Assets</h6>
                                                <p class="font-medium">89</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2.5">
                                            <div>
                                                <span class="flex justify-center items-center size-8 bg-light rounded-full">
                                                    <i class="iconify tabler--wallet text-primary size-4"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-1.25 text-default-400 text-xs uppercase">Budgets</h6>
                                                <p class="font-medium">$8.1M</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-5">
                                        <div class="flex items-center justify-between mb-2.5">
                                            <p class="text-default-400 font-semibold text-xs">Current Load</p>
                                            <p class="font-semibold">82%</p>
                                        </div>
                                        <div class="w-full h-2 bg-default-100 rounded-full overflow-hidden">
                                            <div class="bg-primary h-full w-[82%]"></div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-default-400 text-xs flex items-center">
                                            <i class="iconify tabler--clock me-1.25"></i>
                                            Updated 10 mins ago
                                        </span>
                                        <a class="btn btn-sm bg-primary text-white rounded-full" href="#">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            @include("shared.partials.footer")

            <div aria-labelledby="addTeamModalLabel" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto" id="addTeamModal" role="dialog" tabindex="-1">
                <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 m-3 flex min-h-[calc(100%-56px)] scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-lg">
                    <div class="card pointer-events-auto flex w-full flex-col">
                        <div class="card-header p-5">
                            <h3 class="font-bold" id="addTeamModalLabel">Add New Team</h3>
                            <button aria-label="Close" data-hs-overlay="#addTeamModal" type="button">
                                <i class="iconify tabler--x text-2xl align-middle text-default-600"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="mb-5">
                                <label class="form-label">Team Name</label>
                                <input class="form-input" placeholder="e.g., Creative Design Team" required="" type="text" />
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Team Code</label>
                                <input class="form-input" placeholder="e.g., IT-01" required="" type="text" />
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option selected="" value="New">New</option>
                                    <option value="Active">Active</option>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Busy">Busy</option>
                                    <option value="Stable">Stable</option>
                                </select>
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Team Members</label>
                                <select class="form-select" multiple="">
                                    <option value="1">Liam Carter</option>
                                    <option value="2">Ava Mitchell</option>
                                    <option value="3">Noah Parker</option>
                                    <option value="4">Emma Scott</option>
                                    <option value="5">Logan Brooks</option>
                                    <option value="6">Sophie Adams</option>
                                    <option value="7">Ethan Hall</option>
                                </select>
                                <div class="text-2xs text-default-400 mt-1">Hold Ctrl (Windows) or Cmd (Mac) to select multiple users.</div>
                            </div>
                            <div>
                                <label class="form-label">Description</label>
                                <textarea class="form-textarea" placeholder="Brief team responsibilities..." rows="3"></textarea>
                            </div>
                        </div>
                        <div class="border-default-300 flex items-center justify-end gap-2 border-t p-5">
                            <button class="btn bg-light hover:text-primary" data-hs-overlay="#addTeamModal" type="button">Cancel</button>
                            <button class="btn bg-success text-white hover:bg-success-hover" type="button">
                                <i class="iconify tabler--check"></i>
                                Save Team
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection

@section("scripts")
@endsection
