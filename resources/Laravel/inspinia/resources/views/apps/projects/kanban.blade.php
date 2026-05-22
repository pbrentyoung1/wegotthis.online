@extends("shared.base", ["title" => "Kanban"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Apps", "title" => "Kanban"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Apps", "title" => "Kanban"])

                <div class="container-fluid">
                    <div class="card h-[calc(100vh-200px)]">
                        <div class="card-header gap-base!">
                            <div class="flex gap-base flex-wrap items-center">
                                <div class="input-icon-group">
                                    <i class="iconify tabler--search input-icon text-default-400"></i>
                                    <input class="form-input" placeholder="Search tasks..." type="text" />
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--briefcase input-icon text-default-400"></i>
                                        <select class="form-select">
                                            <option selected="">Department</option>
                                            <option value="Design">Design</option>
                                            <option value="Development">Development</option>
                                            <option value="UI/UX">UI/UX</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Finance">Finance</option>
                                            <option value="QA">QA</option>
                                        </select>
                                    </div>
                                    <div class="input-icon-group">
                                        <i class="iconify tabler--calendar-clock input-icon text-default-400"></i>
                                        <select class="form-select">
                                            <option selected="">Due Date</option>
                                            <option value="Today">Today</option>
                                            <option value="This Week">This Week</option>
                                            <option value="This Month">This Month</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button aria-controls="addTaskModal" aria-expanded="false" aria-haspopup="dialog" class="btn bg-secondary text-white hover:bg-secondary-hover" data-hs-overlay="#addTaskModal">
                                    <i class="iconify tabler--plus"></i>
                                    Add New Task
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="bg-light/40 flex items-stretch overflow-x-auto relative">
                                <div class="w-85 min-w-84 border-default-300 border-e border-dashed">
                                    <div class="flex items-center px-5 py-2.5">
                                        <h5>To Do (6)</h5>
                                        <a class="bg-primary ms-auto inline-flex size-7.75 items-center justify-center rounded-full text-white" href="#!">
                                            <i class="iconify tabler--plus text-white"></i>
                                        </a>
                                    </div>
                                    <div class="h-[calc(100vh-332px)] px-5 pb-5" data-simplebar="" data-simplebar-md="">
                                        <ul class="space-y-2.5" data-plugins="sortable">
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-success/15 text-success">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    Design
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">AI Analytics Dashboard</a>
                                                        </h5>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-2.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-3.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-5.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-1.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">25 May, 2025</h5>
                                                            </div>
                                                        </div>
                                                        <div class="mt-5">
                                                            <div class="flex items-center justify-between mb-2.5">
                                                                <p class="text-default-400 font-semibold text-2xs">Progress</p>
                                                                <p class="font-semibold mb-0">65%</p>
                                                            </div>
                                                            <div class="w-full bg-default-200 rounded-full h-1.25">
                                                                <div class="bg-success h-1.25 rounded-full" style="width: 65%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-warning/15 text-warning">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    Development
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">Marketing Landing Page Redesign</a>
                                                        </h5>
                                                        <div class="mb-5">
                                                            <img alt="" class="rounded" src="/images/kanban/img-1.png" />
                                                        </div>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-6.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-4.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-8.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">10 Jun, 2025</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-info/15 text-info">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    UI/UX
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">E-Commerce Website Redesign</a>
                                                        </h5>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-4.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-6.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-7.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-8.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">28 May, 2025</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-warning/15 text-warning">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    App Development
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">Mobile App Redesign</a>
                                                        </h5>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-1.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-2.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-3.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">30 May, 2025</h5>
                                                            </div>
                                                        </div>
                                                        <div class="mt-5">
                                                            <div class="flex items-center justify-between mb-2.5">
                                                                <p class="text-default-400 font-semibold text-2xs">Progress</p>
                                                                <p class="font-semibold mb-0">80%</p>
                                                            </div>
                                                            <div class="w-full bg-default-200 rounded-full h-1.25">
                                                                <div class="bg-warning h-1.25 rounded-full" style="width: 80%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-purple/15 text-purple">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    Marketing
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">CRM System Upgrade</a>
                                                        </h5>
                                                        <div class="mb-5">
                                                            <img alt="" class="rounded" draggable="false" src="/images/kanban/img-2.png" />
                                                        </div>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-4.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">30 May, 2025</h5>
                                                            </div>
                                                        </div>
                                                        <div class="mt-5">
                                                            <div class="flex items-center justify-between mb-2.5">
                                                                <p class="text-default-400 font-semibold text-2xs">Progress</p>
                                                                <p class="font-semibold mb-0">45%</p>
                                                            </div>
                                                            <div class="w-full bg-default-200 rounded-full h-1.25">
                                                                <div class="bg-primary h-1.25 rounded-full" style="width: 45%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="w-85 min-w-84 border-default-300 border-e border-dashed">
                                    <div class="flex items-center px-5 py-2.5">
                                        <h5>In Progress (5)</h5>
                                        <a class="bg-primary ms-auto inline-flex size-7.75 items-center justify-center rounded-full text-white" href="#!">
                                            <i class="iconify tabler--plus text-white"></i>
                                        </a>
                                    </div>
                                    <div class="h-[calc(100vh-332px)] px-5 pb-5" data-simplebar="" data-simplebar-md="">
                                        <ul class="space-y-2.5" data-plugins="sortable">
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-info/15 text-info">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    Testing
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">E-commerce Website QA Testing</a>
                                                        </h5>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-3.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-7.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-9.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">18 Jun, 2025</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-info/15 text-info">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    UI/UX
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">Mobile App Redesign</a>
                                                        </h5>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-5.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-2.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-3.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-9.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">10 Jun, 2025</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-success/15 text-success">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    UI/UX Design
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">Website User Experience Overhaul</a>
                                                        </h5>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-4.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-5.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-6.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">15 June, 2025</h5>
                                                            </div>
                                                        </div>
                                                        <div class="mt-5">
                                                            <div class="flex items-center justify-between mb-2.5">
                                                                <p class="text-default-400 font-semibold text-2xs">Progress</p>
                                                                <p class="font-semibold mb-0">55%</p>
                                                            </div>
                                                            <div class="w-full bg-default-200 rounded-full h-1.25">
                                                                <div class="bg-success h-1.25 rounded-full" style="width: 55%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-danger/15 text-danger">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    Marketing
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">Customer Engagement Platform Development</a>
                                                        </h5>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-5.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-6.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">10 June, 2025</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="w-85 min-w-84 border-default-300 border-e border-dashed">
                                    <div class="flex items-center px-5 py-2.5">
                                        <h5>In Review (3)</h5>
                                        <a class="bg-primary ms-auto inline-flex size-7.75 items-center justify-center rounded-full text-white" href="#!">
                                            <i class="iconify tabler--plus text-white"></i>
                                        </a>
                                    </div>
                                    <div class="h-[calc(100vh-332px)] px-5 pb-5" data-simplebar="" data-simplebar-md="">
                                        <ul class="space-y-2.5" data-plugins="sortable">
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-success/15 text-success">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    Design
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">AI Analytics Dashboard</a>
                                                        </h5>
                                                        <div class="mb-5">
                                                            <img alt="" class="rounded" draggable="false" src="/images/kanban/img-3.png" />
                                                        </div>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-2.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-3.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-5.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-1.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">25 May, 2025</h5>
                                                            </div>
                                                        </div>
                                                        <div class="mt-5">
                                                            <div class="flex items-center justify-between mb-2.5">
                                                                <p class="text-default-400 font-semibold text-2xs">Progress</p>
                                                                <p class="font-semibold mb-0">65%</p>
                                                            </div>
                                                            <div class="w-full bg-default-200 rounded-full h-1.25">
                                                                <div class="bg-success h-1.25 rounded-full" style="width: 65%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-warning/15 text-warning">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    Development
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">Marketing Landing Page Redesign</a>
                                                        </h5>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-6.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-4.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-8.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">10 Jun, 2025</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-info/15 text-info">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    UI/UX
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">E-Commerce Website Redesign</a>
                                                        </h5>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-4.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-6.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-7.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-8.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">28 May, 2025</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="w-85 min-w-84 border-default-300 border-e border-dashed">
                                    <div class="flex items-center px-5 py-2.5">
                                        <h5>Done (2)</h5>
                                        <a class="bg-primary ms-auto inline-flex size-7.75 items-center justify-center rounded-full text-white" href="#!">
                                            <i class="iconify tabler--plus text-white"></i>
                                        </a>
                                    </div>
                                    <div class="h-[calc(100vh-332px)] px-5 pb-5" data-simplebar="" data-simplebar-md="">
                                        <ul class="space-y-2.5" data-plugins="sortable">
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-info/15 text-info">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    Testing
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">E-commerce Website QA Testing</a>
                                                        </h5>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-3.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-7.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-9.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">18 Jun, 2025</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="card border border-light hover:shadow-lg!">
                                                    <div class="card-body">
                                                        <div class="mb-2.5 flex items-center justify-between">
                                                            <div>
                                                                <span class="badge bg-warning/15 text-warning">
                                                                    <i class="iconify tabler--circle-filled"></i>
                                                                    UI/UX
                                                                </span>
                                                            </div>
                                                            <div class="relative ms-auto">
                                                                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                                    <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon size-7.75 text-default-400 hover:bg-default-100" type="button">
                                                                        <i class="iconify tabler--dots-vertical text-xl"></i>
                                                                    </button>
                                                                    <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                                                        <div class="space-y-0.5">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--share me-2"></i>
                                                                                Share
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--edit me-2"></i>
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="iconify tabler--ban me-2"></i>
                                                                                Block
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i class="iconify tabler--trash me-2"></i>
                                                                                Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="mb-5">
                                                            <a class="hover:text-primary" draggable="false" href="#!">Mobile App Redesign</a>
                                                        </h5>
                                                        <div class="mb-5">
                                                            <img alt="" class="rounded" src="/images/kanban/img-4.png" />
                                                        </div>
                                                        <div class="flex justify-between items-center">
                                                            <div class="flex items-center -space-x-1.5">
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-5.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-2.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-3.jpg" />
                                                                </div>
                                                                <div>
                                                                    <img alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" draggable="false" src="/images/users/user-9.jpg" />
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-2.5">
                                                                <i class="iconify tabler--calendar-clock text-default-400 text-lg"></i>
                                                                <h5 class="text-sm font-medium">10 Jun, 2025</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
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
    @vite(["resources/js/pages/apps-kanban.js"])
@endsection
