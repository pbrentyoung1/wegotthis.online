@extends("shared.base", ["title" => "Maintenance"])

@section("styles")
@endsection

@section("content")
    <div class="flex min-h-screen items-center">
        <div class="container">
            <div class="flex justify-center lg:p-0 p-12.5">
                <div class="w-full lg:w-1/2">
                    <div class="card rounded-2xl">
                        <div class="card-body p-12.5">
                            <div class="flex flex-col items-center justify-center text-center">
                                <a class="auth-logo" href="{{ url("/") }}">
                                    <img alt="logo" class="flex dark:hidden" src="/images/logo-black.png" />
                                    <img alt="dark logo" class="hidden dark:flex" src="/images/logo.png" />
                                </a>
                            </div>
                            <div class="p-3 text-center mt-5">
                                <img alt="Maintenance" class="mx-auto md:size-64" src="/images/maintenance.svg" />
                                <h3 class="mb-2 text-xl font-bold uppercase">Site Under Maintenance</h3>
                                <p class="text-default-400">
                                    We’re currently performing scheduled maintenance.
                                    <br />
                                    Please check back soon.
                                </p>
                                <div class="mt-8 flex items-center justify-center gap-2 flex-wrap">
                                    <button class="btn bg-primary text-white hover:bg-primary-hover rounded-full">Call Support</button>
                                    <button class="btn bg-info text-white hover:bg-info-hover rounded-full">Send Email</button>
                                </div>
                            </div>
                            <p class="text-default-400 mt-18 text-center">
                                ©
                                <span data-current-year=""></span>
                                Inspinia - by
                                <span>WebAppLayers</span>
                            </p>
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
