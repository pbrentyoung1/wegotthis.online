@extends("shared.base", ["title" => "400 Error"])

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
                            <div class="error-glitch" data-text="400">400</div>
                            <h3 class="mb-2 text-xl font-bold uppercase">Oops! Invalid Request</h3>
                            <p class="text-default-400">The request couldn’t be processed. Please check the URL or try again.</p>
                            <div class="flex justify-center gap-3 mt-7.5">
                                <a class="btn border border-secondary text-secondary hover:text-white hover:bg-secondary" href="#!"> Go Back</a>
                                <a class="btn bg-primary text-white hover:bg-primary-hover" href="{{ url("/") }}"> Back to Dashboard</a>
                            </div>
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
