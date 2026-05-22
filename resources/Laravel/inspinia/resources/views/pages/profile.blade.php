@extends("shared.base", ["title" => "Profile"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Pages", "title" => "Profile"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                <div class="mb-5">
                    <article class="card">
                        <div class="relative overflow-hidden h-62.5 bg-cover bg-center" style='background-image: url("/images/profile-bg.jpg")'>
                            <div class="absolute inset-0 flex flex-col items-center justify-center p-7.5 bg-linear-to-t from-[#313A46] via-[#313a46cc] to-[#313a4680] text-center">
                                <h3 class="text-white italic text-xl">"Designing the future, one template at a time"</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="flex flex-wrap justify-between items-center">
                                <div class="flex items-center gap-base">
                                    <div>
                                        <img alt="avatar" class="size-20 rounded-full object-cover border-5 border-default-200" src="/images/users/user-1.jpg" />
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg text-default-800 mb-1.25">Damian D.</h4>
                                        <p class="text-default-400 text-sm mb-1.25">Product Designer</p>
                                        <span class="badge bg-primary/15 text-primary text-xs">Author</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2.5 md:mt-0 mt-5">
                                    <a class="btn border border-primary hover:bg-primary text-primary hover:text-white" href="#!">Follow</a>
                                    <a class="btn bg-primary hover:bg-primary-hover text-white" href="#!">Message</a>
                                    <div class="hs-dropdown [--auto-close:inside] relative inline-flex">
                                        <button aria-expanded="false" aria-haspopup="menu" aria-label="Dropdown" class="hs-dropdown-toggle btn btn-icon bg-dark text-white" type="button">
                                            <i class="iconify tabler--dots text-white size-6"></i>
                                        </button>
                                        <div aria-orientation="vertical" class="hs-dropdown-menu" role="menu">
                                            <div>
                                                <a class="dropdown-item" href="#"> Edit Profile </a>
                                                <a class="dropdown-item text-danger" href="#"> Report </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="container-fluid px-5">
                    <div class="grid xl:grid-cols-12 grid-cols-1 gap-base">
                        <div class="xl:col-span-4">
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h4 class="card-title">Personal Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="space-y-2.5">
                                        <div class="flex items-center gap-2.5">
                                            <div class="btn btn-icon size-8 bg-light">
                                                <i class="iconify tabler--briefcase text-secondary size-4.5"></i>
                                            </div>
                                            <p class="text-default-800">UI/UX Designer &amp; Full-Stack Developer</p>
                                        </div>
                                        <div class="flex items-center gap-2.5">
                                            <div class="btn btn-icon size-8 bg-light">
                                                <i class="iconify tabler--school text-secondary size-4.5"></i>
                                            </div>
                                            <p class="text-default-800">
                                                Studied at
                                                <span class="font-semibold text-default-800">Stanford University</span>
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-2.5">
                                            <div class="btn btn-icon size-8 bg-light">
                                                <i class="iconify tabler--map-pin text-secondary size-4.5"></i>
                                            </div>
                                            <p class="text-default-800">
                                                Lives in
                                                <span class="font-semibold text-default-800">San Francisco, CA</span>
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-2.5">
                                            <div class="btn btn-icon size-8 bg-light">
                                                <i class="iconify tabler--users text-secondary size-4.5"></i>
                                            </div>
                                            <p class="text-default-800">
                                                Followed by
                                                <span class="font-semibold text-default-800">25.3k People</span>
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-2.5">
                                            <div class="btn btn-icon size-8 bg-light">
                                                <i class="iconify tabler--mail size-4.5 text-secondary"></i>
                                            </div>
                                            <p class="text-default-800">
                                                Email
                                                <a class="text-primary font-semibold" href="mailto:hello@example.com">hello@example.com</a>
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-2.5">
                                            <div class="btn btn-icon size-8 bg-light">
                                                <i class="iconify tabler--link text-secondary size-4.5"></i>
                                            </div>
                                            <p class="text-default-800">
                                                Website
                                                <a class="text-primary font-semibold" href="https://www.example.dev">www.example.dev</a>
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-2.5">
                                            <div class="btn btn-icon size-8 bg-light">
                                                <i class="iconify tabler--world text-secondary size-4.5"></i>
                                            </div>
                                            <p class="text-default-800">
                                                Languages
                                                <span class="font-semibold text-default-800">English, Hindi, Japanese</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center gap-2.5 mt-7.5 mb-2.5">
                                        <a class="btn btn-icon bg-primary hover:bg-primary-hover text-white rounded-full" href="#">
                                            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="18"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                                            </svg>
                                        </a>
                                        <a class="btn btn-icon bg-info hover:bg-info-hover text-white rounded-full" href="#">
                                            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-brand-x" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="18"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                                <path d="M4 4l11.733 16h4.267l-11.733 -16z"></path>
                                                <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"></path>
                                            </svg>
                                        </a>
                                        <a class="btn btn-icon bg-danger hover:bg-danger-hover text-white rounded-full" href="#">
                                            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="18"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                                <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                                <path d="M16.5 7.5v.01"></path>
                                            </svg>
                                        </a>
                                        <a class="btn btn-icon bg-success hover:bg-success-hover text-white rounded-full" href="#">
                                            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-brand-dribbble" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="18"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                                <path d="M9 3.6c5 6 7 10.5 7.5 16.2"></path>
                                                <path d="M6.4 19c3.5 -3.5 6 -6.5 14.5 -6.4"></path>
                                                <path d="M3.1 10.75c5 0 9.814 -.38 15.314 -5"></path>
                                            </svg>
                                        </a>
                                        <a class="btn btn-icon bg-secondary hover:bg-secondary-hover text-white rounded-full" href="#">
                                            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-brand-linkedin" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="18"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                                <path d="M8 11v5"></path>
                                                <path d="M8 8v.01"></path>
                                                <path d="M12 16v-5"></path>
                                                <path d="M16 16v-3a2 2 0 1 0 -4 0"></path>
                                                <path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"></path>
                                            </svg>
                                        </a>
                                        <a class="btn btn-icon bg-danger hover:bg-danger-hover text-white rounded-full" href="#">
                                            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-brand-youtube" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="18"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                                <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z"></path>
                                                <path d="M10 9l5 3l-5 3z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h4 class="card-title">Skills</h4>
                                </div>
                                <div class="card-body">
                                    <div class="flex flex-wrap itmes-center gap-1.25">
                                        <a class="btn btn-sm bg-light text-sm hover:text-primary" href="#">Product Design</a>
                                        <a class="btn btn-sm bg-light text-sm hover:text-primary" href="#">UI/UX</a>
                                        <a class="btn btn-sm bg-light text-sm hover:text-primary" href="#">Tailwind CSS</a>
                                        <a class="btn btn-sm bg-light text-sm hover:text-primary" href="#">Bootstrap</a>
                                        <a class="btn btn-sm bg-light text-sm hover:text-primary" href="#">React.js</a>
                                        <a class="btn btn-sm bg-light text-sm hover:text-primary" href="#">Next.js</a>
                                        <a class="btn btn-sm bg-light text-sm hover:text-primary" href="#">Vue.js</a>
                                        <a class="btn btn-sm bg-light text-sm hover:text-primary" href="#">Figma</a>
                                        <a class="btn btn-sm bg-light text-sm hover:text-primary" href="#">Design Systems</a>
                                        <a class="btn btn-sm bg-light text-sm hover:text-primary" href="#">Template Authoring</a>
                                        <a class="btn btn-sm bg-light text-sm hover:text-primary" href="#">Responsive Design</a>
                                        <a class="btn btn-sm bg-light text-sm hover:text-primary" href="#">Component Libraries</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">My Social Feed</h4>
                                </div>
                                <div class="card-body">
                                    <div class="flex justify-between items-center border-b border-default-200 pb-2.5">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="avatar-3" class="size-8 rounded-md object-cover" src="/images/users/user-3.jpg" />
                                            <div>
                                                <h5 class="font-medium text-default-800 text-sm">Ava Brooks</h5>
                                                <p class="text-xs text-default-400">ava@pixelsuite.io</p>
                                            </div>
                                        </div>
                                        <a class="btn btn-icon size-8 bg-primary hover:bg-primary-hover text-white" href="#!" title="Message">
                                            <i class="iconify tabler--message text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-default-200 py-2.5">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="avatar-4" class="size-8 rounded-md object-cover" src="/images/users/user-4.jpg" />
                                            <div>
                                                <h5 class="font-medium text-default-800 text-sm">Leo Martin</h5>
                                                <p class="text-xs text-default-400">leo@designbyte.com</p>
                                            </div>
                                            <span class="badge bg-success/10 text-success">New Request</span>
                                        </div>
                                        <div class="flex items-center gap-0.75">
                                            <a class="btn btn-icon size-8 border-primary text-primary hover:bg-primary hover:text-white" href="#!" title="Accept">
                                                <i class="iconify tabler--check text-lg"></i>
                                            </a>
                                            <a class="btn btn-icon bg-danger hover:bg-danger-hover size-8 text-white" href="#!" title="Decline">
                                                <i class="iconify tabler--x text-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-default-200 py-2.5">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="avatar-5" class="size-8 rounded-md object-cover" src="/images/users/user-5.jpg" />
                                            <div>
                                                <h5 class="font-medium text-default-800 text-sm">Sophie Moore</h5>
                                                <p class="text-xs text-default-400">Liked your post</p>
                                            </div>
                                        </div>
                                        <small class="text-[11px] text-default-400">2m ago</small>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-default-200 py-2.5">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="avatar-6" class="size-8 rounded-md object-cover" src="/images/users/user-6.jpg" />
                                            <div>
                                                <h5 class="font-medium text-default-800 text-sm">Liam Johnson</h5>
                                                <p class="text-xs text-default-400">Commented on your photo</p>
                                            </div>
                                        </div>
                                        <a class="btn btn-icon border-secondary text-secondary hover:bg-secondary size-8 hover:text-white" href="#!" title="View">
                                            <i class="iconify tabler--eye text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-default-200 py-2.5">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="avatar-7" class="size-8 rounded-md object-cover" src="/images/users/user-7.jpg" />
                                            <div>
                                                <h5 class="font-medium text-default-800 text-sm">Mia Collins</h5>
                                                <p class="text-xs text-default-400">Invited you to join "Design Ninjas"</p>
                                            </div>
                                        </div>
                                        <a class="btn btn-icon size-8 border-primary text-primary hover:bg-primary hover:text-white" href="#!" title="Join">
                                            <i class="iconify tabler--user-plus text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-default-200 py-2.5">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="avatar-8" class="size-8 rounded-md object-cover" src="/images/users/user-8.jpg" />
                                            <div>
                                                <h5 class="font-medium text-default-800 text-sm">Ethan Green</h5>
                                                <p class="text-xs text-default-400">Mentioned you in a comment</p>
                                            </div>
                                        </div>
                                        <a class="btn btn-icon size-8 border-primary text-primary hover:bg-primary hover:text-white" href="#!" title="Check">
                                            <i class="iconify tabler--bell text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-default-200 py-2.5">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="avatar-9" class="size-8 rounded-md object-cover" src="/images/users/user-9.jpg" />
                                            <div>
                                                <h5 class="font-medium text-default-800 text-sm">Emma King</h5>
                                                <p class="text-xs text-default-400">Tagged you in a photo</p>
                                            </div>
                                        </div>
                                        <a class="btn btn-icon size-8 border-secondary text-secondary hover:bg-secondary hover:text-white" href="#!">
                                            <i class="iconify tabler--camera text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-default-200 py-2.5">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="avatar-10" class="size-8 rounded-md object-cover" src="/images/users/user-10.jpg" />
                                            <div>
                                                <h5 class="font-medium text-default-800 text-sm">Jack Wilson</h5>
                                                <p class="text-xs text-default-400">Started following you</p>
                                            </div>
                                        </div>
                                        <a class="btn btn-icon size-8 border-primary text-primary hover:bg-primary hover:text-white" href="#!">
                                            <i class="iconify tabler--user-check text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-default-200 py-2.5">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="avatar-1" class="size-8 rounded-md object-cover" src="/images/users/user-1.jpg" />
                                            <div>
                                                <h5 class="font-medium text-default-800 text-sm">Isabella Lee</h5>
                                                <p class="text-xs text-default-400">Reacted to your story</p>
                                            </div>
                                        </div>
                                        <small class="text-[11px] text-default-400">15m ago</small>
                                    </div>
                                    <div class="flex justify-between items-center pt-2">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="avatar-2" class="size-8 rounded-md object-cover" src="/images/users/user-2.jpg" />
                                            <div>
                                                <h5 class="font-medium text-default-800 text-sm">Benjamin Gray</h5>
                                                <p class="text-xs text-default-400">Shared your post</p>
                                            </div>
                                        </div>
                                        <a class="btn btn-icon size-8 border-success text-success hover:bg-success hover:text-white" href="#!">
                                            <i class="iconify tabler--share text-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-8">
                            <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-base mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="flex justify-between items-center mb-2">
                                            <h5 class="card-title" title="Number of Tasks">My Tasks</h5>
                                            <a href="#!">
                                                <i class="iconify tabler--external-link size-4.5 text-default-400"></i>
                                            </a>
                                        </div>
                                        <div class="flex items-center gap-2.5 my-5">
                                            <div class="btn btn-icon rounded-full size-9 bg-primary">
                                                <i class="iconify tabler--clipboard-list size-4.5 text-white"></i>
                                            </div>
                                            <h3 class="text-default-800 text-xl">124</h3>
                                            <span class="ms-auto badge bg-primary/15 text-primary text-xs font-medium">+3 New</span>
                                        </div>
                                        <div class="flex items-center justify-between text-sm text-default-400">
                                            <div class="flex items-center gap-1">
                                                <span class="text-primary">
                                                    <i class="iconify tabler--circle align-middle"></i>
                                                </span>
                                                <span>Total Tasks</span>
                                            </div>
                                            <span class="font-semibold text-default-800">12,450</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="flex justify-between items-center mb-2">
                                            <h5 class="card-title" title="Number of Tasks">Messages</h5>
                                            <a href="#!">
                                                <i class="iconify tabler--external-link size-4.5 text-default-400"></i>
                                            </a>
                                        </div>
                                        <div class="flex items-center gap-2.5 my-5">
                                            <div class="btn btn-icon rounded-full size-9 bg-purple">
                                                <i class="iconify tabler--messages size-4.5 text-white"></i>
                                            </div>
                                            <h3 class="text-default-800 text-xl">69.5k</h3>
                                            <span class="ms-auto badge bg-secondary/15 text-secondary text-xs font-medium">+5 New</span>
                                        </div>
                                        <div class="flex items-center justify-between text-sm text-default-400">
                                            <div class="flex items-center gap-1">
                                                <span class="text-secondary">
                                                    <i class="iconify tabler--circle align-middle"></i>
                                                </span>
                                                <span>Total Messages</span>
                                            </div>
                                            <span class="font-semibold text-default-800">32.1M</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="flex justify-between items-center mb-2">
                                            <h5 class="card-title" title="Number of Tasks">Clients</h5>
                                            <a href="#!">
                                                <i class="iconify tabler--external-link size-4.5 text-default-400"></i>
                                            </a>
                                        </div>
                                        <div class="flex items-center gap-2.5 my-5">
                                            <div class="btn btn-icon rounded-full size-9 bg-purple">
                                                <i class="iconify tabler--users size-4.5 text-white"></i>
                                            </div>
                                            <h3 class="text-default-800 text-xl">184</h3>
                                            <span class="ms-auto badge bg-secondary/15 text-secondary text-xs font-medium">+4 New</span>
                                        </div>
                                        <div class="flex items-center justify-between text-sm text-default-400">
                                            <div class="flex items-center gap-1">
                                                <span class="text-secondary">
                                                    <i class="iconify tabler--circle align-middle"></i>
                                                </span>
                                                <span>Total Clients</span>
                                            </div>
                                            <span class="font-semibold text-default-800">9,835</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="flex justify-between items-center mb-2">
                                            <h5 class="card-title" title="Number of Tasks">Revenue</h5>
                                            <a href="#!">
                                                <i class="iconify tabler--external-link size-4.5 text-default-400"></i>
                                            </a>
                                        </div>
                                        <div class="flex items-center gap-2.5 my-5">
                                            <div class="btn btn-icon rounded-full size-9 bg-primary">
                                                <i class="iconify tabler--credit-card size-4.5 text-white"></i>
                                            </div>
                                            <h3 class="text-default-800 text-xl">$25.5k</h3>
                                            <span class="ms-auto badge bg-primary/15 text-primary text-xs font-medium">+1.5%</span>
                                        </div>
                                        <div class="flex items-center justify-between text-sm text-default-400">
                                            <div class="flex items-center gap-1">
                                                <span class="text-primary">
                                                    <i class="iconify tabler--circle align-middle"></i>
                                                </span>
                                                <span>Total Clients</span>
                                            </div>
                                            <span class="font-semibold text-default-800">9,835</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h4 class="card-title">About Me</h4>
                                </div>
                                <div class="card-body">
                                    <p class="mb-4">
                                        I'm a Product Designer and template author passionate about crafting clean, scalable, and high-performing UI solutions. With a focus on frontend technologies and modern design systems, I create user-centric digital products that are
                                        both functional and visually appealing.
                                    </p>
                                    <p>
                                        As a template creator, I specialize in building developer-friendly UI kits and dashboards using frameworks like Tailwind CSS, Bootstrap, React, Next.js, Vue, and Laravel. My work powers countless web apps, helping developers save time
                                        and build faster.
                                    </p>
                                    <div class="mt-5">
                                        <h5 class="card-title mb-2.5">My Approach :</h5>
                                        <p>
                                            I take a user-first approach to design—blending thoughtful UX with clean code. From wireframes to fully responsive templates, I focus on creating intuitive and aesthetic experiences. Whether you're launching a SaaS dashboard, admin
                                            panel, or marketing site, I strive to deliver pixel-perfect results that elevate your product.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">My Tasks</h4>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-wrapper whitespace-nowrap">
                                        <table class="table table-hover w-full text-sm">
                                            <thead class="bg-light/25 thead-sm">
                                                <tr class="uppercase text-2xs">
                                                    <th data-table-sort="task">Task</th>
                                                    <th data-table-sort="">Status</th>
                                                    <th data-table-sort="name">Assigned By</th>
                                                    <th data-table-sort="">Start Date</th>
                                                    <th data-table-sort="">Priority</th>
                                                    <th data-table-sort="">Progress</th>
                                                    <th style="width: 30px">Total Time Spent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h5 class="my-1.25">
                                                            <a href="#">Admin Dashboard Template - Final Touch</a>
                                                        </h5>
                                                        <span class="text-xs text-default-400">Due in 2 days</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-warning/15 text-warning">In-progress</span>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <img alt="avatar" class="size-8 rounded-full object-cover" src="/images/users/user-3.jpg" />
                                                            <div>
                                                                <h5>Liam Johnson</h5>
                                                                <p class="text-xs text-default-400">liam@pixelcraft.io</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Apr 15, 2025</td>
                                                    <td>
                                                        <span class="badge bg-danger/15 text-danger">High</span>
                                                    </td>
                                                    <td>70%</td>
                                                    <td>8h 45min</td>
                                                    <td>
                                                        <a href="#">
                                                            <i class="iconify tabler--edit size-4.5 text-default-400"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 class="my-1.25">
                                                            <a href="#">Tailwind UI Kit Design</a>
                                                        </h5>
                                                        <span class="text-xs text-default-400">Due in 10 days</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-success/15 text-success">Completed</span>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <img alt="avatar" class="size-8 rounded-full object-cover" src="/images/users/user-5.jpg" />
                                                            <div>
                                                                <h5>Ava Reynolds</h5>
                                                                <p class="text-xs text-default-400">ava@designwave.co</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Mar 29, 2025</td>
                                                    <td>
                                                        <span class="badge bg-success/15 text-success">Low</span>
                                                    </td>
                                                    <td>100%</td>
                                                    <td>34h 10min</td>
                                                    <td>
                                                        <a href="#">
                                                            <i class="iconify tabler--edit size-4.5 text-default-400"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 class="my-1.25">
                                                            <a href="#">React + Next.js Starter Template</a>
                                                        </h5>
                                                        <span class="text-xs text-default-400">Due in 5 days</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-warning/15 text-warning">In-progress</span>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <img alt="avatar" class="size-8 rounded-full object-cover" src="/images/users/user-2.jpg" />
                                                            <div>
                                                                <h5>Noah Carter</h5>
                                                                <p class="text-xs text-default-400">noah@devspark.com</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Apr 12, 2025</td>
                                                    <td>
                                                        <span class="badge bg-primary/15 text-primary">Medium</span>
                                                    </td>
                                                    <td>45%</td>
                                                    <td>14h 25min</td>
                                                    <td>
                                                        <a href="#">
                                                            <i class="iconify tabler--edit size-4.5 text-default-400"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 class="my-1.25">
                                                            <a href="#">Laravel Template Docs Update</a>
                                                        </h5>
                                                        <span class="text-xs text-default-400">Due in 4 days</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-default-200 text-default-700">On Hold</span>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <img alt="avatar" class="size-8 rounded-full object-cover" src="/images/users/user-1.jpg" />
                                                            <div>
                                                                <h5 class="font-medium leading-tight">Sophia Bennett</h5>
                                                                <p class="text-xs text-default-400">sophia@codepress.io</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Apr 10, 2025</td>
                                                    <td>
                                                        <span class="badge bg-secondary/15 text-secondary">Low</span>
                                                    </td>
                                                    <td>30%</td>
                                                    <td>6h 50min</td>
                                                    <td>
                                                        <a href="#">
                                                            <i class="iconify tabler--edit size-4.5 text-default-400"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 class="my-1.25">
                                                            <a href="#">Portfolio Website Redesign</a>
                                                        </h5>
                                                        <span class="text-xs text-default-400">Due in 12 days</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-danger/15 text-danger">Outdated</span>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <img alt="avatar" class="size-8 rounded-full object-cover" src="/images/users/user-6.jpg" />
                                                            <div>
                                                                <h5>Mason Clark</h5>
                                                                <p class="text-xs text-default-400">mason@webgenius.dev</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Apr 01, 2025</td>
                                                    <td>
                                                        <span class="badge bg-danger/15 text-danger">High</span>
                                                    </td>
                                                    <td>10%</td>
                                                    <td>11h 30min</td>
                                                    <td>
                                                        <a href="#">
                                                            <i class="iconify tabler--edit size-4.5 text-default-400"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-lg font-semibold text-default-800 my-7.5">My Blog Posts</h4>
                            <div class="grid xl:grid-cols-3 md:grid-cols-2 gap-base">
                                <article class="card">
                                    <div>
                                        <span class="absolute top-5 start-5 badge badge-label bg-dark text-white">Technology</span>
                                    </div>
                                    <img alt="Tech Innovations" class="rounded-t-md" src="/images/blog/blog-4.jpg" />
                                    <div class="card-body">
                                        <h6 class="text-base mb-2.5">
                                            <a class="text-default-800 hover:text-primary" href="#!">The Future of Artificial Intelligence</a>
                                        </h6>
                                        <p class="mb-5 text-default-400">Discover how AI is transforming industries and what the future holds for this cutting-edge technology.</p>
                                        <div class="flex flex-wrap gap-1">
                                            <a class="badge badge-label border border-default-300" href="#!"> AI </a>
                                            <a class="badge badge-label border border-default-300" href="#!"> Technology </a>
                                            <a class="badge badge-label border border-default-300" href="#!"> Innovation </a>
                                        </div>
                                        <p class="flex flex-wrap items-center gap-base text-default-400 mt-5">
                                            <span class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-base"></i>
                                                Jan 12, 2025
                                            </span>
                                            <span class="flex items-center gap-1.25">
                                                <i class="iconify tabler--message-circle text-base"></i>
                                                <a class="hover:text-primary" href="#!">89</a>
                                            </span>
                                            <span class="flex items-center gap-1.25">
                                                <i class="iconify tabler--eye text-base"></i>
                                                1,284
                                            </span>
                                        </p>
                                    </div>
                                    <div class="card-footer border-0">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="avatar-4" class="size-6 rounded-full" src="/images/users/user-4.jpg" />
                                            <div>
                                                <h5>
                                                    <a class="text-sm hover:text-primary" href="#!">Michael Turner</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="text-primary text-sm flex items-center gap-1.25" href="#">
                                                Read more
                                                <i class="iconify tabler--arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                                <article class="card">
                                    <div>
                                        <span class="absolute top-5 start-5 badge badge-label bg-dark text-white">Data Science</span>
                                    </div>
                                    <img alt="Tech Innovations" class="rounded-t-md" src="/images/blog/blog-5.jpg" />
                                    <div class="card-body">
                                        <h6 class="text-base font-semibold leading-relaxed mb-2.5">
                                            <a class="text-default-800 hover:text-primary" href="#!">Top Data Science Trends in 2025</a>
                                        </h6>
                                        <p class="mb-5 text-default-400">Get ahead in the data science field with the latest trends, technologies, and tools that are reshaping the industry.</p>
                                        <div class="flex flex-wrap gap-1">
                                            <a class="badge badge-label border border-default-300" href="#!"> Data Science </a>
                                            <a class="badge badge-label border border-default-300" href="#!"> Trends </a>
                                            <a class="badge badge-label border border-default-300" href="#!"> 2025 </a>
                                        </div>
                                        <p class="flex flex-wrap items-center gap-base text-default-400 mt-5">
                                            <span class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-base"></i>
                                                Jan 29, 2025
                                            </span>
                                            <span class="flex items-center gap-1.25">
                                                <i class="iconify tabler--message-circle text-base"></i>
                                                <a class="hover:text-primary" href="#!">70</a>
                                            </span>
                                            <span class="flex items-center gap-1.25">
                                                <i class="iconify tabler--eye text-base"></i>
                                                1,850
                                            </span>
                                        </p>
                                    </div>
                                    <div class="card-footer border-0">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="avatar-4" class="size-6 rounded-full" src="/images/users/user-1.jpg" />
                                            <div>
                                                <h5>
                                                    <a class="text-sm hover:text-primary" href="#!">Olivia Brown</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="text-primary text-sm flex items-center gap-1.25" href="#">
                                                Read more
                                                <i class="iconify tabler--arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                                <article class="card">
                                    <div>
                                        <span class="absolute top-5 start-5 badge badge-label bg-dark text-white">Business</span>
                                    </div>
                                    <img alt="Tech Innovations" class="rounded-t-md" src="/images/blog/blog-3.jpg" />
                                    <div class="card-body">
                                        <h6 class="text-base mb-2.5">
                                            <a class="text-default-800 hover:text-primary" href="#!">5 Key Tips for New Entrepreneurs</a>
                                        </h6>
                                        <p class="mb-5 text-default-400">Start your entrepreneurial journey with these 5 essential tips that will guide you through the first year of business.</p>
                                        <div class="flex flex-wrap gap-1">
                                            <a class="badge badge-label border border-default-300" href="#!"> Business </a>
                                            <a class="badge badge-label border border-default-300" href="#!"> Entrepreneur </a>
                                            <a class="badge badge-label border border-default-300" href="#!"> Startup </a>
                                        </div>
                                        <p class="flex flex-wrap items-center gap-base text-default-400 mt-5">
                                            <span class="flex items-center gap-1.25">
                                                <i class="iconify tabler--calendar text-base"></i>
                                                Jan 20, 2025
                                            </span>
                                            <span class="flex items-center gap-1.25">
                                                <i class="iconify tabler--message-circle text-base"></i>
                                                <a class="hover:text-primary" href="#!">23 </a>
                                            </span>
                                            <span class="flex items-center gap-1.25">
                                                <i class="iconify tabler--eye text-base"></i>
                                                3,842
                                            </span>
                                        </p>
                                    </div>
                                    <div class="card-footer border-0">
                                        <div class="flex items-center gap-2.5">
                                            <img alt="avatar-4" class="size-6 rounded-full" src="/images/users/user-7.jpg" />
                                            <div>
                                                <h5>
                                                    <a class="hover:text-primary" href="#!">David Clark</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="text-primary text-sm flex items-center gap-1.25" href="#">
                                                Read more
                                                <i class="iconify tabler--arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
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
