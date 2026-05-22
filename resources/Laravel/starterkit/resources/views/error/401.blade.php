@extends("shared.base", ["title" => "401 Error"])

@section("styles")
@endsection

@section("content")
    <div class="flex min-h-screen items-center">
        <div class="container">
            <div class="flex justify-center lg:p-0 p-12.5">
                <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
                    <div class="p-7.5">
                        <div class="mb-4 flex flex-col items-center justify-center text-center">
                            <a class="auth-logo" href="{{ url("/") }}">
                                <img alt="logo" class="flex dark:hidden" src="/images/logo-black.png" />
                                <img alt="dark logo" class="hidden dark:flex" src="/images/logo.png" />
                            </a>
                        </div>
                        <div class="p-3 text-center">
                            <div class="error-wave-container justify-center gap-1">
                                <span class="error-wave-char">4</span>
                                <span class="error-wave-char">0</span>
                                <span class="error-wave-char">1</span>
                            </div>
                            <h3 class="mb-2 text-xl font-bold uppercase">Unauthorized Access</h3>
                            <p class="text-default-400 mb-4">You are not authorized to access this page.</p>
                            <a class="btn bg-primary mt-6 text-white hover:bg-primary-hover" href="{{ url("/") }}"> Return Home</a>
                        </div>
                    </div>
                    <p class="text-default-400 mt-7.5 text-center">
                        ©
                        <span data-current-year=""></span>
                        Inspinia - by
                        <span>WebAppLayers</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection

@section("scripts")
@endsection
