@extends("shared.base", ["title" => "Delete Account"])

@section("styles")
@endsection

@section("content")
    <div class="flex min-h-screen items-center p-12.5">
        <div class="container">
            <div class="flex justify-center px-2.5">
                <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
                    <div class="mb-7 flex flex-col items-center justify-center text-center">
                        <a class="auth-logo" href="{{ url("/") }}">
                            <img alt="logo" class="flex dark:hidden" src="/images/logo-black.png" />
                            <img alt="dark logo" class="hidden dark:flex" src="/images/logo.png" />
                        </a>
                    </div>
                    <div class="card p-7.5 rounded-2xl">
                        <form action="index.html">
                            <div class="mt-3 mb-9">
                                <div class="bg-default-50 border-light mx-auto flex size-20 items-center justify-center rounded-full border border-dashed">
                                    <img alt="checkmark" class="size-16 object-contain" src="/images/delete.png" />
                                </div>
                            </div>
                            <h4 class="mb-6 text-center text-lg font-bold">Account Deactivated</h4>
                            <p class="text-default-400 mb-9 text-center">Your account is currently inactive. Reactivate now to regain access to all features and opportunities.</p>
                            <div>
                                <button class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover" type="submit">Reactivate Now</button>
                            </div>
                        </form>
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
