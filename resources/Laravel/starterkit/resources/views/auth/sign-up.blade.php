@extends("shared.base", ["title" => "Sign up"])

@section("styles")
@endsection

@section("content")
    <div class="flex min-h-screen items-center p-12.5">
        <div class="container">
            <div class="flex justify-center px-2.5">
                <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
                    <div class="mb-3 flex flex-col items-center justify-center text-center">
                        @include("auth.partials.logo")
                        <h4 class="font-bold text-base text-dark mt-2 mb-2">Create your account</h4>
                        <p class="text-default-400 mx-auto w-full lg:w-3/4 mb-4">Let’s get you started. Enter your details below.</p>
                    </div>
                    <div class="card p-7.5 rounded-2xl">
                        @include("auth.partials.messages")
                        <form action="{{ route("register.store") }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label class="form-label" for="userName">
                                    Name
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input autocomplete="name" autofocus class="form-input" id="userName" name="name" placeholder="Your name" required type="text" value="{{ old("name") }}" />
                                </div>
                            </div>
                            <div class="mb-5">
                                <label class="form-label" for="userEmail">
                                    Email address
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input autocomplete="email" class="form-input" id="userEmail" name="email" placeholder="you@example.com" required type="email" value="{{ old("email") }}" />
                                </div>
                            </div>
                            <div class="mb-5" data-password="bar">
                                <label class="form-label" for="userPassword">
                                    Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input autocomplete="new-password" class="form-input" id="userPassword" name="password" placeholder="••••••••" required type="password" />
                                <div class="password-bar my-3"></div>
                                <p class="text-default-400 text-xs">Use 8+ characters with letters, numbers &amp; symbols.</p>
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="passwordConfirmation">Confirm password</label>
                                <input autocomplete="new-password" class="form-input" id="passwordConfirmation" name="password_confirmation" placeholder="••••••••" required type="password" />
                            </div>
                            <div>
                                <button class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover" type="submit">Create Account</button>
                            </div>
                        </form>
                        <p class="text-default-400 mt-7.5 text-center">
                            Already have an account?
                            <a class="text-primary font-semibold underline underline-offset-4" href="{{ route("login") }}">Login</a>
                        </p>
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
    @vite(["resources/js/pages/auth-password.js"])
@endsection
