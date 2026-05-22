@extends("shared.base", ["title" => "Coming Soon"])

@section("styles")
@endsection

@section("content")
    <div class="flex min-h-screen items-center p-12.5">
        <div class="container">
            <div class="flex justify-center">
                <div class="xl:w-5/6">
                    <div class="card rounded-2xl">
                        <div class="grid grid-cols-1 lg:grid-cols-2">
                            <div class="card-body relative p-12.5">
                                <div class="mb-7.5 flex flex-col items-center justify-center text-center">
                                    <a class="auth-logo" href="{{ url("/") }}">
                                        <img alt="logo" class="flex dark:hidden" src="/images/logo-black.png" />
                                        <img alt="dark logo" class="hidden dark:flex" src="/images/logo.png" />
                                    </a>
                                    <h4 class="mt-5 mb-2 text-base font-bold">Big things are on the Way</h4>
                                    <p class="text-default-400 mx-auto w-full lg:w-3/4">We’re working hard to bring you something amazing. Stay tuned!</p>
                                </div>
                                <div class="my-7.5">
                                    <div class="grid grid-cols-2 gap-2.5 lg:grid-cols-4">
                                        <div class="bg-default-50 bg-opacity-10 text-primary rounded px-3 py-6 text-center">
                                            <h2 class="mb-2 text-4xl font-bold" id="days">00</h2>
                                            <p class="font-semibold text-default-800 text-xs">Days</p>
                                        </div>
                                        <div class="bg-default-50 bg-opacity-10 text-primary rounded px-3 py-6 text-center">
                                            <h2 class="mb-2 text-4xl font-bold" id="hours">00</h2>
                                            <p class="font-semibold text-default-800 text-xs">Hours</p>
                                        </div>
                                        <div class="bg-default-50 bg-opacity-10 text-primary rounded px-3 py-6 text-center">
                                            <h2 class="mb-2 text-4xl font-bold" id="minutes">00</h2>
                                            <p class="font-semibold text-default-800 text-xs">Minutes</p>
                                        </div>
                                        <div class="bg-default-50 bg-opacity-10 text-primary rounded px-3 py-6 text-center">
                                            <h2 class="mb-2 text-4xl font-bold" id="seconds">00</h2>
                                            <p class="font-semibold text-default-800 text-xs">Seconds</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-[linear-gradient(90deg,#6658dd_0%,#f1556c_100%)] bg-clip-text text-center text-lg! font-bold text-transparent" data-text="Stay tunned!">Stay tunned!</div>
                                <div class="relative mx-auto mt-5 flex w-auto items-center overflow-hidden rounded-md lg:w-sm">
                                    <input class="border-default-300 text-default-500 w-full rounded-md border py-3 ps-10 pe-28 text-sm font-semibold" placeholder="Enter email..." type="text" />
                                    <i class="iconify tabler--mail text-default-400 absolute start-3 text-lg"></i>
                                    <button class="bg-secondary absolute end-0 rounded-md rounded-s-none px-6 py-3.25 text-sm font-medium text-white transition" type="button">Notify me!</button>
                                </div>
                            </div>
                            <div class="relative hidden h-full overflow-hidden rounded-e-2xl bg-cover bg-center object-cover lg:block" style='background-image: url("/images/auth.jpg")'>
                                <div class="absolute inset-0 flex items-end justify-center rounded-e-sm p-9 [background:linear-gradient(to_top,#313a46,rgba(49,58,70,.8),rgba(49,58,70,.5))]"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    @vite(["resources/js/pages/coming-soon.js"])
@endsection
