@extends("shared.base", ["title" => "Lock Screen"])

@section("styles")
@endsection

@section("content")
    <div class="flex min-h-screen items-center p-12.5">
        <div class="container">
            <div class="flex justify-center px-2.5">
                <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
                    <div class="mb-3 flex flex-col items-center justify-center text-center">
                        <a class="auth-logo" href="{{ url("/") }}">
                            <img alt="logo" class="flex dark:hidden" src="/images/logo-black.png" />
                            <img alt="dark logo" class="hidden dark:flex" src="/images/logo.png" />
                        </a>
                        <h4 class="font-bold text-base text-dark mt-5 mb-2">Lock Screen!</h4>
                        <p class="text-default-400 mx-auto w-full lg:w-3/4 mb-4">This screen is locked. Enter your password to continue</p>
                    </div>
                    <div class="card p-7.5 rounded-2xl">
                        <form action="index.html">
                            <div class="mb-9 text-center">
                                <div class="border-default-300 mx-auto mb-3 size-20 rounded-full border-4">
                                    <img alt="thumbnail" class="size-18 rounded-full" src="/images/users/user-1.jpg" />
                                </div>
                                <h5 class="text-base mb-2 font-semibold">Damian D.</h5>
                            </div>
                            <div class="mb-5">
                                <label class="form-label" for="userPassword">
                                    Password
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input class="form-input" id="userPassword" placeholder="••••••••" required="" type="password" />
                                </div>
                            </div>
                            <div>
                                <button class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover" type="submit">Unlock</button>
                            </div>
                        </form>
                        <p class="text-default-400 mt-7.5 text-center">
                            Not you? Return to
                            <a class="text-primary font-semibol underline underline-offset-3" href="{{ url("/auth/sign-in") }}">Sign in</a>
                        </p>
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
