@extends("shared.base", ["title" => "Sign Up"])

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
                                    <h4 class="text-default-900 mt-7.5 mb-2 text-base font-bold">Create New Account</h4>
                                    <p class="text-default-400 mx-auto w-full lg:w-3/4">Let’s get you started. Create your account by entering your details below.</p>
                                </div>
                                <form action="index.html">
                                    <div class="mb-5">
                                        <label class="form-label" for="userName">
                                            Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-icon-group">
                                            <i class="iconify tabler--user input-icon"></i>
                                            <input class="form-input" id="userName" placeholder="Damian D." required="" type="text" />
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label" for="userEmail">
                                            Email address
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-icon-group">
                                            <i class="iconify tabler--mail input-icon"></i>
                                            <input class="form-input" id="userEmail" placeholder="you@example.com" required="" type="email" />
                                        </div>
                                    </div>
                                    <div class="mb-5" data-password="bar">
                                        <label class="form-label" for="userPassword">
                                            Password
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-icon-group">
                                            <i class="iconify tabler--lock-password input-icon"></i>
                                            <input class="form-input" id="userPassword" placeholder="••••••••" type="password" />
                                        </div>
                                        <div class="password-bar my-3"></div>
                                        <p class="text-default-400 text-xs">Use 8+ characters with letters, numbers &amp; symbols.</p>
                                    </div>
                                    <div class="mb-5">
                                        <div class="flex items-center gap-2">
                                            <input checked="" class="form-checkbox form-checkbox-light size-4.5" id="termAndPolicy" type="checkbox" />
                                            <label class="form-check-label" for="termAndPolicy">Agree the Terms &amp; Policy</label>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover" type="submit">Create Account</button>
                                    </div>
                                </form>
                                <p class="text-default-400 mt-7.5 text-center">
                                    Already have an account?
                                    <a class="text-primary font-semibold underline underline-offset-4" href="{{ url("/auth-card/sign-in") }}">Login</a>
                                </p>
                                <p class="text-default-400 mt-7.5 text-center">
                                    ©
                                    <span data-current-year=""></span>
                                    Inspinia - by
                                    <span>WebAppLayers</span>
                                </p>
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

    @include("shared.partials.customizer")
@endsection

@section("scripts")
    @vite(["resources/js/pages/auth-password.js"])
@endsection
