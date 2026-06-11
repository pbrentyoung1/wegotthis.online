@extends("shared.base", ["title" => "Sign in"])

@section("styles")
@endsection

@section("content")
    <div class="flex min-h-screen items-center p-12.5">
        <div class="container">
            <div class="flex justify-center px-2.5">
                <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
                    <div class="mb-3 flex flex-col items-center justify-center text-center">
                        @include("auth.partials.logo")
                        <h4 class="font-bold text-base text-dark mt-2 mb-2">Welcome back</h4>
                        <p class="text-default-400 mx-auto w-full lg:w-3/4 mb-4">Enter your email and password to continue.</p>
                    </div>
                    <div class="card p-7.5 rounded-2xl">
                        @include("auth.partials.messages")
                        <form action="{{ route("login.store") }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label class="form-label" for="userEmail">
                                    Email address
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input autocomplete="email" autofocus class="form-input" id="userEmail" name="email" placeholder="you@example.com" required type="email" value="{{ old("email") }}" />
                                </div>
                            </div>
                            <div class="mb-5">
                                <label class="form-label" for="userPassword">
                                    Password
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input autocomplete="current-password" class="form-input" id="userPassword" name="password" placeholder="••••••••" required type="password" />
                                </div>
                            </div>
                            <div class="mb-5 flex items-center justify-between gap-2">
                                <div class="flex items-start gap-2 lg:items-center">
                                    <input class="form-checkbox form-checkbox-light mt-1 size-4.25 lg:mt-0" id="rememberMe" name="remember" type="checkbox" />
                                    <label class="form-check-label" for="rememberMe">Keep me signed in</label>
                                </div>
                                <a class="text-default-400 underline underline-offset-4" href="{{ route("password.request") }}">Forgot Password?</a>
                            </div>
                            <div>
                                <button class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover" type="submit">Sign In</button>
                            </div>
                        </form>
                    </div>
                    <p class="text-default-400 mt-7.5 text-center">
                        © <span data-current-year=""></span> ForWorship Creative
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection

@section("scripts")
@endsection
