@extends("shared.base", ["title" => "Two Factor"])

@section("styles")
@endsection

@section("content")
    <div class="flex min-h-screen items-center p-12.5">
        <div class="container">
            <div class="flex justify-center px-2.5">
                <div class="2xl:w-4/10 md:w-1/2 sm:w-2/3 w-full">
                    <div class="mb-3 flex flex-col items-center justify-center text-center">
                        @include("auth.partials.logo")
                        <h4 class="font-bold text-base text-dark mt-2 mb-2">Two-factor verification</h4>
                        <p class="text-default-400 mx-auto w-full lg:w-3/4 mb-4">Enter the code from your authenticator app to continue.</p>
                    </div>
                    <div class="card p-7.5 rounded-2xl">
                        @include("auth.partials.messages")
                        <form action="{{ route("two-factor.login.store") }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label class="form-label" for="code">
                                    Authentication code
                                    <span class="text-danger">*</span>
                                </label>
                                <input autocomplete="one-time-code" autofocus class="form-input text-center" id="code" inputmode="numeric" name="code" required type="text" />
                            </div>
                            <div>
                                <button class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover" type="submit">Confirm</button>
                            </div>
                        </form>
                        <p class="text-default-400 text-center">
                            Return to
                            <a class="text-primary font-semibol underline underline-offset-3" href="{{ route("login") }}">Sign in</a>
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
    @vite(["resources/js/pages/auth-two-factor.js"])
@endsection
